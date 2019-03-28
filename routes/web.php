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
 Route::get('/',"HomeController@index")->name('home');
 Route::get('/contacte','HomeController@contacte')->name('contacte');
 Route::get('/noticies',"HomeController@noticies")->name('noticies');
 Route::get('/noticies/n',"HomeController@noticia")->name('noticia');
 Route::get('/atraccions',"HomeController@atraccions")->name('atraccions');
 Route::get('/atraccions/{id}',"HomeController@llistarAtraccionsPublic")->name('atraccions_generades');
 Route::get('/entrades',"HomeController@entrades")->name('entrades');
 Route::get('/gestio',"HomeController@gestio")->name('gestio')->middleware(['auth','is_admin','verified']);
 Route::get('/perfil',"HomeController@perfil")->name('perfil')->middleware(['auth','verified']);
 Route::get('/incidencia',"HomeController@incidencia")->name('incidencia')->middleware(['auth','verified']);
 //Route::get('/mes', "HomeController@mes")->name('mes');
 //Route::get('/pizzeria',"HomeController@pizzeria")->name('pizzeria');
 Route::get('/faq',"HomeController@faq")->name('faq');
 //Route::get('/multimedia',"HomeController@multimedia")->name('multimedia');
 Route::get('/promocions',"HomeController@promocions")->name('promocions');
 Route::get('/promocions/n',"HomeController@promocio")->name('promocio');
 //Route::get('/tendes/figures', array('as' => 'tenda_figures','uses' => 'HomeController@tenda_figures'));
 Route::get('/construccio','HomeController@construccio')->name('construccio');

 /* RUTES GRUP 1 */
 Auth::routes(['verify' => true]);
 
 Route::patch('/notification-read/{id}', 'NotificationsController@destroy')->name('markasread')->middleware(['auth','verified']);

 Route::post('/incidencia', 'IncidenciesController@store_incidencia')->name('incidencia')->middleware(['auth','verified']);

 Route::get('gestio/incidencies/assign', 'IncidenciesController@assigned')->name('incidencies.assign')->middleware(['auth','is_admin','verified']);

 Route::get('gestio/incidencies/done', 'IncidenciesController@done')->name('incidencies.done')->middleware(['auth','is_admin','verified']);

 Route::resource('gestio/incidencies', 'IncidenciesController')->middleware(['auth','is_admin','verified']);

 Route::resource('gestio/empleats', 'EmpleatsController')->middleware(['auth','is_admin','verified']);

 Route::resource('gestio/zones', 'ZonesController')->middleware(['auth','is_admin','verified']);

 Route::resource('gestio/AssignEmpZona', 'AssignEmpZonaController')->middleware(['auth','is_admin','verified']);
 
 Route::resource('gestio/GestioServeis', 'GestioServeisController')->middleware(['auth','is_admin','verified']);

 Route::resource('gestio/serveis', 'ServeisController')->middleware(['auth','is_admin','verified']);

 Route::resource('/gestio/noticies', 'NoticiesController')->middleware(['auth','is_admin','verified']);

 Route::resource('/gestio/promocions', 'PromocionsController')->middleware(['auth','is_admin','verified']);

 Route::get('/view/incidencies/assign', 'IncidenciesController@assignadesGuardarPDF')->middleware(['auth','is_admin','verified']);

 Route::get('/votacions',"HomeController@votacions")->name('votacions');

 Route::post('/votacions',"HomeController@votacio_accio")->name('votacio_accio');

 Route::get('/tasques','HomeController@tasques')->name('tasques')->middleware(['auth','is_worker','verified']);

 Route::patch('/tasques/{id}', 'IncidenciesController@conclude')->name('incidencies.conclude')->middleware(['auth','is_worker','verified']);
 
 /* RUTES GRUP 2 */
 Route::any('/gestio/atraccions/crearassignaciomantenimentdate/{id}','AtraccionsController@crearAssignacioMantenimentDate')->name('atraccions.crearassignaciomantenimentdate')->middleware(['auth','is_admin','verified']);
 
 Route::any('/gestio/atraccions/crearassignacionetejadate/{id}','AtraccionsController@crearAssignacioNetejaDate')->name('atraccions.crearassignacionetejadate')->middleware(['auth','is_admin','verified']);

 Route::any('/gestio/atraccions/crearassignaciogeneraldate/{id}','AtraccionsController@crearAssignacioGeneralDate')->name('atraccions.crearassignaciogeneraldate')->middleware(['auth','is_admin','verified']);
 
 Route::any('/gestio/atraccions/crearassignaciomanteniment/{id}', 'AtraccionsController@crearAssignacioManteniment')->name('atraccions.crearassignaciomanteniment')->middleware(['auth','is_admin','verified']);
 
 Route::any('/gestio/atraccions/crearassignacioneteja/{id}', 'AtraccionsController@crearAssignacioNeteja')->name('atraccions.crearassignacioneteja')->middleware(['auth','is_admin','verified']);
 
 Route::any('/gestio/atraccions/crearassignaciogeneral/{id}', 'AtraccionsController@crearAssignacioGeneral')->name('atraccions.crearassignaciogeneral')->middleware(['auth','is_admin','verified']);
 
 Route::any('/gestio/atraccions/crearassignaciomanteniment/guardar/{id}', 'AtraccionsController@guardarAssignacio')->name('atraccions.guardarAssignacio')->middleware(['auth','is_admin','verified']);

 Route::any('/gestio/atraccions/assigna', 'AtraccionsController@assigna')->name('atraccions.assigna')->middleware(['auth','is_admin','verified']);
 
 Route::any('/gestio/atraccions/assignacions', 'AtraccionsController@assignacions')->name('atraccions.assignacions')->middleware(['auth','is_admin','verified']);
 
 Route::any('/gestio/atraccions/assignacions/editAssignacions/{id}', 'AtraccionsController@editAssignacions')->name('atraccions.assignacions.editAssignacions')->middleware(['auth','is_admin','verified']);
 
 Route::any('/gestio/atraccions/assignacions/updateAssignacions/{id}', 'AtraccionsController@updateAssignacions')->name('atraccions.assignacions.updateAssignacions')->middleware(['auth','is_admin','verified']);
 
 Route::any('/gestio/atraccions/assignacions/destroy/{id}', 'AtraccionsController@destroyAssignacions')->name('atraccions.assignacions.destroy')->middleware(['auth','is_admin','verified']);
 
 Route::resource('/gestio/atraccions', 'AtraccionsController')->middleware(['auth','is_admin','verified']);
 
