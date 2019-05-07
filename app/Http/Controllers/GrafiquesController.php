<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Venta_productes;

class GrafiquesController extends Controller
{

  public function getUltimoDiaMes($elAnio,$elMes) {

    return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
  }

  public function registros_mes($anio,$mes)
    {
        $primer_dia=1;
        $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);

        $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );
        $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );

        $usuarios=User::whereBetween('created_at', [$fecha_inicial,  $fecha_final])->get();
        $ct=count($usuarios);

        for($d=1;$d<=$ultimo_dia;$d++){
            $registros[$d]=0;     
        }

        foreach($usuarios as $usuario){
        $diasel=intval(date("d",strtotime($usuario->created_at) ) );
        $registros[$diasel]++;    
        }

        $data=array("totaldias"=>$ultimo_dia, "registrosdia" =>$registros);
        return   json_encode($data);
  }

  public function vendes_mes($anio,$mes)
    {
        $primer_dia=1;
        $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);

        $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );
        $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );

        $usuarios=Venta_productes::whereBetween('created_at', [$fecha_inicial,  $fecha_final])->get();
        $ct=count($usuarios);

        for($d=1;$d<=$ultimo_dia;$d++){
            $registros[$d]=0;     
        }

        foreach($usuarios as $usuario){
        $diasel=intval(date("d",strtotime($usuario->created_at) ) );
        $registros[$diasel]++;    
        }

        $data=array("totaldias"=>$ultimo_dia, "registrosdia" =>$registros);
        return   json_encode($data);
  }

  public function graficaregistres() {
    $anio=date("Y");
    $mes=date("m");

    return view('gestio.grafiques.graficaregistres')->with("anio",$anio)->with("mes",$mes);

  }

  public function graficavendes() {
    $anio=date("Y");
    $mes=date("m");

    return view('gestio.grafiques.graficavendes')->with("anio",$anio)->with("mes",$mes);

  }

}
