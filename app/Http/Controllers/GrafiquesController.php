<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Venta_productes;
use App\Incidencia;

class GrafiquesController extends Controller
{
    /**
     * 
     */
    public function getUltimoDiaMes($elAnio, $elMes)
    {
        return date("d", (mktime(0, 0, 0, $elMes + 1, 1, $elAnio) - 1));
    }

    /**
     * 
     */
    public function registros_mes($anio, $mes)
    {
        $primer_dia = 1;
        $ultimo_dia = $this->getUltimoDiaMes($anio, $mes);

        $fecha_inicial = date("Y-m-d H:i:s", strtotime($anio . "-" . $mes . "-" . $primer_dia));
        $fecha_final = date("Y-m-d H:i:s", strtotime($anio . "-" . $mes . "-" . $ultimo_dia));

        $usuarios = User::whereBetween('created_at', [$fecha_inicial,  $fecha_final])->get();
        $ct = count($usuarios);

        for ($d = 1; $d <= $ultimo_dia; $d++) {
            $registros[$d] = 0;
        }

        foreach ($usuarios as $usuario) {
            $diasel = intval(date("d", strtotime($usuario->created_at)));
            $registros[$diasel]++;
        }

        $data = array("totaldias" => $ultimo_dia, "registrosdia" => $registros);

        return json_encode($data);
    }

    /**
     * 
     */
    public function vendes_mes($anio, $mes)
    {
        $primer_dia = 1;
        $ultimo_dia = $this->getUltimoDiaMes($anio, $mes);

        $fecha_inicial = date("Y-m-d H:i:s", strtotime($anio . "-" . $mes . "-" . $primer_dia));
        $fecha_final = date("Y-m-d H:i:s", strtotime($anio . "-" . $mes . "-" . $ultimo_dia));

        $usuarios = Venta_productes::whereBetween('created_at', [$fecha_inicial,  $fecha_final])->get();
        $ct = count($usuarios);

        for ($d = 1; $d <= $ultimo_dia; $d++) {
            $registros[$d] = 0;
        }

        foreach ($usuarios as $usuario) {
            $diasel = intval(date("d", strtotime($usuario->created_at)));
            $registros[$diasel]++;
        }

        $data = array("totaldias" => $ultimo_dia, "registrosdia" => $registros);

        return json_encode($data);
    }

    /**
     * 
     */
    public function graficaregistres()
    {
        $anio = date("Y");

        $mes = date("n");

        // $nombremes = array("","Gener","Febrer","Març","Abril","Maig","Juny","Juliol","Agost","Setembre","Octubre","Novembre","Desembre");

        return view('gestio.grafiques.graficaregistres', compact(['anio', 'mes']));
    }

    /**
     * 
     */
    public function graficavendes()
    {
        $anio = date("Y");

        $mes = date("n");

        // $nombremes = array("","Gener","Febrer","Març","Abril","Maig","Juny","Juliol","Agost","Setembre","Octubre","Novembre","Desembre");

        return view('gestio.grafiques.graficavendes', compact(['anio', 'mes']));
    }

    /**
     * 
     */
    public function grafica_incidencies()
    {
        $gener = Incidencia::whereMonth('created_at', 1)->count();
        $febrer = Incidencia::whereMonth('created_at', 2)->count();
        $març = Incidencia::whereMonth('created_at', 3)->count();
        $abril = Incidencia::whereMonth('created_at', 4)->count();
        $maig = Incidencia::whereMonth('created_at', 5)->count();
        $juny = Incidencia::whereMonth('created_at', 6)->count();
        $juliol = Incidencia::whereMonth('created_at', 7)->count();
        $agost = Incidencia::whereMonth('created_at', 8)->count();
        $setembre = Incidencia::whereMonth('created_at', 9)->count();
        $octubre = Incidencia::whereMonth('created_at', 10)->count();
        $novembre = Incidencia::whereMonth('created_at', 11)->count();
        $desembre = Incidencia::whereMonth('created_at', 12)->count();

        return view('gestio.grafiques.grafica_incidencies', compact('gener', 'febrer', 'març', 'abril', 'maig', 'juny', 'juliol', 'agost', 'setembre', 'octubre', 'novembre', 'desembre'));
    }
}
