<?php

class Mail
{
    protected static $to;
    protected static $subject;

    public static function to($email)
    {
        self::$to = $email;
        return new static;
    }

    public function subject($subject)
    {
        self::$subject = $subject;
        return $this;
    }

    public function send($message)
    {
        $driver = Env::get('MAIL_MAILER', 'log');

        if ($driver === 'smtp') {
            return self::sendSMTP(self::$to, self::$subject, $message);
        }

        return self::log(self::$to, self::$subject, $message);
    }

    protected static function sendSMTP($to, $subject, $message)
    {
        $host = Env::get('MAIL_HOST');
        $port = Env::get('MAIL_PORT');
        $encryption = Env::get('MAIL_ENCRYPTION');
        $user = Env::get('MAIL_USERNAME');
        $pass = Env::get('MAIL_PASSWORD');
        $from = Env::get('MAIL_FROM_ADDRESS');
        $name = Env::get('MAIL_FROM_NAME');

        if ($encryption === 'ssl') {
            $host = "ssl://" . $host;
        }

        $name = $name ?: $from;
        $domain = substr(strrchr((string) $from, '@'), 1) ?: 'localhost';

        $headers = [
            "Date: " . date('r'),
            "Message-ID: <" . bin2hex(random_bytes(16)) . "@$domain>",
            "From: =?UTF-8?B?" . base64_encode($name) . "?= <$from>",
            "To: <$to>",
            "Reply-To: $from",
            "Subject: =?UTF-8?B?" . base64_encode((string) $subject) . "?=",
            "MIME-Version: 1.0",
            "Content-Type: text/html; charset=UTF-8",
            "Content-Transfer-Encoding: base64",
        ];

        $socket = @fsockopen($host, (int) $port, $errno, $errstr, 10);

        if (!$socket) {
            self::log($to, $subject, "SMTP ERROR: could not connect ($errno) $errstr");
            return false;
        }

        stream_set_timeout($socket, 15);

        try {
            self::expect($socket, null, 220);
            self::expect($socket, "EHLO $domain", 250);

            if ($user && $pass && $user !== 'null') {
                self::expect($socket, "AUTH LOGIN", 334);
                self::expect($socket, base64_encode($user), 334);
                self::expect($socket, base64_encode($pass), 235, '[password]');
            }

            self::expect($socket, "MAIL FROM:<$from>", 250);
            self::expect($socket, "RCPT TO:<$to>", [250, 251]);
            self::expect($socket, "DATA", 354);

            $body = chunk_split(base64_encode($message), 76, "\r\n");
            $data = implode("\r\n", $headers) . "\r\n\r\n" . $body . ".";

            self::expect($socket, $data, 250, '[message data]');
            self::smtpCmd($socket, "QUIT");
        } catch (RuntimeException $e) {
            fclose($socket);
            self::log($to, $subject, "SMTP ERROR: " . $e->getMessage());
            return false;
        }

        fclose($socket);

        self::log($to, $subject, $message);

        return true;
    }

    protected static function expect($socket, $cmd, $codes, $label = null)
    {
        $response = $cmd === null ? self::readResponse($socket) : self::smtpCmd($socket, $cmd);
        $code = (int) substr($response, 0, 3);

        if (!in_array($code, (array) $codes, true)) {
            $sent = $cmd === null ? '(greeting)' : ($label ?? $cmd);
            throw new RuntimeException("$sent => " . trim($response ?: 'no response'));
        }

        return $response;
    }

    protected static function smtpCmd($socket, $cmd)
    {
        fwrite($socket, $cmd . "\r\n");
        return self::readResponse($socket);
    }

    protected static function readResponse($socket)
    {
        $response = '';

        while (($line = fgets($socket, 515)) !== false) {
            $response .= $line;
            // Last line of a (multi-line) reply has a space after the code
            if (isset($line[3]) && $line[3] === ' ') {
                break;
            }
        }

        return $response;
    }

    protected static function log($to, $subject, $message)
    {
        $file = trim((string) Env::get('MAIL_LOG', ''));
        if ($file === '') {
            $file = base_path('storage/logs/mail.log');
        }

        $dir = dirname($file);
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $log = "[" . date('Y-m-d H:i:s') . "]\n";
        $log .= "TO: $to\n";
        $log .= "SUBJECT: $subject\n";
        $log .= "MESSAGE:\n$message\n";
        $log .= "--------------------------\n";

        file_put_contents($file, $log, FILE_APPEND);
    }
}
