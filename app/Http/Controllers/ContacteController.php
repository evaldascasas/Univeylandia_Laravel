<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacte;
use App\User;
use App\Linia_contacte;

use App\Notifications\TicketAssigned;
use App\Notifications\TicketClientCreate;
use Notification;

use Auth;

class ContacteController extends Controller
{

  /**
   * Acció que s'encarrega' d' imprimir els tiquets que no estiguen assignats a cap empleat
   *
   */
  public function index()
  {

    $ticket = Contacte::where('id_estat', 1)
    ->join('estat_incidencies','estat_incidencies.id','contacte.id_estat')
    ->get([
      'contacte.id as id',
      'contacte.nom as nom',
      'contacte.email as email',
      'contacte.tipus_pregunta as pregunta',
      'contacte.missatge as missatge',
      'estat_incidencies.nom_estat as nom_estat'
    ]);

    return view('gestio/ticket/index', compact('ticket'));

  }

/**
 * Acció que s'encarrega de guardar els tiquets a la base de dades
 * @param  Request $request
 *
 */
  public function store(Request $request)
  {
      $numTiquet = rand(11111,99999);

      //$usuari = Auth::user();

      //$user = User::find($usuari->id);

      $contacte = new Contacte ([
          'nom' => $request->nom,
          'email' => $request->email,
          'tipus_pregunta' => $request->tipus_pregunta,
          'missatge' => $request->consulta,
          'id_estat' => 1,
          'id_tiquet' =>$numTiquet

      ]);

      $contacte->save();

      $user = Notification::route('mail', $request->email)
        ->notify(new TicketClientCreate($contacte));

      //return response()->json(['success'=>'Data is successfully added']);

      //return redirect('/contacte')->with('success', 'Contacte enviat correctament');


  }

/**
 * Acció que s'encarrega de llistar els empleats, per a assignar-los al tiquet
 * @param  int $id
 */
  public function llistarEmpleats($id)
  {
    $user = User::where('id_rol', 6)
    ->get([
      'users.id',
      'users.nom',
      'users.cognom1',
      'users.email',
    ]);

    $tiquet = Contacte::find($id);


    return view('/gestio/ticket/assign', compact('user', 'tiquet'));
  }

//guarda ticket

/**
 * Acció que s'encarrega de guardar l'assignacio a la base de dades, genera una notificacio per al empleat assignat i tambe envia un correu al client que ha fet el tiquet
 * @param  Request $request
 * @param  int  $id
 */
  public function saveTicket(Request $request, $id)
  {

    $lineContact = new Linia_contacte ([
      'id_ticket_contacte' => $request->get('tiquetID'),
      'id_empleat' => $request->get('id_empleat'),
    ]);
    $lineContact->save();

    $contacte = Contacte::find($id);

    $contacte->id_estat = 2;

    $contacte->save();

    $notificacio = ([
      'id' => $contacte->id,
      'titol' => "[".$contacte->tipus_pregunta."]"." Nou ticket: ".$contacte->nom,
      'descripcio' => "El client '".$contacte->email."' ha enviat un nou ticket amb el missatge: <br/>".$contacte->missatge
    ]);
    $notificacio_enviar = collect($notificacio);
    //dd($notificacio_enviar);
    $user = User::find($request->get('id_empleat'));
    $user->notify(new TicketAssigned($notificacio_enviar));


    return redirect('/gestio/ticket')->with('success', 'Contacte enviat correctament');

  }

/**
 * Acció que s'encarrega de llistar tots els tiquets que estan assignats a un empleat
 */
  public function assignList()
  {
    $linia = Linia_Contacte::where('id_estat', 2)
    ->join('contacte AS con', 'linia_contacte.id_ticket_contacte', 'con.id')
    ->join('users AS us', 'linia_contacte.id_empleat', 'us.id')
    ->join('estat_incidencies','estat_incidencies.id','con.id_estat')
    ->get([
      'linia_contacte.id as id',
      'us.nom as nom_empleat',
      'con.email as email',
      'con.tipus_pregunta as pregunta',
      'con.missatge as missatge',
      'estat_incidencies.nom_estat as nom_estat'
    ]);

    return view('/gestio/ticket/list', compact('linia'));
  }

/**
 * Acció que s'encarrega de borrar el tiquet
 * @param  int $id
 */
  public function destroy($id)
  {
      $linia = Linia_Contacte::find($id);
      $linia->delete();
      return redirect('/gestio/ticket/list')->with('success', 'ticket suprimit correctament');

  }

/**
 * Acció que canvia l'estat del tiquet a finalitzat
 * @param  int $id 
 */
  public function conclude($id)
  {
    $ticket = Contacte::findOrFail($id);

    $ticket->id_estat = 3;

    $ticket->save();

    return redirect('/tasques')->with('success', 'Ticket finalitzat correctament');
  }
}
