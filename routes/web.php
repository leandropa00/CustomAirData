<?php
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

// Map dashboard
Route::get('/mapa', 'MapaController@index')->name('mapa');
Route::get('graficar/{id}/{val}/{conv}', 'MapaController@grafica')->name('graficar');
Route::get('/map-chart/{id}', 'MapaController@descripcionMapa')->name('mapChart');

// Panel de análisis
Route::get('/dashboard', 'PanelAnalisisController@index')->name('dashboard');

//Consulta de datos
Route::get('/consulta-de-datos', 'ConsultaDatosController@index')->name('consulta-de-datos');
Route::get('/submit-filter', 'ConsultaDatosController@cargaFiltro')->name('submit_filter');
Route::get('/cargar-tabla', 'ConsultaDatosController@cargarTabla')->name('cargarTabla');
Route::get('/cargar-contaminantes/{punto}', 'ConsultaDatosController@cargarContaminantes')->name('cargarContaminantes');

// Carga manual
Route::get('/manual-upload', 'DatosController@manual_upload')->name('manual-upload');
Route::post('file-upload', 'DatosController@fileUploadPost')->name('file.upload.post');

//Empresas
Route::get('empresas/delete/{id}', 'EmpresasController@destroy')->name('empresas.destroy');
Route::resource('empresas', 'EmpresasController', ['except' => ['destroy']]);

// Usuarios
Route::get('users/delete/{id}', 'UsersController@destroy')->name('users.destroy');
Route::put('users/cambiar-permiso/{user}', 'UsersController@permisosSms')->name('users.permisos-sms');
Route::resource('users', 'UsersController', ['except' => ['destroy']]);

// Estaciones
Route::get('estaciones/delete/{id}', 'EstacionesController@destroy')->name('estaciones.destroy');
Route::resource('estaciones', 'EstacionesController', ['except' => ['destroy']]);

// Campañas
Route::get('campanas/delete/{id}', 'CampanasController@destroy')->name('campanas.destroy');
Route::resource('campanas', 'CampanasController', ['except' => ['destroy']]);

// Puntos de monitoreo
Route::get('puntos-monitoreo/{id}', 'PuntosMonitoreoController@index')->name('puntos-monitoreo.index');
Route::get('puntos-monitoreo/{id}/show', 'PuntosMonitoreoController@show')->name('puntos-monitoreo.show');
Route::get('puntos-monitoreo/create/{id}', 'PuntosMonitoreoController@create')->name('puntos-monitoreo.create');
Route::post('puntos-monitoreo/store/{id}', 'PuntosMonitoreoController@store')->name('puntos-monitoreo.store');
Route::get('puntos-monitoreo/delete/{id}', 'PuntosMonitoreoController@destroy')->name('puntos-monitoreo.destroy');
Route::get('puntos-monitoreo/imprimir-detalles/{punto}', 'PuntosMonitoreoController@imprimir')->name('puntos-monitoreo.imprimir');
Route::get('puntos-monitoreo/contaminantes/{punto}', 'PuntosMonitoreoController@contaminantes')->name('puntos-monitoreo.contaminantes');
Route::post('puntos-monitoreo/{punto}', 'PuntosMonitoreoController@rangos')->name('puntos-monitoreo.guardar_rangos');
Route::resource('puntos-monitoreo', 'PuntosMonitoreoController', ['except' => ['index', 'create', 'store', 'show', 'destroy']]); 

// Configuración de cuenta
Route::put('cuenta/foto-empresa', 'ConfiguracionCuentaController@fotoEmpresa')->name('cuenta.foto-empresa');
Route::get('cuenta', 'ConfiguracionCuentaController@edit')->name('cuenta.edit');
Route::post('cuenta', 'ConfiguracionCuentaController@update')->name('cuenta.update');

// Notificaciones
Route::get('notificacion/{punto}/{valor}/{limite}/{tipo}/{contaminante}', 'NotificacionesController');
Route::get('marcar-como-leidas', function(){
    Auth::user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('marcarComoLeidas');