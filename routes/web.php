<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ServicioController,ColorSchemeController, 
    DocumentoController,PageController,AuthController, CarpetaController,DarkModeController, 
    AreaController, PapeleraController, SoporteController,UserController};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');
Route::get('color-scheme-switcher/{color_scheme}', [ColorSchemeController::class, 'switch'])->name('color-scheme-switcher');

Route::controller(AuthController::class)->middleware('loggedin')->group(function() {
    Route::get('login', 'loginView')->name('login.index');
    Route::post('login', 'login')->name('login.check');
});
Route::get('/recordar-contraseña/superusuario', function () {
    return view('pages.recordar-contraseña');
})->name('password.remember');

Route::post('/actualizar-contraseña', [SoporteController::class, 'actualizarContraseña'])->name('password.update');

Route::middleware('auth')->group(function() {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::controller(PageController::class)->group(function() {
        Route::get('/', 'dashboardOverview1')->name('dashboard-overview-1');
        Route::get('dashboard-overview-2-page', 'dashboardOverview2')->name('dashboard-overview-2');
        Route::get('dashboard-overview-3-page', 'dashboardOverview3')->name('dashboard-overview-3');
        Route::get('dashboard-overview-4-page', 'dashboardOverview4')->name('dashboard-overview-4');
        Route::get('categories-page', 'categories')->name('categories');
        Route::get('add-product-page', 'addProduct')->name('add-product');
        Route::get('product-list-page', 'productList')->name('product-list');
        Route::get('product-grid-page', 'productGrid')->name('product-grid');
        Route::get('transaction-list-page', 'transactionList')->name('transaction-list');
        Route::get('transaction-detail-page', 'transactionDetail')->name('transaction-detail');
        Route::get('seller-list-page', 'sellerList')->name('seller-list');
        Route::get('seller-detail-page', 'sellerDetail')->name('seller-detail');
        Route::get('reviews-page', 'reviews')->name('reviews');
        Route::get('inbox-page', 'inbox')->name('inbox');
        Route::get('file-manager-page', 'fileManager')->name('file-manager');
        Route::get('point-of-sale-page', 'pointOfSale')->name('point-of-sale');
        Route::get('chat-page', 'chat')->name('chat');
        Route::get('post-page', 'post')->name('post');
        Route::get('calendar-page', 'calendar')->name('calendar');
        Route::get('trash-page', 'trash')->name('trash');
        Route::get('crud-data-list-page', 'crudDataList')->name('crud-data-list');
        Route::get('crud-form-page', 'crudForm')->name('crud-form');
        Route::get('users-layout-1-page', 'usersLayout1')->name('users-layout-1');
        Route::get('users-layout-2-page', 'usersLayout2')->name('users-layout-2');
        Route::get('users-layout-3-page', 'usersLayout3')->name('users-layout-3');
        Route::get('profile-overview-1-page', 'profileOverview1')->name('profile-overview-1');
        Route::get('profile-overview-2-page', 'profileOverview2')->name('profile-overview-2');
        Route::get('profile-overview-3-page', 'profileOverview3')->name('profile-overview-3');
        Route::get('wizard-layout-1-page', 'wizardLayout1')->name('wizard-layout-1');
        Route::get('wizard-layout-2-page', 'wizardLayout2')->name('wizard-layout-2');
        Route::get('wizard-layout-3-page', 'wizardLayout3')->name('wizard-layout-3');
        Route::get('blog-layout-1-page', 'blogLayout1')->name('blog-layout-1');
        Route::get('blog-layout-2-page', 'blogLayout2')->name('blog-layout-2');
        Route::get('blog-layout-3-page', 'blogLayout3')->name('blog-layout-3');
        Route::get('pricing-layout-1-page', 'pricingLayout1')->name('pricing-layout-1');
        Route::get('pricing-layout-2-page', 'pricingLayout2')->name('pricing-layout-2');
        Route::get('invoice-layout-1-page', 'invoiceLayout1')->name('invoice-layout-1');
        Route::get('invoice-layout-2-page', 'invoiceLayout2')->name('invoice-layout-2');
        Route::get('faq-layout-1-page', 'faqLayout1')->name('faq-layout-1');
        Route::get('faq-layout-2-page', 'faqLayout2')->name('faq-layout-2');
        Route::get('faq-layout-3-page', 'faqLayout3')->name('faq-layout-3');
        Route::get('login-page', 'login')->name('login');
        Route::get('register-page', 'register')->name('register');
        Route::get('error-page-page', 'errorPage')->name('error-page');
        Route::get('update-profile-page', 'updateProfile')->name('update-profile');
        Route::get('change-password-page', 'changePassword')->name('change-password');
        Route::get('regular-table-page', 'regularTable')->name('regular-table');
        Route::get('tabulator-page', 'tabulator')->name('tabulator');
        Route::get('modal-page', 'modal')->name('modal');
        Route::get('slide-over-page', 'slideOver')->name('slide-over');
        Route::get('notification-page', 'notification')->name('notification');
        Route::get('tab-page', 'tab')->name('tab');
        Route::get('accordion-page', 'accordion')->name('accordion');
        Route::get('button-page', 'button')->name('button');
        Route::get('alert-page', 'alert')->name('alert');
        Route::get('progress-bar-page', 'progressBar')->name('progress-bar');
        Route::get('tooltip-page', 'tooltip')->name('tooltip');
        Route::get('dropdown-page', 'dropdown')->name('dropdown');
        Route::get('typography-page', 'typography')->name('typography');
        Route::get('icon-page', 'icon')->name('icon');
        Route::get('loading-icon-page', 'loadingIcon')->name('loading-icon');
        Route::get('regular-form-page', 'regularForm')->name('regular-form');
        Route::get('datepicker-page', 'datepicker')->name('datepicker');
        Route::get('tom-select-page', 'tomSelect')->name('tom-select');
        Route::get('file-upload-page', 'fileUpload')->name('file-upload');
        Route::get('wysiwyg-editor-classic', 'wysiwygEditorClassic')->name('wysiwyg-editor-classic');
        Route::get('wysiwyg-editor-inline', 'wysiwygEditorInline')->name('wysiwyg-editor-inline');
        Route::get('wysiwyg-editor-balloon', 'wysiwygEditorBalloon')->name('wysiwyg-editor-balloon');
        Route::get('wysiwyg-editor-balloon-block', 'wysiwygEditorBalloonBlock')->name('wysiwyg-editor-balloon-block');
        Route::get('wysiwyg-editor-document', 'wysiwygEditorDocument')->name('wysiwyg-editor-document');
        Route::get('validation-page', 'validation')->name('validation');
        Route::get('chart-page', 'chart')->name('chart');
        Route::get('slider-page', 'slider')->name('slider');
        Route::get('image-zoom-page', 'imageZoom')->name('image-zoom');
    });
        
    // Ruta para mostrar la lista de servicios
    Route::get('/servicios', [ServicioController::class, 'index'])->name('servicios.index');

    // Ruta para mostrar el formulario de creación
    Route::get('/servicios/create', [ServicioController::class, 'create'])->name('servicios.create');

    // Ruta para almacenar un nuevo servicio
    Route::post('/servicios', [ServicioController::class, 'store'])->name('servicios.store');

    // Ruta para mostrar el formulario de edición
    Route::get('/servicios/{servicio}/edit', [ServicioController::class, 'edit'])->name('servicios.edit');

    //Ruta Services.show
    Route::get('/servicios/{servicio}', [ServicioController::class, 'show'])->name('servicios.show');

    // Ruta para actualizar un servicio existente
    Route::put('/servicios/{servicio}', [ServicioController::class, 'update'])->name('servicios.update');


    // Ruta para mostrar la lista de usuarios
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    // Ruta para mostrar el formulario de creación
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

    // Ruta para almacenar un nuevo usuario
    Route::post('/users', [UserController::class, 'store'])->name('users.store');

    // Ruta para mostrar el formulario de edición
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

    // Ruta para mostrar un usuario específico
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

    // Ruta para actualizar un usuario existente
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

    // Ruta para eliminar un usuario
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
 
    Route::get('/users/reset-password/{user}', [UserController::class, 'resetPassword'])->name('users.resetPassword');       

    // Ruta para eliminar un servicio
    Route::delete('/servicios/{servicio}', [ServicioController::class, 'destroy'])->name('servicios.destroy');
    Route::resource('documentos', DocumentoController::class);
    Route::get('documentos/{documento}/descargar', [DocumentoController::class, 'descargar'])->name('documentos.descargar');
    Route::resource('carpetas', CarpetaController::class);
    
    Route::resource('areas', AreaController::class);
    Route::resource('soporte', SoporteController::class);
    Route::resource('papeleras', PapeleraController::class)->only(['index', 'destroy']);
    Route::post('papeleras/restore/{id}', [PapeleraController::class, 'restore'])->name('papeleras.restore');
   
    
});
