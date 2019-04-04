<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;                                                       //IMPORTS GENERALS
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Redirect;                                                                            // IMPORTS DE SESSIO, URL, USUARI, VIEW
use Session;
use URL;
use Auth;
use View;

use PayPal\Api\Amount;                                                                    // IMPORTS PER A PAYPAL
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

use App\Http\Controllers\HomeController;                                                //IMPORTS PER LES VENTES
use \App\Producte;
use \App\Tipus_producte;
use \App\Atributs_producte;
use \App\Cistella;
use \App\Linia_cistella;
use \App\Venta_productes;
use \App\Linia_ventes;

class PaymentController extends Controller
{
    private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }
    public function index()
    {
        return view('/cistella');
    }
    public function payWithpaypal(Request $request)
    {
        $payer = new Payer();                                                                         //Crear un nou usuari per el  pagament
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();                                                                           //Crear un nou item amb els seus atributs
        $item_1->setName('Item 1') 
            ->setCurrency('EUR')
            ->setQuantity(1)
            ->setPrice($request->get('amount')); 
            
        $item_list = new ItemList();    
        $item_list->setItems(array($item_1));                                                           //Afegir-ho a la llista d'items
        $amount = new Amount();
        $amount->setCurrency('EUR')                                                                     //Amontonar els items
            ->setTotal($request->get('amount'));

        $transaction = new Transaction();                                                                //Crear una nova transaction
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');
            
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('status'))                                                 //Crear una nova URL i mostrar el estat
            ->setCancelUrl(URL::to('status'));

        $payment = new Payment();                                                                       //Crear un nou pagament i assignar el usuari, i la transaction
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        try {                                                                                           //Afegir el pagament al context de la API
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {                                         //Errors de temps de conexio i errors desconeguts
            if (\Config::get('app.debug')) {
                \Session::put('error', 'Conexio fora de temps');
                return Redirect::to('/compra');
            } else {
                \Session::put('error', 'Error desconegut, sentim les molesties');
                return Redirect::to('/compra');
            }
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        Session::put('paypal_payment_id', $payment->getId());                                           //Afegir el pagament al ID d'usuari
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        \Session::put('error', 'Error desconegut');                                                     //Error desconegut 
        return Redirect::to('/compra');
    }
    public function getPaymentStatus()                                                                  //Actio del pagament
    {
        $payment_id = Session::get('paypal_payment_id');                                                //ID del pagment a la sessio
        Session::forget('paypal_payment_id');                                                           //Oblidar el ID
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            \Session::put('error', 'Error amb el pagament');                                            //Error de pagament
            return Redirect::to('/compra');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));                                                  //Executar el pagament
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        if ($result->getState() == 'approved') {                                                        //Si esta aprovat executar la funcio de compra_finalitzada();

            $prova = (new HomeController)->compra_finalitzada();
            
            \Session::put('success', 'Compra realitzada correctament');
            return Redirect::to('/cistella');
        }
        \Session::put('error', 'Error amb el pagament');                                                   //Error de pagament
        return Redirect::to('/compra');
    }
}