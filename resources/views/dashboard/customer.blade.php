<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Customer Dashboard - Beach Resort Management System</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f4f8f8;
            color: #173b4d;
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: linear-gradient(180deg, #006b6b, #004b56);
            color: white;
            padding: 25px 15px;
        }

        .logo {
            text-align: center;
            padding-bottom: 25px;
            border-bottom: 1px solid rgba(255,255,255,.2);
            margin-bottom: 20px;
        }

        .logo-icon {
            font-size: 42px;
            margin-bottom: 8px;
        }

        .logo h2 {
            font-size: 20px;
        }

        .logo p {
            font-size: 12px;
            color: #d7eeee;
            margin-top: 4px;
        }

        .menu-title {
            font-size: 11px;
            text-transform: uppercase;
            color: #9ed3d3;
            margin: 15px 10px 8px;
            letter-spacing: 1px;
        }

        .menu a {
            display: block;
            text-decoration: none;
            color: white;
            padding: 13px 15px;
            margin: 5px 0;
            border-radius: 10px;
            transition: .2s;
            font-size: 14px;
        }

        .menu a:hover,
        .menu a.active {
            background: #079c9c;
        }

        .menu-icon {
            display: inline-block;
            width: 30px;
            font-size: 17px;
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
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 35px;
            border-bottom: 1px solid #e1eeee;
            box-shadow: 0 2px 10px rgba(0,0,0,.04);
        }

        .topbar-title {
            font-size: 18px;
            font-weight: bold;
            color: #17485a;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .profile-icon {
            width: 43px;
            height: 43px;
            border-radius: 50%;
            background: #078f8f;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
        }

        .profile-info strong {
            display: block;
            font-size: 14px;
        }

        .profile-info span {
            font-size: 11px;
            color: #78909a;
        }

        /* CONTENT */
        .content {
            padding: 35px;
        }

        .welcome {
            background: linear-gradient(
                135deg,
                #007c7c,
                #005c68
            );
            border-radius: 18px;
            padding: 35px;
            color: white;
            position: relative;
            overflow: hidden;
            margin-bottom: 25px;
            box-shadow: 0 10px 25px rgba(0,100,100,.15);
        }

        .welcome h1 {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .welcome p {
            color: #d9f4f4;
            font-size: 14px;
            line-height: 1.6;
            max-width: 600px;
        }

        .welcome-icon {
            position: absolute;
            right: 45px;
            top: 25px;
            font-size: 95px;
            opacity: .15;
        }

        /* CARDS */
        .section-title {
            font-size: 20px;
            margin-bottom: 15px;
            color: #173b4d;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            border: 1px solid #dfebeb;
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 7px 22px rgba(0,0,0,.05);
            transition: .2s;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(0,0,0,.08);
        }

        .card-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background: #e6f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            margin-bottom: 18px;
        }

        .card h3 {
            font-size: 17px;
            margin-bottom: 8px;
        }

        .card p {
            color: #748991;
            font-size: 13px;
            line-height: 1.5;
            margin-bottom: 18px;
        }

        .card-button {
            display: inline-block;
            padding: 10px 17px;
            background: #078f8f;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 12px;
            font-weight: bold;
        }

        .card-button:hover {
            background: #067979;
        }

        /* PROMO */
        .promo {
            display: grid;
            grid-template-columns: 1.4fr 1fr;
            gap: 20px;
        }

        .promo-card {
            background: white;
            border-radius: 14px;
            border: 1px solid #dfebeb;
            padding: 25px;
            box-shadow: 0 7px 22px rgba(0,0,0,.05);
        }

        .promo-card h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .promo-card p {
            color: #748991;
            font-size: 13px;
            line-height: 1.6;
        }

        .resort-card {
            background: linear-gradient(
                135deg,
                #fff8e5,
                #ffffff
            );
            border: 1px solid #ead59a;
        }

        .gold {
            color: #c69216;
        }

        /* LOGOUT */
        .logout {
            margin-top: 25px;
        }

        .logout button {
            width: 100%;
            border: 1px solid rgba(255,255,255,.25);
            background: transparent;
            color: white;
            padding: 12px;
            border-radius: 9px;
            cursor: pointer;
            font-size: 13px;
        }

        .logout button:hover {
            background: rgba(255,255,255,.1);
        }

        /* RESPONSIVE */
        @media(max-width: 1000px) {
            .sidebar {
                width: 210px;
            }

            .main {
                margin-left: 210px;
            }

            .cards {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media(max-width: 700px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .main {
                margin-left: 0;
            }

            .cards,
            .promo {
                grid-template-columns: 1fr;
            }

            .content {
                padding: 20px;
            }

            .topbar {
                padding: 0 20px;
            }
        }
    </style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

    <div class="logo">
        <div class="logo-icon">🌴</div>
        <h2>Beach Resort</h2>
        <p>Management System</p>
    </div>

    <div class="menu">

        <div class="menu-title">Main Menu</div>

        <a href="{{ route('dashboard') }}" class="active">
            <span class="menu-icon">🏠</span>
            Dashboard
        </a>

        <div class="menu-title">Resort</div>

        <a href="#">
            <span class="menu-icon">🏖️</span>
            Rooms & Cottages
        </a>

        <a href="#">
            <span class="menu-icon">📅</span>
            My Reservations
        </a>

        <a href="#">
            <span class="menu-icon">💳</span>
            My Payments
        </a>

        <a href="#">
            <span class="menu-icon">🌴</span>
            Facilities
        </a>

        <div class="menu-title">Account</div>

       <a href="#">
    <span class="menu-icon">🔒</span>
    Change Password
</a>
    </div>

    <div class="logout">

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit">
                🚪 Logout
            </button>
        </form>

    </div>

</div>


<!-- MAIN -->
<div class="main">

    <!-- TOPBAR -->
    <div class="topbar">

        <div class="topbar-title">
            Customer Dashboard
        </div>

        <div class="profile">

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

    </div>


    <!-- CONTENT -->
    <div class="content">

        <!-- WELCOME -->
        <div class="welcome">

            <div class="welcome-icon">
                🌴
            </div>

            <h1>
                Welcome, {{ auth()->user()->name }}! 👋
            </h1>

            <p>
                Welcome to the Beach Resort Management System.
                Explore our accommodations, check availability,
                and manage your resort reservations.
            </p>

        </div>


        <!-- SERVICES -->
        <h2 class="section-title">
            Resort Services
        </h2>

        <div class="cards">

            <!-- ROOMS -->
            <div class="card">

                <div class="card-icon">
                    🏖️
                </div>

                <h3>
                    Rooms & Cottages
                </h3>

                <p>
                    Explore available rooms and cottages
                    for your next beach getaway.
                </p>

                <a href="#" class="card-button">
                    View Accommodations
                </a>

            </div>


            <!-- RESERVATIONS -->
            <div class="card">

                <div class="card-icon">
                    📅
                </div>

                <h3>
                    Make a Reservation
                </h3>

                <p>
                    Check availability and reserve your
                    preferred room or cottage.
                </p>

                <a href="#" class="card-button">
                    Book Now
                </a>

            </div>


            <!-- PAYMENTS -->
            <div class="card">

                <div class="card-icon">
                    💳
                </div>

                <h3>
                    My Payments
                </h3>

                <p>
                    View your payment records and
                    reservation billing information.
                </p>

                <a href="#" class="card-button">
                    View Payments
                </a>

            </div>

        </div>


        <!-- LOWER SECTION -->
        <div class="promo">

            <div class="promo-card">

                <h2>
                    🌊 Your Beach Getaway Starts Here
                </h2>

                <p>
                    Enjoy a convenient and relaxing booking
                    experience with our Beach Resort Management
                    System. Find your perfect accommodation,
                    check availability, and manage your
                    reservations in one place.
                </p>

            </div>


            <div class="promo-card resort-card">

                <h2 class="gold">
                    ⭐ Guest Experience
                </h2>

                <p>
                    <strong>
                        Great people make great experiences.
                    </strong>
                    <br><br>
                    We are here to help make your stay
                    comfortable and memorable.
                </p>

            </div>

        </div>

    </div>

</div>

</body>
</html>