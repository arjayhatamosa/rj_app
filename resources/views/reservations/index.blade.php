<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reservation Management | Beach Resort</title>

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
            background: #0f766e;
            color: white;
            padding: 24px 16px;
            box-shadow: 3px 0 15px rgba(0, 0, 0, 0.08);
            z-index: 1000;
        }

        .brand {
            text-align: center;
            padding: 8px 5px 28px;
            border-bottom: 1px solid rgba(255,255,255,0.15);
            margin-bottom: 25px;
        }

        .brand-icon {
            width: 52px;
            height: 52px;
            margin: 0 auto 10px;
            border-radius: 14px;
            background: #d4af37;
            color: #0f766e;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
            font-weight: bold;
        }

        .brand h2 {
            font-size: 18px;
            margin-bottom: 4px;
        }

        .brand p {
            font-size: 11px;
            color: #d7eeec;
        }

        .nav-title {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #a7d8d4;
            margin: 0 10px 10px;
        }

        .nav-menu {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 13px;
            border-radius: 9px;
            color: #e6f5f4;
            text-decoration: none;
            font-size: 14px;
            transition: 0.2s ease;
        }

        .nav-link:hover {
            background: rgba(255,255,255,0.10);
            color: white;
        }

        .nav-link.active {
            background: #d4af37;
            color: #123d3a;
            font-weight: bold;
        }

        .nav-icon {
            width: 22px;
            text-align: center;
            font-size: 16px;
        }

        .sidebar-bottom {
            position: absolute;
            left: 16px;
            right: 16px;
            bottom: 20px;
        }

        .logout-btn {
            width: 100%;
            border: none;
            background: rgba(255,255,255,0.08);
            color: #fff;
            padding: 11px;
            border-radius: 9px;
            cursor: pointer;
            font-size: 13px;
            transition: 0.2s ease;
        }

        .logout-btn:hover {
            background: rgba(255,255,255,0.16);
        }

        /* =========================
           MAIN CONTENT
        ========================= */

        .main {
            margin-left: 250px;
            min-height: 100vh;
        }

        .topbar {
            height: 76px;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 35px;
        }

        .topbar-title h1 {
            font-size: 22px;
            color: #123d3a;
            margin-bottom: 4px;
        }

        .topbar-title p {
            font-size: 12px;
            color: #6b7280;
        }

        .admin-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .admin-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #0f766e;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .admin-text {
            text-align: right;
        }

        .admin-text strong {
            display: block;
            font-size: 13px;
            color: #374151;
        }

        .admin-text span {
            font-size: 11px;
            color: #9ca3af;
        }

        .content {
            padding: 30px 35px;
        }

        /* =========================
           PAGE HEADER
        ========================= */

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .page-header h2 {
            font-size: 20px;
            color: #123d3a;
            margin-bottom: 5px;
        }

        .page-header p {
            color: #6b7280;
            font-size: 13px;
        }

        .add-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 17px;
            border-radius: 8px;
            background: #d4af37;
            color: #123d3a;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
            transition: 0.2s ease;
            box-shadow: 0 3px 8px rgba(212, 175, 55, 0.25);
        }

        .add-btn:hover {
            background: #c39f2f;
            transform: translateY(-1px);
        }

        /* =========================
           ALERT
        ========================= */

        .alert {
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .alert-success {
            background: #ecfdf5;
            color: #047857;
            border: 1px solid #a7f3d0;
        }

        /* =========================
           TABLE CARD
        ========================= */

        .table-card {
            background: white;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 4px 16px rgba(15, 118, 110, 0.06);
            overflow: hidden;
        }

        .table-header {
            padding: 18px 22px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-header h3 {
            font-size: 15px;
            color: #123d3a;
        }

        .table-header span {
            font-size: 12px;
            color: #6b7280;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 950px;
        }

        thead {
            background: #f8fafc;
        }

        th {
            padding: 13px 15px;
            text-align: left;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            color: #64748b;
            border-bottom: 1px solid #e5e7eb;
            white-space: nowrap;
        }

        td {
            padding: 15px;
            font-size: 13px;
            color: #374151;
            border-bottom: 1px solid #f0f1f3;
            vertical-align: middle;
        }

        tbody tr:hover {
            background: #f9fcfc;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .customer-name {
            font-weight: bold;
            color: #123d3a;
        }

        .customer-email {
            font-size: 11px;
            color: #9ca3af;
            margin-top: 3px;
        }

        .room-name {
            font-weight: bold;
            color: #374151;
        }

        .room-type {
            font-size: 11px;
            color: #0f766e;
            margin-top: 3px;
        }

        .date-text {
            white-space: nowrap;
        }

        .amount {
            font-weight: bold;
            color: #0f766e;
            white-space: nowrap;
        }

        /* =========================
           STATUS
        ========================= */

        .status {
            display: inline-flex;
            align-items: center;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
            white-space: nowrap;
        }

        .status-pending {
            background: #fff7ed;
            color: #c2410c;
        }

        .status-confirmed {
            background: #ecfdf5;
            color: #047857;
        }

        .status-cancelled {
            background: #fef2f2;
            color: #b91c1c;
        }

        .status-completed {
            background: #eff6ff;
            color: #1d4ed8;
        }

        /* =========================
           ACTIONS
        ========================= */

        .actions {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border-radius: 7px;
            text-decoration: none;
            font-size: 13px;
            border: none;
            cursor: pointer;
        }

        .view-btn {
            background: #ecfeff;
            color: #0f766e;
        }

        .view-btn:hover {
            background: #cffafe;
        }

        .edit-btn {
            background: #fffbeb;
            color: #a16207;
        }

        .edit-btn:hover {
            background: #fef3c7;
        }

        .delete-btn {
            background: #fef2f2;
            color: #dc2626;
        }

        .delete-btn:hover {
            background: #fee2e2;
        }

        .delete-form {
            display: inline;
        }

        /* =========================
           EMPTY STATE
        ========================= */

        .empty-state {
            text-align: center;
            padding: 65px 20px;
        }

        .empty-icon {
            width: 65px;
            height: 65px;
            margin: 0 auto 15px;
            border-radius: 50%;
            background: #f0fdfa;
            color: #0f766e;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
        }

        .empty-state h3 {
            color: #374151;
            font-size: 16px;
            margin-bottom: 7px;
        }

        .empty-state p {
            color: #9ca3af;
            font-size: 13px;
            margin-bottom: 18px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {

            .sidebar {
                width: 210px;
            }

            .main {
                margin-left: 210px;
            }

            .content {
                padding: 25px 20px;
            }

            .topbar {
                padding: 0 20px;
            }
        }

        @media (max-width: 700px) {

            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .sidebar-bottom {
                position: static;
                margin-top: 20px;
            }

            .main {
                margin-left: 0;
            }

            .topbar {
                height: auto;
                padding: 18px 20px;
                gap: 15px;
            }

            .admin-info {
                display: none;
            }

            .page-header {
                align-items: flex-start;
                gap: 15px;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <!-- =========================
         SIDEBAR
    ========================== -->

    <aside class="sidebar">

        <div class="brand">
            <div class="brand-icon">BR</div>

            <h2>Beach Resort</h2>

            <p>Management System</p>
        </div>

        <div class="nav-title">
            Main Menu
        </div>

        <nav class="nav-menu">

            <a href="{{ route('dashboard') }}" class="nav-link">
                <span class="nav-icon">⌂</span>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('users.index') }}" class="nav-link">
                <span class="nav-icon">♙</span>
                <span>User Management</span>
            </a>

            <a href="{{ route('rooms.index') }}" class="nav-link">
                <span class="nav-icon">▣</span>
                <span>Rooms & Cottages</span>
            </a>

            <a href="{{ route('reservations.index') }}" class="nav-link active">
                <span class="nav-icon">▤</span>
                <span>Reservations</span>
            </a>

            <a href="#" class="nav-link">
                <span class="nav-icon">₱</span>
                <span>Payments</span>
            </a>

            <a href="#" class="nav-link">
                <span class="nav-icon">✓</span>
                <span>Check-in / Check-out</span>
            </a>

            <a href="#" class="nav-link">
                <span class="nav-icon">⚙</span>
                <span>Facilities</span>
            </a>

            <a href="#" class="nav-link">
                <span class="nav-icon">▥</span>
                <span>Reports</span>
            </a>

        </nav>

        <div class="sidebar-bottom">

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="logout-btn">
                    ⇥ &nbsp; Logout
                </button>
            </form>

        </div>

    </aside>


    <!-- =========================
         MAIN
    ========================== -->

    <main class="main">

        <!-- TOPBAR -->

        <header class="topbar">

            <div class="topbar-title">
                <h1>Reservation Management</h1>

                <p>
                    Manage guest reservations and bookings
                </p>
            </div>

            <div class="admin-info">

                <div class="admin-text">
                    <strong>Administrator</strong>
                    <span>System Administrator</span>
                </div>

                <div class="admin-avatar">
                    A
                </div>

            </div>

        </header>


        <!-- CONTENT -->

        <section class="content">

            <!-- PAGE HEADER -->

            <div class="page-header">

                <div>
                    <h2>Reservations</h2>

                    <p>
                        View and manage all resort bookings.
                    </p>
                </div>

                <a href="{{ route('reservations.create') }}" class="add-btn">
                    <span>＋</span>
                    Add Reservation
                </a>

            </div>


            <!-- SUCCESS MESSAGE -->

            @if(session('success'))

                <div class="alert alert-success">
                    ✓ {{ session('success') }}
                </div>

            @endif


            <!-- VALIDATION ERRORS -->

            @if($errors->any())

                <div class="alert"
                     style="background:#fef2f2; color:#b91c1c; border:1px solid #fecaca;">

                    <strong>Please check the following:</strong>

                    <ul style="margin:8px 0 0 18px;">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <!-- TABLE -->

            <div class="table-card">

                <div class="table-header">

                    <h3>Reservation List</h3>

                    <span>
                        {{ $reservations->count() }}
                        {{ $reservations->count() == 1 ? 'reservation' : 'reservations' }}
                    </span>

                </div>


                @if($reservations->count() > 0)

                    <div class="table-wrapper">

                        <table>

                            <thead>

                                <tr>
                                    <th>Customer</th>
                                    <th>Room / Cottage</th>
                                    <th>Check-in</th>
                                    <th>Check-out</th>
                                    <th>Guests</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach($reservations as $reservation)

                                    <tr>

                                        <!-- CUSTOMER -->

                                        <td>

                                            <div class="customer-name">
                                                {{ $reservation->user->name ?? 'N/A' }}
                                            </div>

                                            <div class="customer-email">
                                                {{ $reservation->user->email ?? '' }}
                                            </div>

                                        </td>


                                        <!-- ROOM -->

                                        <td>

                                            <div class="room-name">
                                                {{ $reservation->room->name ?? 'N/A' }}
                                            </div>

                                            <div class="room-type">
                                                {{ $reservation->room->type ?? '' }}
                                            </div>

                                        </td>


                                        <!-- CHECK IN -->

                                        <td>

                                            <span class="date-text">
                                                {{ $reservation->check_in->format('M d, Y') }}
                                            </span>

                                        </td>


                                        <!-- CHECK OUT -->

                                        <td>

                                            <span class="date-text">
                                                {{ $reservation->check_out->format('M d, Y') }}
                                            </span>

                                        </td>


                                        <!-- GUESTS -->

                                        <td>
                                            {{ $reservation->guests }}
                                        </td>


                                        <!-- TOTAL -->

                                        <td>

                                            <span class="amount">
                                                ₱{{ number_format($reservation->total_amount, 2) }}
                                            </span>

                                        </td>


                                        <!-- STATUS -->

                                        <td>

                                            @php
                                                $statusClass = match($reservation->status) {
                                                    'Pending' => 'status-pending',
                                                    'Confirmed' => 'status-confirmed',
                                                    'Cancelled' => 'status-cancelled',
                                                    'Completed' => 'status-completed',
                                                    default => 'status-pending',
                                                };
                                            @endphp

                                            <span class="status {{ $statusClass }}">
                                                {{ $reservation->status }}
                                            </span>

                                        </td>


                                        <!-- ACTIONS -->

                                        <td>

                                            <div class="actions">

                                                <!-- VIEW -->

                                                <a
                                                    href="{{ route('reservations.show', $reservation->id) }}"
                                                    class="action-btn view-btn"
                                                    title="View"
                                                >
                                                    👁
                                                </a>


                                                <!-- EDIT -->

                                                <a
                                                    href="{{ route('reservations.edit', $reservation->id) }}"
                                                    class="action-btn edit-btn"
                                                    title="Edit"
                                                >
                                                    ✎
                                                </a>


                                                <!-- DELETE -->

                                                <form
                                                    action="{{ route('reservations.destroy', $reservation->id) }}"
                                                    method="POST"
                                                    class="delete-form"
                                                    onsubmit="return confirm('Are you sure you want to delete this reservation?');"
                                                >

                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="action-btn delete-btn"
                                                        title="Delete"
                                                    >
                                                        🗑
                                                    </button>

                                                </form>

                                            </div>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    <!-- EMPTY STATE -->

                    <div class="empty-state">

                        <div class="empty-icon">
                            ▤
                        </div>

                        <h3>No Reservations Yet</h3>

                        <p>
                            There are currently no reservations in the system.
                        </p>

                        <a href="{{ route('reservations.create') }}" class="add-btn">
                            ＋ Add First Reservation
                        </a>

                    </div>

                @endif

            </div>

        </section>

    </main>

</body>
</html>