<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

// --- Controlladores de la Plantilla y Páginas ---
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\layouts\WithoutMenu;
use App\Http\Controllers\layouts\WithoutNavbar;
use App\Http\Controllers\layouts\Fluid;
use App\Http\Controllers\layouts\Container;
use App\Http\Controllers\layouts\Blank;
use App\Http\Controllers\pages\AccountSettingsAccount;
use App\Http\Controllers\pages\AccountSettingsNotifications;
use App\Http\Controllers\pages\AccountSettingsConnections;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\pages\MiscUnderMaintenance;

// --- Controladores de Autenticación ---
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\authentications\ForgotPasswordBasic;

// --- Controlladores de la Plantilla (UI, Forms, etc.) ---
use App\Http\Controllers\cards\CardBasic;
use App\Http\Controllers\user_interface\Accordion;
use App\Http\Controllers\user_interface\Alerts;
use App\Http\Controllers\user_interface\Badges;
use App\Http\Controllers\user_interface\Buttons;
use App\Http\Controllers\user_interface\Carousel;
use App\Http\Controllers\user_interface\Collapse;
use App\Http\Controllers\user_interface\Dropdowns;
use App\Http\Controllers\user_interface\Footer;
use App\Http\Controllers\user_interface\ListGroups;
use App\Http\Controllers\user_interface\Modals;
use App\Http\Controllers\user_interface\Navbar;
use App\Http\Controllers\user_interface\Offcanvas;
use App\Http\Controllers\user_interface\PaginationBreadcrumbs;
use App\Http\Controllers\user_interface\Progress;
use App\Http\Controllers\user_interface\Spinners;
use App\Http\Controllers\user_interface\TabsPills;
use App\Http\Controllers\user_interface\Toasts;
use App\Http\Controllers\user_interface\TooltipsPopovers;
use App\Http\Controllers\user_interface\Typography;
use App\Http\Controllers\extended_ui\PerfectScrollbar;
use App\Http\Controllers\extended_ui\TextDivider;
use App\Http\Controllers\icons\RiIcons;
use App\Http\Controllers\form_elements\BasicInput;
use App\Http\Controllers\form_elements\InputGroups;
use App\Http\Controllers\form_layouts\VerticalForm;
use App\Http\Controllers\form_layouts\HorizontalForm;
use App\Http\Controllers\tables\Basic as TablesBasic;

// --- Controladores de la Aplicación ---
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\AccomodationController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\GrantController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\Admin\EmailTemplateController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\GraduateController;
use App\Http\Controllers\Admin\TestController as AdminTestController;
// Importamos el nuevo controlador de Pedidos
use App\Http\Controllers\Admin\OrderController; 
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Admin\StudentEmailController;
use App\Http\Controllers\Admin\ScholarshipEmailController;
use App\Http\Controllers\AccountingEntryController;
use App\Http\Controllers\PaymentController;

// --- Controladores para Dashboards de Roles ---
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\SuperAdmin\DashboardController as SuperAdminDashboardController;
use App\Http\Controllers\Student\TestController as StudentTestController;


/*
|--------------------------------------------------------------------------
| Rutas Públicas y de Autenticación
|--------------------------------------------------------------------------
| Estas rutas son accesibles para cualquier usuario, esté o no autenticado.
| Incluyen las páginas de autenticación y rutas de acceso público.
*/

// Rutas de autenticación
Route::get('/login', [LoginBasic::class, 'index'])->name('login');
Route::post('/login', [LoginBasic::class, 'authenticate']);
Route::get('/forgot-password', [ForgotPasswordBasic::class, 'index'])->name('password.request');

// Ruta pública para enviar solicitudes de información
Route::post('/submit-inquiry', [InquiryController::class, 'store'])->name('inquiries.store.frontend');

// Rutas públicas de la plantilla (páginas de error, etc.)
Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
Route::get('/pages/misc-under-maintenance', [MiscUnderMaintenance::class, 'index'])->name('pages-misc-under-maintenance');
Route::get('/error', [MiscError::class, 'index'])->name('error-page');
Route::get('/under-maintenance', [MiscUnderMaintenance::class, 'index'])->name('maintenance-page');

