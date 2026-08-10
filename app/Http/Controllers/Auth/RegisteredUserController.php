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
use Illuminate\Validation\ValidationException;
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
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'digits:16', 'unique:users'],
            'phone' => ['required', 'string', 'max:20', 'unique:users'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class], 
            'password' => [
                'required',
                'confirmed',
                Rules\Password::defaults(),
            ],
            'photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],            
        ]);

        $photo = $request->hasFile('photo')
        ? $request->file('photo')->store('users', 'public')
        : null;
        $user = User::create([
            'name' => $request->name,
            'nik' => $request->nik,
            'phone' => $request->phone,
            'email' => $request->email,
            
            'photo' => $photo,
            'role' => 'pengguna',
            'status' => 'pending',

            'password' => Hash::make($request->password),
            
        ]);

        event(new Registered($user));

        // Hapus Auth::login($user);

        return redirect()
            ->route('login')
            ->with('success', 'Pendaftaran berhasil. Silakan login menggunakan akun Anda.');
    }
}
