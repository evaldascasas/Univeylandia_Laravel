<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/maps', function(){
//     return View::make("maps");
// });

Route::get('/',"HomeController@index")->name('home');
Route::get('/contacte','HomeController@contacte')->name('contacte');
Route::get('/noticies',"HomeController@noticies")->name('noticies');
Route::get('/noticies/{str_slug}',"HomeController@noticia")->name('noticia');
Route::get('/atraccions',"HomeController@atraccions")->name('atraccions');
Route::get('/atraccions/{atraccio}',"HomeController@llistarAtraccionsPublic")->name('atraccions_generades');
Route::get('/entrades',"HomeController@entrades")->name('entrades');
Route::get('/gestio',"HomeController@gestio")->name('gestio')->middleware(['is_admin','verified']);
Route::get('/perfil',"PerfilController@index")->name('perfil')->middleware(['auth','verified']);
Route::get('/perfil/download/{id}','PerfilController@imgDownload')->middleware(['auth','verified']);
Route::get('/incidencia',"HomeController@incidencia")->name('incidencia')->middleware(['auth','verified']);
//Route::get('/mes', "HomeController@mes")->name('mes');
//Route::get('/pizzeria',"HomeController@pizzeria")->name('pizzeria');
Route::get('/faq',"HomeController@faq")->name('faq');
//Route::get('/multimedia',"HomeController@multimedia")->name('multimedia');
Route::get('/promocions',"HomeController@promocions")->name('promocions');
Route::get('/promocions/{promocio}',"HomeController@promocio")->name('promocio');
//Route::get('/tendes/figures', array('as' => 'tenda_figures','uses' => 'HomeController@tenda_figures'));
// Route::get('/construccio','HomeController@construccio')->name('construccio');
Route::get('/qui-som', 'HomeController@equipdirectiu')->name('equipdirectiu');
Route::get('/visita-digital', 'HomeController@visitadigital')->name('visitadigital');
Route::get('/condicions-generals', 'HomeController@condicionsgenerals')->name('condicionsgenerals');
Route::get('/politica-privacitat', 'HomeController@politicaprivacitat')->name('politicaprivacitat');
Route::get('/politica-cookies', 'HomeController@politicacookies')->name('politicacookies');

/* RUTES GRUP 1 */
Auth::routes(['verify' => true]);

Route::patch('/notification-read/{id}', 'NotificationsController@destroy')->name('markasread')->middleware(['auth','verified']);

Route::post('/incidencia', 'IncidenciesController@store_incidencia')->name('incidencia')->middleware(['auth','verified']);

Route::get('gestio/incidencies/assign', 'IncidenciesController@assigned')->name('incidencies.assign')->middleware(['is_admin','verified']);

Route::get('gestio/incidencies/done', 'IncidenciesController@done')->name('incidencies.done')->middleware(['is_admin','verified']);

Route::resource('gestio/incidencies', 'IncidenciesController')->middleware(['is_admin','verified']);

Route::get('gestio/empleats/deactivated', 'EmpleatsController@trashed')->name('empleats.deactivated')->middleware(['is_admin','verified']);

Route::patch('gestio/empleats/deactivated/{user}/reactivate', 'EmpleatsController@reactivate')->name('empleats.reactivate')->middleware(['is_admin','verified']);

// Route::delete('gestio/empleats/deactivated/{user}', 'EmpleatsController@annihilate')->name('empleats.annihilate')->middleware(['auth','is_admin','verified']);

Route::get('gestio/empleats/admins', 'EmpleatsController@admins')->name('empleats.admins')->middleware(['is_admin','verified']);

Route::resource('gestio/empleats', 'EmpleatsController')->middleware(['is_admin','verified']);

Route::resource('gestio/zones', 'ZonesController')->middleware(['is_admin','verified']);

Route::resource('gestio/AssignEmpZona', 'AssignEmpZonaController')->middleware(['is_admin','verified']);

Route::resource('gestio/GestioServeis', 'GestioServeisController')->middleware(['is_admin','verified']);

Route::resource('gestio/serveis', 'ServeisController')->middleware(['is_admin','verified']);

Route::resource('/gestio/noticies', 'NoticiesController')->middleware(['is_admin','verified']);