// Payment routes (public access needed for RedSys callbacks)
Route::get('/payment/{order}/initiate', [PaymentController::class, 'initiatePayment'])->name('payment.initiate');
Route::post('/payment/response', [PaymentController::class, 'processPaymentResponse'])->name('payment.response');
Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/payment/error', [PaymentController::class, 'error'])->name('payment.error');

/*
|--------------------------------------------------------------------------
| Sistema Central de Ruteo y Paneles por Rol
|--------------------------------------------------------------------------
| Rutas protegidas que requieren autenticación y permisos de rol específicos.
*/

// La ruta raíz ahora redirige al dashboard central para usuarios autenticados,
// o a la vista de login para invitados.
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('analytics');
    }
    return redirect()->route('login');
});

// Esta ruta actúa como un despachador central para usuarios logueados.
// Redirige al usuario a su dashboard principal según su rol.
Route::middleware(['auth'])->get('/dashboard', function () {
    $user = Auth::user();
    $redirectPath = match($user->role) {
        User::ROLE_SUPERADMIN => route('analytics'),
        User::ROLE_ADMIN => route('analytics'),
        User::ROLE_STUDENT => route('student.dashboard'),
        default => '/', // Fallback si el rol no coincide con ninguno (opcional: a login o una página de error)
    };
    return redirect($redirectPath);
})->name('dashboard');

// --- Grupo de Rutas para Estudiantes ---
// Accesible por roles: STUDENT, ADMIN, SUPERADMIN
Route::middleware(['auth', 'student'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');

    // Rutas para la gestión de tests por parte del Estudiante
    Route::get('/tests', [StudentTestController::class, 'index'])->name('tests.index');
    Route::get('/tests/{test}', [StudentTestController::class, 'show'])->name('tests.show');
    Route::post('/tests/{test}', [StudentTestController::class, 'store'])->name('tests.store');
    Route::get('/tests/{test}/result', [StudentTestController::class, 'result'])->name('tests.result');

    // Rutas para la gestión de inquiries (solicitudes/consultas) por parte del Estudiante
    // El estudiante puede crear y ver sus propias inquiries.
    Route::resource('inquiries', InquiryController::class)->only(['index', 'show', 'create', 'store']);
    
    // Rutas para la gestión de ORDERS (pedidos) por parte del Estudiante
    // El estudiante solo puede crear y ver sus propios pedidos.
    Route::resource('orders', OrderController::class)->only(['index', 'show', 'create', 'store']);

    // Rutas para el sistema de mensajería (conversaciones) del estudiante
    Route::prefix('conversations')->name('conversations.')->group(function () {
        Route::get('/', [ConversationController::class, 'index'])->name('index');
        Route::get('/create', [ConversationController::class, 'create'])->name('create');
        Route::post('/', [ConversationController::class, 'store'])->name('store');
        Route::get('/{conversation}', [ConversationController::class, 'show'])->name('show');
        Route::post('/{conversation}/messages', [MessageController::class, 'store'])->name('messages.store');
    });

    // Rutas para la lista de mensajes del estudiante (para el menú)
    Route::get('/messages', [ConversationController::class, 'index'])->name('messages.index');
});

