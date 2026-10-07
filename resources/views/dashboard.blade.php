<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Beach Resort Management System</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f7fb;
        }

        .navbar {
            background: #0f766e;
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h1 {
            font-size: 24px;
        }

        .navbar span {
            font-size: 14px;
        }

        .container {
            padding: 40px;
        }

        .welcome {
            margin-bottom: 30px;
        }

        .welcome h2 {
            font-size: 28px;
            margin-bottom: 8px;
            color: #1f2937;
        }

        .welcome p {
            color: #6b7280;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        .card h3 {
            margin-bottom: 10px;
            color: #1f2937;
        }

        .card p {
            color: #6b7280;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            background: #0f766e;
            color: white;
            padding: 10px 16px;
            border-radius: 7px;
        }

        .btn:hover {
            background: #115e59;
        }

        .disabled {
            background: #9ca3af;
            cursor: not-allowed;
        }

        @media (max-width: 1000px) {
            .cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .cards {
                grid-template-columns: 1fr;
            }

            .container {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="navbar">

        <h1>Beach Resort Management System</h1>

        <span>Dashboard</span>

    </div>


    <div class="container">

        <div class="welcome">

            <h2>Welcome to the Dashboard</h2>

            <p>
                Manage the operations of your beach resort from one centralized system.
            </p>

        </div>


        <div class="cards">

            {{-- USER MANAGEMENT --}}

            <div class="card">

                <h3>👥 User Management</h3>

                <p>
                    Manage registered users and their assigned roles.
                </p>

                <a href="{{ route('users.index') }}" class="btn">
                    Manage Users
                </a>

            </div>


            {{-- CUSTOMER / GUEST --}}

            <div class="card">

                <h3>🏖️ Customer / Guest</h3>

                <p>
                    Manage customer and guest information.
                </p>

                <a href="#" class="btn disabled">
                    Coming Soon
                </a>

            </div>


            {{-- ROOMS AND COTTAGES --}}

            <div class="card">

                <h3>🏠 Rooms & Cottages</h3>

                <p>
                    Manage rooms, cottages and accommodation availability.
                </p>

                <a href="#" class="btn disabled">
                    Coming Soon
                </a>

            </div>


            {{-- RESERVATIONS --}}

            <div class="card">

                <h3>📅 Reservations</h3>

                <p>
                    Manage resort reservations and booking requests.
                </p>

                <a href="#" class="btn disabled">
                    Coming Soon
                </a>

            </div>


            {{-- PAYMENTS --}}

            <div class="card">

                <h3>💳 Payments</h3>

                <p>
                    Manage payment and billing records.
                </p>

                <a href="#" class="btn disabled">
                    Coming Soon
                </a>

            </div>


            {{-- CHECK IN / CHECK OUT --}}

            <div class="card">

                <h3>🛎️ Check-in / Check-out</h3>

                <p>
                    Record guest check-ins and check-outs.
                </p>

                <a href="#" class="btn disabled">
                    Coming Soon
                </a>

            </div>


            {{-- FACILITIES --}}

            <div class="card">

                <h3>🌴 Resort Facilities</h3>

                <p>
                    Manage resort facilities and amenities.
                </p>

                <a href="#" class="btn disabled">
                    Coming Soon
                </a>

            </div>


            {{-- REPORTS --}}

            <div class="card">

                <h3>📊 Reports</h3>

                <p>
                    View reservation summaries and resort reports.
                </p>

                <a href="#" class="btn disabled">
                    Coming Soon
                </a>

            </div>

        </div>

    </div>

</body>
</html>