Route::resource('/gestio/promocions', 'PromocionsController')->middleware(['is_admin','verified']);



Route::get('/votacions',"HomeController@votacions")->name('votacions');

Route::post('/votacions',"HomeController@votacio_accio")->name('votacio_accio');

Route::get('/tasques','HomeController@tasques')->name('tasques')->middleware(['is_worker','verified']);

Route::patch('/tasques/{id}', 'IncidenciesController@conclude')->name('incidencies.conclude')->middleware(['is_worker','verified']);

/* RUTES GRUP 2 */
Route::get('/gestio/atraccions/crearassignacio/{id}', 'AtraccionsController@crearAssignacioManteniment')->name('atraccions.crearassignaciomanteniment')->middleware(['is_admin','verified']);

Route::post('/gestio/atraccions/crearassignaciomanteniment/{id}/empleats', 'AtraccionsController@assignaEmpleat')->name('atraccions.assignaempleat')->middleware(['is_admin','verified']);


//Route::any('/gestio/atraccions/crearassignacioneteja/{id}', 'AtraccionsController@crearAssignacioNeteja')->name('atraccions.crearassignacioneteja')->middleware(['auth','is_admin','verified']);

//Route::post('/gestio/atraccions/crearassignacioneteja/{id}/empleats', 'AtraccionsController@assignaEmpleatNeteja')->name('atraccions.assignaEmpleatNeteja');


//Route::any('/gestio/atraccions/crearassignaciogeneral/{id}', 'AtraccionsController@crearAssignacioGeneral')->name('atraccions.crearassignaciogeneral')->middleware(['auth','is_admin','verified']);

//Route::post('/gestio/atraccions/crearassignaciogeneral/{id}/empleats', 'AtraccionsController@assignaEmpleatGeneral')->name('atraccions.assignaEmpleatGeneral');


Route::any('/gestio/atraccions/crearassignaciomanteniment/guardar/{id}', 'AtraccionsController@guardarAssignacio')->name('atraccions.guardarAssignacio')->middleware(['is_admin','verified']);


Route::any('/gestio/atraccions/assigna', 'AtraccionsController@assigna')->name('atraccions.assigna')->middleware(['is_admin','verified']);

Route::any('/gestio/atraccions/assignacions', 'AtraccionsController@assignacions')->name('atraccions.assignacions')->middleware(['is_admin','verified']);

Route::any('/gestio/atraccions/assignacions/editAssignacions/{id}', 'AtraccionsController@editAssignacions')->name('atraccions.assignacions.editAssignacions')->middleware(['is_admin','verified']);

Route::any('/gestio/atraccions/assignacions/updateAssignacions/{id}', 'AtraccionsController@updateAssignacions')->name('atraccions.assignacions.updateAssignacions')->middleware(['is_admin','verified']);

Route::any('/gestio/atraccions/assignacions/destroy/{id}', 'AtraccionsController@destroyAssignacions')->name('atraccions.assignacions.destroy')->middleware(['is_admin','verified']);

Route::resource('/gestio/atraccions', 'AtraccionsController')->middleware(['is_admin','verified']);

// Route::get('/gestio/atraccions/image', 'AtraccionsController@store')->name('image.upload')->middleware(['auth','is_admin','verified']);

// Route::post('/gestio/atraccions/image', 'AtraccionsController@store')->name('image.upload.post')->middleware(['auth','is_admin','verified']);
Route::get('/gestio/clients/index/csv', 'ClientsController@exportCSV')->name('clients.csv')->middleware(['is_admin','verified']);

Route::post('/gestio/clients/create/csv', 'ClientsController@importCSV')->name('clients.import')->middleware(['is_admin','verified']);

Route::get('gestio/clients/deactivated', 'ClientsController@trashed')->name('clients.deactivated')->middleware(['is_admin','verified']);

Route::patch('gestio/clients/deactivated/{user}/reactivate', 'ClientsController@reactivate')->name('clients.reactivate')->middleware(['is_admin','verified']);

// Route::delete('gestio/clients/deactivated/{user}', 'ClientsController@annihilate')->name('clients.annihilate')->middleware(['auth','is_admin','verified']);

Route::resource('/gestio/clients', 'ClientsController')->middleware(['auth','is_admin','verified']);

