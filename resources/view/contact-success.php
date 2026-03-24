<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Message Sent</title>
    <style>
        :root {
            --bg: #0f172a;
            --bg-accent: #1e293b;
            --card: #0b1220;
            --ink: #e2e8f0;
            --muted: #94a3b8;
            --accent: #38bdf8;
            --accent-2: #a78bfa;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: "Space Grotesk", "Trebuchet MS", sans-serif;
            color: var(--ink);
            background:
                radial-gradient(1000px 600px at 10% 10%, rgba(56, 189, 248, 0.18), transparent 60%),
                radial-gradient(900px 600px at 90% 20%, rgba(167, 139, 250, 0.18), transparent 55%),
                linear-gradient(180deg, var(--bg), var(--bg-accent));
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 32px 20px;
        }
        .card {
            width: min(720px, 100%);
            background: linear-gradient(160deg, rgba(56, 189, 248, 0.08), rgba(167, 139, 250, 0.08)) ,
                        var(--card);
            border: 1px solid rgba(148, 163, 184, 0.2);
            border-radius: 18px;
            padding: 36px 32px;
            box-shadow: 0 30px 80px rgba(2, 6, 23, 0.5);
            position: relative;
            overflow: hidden;
            animation: rise 700ms ease-out;
        }
        .card::after {
            content: "";
            position: absolute;
            inset: auto -10% -40% -10%;
            height: 50%;
            background: radial-gradient(circle at 50% 0%, rgba(56, 189, 248, 0.3), transparent 65%);
            opacity: 0.7;
            pointer-events: none;
        }
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(56, 189, 248, 0.12);
            color: var(--accent);
            border: 1px solid rgba(56, 189, 248, 0.4);
            padding: 6px 12px;
            border-radius: 999px;
            font-size: 13px;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }
        h1 {
            margin: 18px 0 12px;
            font-size: clamp(28px, 4vw, 40px);
            line-height: 1.1;
        }
        p {
            margin: 0 0 18px;
            color: var(--muted);
            font-size: 16px;
        }
        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 22px;
        }
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 18px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: transform 180ms ease, box-shadow 180ms ease, background 180ms ease;
        }
        .btn-primary {
            color: #0b1220;
            background: linear-gradient(135deg, var(--accent), var(--accent-2));
            box-shadow: 0 12px 26px rgba(56, 189, 248, 0.35);
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 32px rgba(56, 189, 248, 0.45);
        }
        .btn-ghost {
            color: var(--ink);
            border: 1px solid rgba(148, 163, 184, 0.35);
            background: rgba(148, 163, 184, 0.06);
        }
        .btn-ghost:hover {
            transform: translateY(-2px);
        }
        .meta {
            margin-top: 26px;
            display: grid;
            gap: 6px;
            font-size: 13px;
            color: rgba(148, 163, 184, 0.75);
        }
        @keyframes rise {
            from { opacity: 0; transform: translateY(12px) scale(0.98); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }
        @media (max-width: 560px) {
            .card { padding: 28px 22px; }
            .actions { flex-direction: column; }
            .btn { width: 100%; }
        }
    </style>
</head>
<body>
    <main class="card">
        <span class="badge">Message Sent</span>
        <h1>Thanks for reaching out.</h1>
        <p>Your message is on its way. We will get back to you within one business day.</p>
        <p>If your request is urgent, you can also email us directly and we will prioritize it.</p>

        <div class="actions">
            <a class="btn btn-primary" href="/">Return home</a>
            <a class="btn btn-ghost" href="/contact">Send another message</a>
        </div>

        <div class="meta">
            <span>Receipt: Contact form submission</span>
            <span>Status: Delivered to inbox</span>
        </div>
    </main>
</body>
</html>
