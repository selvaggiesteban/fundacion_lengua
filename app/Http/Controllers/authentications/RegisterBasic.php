<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class RegisterBasic extends Controller
{
    /**
     * Display the registration view.
     * Registration is disabled - redirect to login with message
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        return redirect()->route('login')->with('info', 'El registro manual está deshabilitado. Los estudiantes reciben sus credenciales por email después del pago.');
    }

    /**
     * Handle a registration request.
     * Registration is disabled - redirect to login with message
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        return redirect()->route('login')->with('error', 'El registro manual está deshabilitado. Los estudiantes reciben sus credenciales por email después del pago.');
    }
}