// --- Grupo de Rutas para Administradores ---
// Accesible por roles: ADMIN, SUPERADMIN
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Gestión de la aplicación (CRUDs)
    Route::resource('students', StudentController::class);
    Route::resource('accomodations', AccomodationController::class);
    Route::resource('scholarships', ScholarshipController::class);
    Route::resource('inquiries', InquiryController::class)->except(['create', 'store']);
    Route::resource('grants', GrantController::class)->only(['index', 'show', 'destroy']);
    Route::resource('rates', RateController::class);
    Route::resource('graduates', GraduateController::class);
    Route::delete('graduates/{graduate}/images/{image}', [GraduateController::class, 'destroyImage'])->name('graduates.images.destroy');
    Route::resource('email-templates', EmailTemplateController::class);
    Route::get('/email-templates/{templateIdentifier}/{inquiryId}', [EmailTemplateController::class, 'getTemplateContent'])->name('email-templates.get-content');
    Route::resource('tests', AdminTestController::class);
    Route::resource('users', UserController::class)->except(['create', 'store']); // Acceso a usuarios para Admin y SuperAdmin (sin creación)

    // ************ NUEVO: Rutas para la gestión de ORDERS (pedidos) ************
    // Accesible para Admin y SuperAdmin (CRUD completo)
    Route::resource('orders', OrderController::class);
    // **************************************************************************

    // Rutas para el sistema de mensajería (conversaciones) del administrador
    Route::prefix('conversations')->name('conversations.')->group(function () {
        Route::get('/', [ConversationController::class, 'adminIndex'])->name('index'); // Usar un método diferente para el listado de admin
        Route::get('/{conversation}', [ConversationController::class, 'adminShow'])->name('show'); // Usar un método diferente para la vista de chat de admin
        Route::post('/{conversation}/messages', [MessageController::class, 'store'])->name('messages.store');
        Route::post('/{conversation}/status', [ConversationController::class, 'updateStatus'])->name('updateStatus');
        Route::post('/{conversation}/assign', [ConversationController::class, 'assignAdmin'])->name('assignAdmin');
    });

    // Rutas para la lista de mensajes del administrador (para el menú)
    Route::get('/messages', [ConversationController::class, 'adminIndex'])->name('messages.index');

    // Rutas para enviar emails a estudiantes
    Route::post('/students/{student}/send-email/{identifier}', [StudentEmailController::class, 'sendEmail'])->name('students.send-email');
    Route::get('/students/{student}/email-status/{identifier}', [StudentEmailController::class, 'checkEmailStatus'])->name('students.email-status');
    Route::get('/students/{student}/get-email-template/{identifier}', [StudentEmailController::class, 'getTemplateContent'])->name('students.get-email-template');
    
    // Rutas para gestión contable de estudiantes
    Route::post('/students/{student}/accounting-entries', [StudentController::class, 'storeAccountingEntry'])->name('students.accounting-entries.store');
    Route::post('/students/{student}/generate-payment-order', [StudentController::class, 'generatePaymentOrder'])->name('students.generate-payment-order');
    Route::delete('/accounting-entries/{accountingEntry}', [AccountingEntryController::class, 'destroy'])->name('accounting-entries.destroy');

    // Rutas para enviar emails a contactos de becas
    Route::post('/scholarships/{scholarship}/send-email/{identifier}', [ScholarshipEmailController::class, 'sendEmail'])->name('scholarships.send-email');
    Route::get('/scholarships/{scholarship}/email-status/{identifier}', [ScholarshipEmailController::class, 'checkEmailStatus'])->name('scholarships.email-status');
    Route::get('/scholarships/{scholarship}/get-email-template/{identifier}', [ScholarshipEmailController::class, 'getTemplateContent'])->name('scholarships.get-email-template');
    
    // Rutas para envío de plantillas genéricas (consultas, concesiones, etc.)
    Route::post('/send-template-email', [EmailTemplateController::class, 'sendTemplateEmail'])->name('send-template-email');
    Route::get('/template-email-status/{templateId}/{entityId}', [EmailTemplateController::class, 'checkTemplateEmailStatus'])->name('template-email-status');

    // Vistas estáticas del admin
    Route::view('/plantillasreg', 'admin.plantillasreg')->name('plantillasreg');
    Route::view('/alojamientos', 'admin.accomodations.accomodations')->name('alojamientos');
    Route::view('/becas', 'admin.scholarships.scholarships')->name('becas');
});

// --- Grupo de Rutas para SuperAdmin ---
// Accesible por roles: SUPERADMIN
Route::middleware(['auth', 'superadmin'])->prefix('superadmin')->name('superadmin.')->group(function () {
    Route::get('/dashboard', [SuperAdminDashboardController::class, 'index'])->name('dashboard');
    // Este grupo ahora contendrá rutas EXCLUSIVAS de SuperAdmin si las hubiera.
    // Como 'users' y 'orders' se movieron al grupo 'admin' para permitir acceso compartido,
    // este grupo puede quedar más vacío o para otras funcionalidades de nivel superior.
});