Route::get('gestio/downloads', 'DownloadsController@index')->name('downloads.index')->middleware(['is_admin','verified']);

/* Guardar PDF */
Route::get('/view/atraccions/index', 'AtraccionsController@guardarPDF')->middleware(['is_admin','verified']);

Route::get('/view/atraccions/assigna', 'AtraccionsController@guardarAssignacionsPDF')->middleware(['is_admin','verified']);

Route::get('/view/gestioProductes/index', 'gestioProductes@guardarProductePDF')->middleware(['is_admin','verified']);

Route::get('/view/clients/index', 'ClientsController@guardarClientPDF')->name('clients.pdf')->middleware(['is_admin','verified']);

Route::get('/view/incidencies/assign', 'IncidenciesController@assignadesGuardarPDF')->middleware(['is_admin','verified']);

/* Sala xat */
Route::get('/sala_chat',"HomeController@sala_chat")->name('sala_chat');




/* Gestio imatges */
Route::get("/gestio/productes/imatges", "ImageController@index")->name('imatges.index')->middleware(['is_admin','verified']);
Route::get("/gestio/productes/imatges/upload", "ImageController@save")->name('imatges.upload')->middleware(['is_admin','verified']);
Route::post("/gestio/productes/imatges/upload", "ImageController@upload")->middleware(['is_admin','verified']);

/* Entrades */
Route::post('/entrades', array('as' => 'entrades','uses' => 'HomeController@parc_afegir_cistella'));
Route::resource('/gestio/productes', 'gestioProductes')->middleware(['is_admin','verified']);
Route::resource('/gestio/ventes', 'VentesController')->middleware(['is_admin','verified']);
Route::post('/gestio/ventes', 'VentesController@export_pdf')->middleware(['is_admin','verified']);

Route::get('/cistella','HomeController@cistella')->name('cistella')->middleware(['auth','verified']);
Route::delete('/cistella', 'HomeController@cistella_delete')->name('cistella')->middleware(['auth','verified']);
Route::post('/cistella/update',"HomeController@modificar_element_cistella_ajax")->name('cistellaUpdate')->middleware(['auth','verified']);
Route::post('/cistella/updateV',"HomeController@modificar_element_cistella_ajaxV")->name('cistellaUpdateV')->middleware(['auth','verified']);
Route::get('/compra', 'HomeController@compra')->name('compra')->middleware(['auth','verified']);
Route::get('/compra_finalitzada', 'HomeController@compra_finalitzada')->name('compra_finalitzada')->middleware(['auth','verified']);

/* Tenda */
Route::get('/botiga','TendaController@indexTenda')->name('tenda');
Route::get('/botiga/atraccions', 'TendaController@indexAtraccions')->name('tendaFotos')->middleware(['auth','verified']);
Route::get('/botiga/atraccions/{id}/fotos','TendaController@imprimirFotos')->name('atraccions.fotos')->middleware(['auth','verified']);
Route::get('/comprarFotos/{id}','TendaController@afegir_Foto')->name('fotos.comprar')->middleware(['auth','verified']);

/* VALIDACIO ENTRADES */
Route::get('/validacio',"gestioProductes@validacio")->name('validacio')->middleware(['is_worker','verified']); //
Route::post('/validacio', 'gestioProductes@validar')->name('validacio_accio')->middleware(['is_worker','verified']); //

/* PAYPAL */
Route::post('paypal', 'PaymentController@payWithpaypal');
Route::get('status', 'PaymentController@getPaymentStatus');

/* GRAFIQUES */
Route::get('/gestio/estadistiques/registres', 'GrafiquesController@graficaregistres')->name('graficaregistres')->middleware(['is_admin','verified']);
Route::get('/gestio/estadistiques/registres/{anio}/{mes}', 'GrafiquesController@registros_mes')->middleware(['is_admin','verified']);
Route::get('/gestio/estadistiques/ventes', 'GrafiquesController@graficavendes')->name('graficavendes')->middleware(['is_admin','verified']);
Route::get('/gestio/estadistiques/ventes/{anio}/{mes}', 'GrafiquesController@vendes_mes')->middleware(['is_admin','verified']);
Route::get('/gestio/estadistiques/incidencies', 'GrafiquesController@grafica_incidencies')->name('graficaincidencies')->middleware(['is_admin','verified']);