<?php

class AuthController extends Controller
{
    public function showRegister()
    {
        if (Auth::check()) {
            redirect('/');
        }

        return view('auth/register');
    }

    public function register()
    {
        if (!$this->verifyCsrf()) {
            http_response_code(419);
            return 'CSRF token mismatch.';
        }

        if (Auth::check()) {
            redirect('/');
        }

        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $passwordConfirmation = $_POST['password_confirmation'] ?? '';

        $errors = [];

        if ($name === '' || strlen($name) < 2) {
            $errors[] = 'Naam is verplicht en moet minimaal 2 tekens bevatten.';
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Vul een geldig e-mailadres in.';
        }

        if (strlen($password) < 8) {
            $errors[] = 'Wachtwoord moet minimaal 8 tekens bevatten.';
        }

        if ($password !== $passwordConfirmation) {
            $errors[] = 'Wachtwoorden komen niet overeen.';
        }

        if (User::findByEmail($email)) {
            $errors[] = 'Dit e-mailadres is al geregistreerd.';
        }

        if (!empty($errors)) {
            return view('auth/register', [
                'errors' => $errors,
                'old' => [
                    'name' => $name,
                    'email' => $email,
                ],
            ]);
        }

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        User::createUser($name, $email, $passwordHash);

        redirect('/login?registered=1');
    }

    public function showLogin()
    {
        if (Auth::check()) {
            redirect('/');
        }

        return view('auth/login', [
            'registered' => isset($_GET['registered']) && $_GET['registered'] === '1',
        ]);
    }

    public function login()
    {
        if (!$this->verifyCsrf()) {
            http_response_code(419);
            return 'CSRF token mismatch.';
        }

        if (Auth::check()) {
            redirect('/');
        }

        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (!filter_var($email, FILTER_VALIDATE_EMAIL) || $password === '') {
            return view('auth/login', [
                'error' => 'Ongeldige inloggegevens.',
                'old' => ['email' => $email],
            ]);
        }

        if (!Auth::attempt($email, $password)) {
            return view('auth/login', [
                'error' => 'Ongeldige inloggegevens.',
                'old' => ['email' => $email],
            ]);
        }

        redirect('/users');
    }

    public function logout()
    {
        if (!$this->verifyCsrf()) {
            http_response_code(419);
            return 'CSRF token mismatch.';
        }

        Auth::logout();

        redirect('/login');
    }

    protected function verifyCsrf(): bool
    {
        $token = $_POST['_token'] ?? '';

        return Csrf::verify($token);
    }
}
