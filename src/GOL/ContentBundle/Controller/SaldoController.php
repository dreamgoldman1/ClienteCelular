<?php

namespace GOL\ContentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SaldoController extends Controller
{
    public function saldoAction(Request $request)
    {
        if ($request->getMethod() == 'POST'){
            $no_celular = $request->get('no_celular');
            $parametros['no_celular'] = $no_celular;
            
            $servicio = $this->get("gol_api.api");
            $saldo = $servicio->consultaSaldo($parametros);
            
            return $this->render('GOLContentBundle:Saldo:saldo.html.twig', array(
                'dataSaldo' => $saldo['Data'],
                'env' => $this->getEnv(),
            ));
        }
        return $this->render('GOLContentBundle:Saldo:saldo.html.twig', array(
            'env' => $this->getEnv(),
        ));
    }
    
    public function getEnv() {
        global $kernel;
        return $kernel->getEnvironment() == "prod" ? "/" : "/app_dev.php/";
    }
}
