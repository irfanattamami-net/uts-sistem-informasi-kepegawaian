
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Sistem Kepegawaian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            width: 340px;
            box-shadow: 0 4px 20px #0001;
        }
        h2 { text-align: center; color: #1e293b; }
        label { display: block; margin-top: 15px; }
        input {
            box-sizing: border-box;
            width: 100%;
            padding: 11px;
            margin-top: 6px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
        }
        button {
            width: 100%;
            padding: 12px;
            margin-top: 22px;
            background: #2563eb;
            color: white;
            border: 0;
            border-radius: 6px;
            cursor: pointer;
        }
        .error { color: #dc2626; font-size: 14px; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Login Kepegawaian</h2>

        @if ($errors->any())
            <p class="error">{{ $errors->first() }}</p>
        @endif

        <form method="POST" action="{{ route('login.submit') }}">
            @csrf

            <label for="email">Email</label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
            >

            <label for="password">Password</label>
            <input
                id="password"
                type="password"
                name="password"
                required
            >

            <button type="submit">Masuk</button>
        </form>
    </div>
</body>
</html>
