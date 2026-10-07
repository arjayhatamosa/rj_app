<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Resort Staff Dashboard - Beach Resort</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f5f8f8;
            color: #263238;
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: linear-gradient(180deg, #00695c, #004d40);
            color: white;
            padding: 25px 18px;
        }

        .logo {
            text-align: center;
            margin-bottom: 35px;
        }

        .logo .icon {
            font-size: 42px;
        }

        .logo h2 {
            margin-top: 8px;
            color: #ffd54f;
            font-size: 20px;
        }

        .logo p {
            font-size: 12px;
            opacity: .8;
            margin-top: 4px;
        }

        .menu-title {
            font-size: 11px;
            text-transform: uppercase;
            opacity: .6;
            margin: 20px 12px 10px;
        }

        .menu a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 13px 15px;
            border-radius: 8px;
            margin-bottom: 7px;
            transition: .2s;
        }

        .menu a:hover,
        .menu a.active {
            background: rgba(255,255,255,.15);
        }

        .menu a span {
            margin-right: 10px;
        }

        /* MAIN */
        .main {
            margin-left: 250px;
            min-height: 100vh;
        }

        /* TOPBAR */
        .topbar {
            height: 75px;
            background: white;
            border-bottom: 1px solid #e0e0e0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 35px;
        }

        .topbar h3 {
            color: #00695c;
        }

        .user-info {
            text-align: right;
        }

        .user-info strong {
            display: block;
            color: #37474f;
        }

        .user-info small {
            color: #888;
        }

        /* CONTENT */
        .content {
            padding: 35px;
        }

        /* WELCOME */
        .welcome {
            background: linear-gradient(135deg, #00695c, #00897b);
            color: white;
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }

        .welcome h1 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .welcome p {
            opacity: .9;
        }

        .welcome .sun {
            position: absolute;
            right: 40px;
            top: 15px;
            font-size: 75px;
            opacity: .25;
        }

        /* SECTION */
        .section-title {
            margin-bottom: 18px;
            color: #37474f;
        }

        /* STAT CARDS */
        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 35px;
        }

        .card {
            background: white;
            padding: 22px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0,0,0,.06);
            border-left: 5px solid #00897b;
        }

        .card.gold {
            border-left-color: #d4a017;
        }

        .card-icon {
            font-size: 30px;
            margin-bottom: 12px;
        }

        .card h2 {
            font-size: 28px;
            color: #00695c;
            margin-bottom: 5px;
        }

        .card p {
            color: #777;
            font-size: 14px;
        }

        /* TASKS */
        .tasks {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .task-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 3px 12px rgba(0,0,0,.06);
        }

        .task-card h3 {
            color: #00695c;
            margin-bottom: 10px;
        }

        .task-card p {
            color: #777;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 18px;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            background: #00695c;
            color: white;
            text-decoration: none;
            border-radius: 7px;
            font-size: 13px;
        }

        .btn:hover {
            background: #004d40;
        }

        /* LOGOUT */
        .logout {
            margin-top: 25px;
        }

        .logout button {
            width: 100%;
            border: none;
            background: rgba(255,255,255,.1);
            color: white;
            padding: 12px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
        }

        .logout button:hover {
            background: rgba(255,255,255,.2);
        }

        /* RESPONSIVE */
        @media (max-width: 1100px) {
            .cards {
                grid-template-columns: repeat(2, 1fr);
            }

            .tasks {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 700px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main {
                margin-left: 0;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .topbar {
                padding: 0 20px;
            }

            .content {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="logo">
            <div class="icon">🏖️</div>

            <h2>Beach Resort</h2>

            <p>Management System</p>
        </div>


        <div class="menu-title">
            Staff Menu
        </div>


        <div class="menu">

            <a href="{{ route('dashboard') }}" class="active">
                <span>📊</span> Dashboard
            </a>

            <a href="#">
                <span>📅</span> Reservations
            </a>

            <a href="#">
                <span>👥</span> Guests
            </a>

            <a href="#">
                <span>🏠</span> Rooms & Cottages
            </a>

            <a href="#">
                <span>💰</span> Payments
            </a>

            <a href="#">
                <span>🏝️</span> Facilities
            </a>

        </div>


        <!-- LOGOUT -->
        <div class="logout">

            <form method="POST" action="{{ route('logout') }}">

                @csrf

                <button type="submit">
                    🚪 Logout
                </button>

            </form>

        </div>

    </aside>


    <!-- MAIN -->
    <main class="main">


        <!-- TOPBAR -->
        <div class="topbar">

            <h3>
                Resort Staff Dashboard
            </h3>


            <div class="user-info">

                <strong>
                    {{ auth()->user()->name }}
                </strong>

                <small>
                    {{ auth()->user()->role }}
                </small>

            </div>

        </div>


        <!-- CONTENT -->
        <div class="content">


            <!-- WELCOME -->
            <div class="welcome">

                <div class="sun">
                    ☀️
                </div>

                <h1>
                    Welcome, Resort Staff! 👋
                </h1>

                <p>
                    Manage reservations, guests, rooms, and daily resort operations.
                </p>

            </div>


            <!-- OVERVIEW -->
            <h2 class="section-title">
                Today's Overview
            </h2>


            <div class="cards">


                <div class="card">

                    <div class="card-icon">
                        📅
                    </div>

                    <h2>
                        0
                    </h2>

                    <p>
                        Today's Reservations
                    </p>

                </div>


                <div class="card gold">

                    <div class="card-icon">
                        🏠
                    </div>

                    <h2>
                        0
                    </h2>

                    <p>
                        Available Rooms & Cottages
                    </p>

                </div>


                <div class="card">

                    <div class="card-icon">
                        👥
                    </div>

                    <h2>
                        0
                    </h2>

                    <p>
                        Today's Guests
                    </p>

                </div>


                <div class="card gold">

                    <div class="card-icon">
                        🛎️
                    </div>

                    <h2>
                        0
                    </h2>

                    <p>
                        Pending Check-ins
                    </p>

                </div>

            </div>


            <!-- STAFF TASKS -->
            <h2 class="section-title">
                Staff Tasks
            </h2>


            <div class="tasks">


                <div class="task-card">

                    <h3>
                        📅 Reservations
                    </h3>

                    <p>
                        Check today's reservations and assist
                        guests with their booking information.
                    </p>

                    <a href="#" class="btn">
                        View Reservations
                    </a>

                </div>


                <div class="task-card">

                    <h3>
                        👥 Guest Management
                    </h3>

                    <p>
                        View guest information and assist with
                        check-in and check-out procedures.
                    </p>

                    <a href="#" class="btn">
                        Manage Guests
                    </a>

                </div>


                <div class="task-card">

                    <h3>
                        🏠 Room Availability
                    </h3>

                    <p>
                        Check which rooms and cottages are
                        available, occupied, or reserved.
                    </p>

                    <a href="#" class="btn">
                        Check Availability
                    </a>

                </div>


            </div>

        </div>

    </main>

</body>
</html>