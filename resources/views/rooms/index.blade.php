<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Rooms & Cottages - Beach Resort</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #333;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: linear-gradient(180deg, #0f766e, #115e59);
            color: white;
            padding: 25px 18px;
        }

        .logo {
            text-align: center;
            margin-bottom: 35px;
        }

        .logo h2 {
            color: #f4c542;
            font-size: 22px;
        }

        .logo p {
            font-size: 12px;
            opacity: 0.8;
        }

        .menu-title {
            font-size: 11px;
            text-transform: uppercase;
            color: #d1fae5;
            margin: 20px 10px 10px;
        }

        .menu a {
            display: block;
            text-decoration: none;
            color: white;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 6px;
            font-size: 14px;
        }

        .menu a:hover {
            background: rgba(255,255,255,0.12);
        }

        .menu a.active {
            background: #f4c542;
            color: #134e4a;
            font-weight: bold;
        }

        .main {
            margin-left: 250px;
            min-height: 100vh;
        }

        .topbar {
            height: 70px;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 35px;
        }

        .topbar h3 {
            color: #115e59;
        }

        .user-info {
            text-align: right;
        }

        .user-info strong {
            display: block;
        }

        .user-info span {
            font-size: 12px;
            color: #0f766e;
        }

        .content {
            padding: 35px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .page-header h1 {
            color: #115e59;
            font-size: 28px;
        }

        .page-header p {
            color: #777;
            font-size: 14px;
            margin-top: 5px;
        }

        .btn-add {
            background: #0f766e;
            color: white;
            text-decoration: none;
            padding: 12px 18px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
        }

        .btn-add:hover {
            background: #115e59;
        }

        .alert {
            background: #dcfce7;
            color: #166534;
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .table-card {
            background: white;
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.06);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f0fdfa;
            color: #115e59;
            padding: 14px;
            text-align: left;
            font-size: 13px;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #eee;
            font-size: 14px;
        }

        tr:hover {
            background: #f9fafb;
        }

        .badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .available {
            background: #dcfce7;
            color: #166534;
        }

        .occupied {
            background: #fef3c7;
            color: #92400e;
        }

        .maintenance {
            background: #fee2e2;
            color: #991b1b;
        }

        .btn-edit {
            background: #f4c542;
            color: #134e4a;
            text-decoration: none;
            padding: 7px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: bold;
        }

        .btn-delete {
            background: #dc2626;
            color: white;
            border: none;
            padding: 7px 12px;
            border-radius: 6px;
            font-size: 12px;
            cursor: pointer;
            font-weight: bold;
        }

        .empty {
            text-align: center;
            padding: 50px 20px;
            color: #777;
        }

        .empty h3 {
            color: #115e59;
            margin-bottom: 8px;
        }

        @media (max-width: 700px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .main {
                margin-left: 0;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="logo">
            <h2>🌴 Beach Resort</h2>
            <p>Management System</p>
        </div>

        <div class="menu">

            <div class="menu-title">Main Menu</div>

            <a href="{{ route('dashboard') }}">
                🏠 Dashboard
            </a>

            <a href="{{ route('rooms.index') }}" class="active">
                🏨 Rooms & Cottages
            </a>

            <a href="#">
                📅 Reservations
            </a>

            <a href="#">
                👥 Guests
            </a>

            <a href="#">
                💳 Payments
            </a>

            <div class="menu-title">Management</div>

            <a href="#">
                🏖️ Facilities
            </a>

            <a href="#">
                📊 Reports
            </a>

        </div>

    </aside>


    <!-- MAIN -->
    <main class="main">

        <!-- TOPBAR -->
        <header class="topbar">

            <h3>Rooms & Cottages</h3>

            <div class="user-info">
                <strong>{{ auth()->user()->name }}</strong>
                <span>{{ auth()->user()->role }}</span>
            </div>

        </header>


        <!-- CONTENT -->
        <section class="content">

            <div class="page-header">

                <div>
                    <h1>Rooms & Cottages</h1>
                    <p>Manage all resort rooms and cottages.</p>
                </div>

                <a href="{{ route('rooms.create') }}" class="btn-add">
                    + Add Room / Cottage
                </a>

            </div>


            <!-- SUCCESS MESSAGE -->
            @if(session('success'))

                <div class="alert">
                    {{ session('success') }}
                </div>

            @endif


            <!-- TABLE -->
            <div class="table-card">

                @if($rooms->count() > 0)

                    <table>

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Capacity</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($rooms as $room)

                                <tr>

                                    <td>{{ $room->id }}</td>

                                    <td>
                                        <strong>{{ $room->name }}</strong>
                                    </td>

                                    <td>
                                        {{ $room->type }}
                                    </td>

                                    <td>
                                        ₱{{ number_format($room->price, 2) }}
                                    </td>

                                    <td>
                                        {{ $room->capacity }} guests
                                    </td>

                                    <td>

                                        @if($room->status == 'Available')

                                            <span class="badge available">
                                                Available
                                            </span>

                                        @elseif($room->status == 'Occupied')

                                            <span class="badge occupied">
                                                Occupied
                                            </span>

                                        @else

                                            <span class="badge maintenance">
                                                Maintenance
                                            </span>

                                        @endif

                                    </td>

                                    <td>

                                        <a
                                            href="{{ route('rooms.edit', $room->id) }}"
                                            class="btn-edit"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('rooms.destroy', $room->id) }}"
                                            method="POST"
                                            style="display:inline;"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn-delete"
                                                onclick="return confirm('Are you sure you want to delete this room/cottage?')"
                                            >
                                                Delete
                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                @else

                    <div class="empty">

                        <h3>No Rooms or Cottages Yet</h3>

                        <p>
                            You haven't added any rooms or cottages.
                        </p>

                        <br>

                        <a
                            href="{{ route('rooms.create') }}"
                            class="btn-add"
                        >
                            + Add First Room / Cottage
                        </a>

                    </div>

                @endif

            </div>

        </section>

    </main>

</body>
</html>