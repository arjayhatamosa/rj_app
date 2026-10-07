<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Administrator Dashboard</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fb;
            color: #1f2937;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: linear-gradient(180deg, #0f766e, #115e59);
            color: white;
            padding: 25px 15px;
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.12);
            z-index: 1000;
            overflow-y: auto;
        }

        .sidebar-brand {
            padding: 5px 12px 25px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.18);
            margin-bottom: 20px;
        }

        .sidebar-brand h2 {
            font-size: 19px;
            line-height: 1.4;
            letter-spacing: 0.3px;
        }

        .sidebar-brand span {
            display: block;
            color: #f4d35e;
            font-size: 12px;
            margin-top: 5px;
            font-weight: bold;
        }

        .menu-title {
            font-size: 11px;
            text-transform: uppercase;
            color: #b7e4df;
            margin: 18px 12px 8px;
            letter-spacing: 1px;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #e6fffb;
            padding: 12px 13px;
            border-radius: 9px;
            font-size: 14px;
            font-weight: 500;
            transition: 0.25s;
        }

        .sidebar-menu a:hover {
            background: rgba(255, 255, 255, 0.12);
            color: white;
            transform: translateX(3px);
        }

        .sidebar-menu a.active {
            background: #d4af37;
            color: #1f2937;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.12);
        }

        .menu-icon {
            width: 22px;
            text-align: center;
            font-size: 17px;
        }

        .logout-area {
            margin-top: 25px;
            padding-top: 18px;
            border-top: 1px solid rgba(255, 255, 255, 0.18);
        }

        .logout-btn {
            width: 100%;
            border: none;
            background: #dc2626;
            color: white;
            padding: 11px 14px;
            border-radius: 9px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.25s;
        }

        .logout-btn:hover {
            background: #b91c1c;
            transform: translateY(-1px);
        }

        /* =========================
           MAIN AREA
        ========================= */

        .main-wrapper {
            margin-left: 250px;
            min-height: 100vh;
        }

        /* =========================
           TOPBAR
        ========================= */

        .topbar {
            height: 72px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 35px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            position: sticky;
            top: 0;
            z-index: 900;
        }

        .topbar-title h1 {
            font-size: 21px;
            color: #0f766e;
        }

        .topbar-title p {
            color: #9ca3af;
            font-size: 12px;
            margin-top: 3px;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .profile-icon {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #ecfdf5;
            color: #0f766e;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
        }

        .profile-info strong {
            display: block;
            font-size: 13px;
            color: #1f2937;
        }

        .profile-info span {
            display: block;
            font-size: 11px;
            color: #d4af37;
            font-weight: bold;
            margin-top: 2px;
        }

        /* =========================
           CONTENT
        ========================= */

        .content {
            width: 94%;
            max-width: 1400px;
            margin: 30px auto;
        }

        /* =========================
           WELCOME CARD
        ========================= */

        .welcome-card {
            background: white;
            border-radius: 16px;
            padding: 28px 30px;
            margin-bottom: 25px;
            border-left: 6px solid #d4af37;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.07);
        }

        .welcome-card h2 {
            color: #0f766e;
            margin-bottom: 8px;
            font-size: 28px;
        }

        .welcome-card p {
            color: #6b7280;
            margin: 5px 0;
        }

        .user-name {
            color: #0f766e;
            font-weight: bold;
        }

        .user-role {
            display: inline-block;
            margin-top: 10px;
            background: #fff8dc;
            color: #8a6d1d;
            border: 1px solid #d4af37;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        /* =========================
           WEATHER
        ========================= */

        .weather-card {
            background: linear-gradient(135deg, #0f766e, #115e59);
            color: white;
            border-radius: 16px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 7px 20px rgba(15, 118, 110, 0.20);
        }

        .weather-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .weather-header h2 {
            font-size: 21px;
        }

        .weather-location {
            color: #f4d35e;
            font-size: 14px;
            font-weight: bold;
        }

        .weather-content {
            display: grid;
            grid-template-columns: 1.3fr 1fr 1fr 1fr;
            gap: 15px;
        }

        .weather-item {
            background: rgba(255, 255, 255, 0.10);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 12px;
            padding: 18px;
        }

        .weather-item.main {
            background: rgba(255, 255, 255, 0.15);
        }

        .weather-label {
            font-size: 12px;
            color: #d1fae5;
            margin-bottom: 7px;
        }

        .weather-value {
            font-size: 22px;
            font-weight: bold;
        }

        .weather-condition {
            text-transform: capitalize;
        }

        .weather-error {
            background: rgba(220, 38, 38, 0.20);
            border: 1px solid rgba(255, 255, 255, 0.25);
            padding: 15px;
            border-radius: 10px;
        }

        .weather-footer {
            margin-top: 18px;
            padding-top: 15px;
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: #d1fae5;
        }

        /* =========================
           SECTION TITLE
        ========================= */

        .section-title {
            margin-bottom: 18px;
        }

        .section-title h2 {
            color: #0f766e;
            font-size: 24px;
            margin-bottom: 5px;
        }

        .section-title p {
            color: #6b7280;
            font-size: 14px;
        }

        /* =========================
           MODULES
        ========================= */

        .modules-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .module-card {
            background: white;
            border-radius: 15px;
            padding: 23px;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.07);
            border-top: 4px solid #0f766e;
            transition: 0.3s;
            min-height: 215px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .module-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.11);
        }

        .module-icon {
            width: 48px;
            height: 48px;
            background: #ecfdf5;
            color: #0f766e;
            border-radius: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 22px;
            margin-bottom: 15px;
        }

        .module-card h3 {
            color: #1f2937;
            font-size: 17px;
            margin-bottom: 8px;
        }

        .module-card p {
            color: #6b7280;
            font-size: 13px;
            line-height: 1.5;
            margin-bottom: 18px;
        }

        .module-btn {
            display: inline-block;
            width: 100%;
            text-align: center;
            text-decoration: none;
            background: #0f766e;
            color: white;
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: bold;
            transition: 0.3s;
        }

        .module-btn:hover {
            background: #115e59;
        }

        .module-btn.gold {
            background: #d4af37;
            color: #1f2937;
        }

        .module-btn.gold:hover {
            background: #b8941f;
        }

        .module-btn.disabled {
            background: #e5e7eb;
            color: #9ca3af;
            cursor: not-allowed;
            pointer-events: none;
        }

        /* =========================
           FOOTER
        ========================= */

        .footer {
            text-align: center;
            color: #9ca3af;
            font-size: 12px;
            margin-top: 40px;
            padding: 20px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1150px) {

            .modules-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .weather-content {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 800px) {

            .sidebar {
                width: 210px;
            }

            .main-wrapper {
                margin-left: 210px;
            }

            .topbar {
                padding: 0 20px;
            }

            .profile-info {
                display: none;
            }
        }

        @media (max-width: 650px) {

            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .main-wrapper {
                margin-left: 0;
            }

            .topbar {
                height: auto;
                padding: 18px;
            }

            .content {
                width: 94%;
                margin-top: 20px;
            }

            .welcome-card {
                padding: 22px;
            }

            .welcome-card h2 {
                font-size: 23px;
            }

            .modules-grid {
                grid-template-columns: 1fr;
            }

            .weather-content {
                grid-template-columns: 1fr;
            }

            .weather-footer {
                flex-direction: column;
                gap: 5px;
            }
        }
    </style>
</head>

<body>

    <!-- =========================
         SIDEBAR
    ========================= -->

    <aside class="sidebar">

        <div class="sidebar-brand">
            <h2>🏖 Beach Resort</h2>
            <span>MANAGEMENT SYSTEM</span>
        </div>

        <div class="menu-title">
            Main Menu
        </div>

        <ul class="sidebar-menu">

            <!-- Dashboard -->
            <li>
                <a href="{{ route('dashboard') }}" class="active">
                    <span class="menu-icon">🏠</span>
                    Dashboard
                </a>
            </li>

            <!-- User Management -->
            <li>
                <a href="{{ route('users.index') }}">
                    <span class="menu-icon">👥</span>
                    User Management
                </a>
            </li>

            <!-- Rooms & Cottages -->
            <li>
                <a href="{{ route('rooms.index') }}">
                    <span class="menu-icon">🏖️</span>
                    Rooms & Cottages
                </a>
            </li>

            <!-- Reservations -->
            <li>
                <a href="#">
                    <span class="menu-icon">📅</span>
                    Reservations
                </a>
            </li>

            <!-- Payments -->
            <li>
                <a href="#">
                    <span class="menu-icon">💳</span>
                    Payments
                </a>
            </li>

            <!-- Check-in / Check-out -->
            <li>
                <a href="#">
                    <span class="menu-icon">🏨</span>
                    Check-in / Check-out
                </a>
            </li>

            <!-- Facilities -->
            <li>
                <a href="#">
                    <span class="menu-icon">🌴</span>
                    Facilities
                </a>
            </li>

            <!-- Reports -->
            <li>
                <a href="#">
                    <span class="menu-icon">📊</span>
                    Reports
                </a>
            </li>

        </ul>

        <div class="logout-area">

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="logout-btn">
                    🚪 Logout
                </button>
            </form>

        </div>

    </aside>


    <!-- =========================
         MAIN WRAPPER
    ========================= -->

    <div class="main-wrapper">

        <!-- =========================
             TOPBAR
        ========================= -->

        <header class="topbar">

            <div class="topbar-title">

                <h1>
                    Administrator Dashboard
                </h1>

                <p>
                    Beach Resort Management System
                </p>

            </div>

            <div class="admin-profile">

                <div class="profile-icon">
                    👤
                </div>

                <div class="profile-info">

                    <strong>
                        {{ auth()->user()->name }}
                    </strong>

                    <span>
                        {{ auth()->user()->role }}
                    </span>

                </div>

            </div>

        </header>


        <!-- =========================
             CONTENT
        ========================= -->

        <main class="content">

            <!-- =========================
                 WELCOME
            ========================= -->

            <div class="welcome-card">

                <h2>
                    Welcome, Administrator!
                </h2>

                <p>
                    Welcome back,
                    <span class="user-name">
                        {{ auth()->user()->name }}
                    </span>
                </p>

                <p>
                    Manage and monitor the different operations
                    of the beach resort from this dashboard.
                </p>

                <span class="user-role">
                    {{ auth()->user()->role }}
                </span>

            </div>


            <!-- =========================
                 WEATHER
            ========================= -->

            <div class="weather-card">

                <div class="weather-header">

                    <h2>
                        🌤 Resort Weather
                    </h2>

                    @if(isset($weather))

                        <div class="weather-location">
                            {{ $weather['city'] }}
                        </div>

                    @endif

                </div>


                @if(isset($weather))

                    <div class="weather-content">

                        <!-- Temperature -->
                        <div class="weather-item main">

                            <div class="weather-label">
                                Temperature
                            </div>

                            <div class="weather-value">
                                {{ $weather['temperature'] }}°C
                            </div>

                        </div>


                        <!-- Condition -->
                        <div class="weather-item">

                            <div class="weather-label">
                                Condition
                            </div>

                            <div class="weather-value weather-condition">
                                {{ $weather['condition'] }}
                            </div>

                        </div>


                        <!-- Humidity -->
                        <div class="weather-item">

                            <div class="weather-label">
                                Humidity
                            </div>

                            <div class="weather-value">
                                {{ $weather['humidity'] }}%
                            </div>

                        </div>


                        <!-- Wind -->
                        <div class="weather-item">

                            <div class="weather-label">
                                Wind Speed
                            </div>

                            <div class="weather-value">
                                {{ $weather['wind_speed'] }} m/s
                            </div>

                        </div>

                    </div>


                    <div class="weather-footer">

                        <span>
                            ● Weather API Connected
                        </span>

                    </div>


                @elseif(isset($weatherError))

                    <div class="weather-error">
                        {{ $weatherError }}
                    </div>


                @else

                    <div class="weather-error">
                        Weather information is currently unavailable.
                    </div>

                @endif

            </div>


            <!-- =========================
                 SYSTEM MODULES
            ========================= -->

            <div class="section-title">

                <h2>
                    System Modules
                </h2>

                <p>
                    Select a module below to manage the resort system.
                </p>

            </div>


            <div class="modules-grid">

                <!-- USER MANAGEMENT -->

                <div class="module-card">

                    <div>

                        <div class="module-icon">
                            👥
                        </div>

                        <h3>
                            User Management
                        </h3>

                        <p>
                            Manage system users, administrator accounts,
                            and customer accounts.
                        </p>

                    </div>

                    <a href="{{ route('users.index') }}"
                       class="module-btn gold">

                        Manage Users

                    </a>

                </div>


                <!-- CUSTOMER / GUEST -->

                <div class="module-card">

                    <div>

                        <div class="module-icon">
                            🧑‍🤝‍🧑
                        </div>

                        <h3>
                            Customer / Guest Management
                        </h3>

                        <p>
                            Manage guest information and customer records.
                        </p>

                    </div>

                    <a href="#" class="module-btn disabled">
                        Coming Soon
                    </a>

                </div>


                <!-- ROOMS & COTTAGES -->

                <div class="module-card">

                    <div>

                        <div class="module-icon">
                            🏖️
                        </div>

                        <h3>
                            Room & Cottage Management
                        </h3>

                        <p>
                            Manage rooms, cottages, availability,
                            and accommodation information.
                        </p>

                    </div>

                    <a href="{{ route('rooms.index') }}"
                       class="module-btn">

                        Manage Rooms & Cottages

                    </a>

                </div>


                <!-- RESERVATIONS -->

                <div class="module-card">

                    <div>

                        <div class="module-icon">
                            📅
                        </div>

                        <h3>
                            Reservation Management
                        </h3>

                        <p>
                            Manage guest reservations and booking schedules.
                        </p>

                    </div>

                    <a href="#" class="module-btn disabled">
                        Coming Soon
                    </a>

                </div>


                <!-- PAYMENTS -->

                <div class="module-card">

                    <div>

                        <div class="module-icon">
                            💳
                        </div>

                        <h3>
                            Payment & Billing
                        </h3>

                        <p>
                            Manage payments, billing records,
                            and transaction information.
                        </p>

                    </div>

                    <a href="#" class="module-btn disabled">
                        Coming Soon
                    </a>

                </div>


                <!-- CHECK-IN / CHECK-OUT -->

                <div class="module-card">

                    <div>

                        <div class="module-icon">
                            🏨
                        </div>

                        <h3>
                            Check-in / Check-out
                        </h3>

                        <p>
                            Manage guest arrival, departure,
                            and accommodation status.
                        </p>

                    </div>

                    <a href="#" class="module-btn disabled">
                        Coming Soon
                    </a>

                </div>


                <!-- RESORT FACILITIES -->

                <div class="module-card">

                    <div>

                        <div class="module-icon">
                            🌴
                        </div>

                        <h3>
                            Resort Facilities
                        </h3>

                        <p>
                            Manage resort facilities and available amenities.
                        </p>

                    </div>

                    <a href="#" class="module-btn disabled">
                        Coming Soon
                    </a>

                </div>


                <!-- REPORTS -->

                <div class="module-card">

                    <div>

                        <div class="module-icon">
                            📊
                        </div>

                        <h3>
                            Reports
                        </h3>

                        <p>
                            View and generate reports for resort operations.
                        </p>

                    </div>

                    <a href="#" class="module-btn disabled">
                        Coming Soon
                    </a>

                </div>

            </div>


            <!-- =========================
                 FOOTER
            ========================= -->

            <div class="footer">

                Beach Resort Management System
                <br>

                Administrator Panel

            </div>

        </main>

    </div>

</body>
</html>