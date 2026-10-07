<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit User</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            padding: 40px;
        }

        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        h1 {
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button {
            background: #0f766e;
            color: white;
            border: none;
            padding: 11px 18px;
            border-radius: 6px;
            cursor: pointer;
        }

        .cancel {
            margin-left: 10px;
            text-decoration: none;
            color: #555;
        }

        .errors {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 6px;
        }

        .password-note {
            color: #6b7280;
            font-size: 13px;
            margin-top: -10px;
            margin-bottom: 18px;
        }

    </style>

</head>

<body>


<div class="container">

    <h1>Edit User</h1>


    @if ($errors->any())

        <div class="errors">

            <strong>Please fix the following:</strong>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <form
        action="{{ route('users.update', $user->id) }}"
        method="POST"
    >

        @csrf

        @method('PUT')


        {{-- NAME --}}

        <label>
            Name
        </label>

        <input
            type="text"
            name="name"
            value="{{ old('name', $user->name) }}"
            required
        >


        {{-- EMAIL --}}

        <label>
            Email
        </label>

        <input
            type="email"
            name="email"
            value="{{ old('email', $user->email) }}"
            required
        >


        {{-- PASSWORD --}}

        <label>
            New Password
        </label>

        <input
            type="password"
            name="password"
            placeholder="Leave blank to keep current password"
        >

        <p class="password-note">
            Leave this blank if you do not want to change the password.
            Minimum 8 characters.
        </p>


        {{-- CONFIRM PASSWORD --}}

        <label>
            Confirm New Password
        </label>

        <input
            type="password"
            name="password_confirmation"
            placeholder="Confirm new password"
        >


        {{-- ROLE --}}

        <label>
            Role
        </label>

        <select name="role" required>

            @foreach($roles as $role)

                <option
                    value="{{ $role }}"
                    {{ old('role', $user->role) == $role ? 'selected' : '' }}
                >

                    {{ $role }}

                </option>

            @endforeach

        </select>


        <button type="submit">
            Update User
        </button>


        <a
            href="{{ route('users.index') }}"
            class="cancel"
        >
            Cancel
        </a>

    </form>

</div>


</body>

</html>