/*
|--------------------------------------------------------------------------
| Rutas Generales para Usuarios Autenticados (Perfil y Componentes de Plantilla)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    // Dashboard Analytics (accesible para todos los usuarios autenticados)
    Route::get('/analytics', [Analytics::class, 'index'])->name('analytics');

    // Perfil del usuario
    Route::get('/pages/account-settings-account', [AccountSettingsAccount::class, 'index'])->name('pages-account-settings-account');
    Route::post('/pages/account-settings-account', [AccountSettingsAccount::class, 'update'])->name('pages-account-settings-account.update');
    Route::get('/pages/account-settings-notifications', [AccountSettingsNotifications::class, 'index'])->name('pages-account-settings-notifications');
    Route::get('/pages/account-settings-connections', [AccountSettingsConnections::class, 'index'])->name('pages-account-settings-connections');
    Route::get('/account-settings', [AccountSettingsAccount::class, 'index'])->name('account-settings');

    // Rutas de la plantilla (layouts, UI, Forms, Tables, etc.)
    Route::get('/layouts/without-menu', [WithoutMenu::class, 'index'])->name('layouts-without-menu');
    Route::get('/layouts/without-navbar', [WithoutNavbar::class, 'index'])->name('layouts-without-navbar');
    Route::get('/layouts/fluid', [Fluid::class, 'index'])->name('layouts-fluid');
    Route::get('/layouts/container', [Container::class, 'index'])->name('layouts-container');
    Route::get('/layouts/blank', [Blank::class, 'index'])->name('layouts-blank');

    Route::get('/cards/basic', [CardBasic::class, 'index'])->name('cards-basic');
    Route::get('/ui/accordion', [Accordion::class, 'index'])->name('ui-accordion');
    Route::get('/ui/alerts', [Alerts::class, 'index'])->name('ui-alerts');
    Route::get('/ui/badges', [Badges::class, 'index'])->name('ui-badges');
    Route::get('/ui/buttons', [Buttons::class, 'index'])->name('ui-buttons');
    Route::get('/ui/carousel', [Carousel::class, 'index'])->name('ui-carousel');
    Route::get('/ui/collapse', [Collapse::class, 'index'])->name('ui-collapse');
    Route::get('/ui/dropdowns', [Dropdowns::class, 'index'])->name('ui-dropdowns');
    Route::get('/ui/footer', [Footer::class, 'index'])->name('ui-footer');
    Route::get('/ui/list-groups', [ListGroups::class, 'index'])->name('ui-list-groups');
    Route::get('/ui/modals', [Modals::class, 'index'])->name('ui-modals');
    Route::get('/ui/navbar', [Navbar::class, 'index'])->name('ui-navbar');
    Route::get('/ui/offcanvas', [Offcanvas::class, 'index'])->name('ui-offcanvas');
    Route::get('/ui/pagination-breadcrumbs', [PaginationBreadcrumbs::class, 'index'])->name('ui-pagination-breadcrumbs');
    Route::get('/ui/progress', [Progress::class, 'index'])->name('ui-progress');
    Route::get('/ui/spinners', [Spinners::class, 'index'])->name('ui-spinners');
    Route::get('/ui/tabs-pills', [TabsPills::class, 'index'])->name('ui-tabs-pills');
    Route::get('/ui/toasts', [Toasts::class, 'index'])->name('ui-toasts');
    Route::get('/ui/tooltips-popovers', [TooltipsPopovers::class, 'index'])->name('ui-tooltips-popovers');
    Route::get('/ui/typography', [Typography::class, 'index'])->name('ui-typography');
    Route::get('/extended/ui-perfect-scrollbar', [PerfectScrollbar::class, 'index'])->name('extended-ui-perfect-scrollbar');
    Route::get('/extended/ui-text-divider', [TextDivider::class, 'index'])->name('extended-ui-text-divider');
    Route::get('/icons/icons-ri', [RiIcons::class, 'index'])->name('icons-ri');
    Route::get('/forms/basic-inputs', [BasicInput::class, 'index'])->name('forms-basic-inputs');
    Route::get('/forms/input-groups', [InputGroups::class, 'index'])->name('forms-input-groups');
    Route::get('/form/layouts-vertical', [VerticalForm::class, 'index'])->name('form-layouts-vertical');
    Route::get('/form/layouts-horizontal', [HorizontalForm::class, 'index'])->name('form-layouts-horizontal');
    Route::get('/tables/basic', [TablesBasic::class, 'index'])->name('tables-basic');

    // Ruta para descarga segura de adjuntos de mensajes
    Route::get('/messages/{message}/download', [MessageController::class, 'downloadAttachment'])->name('messages.downloadAttachment');

    // Ruta de Logout (accesible para cualquier usuario autenticado)
    Route::post('/logout', function (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    })->name('logout');
});
