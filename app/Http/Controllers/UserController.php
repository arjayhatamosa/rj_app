<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // READ
    public function index()
    {
        $users = User::latest()->get();

        return view('users.index', compact('users'));
    }


    // CREATE - Show form
    public function create()
    {
        $roles = [
            'Administrator',
            'Manager',
            'Resort Staff',
            'Customer/Guest'
        ];

        return view('users.create', compact('roles'));
    }


    // CREATE - Save user
    public function store(Request $request)
    {
        $validated = $request->validate([

            'name' => 'required|string|max:255',

            'email' => 'required|email|max:255|unique:users,email',

            'password' => 'required|min:8|confirmed',

            'role' => [
                'required',
                Rule::in([
                    'Administrator',
                    'Manager',
                    'Resort Staff',
                    'Customer/Guest'
                ])
            ],

        ]);


        User::create([

            'name' => $validated['name'],

            'email' => $validated['email'],

            'password' => Hash::make($validated['password']),

            'role' => $validated['role'],

        ]);


        return redirect()
            ->route('users.index')
            ->with('success', 'User successfully created.');
    }


    // EDIT - Show form
    public function edit(User $user)
    {
        $roles = [
            'Administrator',
            'Manager',
            'Resort Staff',
            'Customer/Guest'
        ];

        return view('users.edit', compact('user', 'roles'));
    }


  // UPDATE - Save changes
public function update(Request $request, User $user)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',

        'email' => [
            'required',
            'email',
            'max:255',
            Rule::unique('users', 'email')->ignore($user->id),
        ],

        'password' => 'nullable|min:8|confirmed',

        'role' => [
            'required',
            Rule::in([
                'Administrator',
                'Manager',
                'Resort Staff',
                'Customer/Guest'
            ])
        ],
    ]);


    $user->name = $validated['name'];

    $user->email = $validated['email'];

    $user->role = $validated['role'];


    // Update password only if a new password was entered
    if (!empty($validated['password'])) {
        $user->password = Hash::make($validated['password']);
    }


    $user->save();


    return redirect()
        ->route('users.index')
        ->with('success', 'User successfully updated.');
}
    // DELETE
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('success', 'User successfully deleted.');
    }
}