<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Room/Cottage - Beach Resort</title>

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

        /* SIDEBAR */
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
            margin-bottom: 5px;
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
            transition: 0.3s;
        }

        .menu a:hover {
            background: rgba(255,255,255,0.12);
        }

        .menu a.active {
            background: #f4c542;
            color: #134e4a;
            font-weight: bold;
        }

        /* MAIN */
        .main {
            margin-left: 250px;
            min-height: 100vh;
        }

        /* TOPBAR */
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
            color: #333;
        }

        .user-info span {
            font-size: 12px;
            color: #0f766e;
        }

        /* CONTENT */
        .content {
            padding: 35px;
        }

        .breadcrumb {
            font-size: 13px;
            color: #777;
            margin-bottom: 10px;
        }

        .breadcrumb a {
            color: #0f766e;
            text-decoration: none;
        }

        .page-title {
            margin-bottom: 25px;
        }

        .page-title h1 {
            color: #115e59;
            font-size: 28px;
            margin-bottom: 7px;
        }

        .page-title p {
            color: #777;
            font-size: 14px;
        }

        /* FORM CARD */
        .form-card {
            background: white;
            border-radius: 14px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.06);
            max-width: 900px;
        }

        .section-title {
            color: #115e59;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 2px solid #f4c542;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            margin-bottom: 5px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-size: 14px;
            font-weight: bold;
            color: #374151;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
            transition: 0.3s;
            font-family: Arial, sans-serif;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #0f766e;
            box-shadow: 0 0 0 3px rgba(15,118,110,0.1);
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .error {
            color: #dc2626;
            font-size: 12px;
            margin-top: 5px;
        }

        /* BUTTONS */
        .form-actions {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn {
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-cancel {
            background: #e5e7eb;
            color: #374151;
        }

        .btn-cancel:hover {
            background: #d1d5db;
        }

        .btn-save {
            background: #0f766e;
            color: white;
        }

        .btn-save:hover {
            background: #115e59;
        }

        /* ERROR ALERT */
        .alert {
            background: #fee2e2;
            color: #991b1b;
            padding: 15px 18px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert ul {
            margin: 8px 0 0 20px;
        }

        /* RESPONSIVE */
        @media (max-width: 800px) {

            .sidebar {
                width: 210px;
            }

            .main {
                margin-left: 210px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }
        }

        @media (max-width: 600px) {

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

            .form-card {
                padding: 20px;
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

            <h3>Add Room / Cottage</h3>

            <div class="user-info">
                <strong>{{ auth()->user()->name }}</strong>
                <span>{{ auth()->user()->role }}</span>
            </div>

        </header>


        <!-- CONTENT -->
        <section class="content">

            <div class="breadcrumb">
                <a href="{{ route('rooms.index') }}">Rooms & Cottages</a>
                &nbsp;/&nbsp;
                Add New
            </div>

            <div class="page-title">
                <h1>Add Room / Cottage</h1>
                <p>Add a new accommodation to the resort system.</p>
            </div>


            <!-- VALIDATION ERRORS -->
            @if ($errors->any())

                <div class="alert">

                    <strong>Please fix the following errors:</strong>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>

            @endif


            <!-- FORM -->
            <div class="form-card">

                <div class="section-title">
                    Accommodation Information
                </div>

                <form action="{{ route('rooms.store') }}" method="POST">

                    @csrf

                    <div class="form-grid">

                        <!-- NAME -->
                        <div class="form-group">

                            <label for="name">
                                Room / Cottage Name
                            </label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Example: Deluxe Room 101"
                                required
                            >

                            @error('name')
                                <div class="error">{{ $message }}</div>
                            @enderror

                        </div>


                        <!-- TYPE -->
                        <div class="form-group">

                            <label for="type">
                                Type
                            </label>

                            <select
                                id="type"
                                name="type"
                                required
                            >

                                <option value="">Select Type</option>

                                @foreach ($types as $type)

                                    <option
                                        value="{{ $type }}"
                                        {{ old('type') == $type ? 'selected' : '' }}
                                    >
                                        {{ $type }}
                                    </option>

                                @endforeach

                            </select>

                            @error('type')
                                <div class="error">{{ $message }}</div>
                            @enderror

                        </div>


                        <!-- PRICE -->
                        <div class="form-group">

                            <label for="price">
                                Price per Night
                            </label>

                            <input
                                type="number"
                                id="price"
                                name="price"
                                value="{{ old('price') }}"
                                placeholder="Example: 2500"
                                min="0"
                                step="0.01"
                                required
                            >

                            @error('price')
                                <div class="error">{{ $message }}</div>
                            @enderror

                        </div>


                        <!-- CAPACITY -->
                        <div class="form-group">

                            <label for="capacity">
                                Guest Capacity
                            </label>

                            <input
                                type="number"
                                id="capacity"
                                name="capacity"
                                value="{{ old('capacity') }}"
                                placeholder="Example: 4"
                                min="1"
                                required
                            >

                            @error('capacity')
                                <div class="error">{{ $message }}</div>
                            @enderror

                        </div>


                        <!-- STATUS -->
                        <div class="form-group">

                            <label for="status">
                                Status
                            </label>

                            <select
                                id="status"
                                name="status"
                                required
                            >

                                <option
                                    value="Available"
                                    {{ old('status', 'Available') == 'Available' ? 'selected' : '' }}
                                >
                                    Available
                                </option>

                                <option
                                    value="Occupied"
                                    {{ old('status') == 'Occupied' ? 'selected' : '' }}
                                >
                                    Occupied
                                </option>

                                <option
                                    value="Maintenance"
                                    {{ old('status') == 'Maintenance' ? 'selected' : '' }}
                                >
                                    Maintenance
                                </option>

                            </select>

                            @error('status')
                                <div class="error">{{ $message }}</div>
                            @enderror

                        </div>


                        <!-- DESCRIPTION -->
                        <div class="form-group full">

                            <label for="description">
                                Description
                            </label>

                            <textarea
                                id="description"
                                name="description"
                                placeholder="Enter room or cottage description..."
                            >{{ old('description') }}</textarea>

                            @error('description')
                                <div class="error">{{ $message }}</div>
                            @enderror

                        </div>

                    </div>


                    <!-- BUTTONS -->
                    <div class="form-actions">

                        <a
                            href="{{ route('rooms.index') }}"
                            class="btn btn-cancel"
                        >
                            Cancel
                        </a>

                        <button
                            type="submit"
                            class="btn btn-save"
                        >
                            💾 Save Room / Cottage
                        </button>

                    </div>

                </form>

            </div>

        </section>

    </main>

</body>
</html>