<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | Beach Resort Management System</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .login-page {
            min-height: 100vh;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 25px;

            /* Beach-style background without an image */
            background:
                linear-gradient(
                    135deg,
                    rgba(4, 72, 72, 0.92),
                    rgba(15, 118, 110, 0.78),
                    rgba(0, 170, 180, 0.60)
                ),
                linear-gradient(
                    to bottom,
                    #69c9d0 0%,
                    #8ed5d0 38%,
                    #e6d29b 39%,
                    #d8bd72 100%
                );

            overflow: hidden;
        }

        /* Decorative sun */
        .sun {
            position: absolute;
            width: 190px;
            height: 190px;
            border-radius: 50%;
            background: rgba(255, 213, 94, 0.45);
            top: 7%;
            right: 12%;
            filter: blur(2px);
        }

        /* Decorative circles */
        .circle {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
        }

        .circle.one {
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.07);
            left: -100px;
            top: -80px;
        }

        .circle.two {
            width: 400px;
            height: 400px;
            background: rgba(255, 255, 255, 0.05);
            right: -150px;
            bottom: -150px;
        }

        .circle.three {
            width: 160px;
            height: 160px;
            background: rgba(212, 175, 55, 0.14);
            left: 40%;
            bottom: -80px;
        }

        /* Wave effect */
        .wave {
            position: absolute;
            left: -5%;
            bottom: -80px;
            width: 110%;
            height: 180px;
            background: rgba(255, 255, 255, 0.10);
            border-radius: 50% 50% 0 0;
            transform: rotate(-2deg);
        }

        .container {
            width: 1150px;
            max-width: 100%;
            min-height: 650px;
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            position: relative;
            z-index: 2;

            background: rgba(255, 255, 255, 0.10);
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 28px;
            overflow: hidden;

            box-shadow:
                0 30px 80px rgba(0, 0, 0, 0.28),
                0 10px 30px rgba(0, 0, 0, 0.12);

            backdrop-filter: blur(8px);
        }

        /* LEFT SIDE */
        .left-section {
            position: relative;
            padding: 65px 60px;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 13px;
            margin-bottom: 55px;
        }

        .brand-icon {
            width: 52px;
            height: 52px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;

            background: linear-gradient(
                135deg,
                #d4af37,
                #f5d76e
            );

            color: #064e4e;
            font-size: 25px;
            font-weight: 800;

            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.18);
        }

        .brand-text {
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .welcome-text {
            max-width: 600px;
        }

        .welcome-text .small-title {
            color: #f5d76e;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 15px;
        }

        .welcome-text h1 {
            font-size: clamp(38px, 5vw, 62px);
            line-height: 1.05;
            margin-bottom: 22px;
            font-weight: 800;
        }

        .welcome-text h1 span {
            color: #f5d76e;
        }

        .welcome-text p {
            color: rgba(255, 255, 255, 0.88);
            font-size: 17px;
            line-height: 1.8;
            max-width: 520px;
            margin-bottom: 38px;
        }

        /* Features */
        .features {
            display: grid;
            grid-template-columns: repeat(2, minmax(150px, 1fr));
            gap: 18px;
            max-width: 540px;
        }

        .feature {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 15px 16px;

            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.14);
            border-radius: 14px;

            transition: 0.3s ease;
        }

        .feature:hover {
            transform: translateY(-4px);
            background: rgba(255, 255, 255, 0.14);
        }

        .feature-icon {
            width: 38px;
            height: 38px;
            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 10px;
            background: rgba(212, 175, 55, 0.20);
            color: #f5d76e;
            font-size: 18px;
        }

        .feature span {
            font-size: 13px;
            font-weight: 600;
        }

        /* RIGHT LOGIN CARD */
        .right-section {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 45px;

            background: rgba(255, 255, 255, 0.93);
        }

        .login-card {
            width: 100%;
            max-width: 410px;
        }

        .login-header {
            margin-bottom: 35px;
        }

        .login-header .login-label {
            color: #0f766e;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .login-header h2 {
            color: #173f3f;
            font-size: 34px;
            margin-bottom: 10px;
        }

        .login-header p {
            color: #718080;
            font-size: 14px;
            line-height: 1.6;
        }

        /* Error */
        .error-box {
            background: #fff0f0;
            border-left: 4px solid #dc2626;
            color: #b91c1c;
            padding: 13px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        /* Form */
        .form-group {
            margin-bottom: 21px;
        }

        .form-group label {
            display: block;
            color: #254747;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #0f766e;
            font-size: 17px;
            z-index: 1;
        }

        .form-control {
            width: 100%;
            height: 52px;
            border: 1px solid #d8e2e2;
            border-radius: 12px;
            padding: 0 16px 0 46px;

            background: #f9fbfb;
            color: #193d3d;
            font-size: 14px;

            outline: none;
            transition: 0.25s ease;
        }

        .form-control:focus {
            border-color: #0f766e;
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(15, 118, 110, 0.10);
        }

        .form-control::placeholder {
            color: #9aa9a9;
        }

        /* Remember */
        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 27px;
            font-size: 13px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #657777;
        }

        .remember input {
            accent-color: #0f766e;
            width: 15px;
            height: 15px;
        }

        .forgot {
            color: #0f766e;
            text-decoration: none;
            font-weight: 600;
        }

        .forgot:hover {
            color: #b08b20;
        }

        /* Login button */
        .login-button {
            width: 100%;
            height: 54px;
            border: none;
            border-radius: 12px;

            background: linear-gradient(
                135deg,
                #0f766e,
                #075e5a
            );

            color: white;
            font-size: 14px;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;

            cursor: pointer;

            box-shadow:
                0 10px 22px rgba(15, 118, 110, 0.25);

            transition: 0.3s ease;
        }

        .login-button:hover {
            transform: translateY(-2px);

            background: linear-gradient(
                135deg,
                #d4af37,
                #b89427
            );

            color: #173f3f;

            box-shadow:
                0 12px 25px rgba(180, 148, 39, 0.30);
        }

        .login-button:active {
            transform: translateY(0);
        }

        /* Register */
        .register {
            text-align: center;
            margin-top: 25px;
            color: #7a8989;
            font-size: 13px;
        }

        .register a {
            color: #0f766e;
            font-weight: 800;
            text-decoration: none;
        }

        .register a:hover {
            color: #b08b20;
        }

        /* Security */
        .security {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;

            margin-top: 30px;
            padding-top: 20px;

            border-top: 1px solid #e8eeee;

            color: #8a9898;
            font-size: 11px;
        }

        .security-icon {
            color: #0f766e;
        }

        /* Footer */
        .footer-text {
            position: absolute;
            bottom: 20px;
            left: 60px;

            color: rgba(255, 255, 255, 0.55);
            font-size: 11px;
            letter-spacing: 0.5px;
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .container {
                grid-template-columns: 1fr;
                max-width: 600px;
            }

            .left-section {
                padding: 45px 40px;
            }

            .right-section {
                padding: 45px 35px;
            }

            .brand {
                margin-bottom: 35px;
            }

            .welcome-text h1 {
                font-size: 42px;
            }

            .footer-text {
                display: none;
            }
        }

        @media (max-width: 600px) {
            .login-page {
                padding: 15px;
            }

            .container {
                border-radius: 20px;
            }

            .left-section {
                padding: 35px 25px;
            }

            .right-section {
                padding: 35px 25px;
            }

            .welcome-text h1 {
                font-size: 34px;
            }

            .welcome-text p {
                font-size: 14px;
            }

            .features {
                grid-template-columns: 1fr;
            }

            .login-header h2 {
                font-size: 29px;
            }

            .form-options {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }
        }
    </style>
