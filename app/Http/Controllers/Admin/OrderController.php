<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User; // Necesario para la relación y quizás para el dropdown de usuarios
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str; // Para generar el número de pedido
use Illuminate\Support\Facades\Validator; // Asegurarse de que el Validator esté importado

class OrderController extends Controller
{
    /**
     * Display a listing of the orders.
     * Muestra una lista de todos los pedidos o solo los del usuario logueado si es estudiante.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->isStudent()) {
            // Si es estudiante, solo muestra sus propios pedidos
            $orders = Order::where('user_id', $user->id)
                           ->with('user') // Carga la relación con el usuario
                           ->latest()
                           ->paginate(15);
        } else {
            // Si es Admin o Super Admin, muestra todos los pedidos
            $orders = Order::with('user') // Carga la relación con el usuario
                           ->latest()
                           ->paginate(15);
        }

        // Se pasan las constantes de estado a la vista para usarlas en un select, por ejemplo.
        $statuses = Order::STATUSES; // Usar la constante STATUSES del modelo

        return view('admin.orders.index', compact('orders', 'statuses'));
    }

    /**
     * Show the form for creating a new order.
     * Muestra el formulario para crear un nuevo pedido.
     */
    public function create()
    {
        $users = User::all(); // Se pueden cargar todos los usuarios para un selector, útil para Admin/SuperAdmin
        $statuses = Order::STATUSES; // Usar la constante STATUSES del modelo

        return view('admin.orders.create', compact('users', 'statuses'));
    }

    /**
     * Store a newly created order in storage.
     * Guarda un nuevo pedido en la base de datos.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'total_amount' => 'required|numeric|min:0',
            'payment_method' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            // Reglas de validación para nuevas columnas de Tipo de Curso
            'course_type' => 'nullable|string|max:255',
            'accommodation' => 'nullable|string|max:255',
            'weeks' => 'nullable|integer|min:0',
            'start_date' => 'nullable|date',
            'insurance' => 'nullable|boolean',
            'transport' => 'nullable|boolean',
            'parking_available' => 'nullable|boolean',
            'cancellation_policy' => 'nullable|boolean',
            'university_certificate_ects' => 'nullable|boolean',
            'destination' => 'nullable|string|max:255',
            'discount_code' => 'nullable|string|max:255',
            // Reglas de validación para nuevas columnas de Datos Personales
            'full_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone_number' => 'nullable|string|max:255',
            'passport_number' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:500',
            'country' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:255',
            'province' => 'nullable|string|max:255',
            'language' => 'nullable|string|max:255',
            'second_language' => 'nullable|string|max:255',
            'spanish_level' => 'nullable|string|max:255',
            'study_center_name' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|string|max:255',
            'smoking_preference' => 'nullable|boolean',
            'pets_preference' => 'nullable|boolean',
            'notes' => 'nullable|string', // 'text' en BD, 'string' en validación es común
        ];

        // Si es Admin/SuperAdmin, pueden especificar el user_id.
        // Si es estudiante, el user_id es el propio id del usuario logueado.
        if ($user->isAdmin() || $user->isSuperAdmin()) {
            $rules['user_id'] = 'required|exists:users,id';
            $rules['status'] = 'required|string|in:' . implode(',', array_keys(Order::STATUSES));
        } else {
            // Si es estudiante, el estado inicial siempre es 'pendiente'
            $request->merge(['status' => Order::STATUS_PENDING]);
        }

        $validatedData = $request->validate($rules);

        // Asignar el user_id si es estudiante o si es admin/superadmin lo ha seleccionado
        $validatedData['user_id'] = ($user->isStudent()) ? $user->id : $validatedData['user_id'];
        $validatedData['order_date'] = now(); // La fecha del pedido es la actual
        $validatedData['order_number'] = 'ORD-' . Str::upper(Str::random(10)); // Genera un número de pedido único

        Order::create($validatedData);

        return redirect()->route('admin.orders.index')->with('success', 'Pedido creado exitosamente.');
    }

    /**
     * Display the specified order.
     * Muestra los detalles de un pedido específico.
     */
    public function show(Order $order)
    {
        $user = Auth::user();

        // Si es estudiante, verifica que el pedido le pertenezca
        if ($user->isStudent() && $order->user_id !== $user->id) {
            abort(403, 'Acceso no autorizado a este pedido.');
        }
        
        $statuses = Order::STATUSES; // Pasa los estados para mostrar el texto legible

        return view('admin.orders.show', compact('order', 'statuses'));
    }

    /**
     * Show the form for editing the specified order.
     * Muestra el formulario para editar un pedido (solo el estado).
     */
    public function edit(Order $order)
    {
        // Solo Admin y SuperAdmin pueden editar
        if (!Auth::user()->isAdmin() && !Auth::user()->isSuperAdmin()) {
            abort(403, 'Acceso no autorizado para editar pedidos.');
        }

        $statuses = Order::STATUSES; // Usar la constante STATUSES del modelo

        return view('admin.orders.edit', compact('order', 'statuses'));
    }

    /**
     * Update the specified order in storage.
     * Actualiza el pedido en la base de datos (solo el estado).
     */
    public function update(Request $request, Order $order)
    {
        // Solo Admin y SuperAdmin pueden actualizar
        if (!Auth::user()->isAdmin() && !Auth::user()->isSuperAdmin()) {
            abort(403, 'Acceso no autorizado para actualizar pedidos.');
        }

        $rules = [
            'status' => 'required|string|in:' . implode(',', array_keys(Order::STATUSES)),
            // Reglas de validación para nuevas columnas de Tipo de Curso
            'course_type' => 'nullable|string|max:255',
            'accommodation' => 'nullable|string|max:255',
            'weeks' => 'nullable|integer|min:0',
            'start_date' => 'nullable|date',
            'insurance' => 'nullable|boolean',
            'transport' => 'nullable|boolean',
            'parking_available' => 'nullable|boolean',
            'cancellation_policy' => 'nullable|boolean',
            'university_certificate_ects' => 'nullable|boolean',
            'destination' => 'nullable|string|max:255',
            'discount_code' => 'nullable|string|max:255',
            // Reglas de validación para nuevas columnas de Datos Personales
            'full_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone_number' => 'nullable|string|max:255',
            'passport_number' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:500',
            'country' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:255',
            'province' => 'nullable|string|max:255',
            'language' => 'nullable|string|max:255',
            'second_language' => 'nullable|string|max:255',
            'spanish_level' => 'nullable|string|max:255',
            'study_center_name' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|string|max:255',
            'smoking_preference' => 'nullable|boolean',
            'pets_preference' => 'nullable|boolean',
            'notes' => 'nullable|string',
        ];

        $validatedData = $request->validate($rules);

        $order->update($validatedData); // Actualizar todos los campos validados

        return redirect()->route('admin.orders.index')->with('success', 'Estado del pedido actualizado exitosamente.');
    }

    /**
     * Remove the specified order from storage.
     * Elimina un pedido de la base de datos (soft delete).
     */
    public function destroy(Order $order)
    {
        // Solo Admin y SuperAdmin pueden eliminar
        if (!Auth::user()->isAdmin() && !Auth::user()->isSuperAdmin()) {
            abort(403, 'Acceso no autorizado para eliminar pedidos.');
        }

        $order->delete(); // Realiza el soft delete

        return redirect()->route('admin.orders.index')->with('success', 'Pedido eliminado exitosamente.');
    }
}