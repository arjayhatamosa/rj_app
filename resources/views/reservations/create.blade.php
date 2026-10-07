<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Reservation | Beach Resort</title>

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
           MAIN
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
            margin-bottom: 22px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            text-decoration: none;
            color: #0f766e;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 12px;
        }

        .back-link:hover {
            color: #0b5f59;
        }

        .page-header h2 {
            font-size: 21px;
            color: #123d3a;
            margin-bottom: 5px;
        }

        .page-header p {
            color: #6b7280;
            font-size: 13px;
        }

        /* =========================
           FORM CARD
        ========================= */

        .form-card {
            max-width: 950px;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 13px;
            box-shadow: 0 4px 18px rgba(15, 118, 110, 0.06);
            overflow: hidden;
        }

        .form-header {
            padding: 20px 25px;
            background: #f8fafc;
            border-bottom: 1px solid #e5e7eb;
        }

        .form-header h3 {
            color: #123d3a;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .form-header p {
            color: #6b7280;
            font-size: 12px;
        }

        .form-body {
            padding: 28px 25px;
        }

        .form-section {
            margin-bottom: 28px;
        }

        .form-section:last-child {
            margin-bottom: 0;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 9px;
            color: #123d3a;
            font-size: 14px;
            font-weight: bold;
            padding-bottom: 10px;
            margin-bottom: 18px;
            border-bottom: 1px solid #edf0f2;
        }

        .section-number {
            width: 25px;
            height: 25px;
            border-radius: 7px;
            background: #0f766e;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            font-size: 12px;
            font-weight: bold;
            color: #374151;
            margin-bottom: 7px;
        }

        .required {
            color: #dc2626;
        }

        input,
        select,
        textarea {
            width: 100%;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            padding: 11px 12px;
            font-family: inherit;
            font-size: 13px;
            color: #374151;
            background: white;
            outline: none;
            transition: 0.2s ease;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #0f766e;
            box-shadow: 0 0 0 3px rgba(15, 118, 110, 0.08);
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .help-text {
            font-size: 11px;
            color: #9ca3af;
            margin-top: 5px;
        }

        .error-text {
            color: #dc2626;
            font-size: 11px;
            margin-top: 5px;
        }

        /* =========================
           PRICE PREVIEW
        ========================= */

        .price-box {
            margin-top: 20px;
            background: #f0fdfa;
            border: 1px solid #ccfbf1;
            border-radius: 10px;
            padding: 18px;
        }

        .price-title {
            color: #0f766e;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 12px;
        }

        .price-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 6px 0;
            font-size: 12px;
            color: #475569;
        }

        .price-row.total {
            border-top: 1px solid #99f6e4;
            margin-top: 8px;
            padding-top: 12px;
            color: #123d3a;
            font-size: 15px;
            font-weight: bold;
        }

        #pricePerNight {
            font-weight: bold;
        }

        #totalAmount {
            color: #0f766e;
        }

        /* =========================
           BUTTONS
        ========================= */

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            padding-top: 25px;
            margin-top: 25px;
            border-top: 1px solid #e5e7eb;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 11px 18px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .btn-cancel {
            background: #f1f5f9;
            color: #475569;
            border: 1px solid #e2e8f0;
        }

        .btn-cancel:hover {
            background: #e2e8f0;
        }

        .btn-submit {
            background: #d4af37;
            color: #123d3a;
            border: none;
            box-shadow: 0 3px 8px rgba(212, 175, 55, 0.25);
        }

        .btn-submit:hover {
            background: #c39f2f;
            transform: translateY(-1px);
        }

        /* =========================
           ALERT
        ========================= */

        .error-box {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            border-radius: 9px;
            padding: 14px 16px;
            margin-bottom: 22px;
            font-size: 12px;
        }

        .error-box strong {
            display: block;
            margin-bottom: 7px;
        }

        .error-box ul {
            margin-left: 18px;
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
            }

            .admin-info {
                display: none;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .form-actions {
                flex-direction: column-reverse;
            }

            .btn {
                width: 100%;
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

            <div class="brand-icon">
                BR
            </div>

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

                <h1>Create Reservation</h1>

                <p>
                    Add a new guest reservation
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

            <div class="page-header">

                <a
                    href="{{ route('reservations.index') }}"
                    class="back-link"
                >
                    ← Back to Reservations
                </a>

                <h2>
                    New Reservation
                </h2>

                <p>
                    Enter the guest and booking details below.
                </p>

            </div>


            <!-- VALIDATION ERRORS -->

            @if($errors->any())

                <div class="error-box">

                    <strong>
                        Please correct the following errors:
                    </strong>

                    <ul>

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <!-- FORM -->

            <div class="form-card">

                <div class="form-header">

                    <h3>
                        Reservation Information
                    </h3>

                    <p>
                        Fields marked with
                        <span style="color:#dc2626;">*</span>
                        are required.
                    </p>

                </div>


                <div class="form-body">

                    <form
                        method="POST"
                        action="{{ route('reservations.store') }}"
                        id="reservationForm"
                    >

                        @csrf


                        <!-- =====================
                             GUEST INFORMATION
                        ====================== -->

                        <div class="form-section">

                            <div class="section-title">

                                <span class="section-number">
                                    1
                                </span>

                                Guest Information

                            </div>


                            <div class="form-grid">

                                <div class="form-group full">

                                    <label for="user_id">
                                        Customer / Guest
                                        <span class="required">*</span>
                                    </label>

                                    <select
                                        name="user_id"
                                        id="user_id"
                                        required
                                    >

                                        <option value="">
                                            -- Select Customer --
                                        </option>

                                        @foreach($users as $user)

                                            <option
                                                value="{{ $user->id }}"
                                                {{ old('user_id') == $user->id ? 'selected' : '' }}
                                            >
                                                {{ $user->name }}
                                                —
                                                {{ $user->email }}
                                            </option>

                                        @endforeach

                                    </select>

                                    <span class="help-text">
                                        Select the customer who will make the reservation.
                                    </span>

                                    @error('user_id')
                                        <span class="error-text">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>


                                <div class="form-group">

                                    <label for="guests">
                                        Number of Guests
                                        <span class="required">*</span>
                                    </label>

                                    <input
                                        type="number"
                                        name="guests"
                                        id="guests"
                                        value="{{ old('guests', 1) }}"
                                        min="1"
                                        required
                                    >

                                    <span class="help-text">
                                        Enter the total number of guests.
                                    </span>

                                    @error('guests')
                                        <span class="error-text">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>

                            </div>

                        </div>


                        <!-- =====================
                             ROOM INFORMATION
                        ====================== -->

                        <div class="form-section">

                            <div class="section-title">

                                <span class="section-number">
                                    2
                                </span>

                                Room / Cottage

                            </div>


                            <div class="form-grid">

                                <div class="form-group full">

                                    <label for="room_id">
                                        Room / Cottage
                                        <span class="required">*</span>
                                    </label>

                                    <select
                                        name="room_id"
                                        id="room_id"
                                        required
                                    >

                                        <option value="">
                                            -- Select Room / Cottage --
                                        </option>

                                        @foreach($rooms as $room)

                                            <option
                                                value="{{ $room->id }}"
                                                data-price="{{ $room->price }}"
                                                data-capacity="{{ $room->capacity }}"
                                                {{ old('room_id') == $room->id ? 'selected' : '' }}
                                            >
                                                {{ $room->name }}
                                                —
                                                {{ $room->type }}
                                                —
                                                ₱{{ number_format($room->price, 2) }}/night
                                                —
                                                Capacity: {{ $room->capacity }}
                                            </option>

                                        @endforeach

                                    </select>

                                    <span class="help-text">
                                        Only rooms/cottages currently marked as Available are shown.
                                    </span>

                                    @error('room_id')
                                        <span class="error-text">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>

                            </div>

                        </div>


                        <!-- =====================
                             BOOKING DATES
                        ====================== -->

                        <div class="form-section">

                            <div class="section-title">

                                <span class="section-number">
                                    3
                                </span>

                                Booking Dates

                            </div>


                            <div class="form-grid">

                                <div class="form-group">

                                    <label for="check_in">
                                        Check-in Date
                                        <span class="required">*</span>
                                    </label>

                                    <input
                                        type="date"
                                        name="check_in"
                                        id="check_in"
                                        value="{{ old('check_in') }}"
                                        min="{{ date('Y-m-d') }}"
                                        required
                                    >

                                    @error('check_in')
                                        <span class="error-text">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>


                                <div class="form-group">

                                    <label for="check_out">
                                        Check-out Date
                                        <span class="required">*</span>
                                    </label>

                                    <input
                                        type="date"
                                        name="check_out"
                                        id="check_out"
                                        value="{{ old('check_out') }}"
                                        min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                        required
                                    >

                                    @error('check_out')
                                        <span class="error-text">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>

                            </div>


                            <!-- PRICE PREVIEW -->

                            <div class="price-box">

                                <div class="price-title">
                                    Reservation Summary
                                </div>

                                <div class="price-row">

                                    <span>
                                        Price per Night
                                    </span>

                                    <span id="pricePerNight">
                                        ₱0.00
                                    </span>

                                </div>

                                <div class="price-row">

                                    <span>
                                        Number of Nights
                                    </span>

                                    <span id="numberOfNights">
                                        0
                                    </span>

                                </div>

                                <div class="price-row total">

                                    <span>
                                        Estimated Total
                                    </span>

                                    <span id="totalAmount">
                                        ₱0.00
                                    </span>

                                </div>

                            </div>

                        </div>


                        <!-- =====================
                             NOTES
                        ====================== -->

                        <div class="form-section">

                            <div class="section-title">

                                <span class="section-number">
                                    4
                                </span>

                                Additional Notes

                            </div>


                            <div class="form-grid">

                                <div class="form-group full">

                                    <label for="notes">
                                        Notes / Special Requests
                                    </label>

                                    <textarea
                                        name="notes"
                                        id="notes"
                                        placeholder="Enter any special requests or additional information..."
                                    >{{ old('notes') }}</textarea>

                                    <span class="help-text">
                                        Optional. You may include special requests from the guest.
                                    </span>

                                    @error('notes')
                                        <span class="error-text">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>

                            </div>

                        </div>


                        <!-- =====================
                             ACTION BUTTONS
                        ====================== -->

                        <div class="form-actions">

                            <a
                                href="{{ route('reservations.index') }}"
                                class="btn btn-cancel"
                            >
                                Cancel
                            </a>

                            <button
                                type="submit"
                                class="btn btn-submit"
                            >
                                Create Reservation
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </section>

    </main>


    <!-- =========================
         JAVASCRIPT
    ========================== -->

    <script>

        const roomSelect = document.getElementById('room_id');

        const checkIn = document.getElementById('check_in');

        const checkOut = document.getElementById('check_out');

        const pricePerNight = document.getElementById('pricePerNight');

        const numberOfNights = document.getElementById('numberOfNights');

        const totalAmount = document.getElementById('totalAmount');


        function calculateTotal() {

            const selectedRoom =
                roomSelect.options[roomSelect.selectedIndex];

            const price =
                parseFloat(
                    selectedRoom?.dataset?.price || 0
                );

            const startDate =
                new Date(checkIn.value);

            const endDate =
                new Date(checkOut.value);


            pricePerNight.textContent =
                '₱' + price.toLocaleString('en-PH', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });


            if (
                checkIn.value &&
                checkOut.value &&
                endDate > startDate
            ) {

                const difference =
                    endDate.getTime() - startDate.getTime();

                const nights =
                    Math.ceil(
                        difference / (1000 * 60 * 60 * 24)
                    );

                const total =
                    price * nights;


                numberOfNights.textContent =
                    nights;


                totalAmount.textContent =
                    '₱' + total.toLocaleString('en-PH', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    });

            } else {

                numberOfNights.textContent =
                    '0';

                totalAmount.textContent =
                    '₱0.00';

            }

        }


        roomSelect.addEventListener(
            'change',
            calculateTotal
        );


        checkIn.addEventListener(
            'change',
            function () {

                if (checkIn.value) {

                    const date =
                        new Date(checkIn.value);

                    date.setDate(
                        date.getDate() + 1
                    );

                    const minimumCheckout =
                        date.toISOString()
                            .split('T')[0];

                    checkOut.min =
                        minimumCheckout;

                    if (
                        checkOut.value &&
                        checkOut.value <= checkIn.value
                    ) {

                        checkOut.value = '';

                    }

                }

                calculateTotal();

            }
        );


        checkOut.addEventListener(
            'change',
            calculateTotal
        );


        calculateTotal();

    </script>

</body>
</html>