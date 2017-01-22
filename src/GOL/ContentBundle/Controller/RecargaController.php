<?php

namespace GOL\ContentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RecargaController extends Controller
{
    public function recargaAction(Request $request)
    {
        if ($request->getMethod() == 'POST'){
            $parametros = array();
            
            $parametros['no_celular'] = ($request->get('no_celular') != '') ? $request->get('no_celular') : '';
            $parametros['valor_recarga'] = ($request->get('valor_recarga') != '') ? $request->get('valor_recarga') : '';
            
            $servicio = $this->get("gol_api.api");
            $recarga = $servicio->recargaCelular($parametros);
            
            return $this->render('GOLContentBundle:Recarga:recarga.html.twig', array(
                'respuesta' => $recarga,
                'env' => $this->getEnv(),
            ));
        }
        return $this->render('GOLContentBundle:Recarga:recarga.html.twig', array(
            'env' => $this->getEnv(),
        ));
    }
    
    public function verRecargasAction(Request $request)
    {
        if ($request->getMethod() == 'POST'){
            $no_celular = $request->get('no_celular');
            $parametros['no_celular'] = $no_celular;
            
            $servicio = $this->get("gol_api.api");
            $recargas = $servicio->getRecargaCliente($parametros);
            
            return $this->render('GOLContentBundle:Recarga:ver-recargas.html.twig', array(
                'dataRecargas' => $recargas['Data'],
                'env' => $this->getEnv(),
            ));
        }
        $no_celular = '';
        return $this->render('GOLContentBundle:Recarga:ver-recargas.html.twig', array(
            'recargas' => $this->getTodosLasRecargas($no_celular),
            'env' => $this->getEnv(),
        ));
    }
    
    public function getEnv() {
        global $kernel;
        return $kernel->getEnvironment() == "prod" ? "/" : "/app_dev.php/";
    }    
}