</head>

<body>

<div class="login-page">

    <!-- Decorative Elements -->
    <div class="sun"></div>
    <div class="circle one"></div>
    <div class="circle two"></div>
    <div class="circle three"></div>
    <div class="wave"></div>

    <div class="container">

        <!-- LEFT SECTION -->
        <section class="left-section">

            <div class="brand">
                <div class="brand-icon">
                    BR
                </div>

                <div class="brand-text">
                    Beach Resort Management System
                </div>
            </div>

            <div class="welcome-text">

                <div class="small-title">
                    Management Portal
                </div>

                <h1>
                    Manage Your Resort
                    <span>With Ease.</span>
                </h1>

                <p>
                    A centralized management system designed to help
                    organize reservations, guests, rooms, cottages,
                    payments, and resort operations in one place.
                </p>

                <div class="features">

                    <div class="feature">
                        <div class="feature-icon">
                            ✓
                        </div>

                        <span>
                            Reservation Management
                        </span>
                    </div>

                    <div class="feature">
                        <div class="feature-icon">
                            ★
                        </div>

                        <span>
                            Guest Management
                        </span>
                    </div>

                    <div class="feature">
                        <div class="feature-icon">
                            ◆
                        </div>

                        <span>
                            Rooms & Cottages
                        </span>
                    </div>

                    <div class="feature">
                        <div class="feature-icon">
                            ₱
                        </div>

                        <span>
                            Payments & Reports
                        </span>
                    </div>

                </div>

            </div>

            <div class="footer-text">
                © {{ date('Y') }} Beach Resort Management System
            </div>

        </section>


        <!-- RIGHT SECTION -->
        <section class="right-section">

            <div class="login-card">

                <div class="login-header">

                    <div class="login-label">
                        Secure Access
                    </div>

                    <h2>
                        Welcome Back
                    </h2>

                    <p>
                        Sign in to access your resort management
                        dashboard.
                    </p>

                </div>


                {{-- Login Errors --}}
                @if ($errors->any())
                    <div class="error-box">
                        {{ $errors->first() }}
                    </div>
                @endif


                {{-- Login Form --}}
                <form method="POST" action="{{ route('login') }}">

                    @csrf


                    <!-- Email -->
                    <div class="form-group">

                        <label for="email">
                            Email Address
                        </label>

                        <div class="input-wrapper">

                            <span class="input-icon">
                                ✉
                            </span>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email') }}"
                                placeholder="Enter your email address"
                                required
                                autofocus
                            >

                        </div>

                    </div>


                    <!-- Password -->
                    <div class="form-group">

                        <label for="password">
                            Password
                        </label>

                        <div class="input-wrapper">

                            <span class="input-icon">
                                🔒
                            </span>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-control"
                                placeholder="Enter your password"
                                required
                            >

                        </div>

                    </div>


                    <!-- Options -->
                    <div class="form-options">

                        <label class="remember">

                            <input
                                type="checkbox"
                                name="remember"
                            >

                            <span>
                                Remember me
                            </span>

                        </label>

                        <a href="#" class="forgot">
                            Forgot Password?
                        </a>

                    </div>


                    <!-- Login Button -->
                    <button
                        type="submit"
                        class="login-button"
                    >
                        Sign In
                    </button>

                </form>


                <!-- Register -->
                <div class="register">

                    Don't have an account?

                    <a href="{{ route('register') }}">
                        Create an account
                    </a>

                </div>


                <!-- Security -->
                <div class="security">

                    <span class="security-icon">
                        🔒
                    </span>

                    <span>
                        Your account information is protected.
                    </span>

                </div>

            </div>

        </section>

    </div>

</div>

</body>
</html>