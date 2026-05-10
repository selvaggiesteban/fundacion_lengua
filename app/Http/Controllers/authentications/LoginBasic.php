<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use App\Models\User; // Importamos el modelo User para usar las constantes de roles
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginBasic extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $pageConfigs = ['myLayout' => 'blank'];
        return view('admin.authentications.auth-login-basic', ['pageConfigs' => $pageConfigs]);
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(Request $request)
    {
        $request->validate([
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->boolean('remember');
        $loginField = $request->input('login');
        
        // Determine if login field is email or student ID
        $user = null;
        if (filter_var($loginField, FILTER_VALIDATE_EMAIL)) {
            // It's an email - for admins/superadmins
            $user = User::where('email', $loginField)->first();
        } else {
            // It's a student ID - for students
            $user = User::where('student_id', $loginField)->first();
        }
        
        // If user found, check password manually
        if ($user && Hash::check($request->password, $user->password)) {
            // Login the user manually
            Auth::login($user, $remember);
            $request->session()->regenerate();
            
            // --- INICIO DE LA LÓGICA DE REDIRECCIÓN POR ROL ---
            
            // Usamos un match para determinar la ruta de redirección según el rol
            $redirectPath = match($user->role) {
                User::ROLE_SUPERADMIN => route('analytics'),
                User::ROLE_ADMIN => route('analytics'),
                default => route('student.dashboard'), // Por defecto, redirige al panel de estudiante
            };
            
            // Redirige al usuario a la ruta determinada, respetando si intentaba ir a otra URL antes
            return redirect()->intended($redirectPath);
            
            // --- FIN DE LA LÓGICA DE REDIRECCIÓN POR ROL ---
        }
        
        return back()->withErrors([
            'login' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('login');
    }
}