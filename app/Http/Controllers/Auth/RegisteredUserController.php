<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'array'], // Validate that roles are provided
            'role.*' => ['in:admin,user'], // Ensure valid roles (admin or user)
        ]);
    
        // Validate that only one role is selected
        if (count($request->role) !== 1) {
            return redirect()->back()->withErrors(['role' => 'You must select exactly one role.']);
        }
    
        $role = implode(',', $request->role);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $role, // Save the selected role in the 'role' column
        ]);
    
        event(new Registered($user));
    
        Auth::login($user);
    
        // Redirect based on role
        $roles = explode(',', $role);
        if (in_array('admin', $roles)) {
            return redirect()->route('admin.index');
        }
    
        return redirect()->route('home');
    }
}
