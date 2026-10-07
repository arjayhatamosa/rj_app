<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create User - Beach Resort Management System</title>

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

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: linear-gradient(180deg, #006b6b, #004b56);
            color: white;
            padding: 25px 15px;
            overflow-y: auto;
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
            color: #ffffff;
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
            background: rgba(255,255,255,.12);
        }

        .menu a.active {
            background: #079c9c;
            box-shadow: 0 5px 15px rgba(0,0,0,.15);
        }

        .menu-icon {
            display: inline-block;
            width: 28px;
            font-size: 17px;
        }

        .logout-section {
            margin-top: 25px;
            padding-top: 15px;
            border-top: 1px solid rgba(255,255,255,.15);
        }

        .logout-button {
            color: #ffe0d9;
        }

        /* =========================
           MAIN
        ========================= */

        .main {
            margin-left: 250px;
            min-height: 100vh;
        }

        /* =========================
           TOPBAR
        ========================= */

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

        /* =========================
           CONTENT
        ========================= */

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

        .page-heading {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 8px;
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
            box-shadow: 0 7px 20px rgba(0,143,143,.2);
        }

        .page-heading h1 {
            font-size: 32px;
            color: #173b4d;
        }

        .subtitle {
            color: #728891;
            margin-left: 70px;
            margin-bottom: 30px;
        }

        /* =========================
           LAYOUT
        ========================= */

        .layout {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 25px;
        }

        .card {
            background: white;
            border-radius: 14px;
            border: 1px solid #dfebeb;
            box-shadow: 0 7px 25px rgba(0,0,0,.05);
            overflow: hidden;
            margin-bottom: 20px;
        }

        .card-header {
            padding: 18px 22px;
            background: #f1f8f8;
            border-bottom: 1px solid #e0eeee;
        }

        .card-header h2 {
            font-size: 17px;
            color: #173b4d;
        }

        .card-header p {
            margin-top: 4px;
            font-size: 12px;
            color: #7b9098;
        }

        .card-body {
            padding: 25px;
        }

        /* =========================
           FORM
        ========================= */

        .form-group {
            margin-bottom: 20px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: bold;
            color: #294c5c;
        }

        .required {
            color: #d99a00;
        }

        input,
        select {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #cbdedf;
            border-radius: 9px;
            outline: none;
            font-size: 14px;
            color: #294c5c;
            background: white;
            transition: .2s;
        }

        input:focus,
        select:focus {
            border-color: #079c9c;
            box-shadow: 0 0 0 3px rgba(7,156,156,.12);
        }

        .input-icon {
            position: relative;
        }

        .input-icon span {
            position: absolute;
            left: 13px;
            top: 12px;
            font-size: 17px;
            color: #68838d;
        }

        .input-icon input {
            padding-left: 42px;
        }

        .error {
            color: #c0392b;
            font-size: 12px;
            margin-top: 6px;
        }

        /* =========================
           ROLE
        ========================= */

        .role-info {
            padding: 20px;
        }

        .role-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            border: 1px solid #e1eeee;
            border-radius: 12px;
            margin-bottom: 12px;
            background: #fbfefe;
        }

        .role-item:last-child {
            margin-bottom: 0;
        }

        .role-icon {
            min-width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            background: #e8f5f5;
            color: #087f7f;
        }

        .role-item h3 {
            font-size: 14px;
            color: #173b4d;
            margin-bottom: 4px;
        }

        .role-item p {
            font-size: 12px;
            line-height: 1.5;
            color: #71868e;
        }

        /* =========================
           BUTTONS
        ========================= */

        .buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-top: 10px;
        }

        .btn {
            border: none;
            border-radius: 9px;
            padding: 14px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: .2s;
        }

        .btn-primary {
            background: #078f8f;
            color: white;
        }

        .btn-primary:hover {
            background: #067979;
            transform: translateY(-1px);
        }

        .btn-cancel {
            background: white;
            color: #46616c;
            border: 1px solid #ccdede;
        }

        .btn-cancel:hover {
            background: #f2f7f7;
        }

        /* =========================
           ALERT
        ========================= */

        .alert {
            background: #fff5f4;
            color: #b63d32;
            border: 1px solid #f0c9c5;
            padding: 14px 18px;
            border-radius: 9px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .alert ul {
            margin-top: 8px;
            padding-left: 20px;
        }

        /* =========================
           RESORT MESSAGE
        ========================= */

        .resort-message {
            background: linear-gradient(
                135deg,
                #078f8f,
                #005c68
            );
            color: white;
            padding: 30px;
            text-align: center;
        }

        .resort-message-icon {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .resort-message h2 {
            margin-bottom: 10px;
        }

        .resort-message p {
            font-size: 13px;
            line-height: 1.6;
            color: #d9f4f4;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media(max-width: 1000px) {

            .sidebar {
                width: 210px;
            }

            .main {
                margin-left: 210px;
            }

            .layout {
                grid-template-columns: 1fr;
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

            .form-row {
                grid-template-columns: 1fr;
            }

            .buttons {
                grid-template-columns: 1fr;
            }

            .page-heading h1 {
                font-size: 25px;
            }

            .subtitle {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

<!-- =====================================================
     SIDEBAR
===================================================== -->

<div class="sidebar">

    <div class="logo">
        <div class="logo-icon">🌴</div>
        <h2>Beach Resort</h2>
        <p>Management System</p>
    </div>

    <div class="menu">

        <div class="menu-title">Main Menu</div>

        <!-- DASHBOARD -->
        <a href="{{ route('dashboard') }}">
            <span class="menu-icon">🏠</span>
            Dashboard
        </a>

        <div class="menu-title">Management</div>

        <!-- USER MANAGEMENT -->
        <a href="{{ route('users.index') }}" class="active">
            <span class="menu-icon">👥</span>
            User Management
        </a>

        <!-- ROOMS & COTTAGES -->
        <a href="{{ route('rooms.index') }}">
            <span class="menu-icon">🏖️</span>
            Rooms & Cottages
        </a>

        <!-- RESERVATIONS -->
        <a href="#">
            <span class="menu-icon">📅</span>
            Reservations
        </a>

        <!-- PAYMENTS -->
        <a href="#">
            <span class="menu-icon">💳</span>
            Payments
        </a>

        <!-- CHECK-IN / CHECK-OUT -->
        <a href="#">
            <span class="menu-icon">🛎️</span>
            Check-in / Check-out
        </a>

        <!-- FACILITIES -->
        <a href="#">
            <span class="menu-icon">🌴</span>
            Facilities
        </a>

        <!-- REPORTS -->
        <a href="#">
            <span class="menu-icon">📊</span>
            Reports
        </a>

        <!-- LOGOUT -->
        <div class="logout-section">

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="logout-button">
                    <span class="menu-icon">🚪</span>
                    Logout
                </button>

            </form>

        </div>

    </div>

</div>


<!-- =====================================================
     MAIN CONTENT
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

            <a href="{{ route('users.index') }}">
                User Management
            </a>

            &nbsp; / &nbsp;

            Create User

        </div>


        <!-- PAGE HEADING -->
        <div class="page-heading">

            <div class="heading-icon">
                👤+
            </div>

            <div>

                <h1>
                    Create New User
                </h1>

            </div>

        </div>


        <p class="subtitle">
            Add a new user to the system and assign their role.
        </p>


        <!-- ERROR MESSAGE -->
        @if ($errors->any())

            <div class="alert">

                <strong>
                    Please fix the following errors:
                </strong>

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <!-- MAIN LAYOUT -->
        <div class="layout">

            <!-- =================================================
                 LEFT SIDE
            ================================================== -->

            <div>

                <form action="{{ route('users.store') }}" method="POST">

                    @csrf


                    <!-- USER INFORMATION -->
                    <div class="card">

                        <div class="card-header">

                            <h2>
                                👤 User Information
                            </h2>

                            <p>
                                Fill in the user's account details below.
                            </p>

                        </div>


                        <div class="card-body">

                            <!-- NAME -->
                            <div class="form-group">

                                <label>
                                    Full Name
                                    <span class="required">*</span>
                                </label>

                                <div class="input-icon">

                                    <span>👤</span>

                                    <input
                                        type="text"
                                        name="name"
                                        value="{{ old('name') }}"
                                        placeholder="Enter full name"
                                        required
                                    >

                                </div>

                                @error('name')

                                    <div class="error">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            <!-- EMAIL -->
                            <div class="form-group">

                                <label>
                                    Email Address
                                    <span class="required">*</span>
                                </label>

                                <div class="input-icon">

                                    <span>✉️</span>

                                    <input
                                        type="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        placeholder="Enter email address"
                                        required
                                    >

                                </div>

                                @error('email')

                                    <div class="error">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            <!-- PASSWORDS -->
                            <div class="form-row">

                                <!-- PASSWORD -->
                                <div class="form-group">

                                    <label>
                                        Password
                                        <span class="required">*</span>
                                    </label>

                                    <div class="input-icon">

                                        <span>🔒</span>

                                        <input
                                            type="password"
                                            name="password"
                                            placeholder="Enter password"
                                            required
                                        >

                                    </div>

                                    @error('password')

                                        <div class="error">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>


                                <!-- CONFIRM PASSWORD -->
                                <div class="form-group">

                                    <label>
                                        Confirm Password
                                        <span class="required">*</span>
                                    </label>

                                    <div class="input-icon">

                                        <span>🔒</span>

                                        <input
                                            type="password"
                                            name="password_confirmation"
                                            placeholder="Confirm password"
                                            required
                                        >

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- ROLE ASSIGNMENT -->
                    <div class="card">

                        <div class="card-header">

                            <h2>
                                🛡️ Role Assignment
                            </h2>

                            <p>
                                Select the appropriate role for this user.
                            </p>

                        </div>


                        <div class="card-body">

                            <div class="form-group">

                                <label>
                                    User Role
                                    <span class="required">*</span>
                                </label>

                                <select name="role" required>

                                    <option value="">
                                        Select user role
                                    </option>

                                    @foreach($roles as $role)

                                        <option
                                            value="{{ $role }}"
                                            {{ old('role') == $role ? 'selected' : '' }}
                                        >
                                            {{ $role }}
                                        </option>

                                    @endforeach

                                </select>

                                @error('role')

                                    <div class="error">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>

                        </div>

                    </div>


                    <!-- BUTTONS -->
                    <div class="buttons">

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            ＋ Create User
                        </button>


                        <a
                            href="{{ route('users.index') }}"
                            class="btn btn-cancel"
                        >
                            ↩ Cancel
                        </a>

                    </div>

                </form>

            </div>


            <!-- =================================================
                 RIGHT SIDE
            ================================================== -->

            <div>

                <!-- AVAILABLE ROLES -->
                <div class="card">

                    <div class="card-header">

                        <h2>
                            🛡️ Available Roles
                        </h2>

                        <p>
                            Choose a role based on the user's access level.
                        </p>

                    </div>


                    <div class="role-info">


                        <!-- ADMINISTRATOR -->
                        <div class="role-item">

                            <div class="role-icon">
                                👑
                            </div>

                            <div>

                                <h3>
                                    Administrator
                                </h3>

                                <p>
                                    Full access to all system features,
                                    including user management.
                                </p>

                            </div>

                        </div>


                        <!-- MANAGER -->
                        <div class="role-item">

                            <div class="role-icon">
                                👥
                            </div>

                            <div>

                                <h3>
                                    Manager
                                </h3>

                                <p>
                                    Can manage resort operations,
                                    reservations, and reports.
                                </p>

                            </div>

                        </div>


                        <!-- RESORT STAFF -->
                        <div class="role-item">

                            <div class="role-icon">
                                🧑‍💼
                            </div>

                            <div>

                                <h3>
                                    Resort Staff
                                </h3>

                                <p>
                                    Can manage guest check-ins,
                                    reservations, and accommodations.
                                </p>

                            </div>

                        </div>


                        <!-- CUSTOMER -->
                        <div class="role-item">

                            <div class="role-icon">
                                🧑
                            </div>

                            <div>

                                <h3>
                                    Customer/Guest
                                </h3>

                                <p>
                                    Can view accommodations,
                                    check availability, and make reservations.
                                </p>

                            </div>

                        </div>


                    </div>

                </div>


                <!-- RESORT MESSAGE -->
                <div class="card resort-message">

                    <div class="resort-message-icon">
                        🌴
                    </div>

                    <h2>
                        Beach Resort
                    </h2>

                    <p>
                        Great people make great experiences.
                        <br>
                        Manage your resort team efficiently.
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>