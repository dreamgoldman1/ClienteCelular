<?php

namespace GOL\ContentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ConsumoController extends Controller
{
    public function registrarLlamadaAction(Request $request)
    {
        if ($request->getMethod() == 'POST'){
            $parametros = array(
                'no_celular_origen' => $request->get('no_celular_origen'),
                'no_celular_destino' => $request->get('no_celular_destino'),
                'tiempo' => $request->get('tiempo'),
            );
            
            $servicio = $this->get("gol_api.api");
            $llamada = $servicio->registrarLlamada($parametros);
            
            return $this->render('GOLContentBundle:Consumo:registrar-llamada.html.twig', array(
                'respuesta' => $llamada,
                'env' => $this->getEnv(),
            ));
        }
        return $this->render('GOLContentBundle:Consumo:registrar-llamada.html.twig', array(
            'env' => $this->getEnv(),
        ));
    }
    
    public function verLlamadasAction(Request $request)
    {
        if ($request->getMethod() == 'POST'){
            $no_celular_origen = $request->get('no_celular_origen');
            $parametros['no_celular_origen'] = $no_celular_origen;
            
            $servicio = $this->get("gol_api.api");
            $llamadas = $servicio->getConsumoCliente($parametros);
            
            return $this->render('GOLContentBundle:Consumo:ver-llamadas.html.twig', array(
                'dataLlamadas' => $llamadas['Data'],
                'env' => $this->getEnv(),
            ));
        }
        $no_celular_origen = "";
        return $this->render('GOLContentBundle:Consumo:ver-llamadas.html.twig', array(
            'env' => $this->getEnv(),
        ));
    }
    
    public function getEnv() {
        global $kernel;
        return $kernel->getEnvironment() == "prod" ? "/" : "/app_dev.php/";
    }
}