//  Route::get('/gestio/atraccions/image', 'AtraccionsController@store')->name('image.upload')->middleware(['auth','is_admin','verified']);
 
//  Route::post('/gestio/atraccions/image', 'AtraccionsController@store')->name('image.upload.post')->middleware(['auth','is_admin','verified']);
 
 Route::resource('/gestio/clients', 'ClientsController')->middleware(['auth','is_admin','verified']);
 
 /* Guardar PDF */
 Route::get('/view/atraccions/index', 'AtraccionsController@guardarPDF')->middleware(['auth','is_admin','verified']);

 Route::get('/view/atraccions/assigna', 'AtraccionsController@guardarAssignacionsPDF')->middleware(['auth','is_admin','verified']);

 Route::get('/view/gestioProductes/index', 'gestioProductes@guardarProductePDF')->middleware(['auth','is_admin','verified']);




 
 /* Gestio imatges */
 Route::get("/gestio/imatges", "ImageController@index")->name('imatges.index')->middleware(['auth','is_admin','verified']);
 Route::get("/gestio/imatges/upload", "ImageController@save")->name('imatges.upload')->middleware(['auth','is_admin','verified']);
 Route::post("/gestio/imatges/upload", "ImageController@upload")->middleware(['auth','is_admin','verified']);
 
 /* Entrades */
 Route::post('/entrades', array('as' => 'entrades','uses' => 'HomeController@parc_afegir_cistella'));
 Route::resource('/gestio/productes', 'gestioProductes')->middleware(['auth','is_admin','verified']);
 Route::resource('/gestio/ventes', 'VentesController')->middleware(['auth','is_admin','verified']);
 
 Route::get('/cistella','HomeController@cistella')->name('cistella')->middleware(['auth','verified']);
 Route::delete('/cistella', 'HomeController@cistella_delete')->name('cistella')->middleware(['auth','verified']);
 Route::get('/compra', 'HomeController@compra')->name('compra')->middleware(['auth','verified']);
 Route::get('/compra_finalitzada', 'HomeController@compra_finalitzada')->name('compra_finalitzada')->middleware(['auth','verified']);
 
 /* Tenda */
 Route::get('/tenda','TendaController@indexTenda')->name('tenda');
 Route::get('/tenda/atraccions', 'TendaController@indexAtraccions')->name('tendaFotos');
 Route::get('/imprimirFotos/{id}','TendaController@imprimirFotos');
 Route::get('/comprarFotos/{id}','TendaController@afegir_Foto');