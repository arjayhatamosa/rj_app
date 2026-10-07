<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register - Beach Resort Management System</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f4f7fb;
        }

        .container {
            width: 420px;
            background: white;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.10);
        }

        h1 {
            text-align: center;
            color: #0f766e;
            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;
            color: #6b7280;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            margin-bottom: 18px;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 6px;
            background: #0f766e;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #115e59;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .login {
            text-align: center;
            margin-top: 20px;
        }

        .login a {
            color: #0f766e;
            text-decoration: none;
            font-weight: bold;
        }

        .note {
            background: #f0fdfa;
            color: #115e59;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
        }

    </style>

</head>

<body>

    <div class="container">

        <h1>Create Account</h1>

        <p class="subtitle">
            Beach Resort Management System
        </p>


        <div class="note">

            New accounts are automatically registered as
            <strong>Customer/Guest</strong>.

        </div>


        @if ($errors->any())

            <div class="error">

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        <form action="{{ route('register') }}" method="POST">

            @csrf


            <label>
                Full Name
            </label>

            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                placeholder="Enter your name"
                required
            >


            <label>
                Email
            </label>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Enter your email"
                required
            >


            <label>
                Password
            </label>

            <input
                type="password"
                name="password"
                placeholder="Minimum 8 characters"
                required
            >


            <label>
                Confirm Password
            </label>

            <input
                type="password"
                name="password_confirmation"
                placeholder="Confirm your password"
                required
            >


            <button type="submit">
                Register
            </button>

        </form>


        <div class="login">

            Already have an account?

            <a href="{{ route('login') }}">
                Login
            </a>

        </div>

    </div>

</body>

</html>