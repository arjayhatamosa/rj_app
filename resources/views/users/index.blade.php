<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>User Management - Beach Resort Management System</title>

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

        /* =========================================
           SIDEBAR
        ========================================= */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;

            width: 250px;
            height: 100vh;

            background: linear-gradient(
                180deg,
                #006b6b,
                #004b56
            );

            color: white;

            padding: 25px 15px;

            overflow-y: auto;
        }

        .logo {
            text-align: center;

            padding-bottom: 25px;

            border-bottom:
                1px solid rgba(255,255,255,.2);

            margin-bottom: 20px;
        }

        .logo-icon {
            font-size: 42px;
            margin-bottom: 8px;
        }

        .logo h2 {
            font-size: 20px;
            color: white;
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

        .menu a,
        .logout-button {

            display: block;

            width: 100%;

            text-decoration: none;

            color: white;

            padding: 13px 15px;

            margin: 5px 0;

            border-radius: 10px;

            transition: .2s;

            font-size: 14px;

            border: none;

            background: transparent;

            text-align: left;

            cursor: pointer;
        }

        .menu a:hover,
        .logout-button:hover {

            background:
                rgba(255,255,255,.12);
        }

        .menu a.active {

            background: #079c9c;

            box-shadow:
                0 5px 15px rgba(0,0,0,.15);
        }

        .menu-icon {

            display: inline-block;

            width: 28px;

            font-size: 17px;
        }

        .logout-section {

            margin-top: 25px;

            padding-top: 15px;

            border-top:
                1px solid rgba(255,255,255,.15);
        }

        .logout-button {
            color: #ffe0d9;
        }


        /* =========================================
           MAIN
        ========================================= */

        .main {

            margin-left: 250px;

            min-height: 100vh;
        }


        /* =========================================
           TOPBAR
        ========================================= */

        .topbar {

            height: 75px;

            background: white;

            display: flex;

            justify-content: space-between;

            align-items: center;

            padding: 0 35px;

            border-bottom:
                1px solid #e1eeee;

            box-shadow:
                0 2px 10px rgba(0,0,0,.04);
        }

        .topbar-title {

            font-size: 18px;

            font-weight: bold;

            color: #17485a;
        }

        .admin {

            display: flex;

            align-items: center;

            gap: 12px;
        }

        .admin-icon {

            width: 42px;
            height: 42px;

            border-radius: 50%;

            background: #0b8f8f;

            color: white;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 20px;
        }

        .admin-text strong {

            display: block;

            font-size: 14px;

            color: #173b4d;
        }

        .admin-text span {

            font-size: 11px;

            color: #7a929c;
        }


        /* =========================================
           CONTENT
        ========================================= */

        .content {

            padding: 35px;
        }

        .breadcrumb {

            font-size: 13px;

            color: #80939b;

            margin-bottom: 20px;
        }

        .breadcrumb a {

            color: #078b8b;

            text-decoration: none;
        }

        .breadcrumb a:hover {

            text-decoration: underline;
        }


        /* =========================================
           PAGE HEADER
        ========================================= */

        .page-header {

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 20px;

            margin-bottom: 25px;
        }

        .page-heading {

            display: flex;

            align-items: center;

            gap: 15px;
        }

        .heading-icon {

            width: 55px;
            height: 55px;

            border-radius: 50%;

            background: #078f8f;

            color: white;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 25px;

            box-shadow:
                0 7px 20px rgba(0,143,143,.2);
        }

        .page-heading h1 {

            font-size: 30px;

            color: #173b4d;
        }

        .page-heading p {

            margin-top: 5px;

            color: #728891;

            font-size: 13px;
        }


        /* =========================================
           ADD USER BUTTON
        ========================================= */

        .add-user-btn {

            display: inline-flex;

            align-items: center;

            gap: 8px;

            padding: 13px 18px;

            background: #078f8f;

            color: white;

            text-decoration: none;

            border-radius: 9px;

            font-size: 14px;

            font-weight: bold;

            transition: .2s;

            box-shadow:
                0 5px 15px rgba(7,143,143,.15);
        }

        .add-user-btn:hover {

            background: #067979;

            transform: translateY(-1px);
        }


        /* =========================================
           TABLE CARD
        ========================================= */

        .table-card {

            background: white;

            border-radius: 14px;

            border: 1px solid #dfebeb;

            box-shadow:
                0 7px 25px rgba(0,0,0,.05);

            overflow: hidden;
        }

        .table-header {

            padding: 20px 25px;

            background: #f1f8f8;

            border-bottom:
                1px solid #e0eeee;

            display: flex;

            justify-content: space-between;

            align-items: center;
        }

        .table-header h2 {

            font-size: 17px;

            color: #173b4d;
        }

        .table-header span {

            font-size: 12px;

            color: #7b9098;
        }


        /* =========================================
           TABLE
        ========================================= */

        .table-wrapper {

            overflow-x: auto;
        }

        table {

            width: 100%;

            border-collapse: collapse;

            min-width: 750px;
        }

        thead {

            background: #fafcfc;
        }

        th {

            padding: 15px 18px;

            text-align: left;

            font-size: 12px;

            text-transform: uppercase;

            letter-spacing: .5px;

            color: #65808b;

            border-bottom:
                1px solid #e4eeee;
        }

        td {

            padding: 16px 18px;

            border-bottom:
                1px solid #edf3f3;

            font-size: 13px;

            color: #405b66;

            vertical-align: middle;
        }

        tbody tr {

            transition: .2s;
        }

        tbody tr:hover {

            background: #f8fcfc;
        }

        tbody tr:last-child td {

            border-bottom: none;
        }


        /* =========================================
           USER AVATAR
        ========================================= */

        .user-info {

            display: flex;

            align-items: center;

            gap: 12px;
        }

        .user-avatar {

            width: 40px;
            height: 40px;

            border-radius: 50%;

            background: #e4f5f5;

            color: #078f8f;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 17px;

            font-weight: bold;
        }

        .user-name {

            font-weight: bold;

            color: #173b4d;

            margin-bottom: 3px;
        }

        .user-email {

            font-size: 11px;

            color: #81949c;
        }


        /* =========================================
           ROLE BADGES
        ========================================= */

        .role-badge {

            display: inline-block;

            padding: 6px 11px;

            border-radius: 20px;

            font-size: 11px;

            font-weight: bold;

            background: #e8f5f5;

            color: #087f7f;
        }


        /* =========================================
           ACTION BUTTONS
        ========================================= */

        .actions {

            display: flex;

            align-items: center;

            gap: 7px;
        }

        .action-btn {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            width: 35px;
            height: 35px;

            border-radius: 8px;

            text-decoration: none;

            border: none;

            cursor: pointer;

            transition: .2s;

            font-size: 14px;
        }

        .edit-btn {

            background: #e8f5f5;

            color: #078f8f;
        }

        .edit-btn:hover {

            background: #078f8f;

            color: white;
        }

        .delete-btn {

            background: #fff0ef;

            color: #c0392b;
        }

        .delete-btn:hover {

            background: #c0392b;

            color: white;
        }


        /* =========================================
           EMPTY STATE
        ========================================= */

        .empty-state {

            text-align: center;

            padding: 60px 20px;
        }

        .empty-icon {

            font-size: 50px;

            margin-bottom: 15px;
        }

        .empty-state h3 {

            font-size: 18px;

            color: #173b4d;

            margin-bottom: 7px;
        }

        .empty-state p {

            font-size: 13px;

            color: #7b9098;

            margin-bottom: 20px;
        }


        /* =========================================
           FOOTER
        ========================================= */

        .footer {

            padding: 25px 0 5px;

            text-align: center;

            color: #8ba0a7;

            font-size: 11px;
        }


        /* =========================================
           RESPONSIVE
        ========================================= */

        @media(max-width: 1000px) {

            .sidebar {

                width: 210px;
            }

            .main {

                margin-left: 210px;
            }

            .content {

                padding: 25px;
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

            .topbar {

                padding: 0 20px;
            }

            .content {

                padding: 20px;
            }

            .page-header {

                flex-direction: column;

                align-items: flex-start;
            }

            .add-user-btn {

                width: 100%;

                justify-content: center;
            }

            .page-heading h1 {

                font-size: 25px;
            }
        }

    </style>

</head>


<body>


<!-- =====================================================
     SIDEBAR
===================================================== -->

<div class="sidebar">

    <!-- LOGO -->

    <div class="logo">

        <div class="logo-icon">
            🌴
        </div>

        <h2>
            Beach Resort
        </h2>

        <p>
            Management System
        </p>

    </div>


    <!-- MENU -->

    <div class="menu">

        <div class="menu-title">
            Main Menu
        </div>


        <!-- DASHBOARD -->

        <a href="{{ route('dashboard') }}">

            <span class="menu-icon">
                🏠
            </span>

            Dashboard

        </a>


        <div class="menu-title">
            Management
        </div>


        <!-- USER MANAGEMENT -->

        <a
            href="{{ route('users.index') }}"
            class="active"
        >

            <span class="menu-icon">
                👥
            </span>

            User Management

        </a>


        <!-- ROOMS & COTTAGES -->

        <a href="{{ route('rooms.index') }}">

            <span class="menu-icon">
                🏖️
            </span>

            Rooms & Cottages

        </a>


        <!-- RESERVATIONS -->

        <a href="#">

            <span class="menu-icon">
                📅
            </span>

            Reservations

        </a>


        <!-- PAYMENTS -->

        <a href="#">

            <span class="menu-icon">
                💳
            </span>

            Payments

        </a>


        <!-- CHECK IN / CHECK OUT -->

        <a href="#">

            <span class="menu-icon">
                🛎️
            </span>

            Check-in / Check-out

        </a>


        <!-- FACILITIES -->

        <a href="#">

            <span class="menu-icon">
                🌴
            </span>

            Facilities

        </a>


        <!-- REPORTS -->

        <a href="#">

            <span class="menu-icon">
                📊
            </span>

            Reports

        </a>


        <!-- LOGOUT -->

        <div class="logout-section">

            <form
                action="{{ route('logout') }}"
                method="POST"
            >

                @csrf

                <button
                    type="submit"
                    class="logout-button"
                >

                    <span class="menu-icon">
                        🚪
                    </span>

                    Logout

                </button>

            </form>

        </div>

    </div>

</div>



<!-- =====================================================
     MAIN
===================================================== -->

<div class="main">


    <!-- TOPBAR -->

    <div class="topbar">

        <div class="topbar-title">

            Beach Resort Management System

        </div>


        <div class="admin">

            <div class="admin-icon">
                👤
            </div>


            <div class="admin-text">

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


        <!-- BREADCRUMB -->

        <div class="breadcrumb">

            <a href="{{ route('dashboard') }}">
                Dashboard
            </a>

            &nbsp; / &nbsp;

            User Management

        </div>



        <!-- PAGE HEADER -->

        <div class="page-header">


            <div class="page-heading">

                <div class="heading-icon">
                    👥
                </div>


                <div>

                    <h1>
                        User Management
                    </h1>

                    <p>
                        Manage system users and their assigned roles.
                    </p>

                </div>

            </div>


            <!-- ADD USER -->

            <a
                href="{{ route('users.create') }}"
                class="add-user-btn"
            >

                <span>
                    ＋
                </span>

                Add New User

            </a>

        </div>



        <!-- TABLE CARD -->

        <div class="table-card">


            <!-- TABLE HEADER -->

            <div class="table-header">

                <div>

                    <h2>
                        System Users
                    </h2>

                    <span>
                        User accounts registered in the system
                    </span>

                </div>

            </div>



            <!-- TABLE -->

            @if($users->count() > 0)

                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th>
                                    User
                                </th>

                                <th>
                                    Role
                                </th>

                                <th>
                                    Created
                                </th>

                                <th>
                                    Actions
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($users as $user)

                                <tr>


                                    <!-- USER -->

                                    <td>

                                        <div class="user-info">


                                            <div class="user-avatar">

                                                {{ strtoupper(substr($user->name, 0, 1)) }}

                                            </div>


                                            <div>

                                                <div class="user-name">

                                                    {{ $user->name }}

                                                </div>


                                                <div class="user-email">

                                                    {{ $user->email }}

                                                </div>

                                            </div>


                                        </div>

                                    </td>



                                    <!-- ROLE -->

                                    <td>

                                        <span class="role-badge">

                                            {{ $user->role }}

                                        </span>

                                    </td>



                                    <!-- CREATED -->

                                    <td>

                                        {{ $user->created_at
                                            ? $user->created_at->format('M d, Y')
                                            : 'N/A'
                                        }}

                                    </td>



                                    <!-- ACTIONS -->

                                    <td>

                                        <div class="actions">


                                            <!-- EDIT -->

                                            <a
                                                href="{{ route('users.edit', $user->id) }}"
                                                class="action-btn edit-btn"
                                                title="Edit User"
                                            >

                                                ✏️

                                            </a>



                                            <!-- DELETE -->

                                            <form
                                                action="{{ route('users.destroy', $user->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this user?');"
                                            >

                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="action-btn delete-btn"
                                                    title="Delete User"
                                                >

                                                    🗑️

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
                        👥
                    </div>

                    <h3>
                        No Users Found
                    </h3>

                    <p>
                        There are currently no users registered in the system.
                    </p>


                    <a
                        href="{{ route('users.create') }}"
                        class="add-user-btn"
                    >

                        ＋ Add First User

                    </a>

                </div>


            @endif


        </div>



        <!-- FOOTER -->

        <div class="footer">

            Beach Resort Management System
            &nbsp;•&nbsp;
            User Management

        </div>


    </div>

</div>


</body>

</html>