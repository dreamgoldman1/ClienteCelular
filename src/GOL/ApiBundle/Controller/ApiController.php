<?php

namespace GOL\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ApiController extends Controller {

    private $urlBase = 'http://52.24.48.238/';

    public function recargaCelular($parametros) {
        $apiUrl = $this->urlBase."api/recarga";

        //Lo primerito, creamos una variable iniciando curl, pasándole la url
        $ch = \curl_init($apiUrl);

        //especificamos el POST (tambien podemos hacer peticiones enviando datos por GET
        \curl_setopt($ch, CURLOPT_POST, 1);

        //le decimos qué paramáetros enviamos (pares nombre/valor, también acepta un array)
        
        $parametros_string = http_build_query($parametros);
        \curl_setopt($ch, CURLOPT_POSTFIELDS, $parametros_string);

        //le decimos que queremos recoger una respuesta (si no esperas respuesta, ponlo a false)
        \curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //recogemos la respuesta
        $respuesta = \curl_exec($ch);

        //o el error, por si falla
        $error = \curl_error($ch);
        
        //y finalmente cerramos curl
        \curl_close($ch);
        
        return json_decode($respuesta, TRUE);
    }
    
    public function getRecargaCliente($parametros){
        $apiUrl = $this->urlBase."api/recarga-cliente";
        //Lo primerito, creamos una variable iniciando curl, pasándole la url
        $ch = \curl_init($apiUrl);

        //especificamos el POST (tambien podemos hacer peticiones enviando datos por GET
        \curl_setopt($ch, CURLOPT_POST, 1);

        //le decimos qué paramáetros enviamos (pares nombre/valor, también acepta un array)
        
        $parametros_string = http_build_query($parametros);
        \curl_setopt($ch, CURLOPT_POSTFIELDS, $parametros_string);

        //le decimos que queremos recoger una respuesta (si no esperas respuesta, ponlo a false)
        \curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //recogemos la respuesta
        $respuesta = \curl_exec($ch);

        //o el error, por si falla
        $error = \curl_error($ch);

        //y finalmente cerramos curl
        \curl_close($ch);
        
        return json_decode($respuesta, TRUE);
    }
    
    public function registrarLlamada($parametros){
        $apiUrl = $this->urlBase."api/registrar-llamada";
        //Lo primerito, creamos una variable iniciando curl, pasándole la url
        $ch = \curl_init($apiUrl);

        //especificamos el POST (tambien podemos hacer peticiones enviando datos por GET
        \curl_setopt($ch, CURLOPT_POST, 1);

        //le decimos qué paramáetros enviamos (pares nombre/valor, también acepta un array)
        
        $parametros_string = http_build_query($parametros);
        \curl_setopt($ch, CURLOPT_POSTFIELDS, $parametros_string);

        //le decimos que queremos recoger una respuesta (si no esperas respuesta, ponlo a false)
        \curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //recogemos la respuesta
        $respuesta = \curl_exec($ch);

        //o el error, por si falla
        $error = \curl_error($ch);

        //y finalmente cerramos curl
        \curl_close($ch);
        
        return json_decode($respuesta, TRUE);
    }
    
    public function getConsumoCliente($parametros){
        $apiUrl = $this->urlBase."api/ver-llamadas";
        //Lo primerito, creamos una variable iniciando curl, pasándole la url
        $ch = \curl_init($apiUrl);

        //especificamos el POST (tambien podemos hacer peticiones enviando datos por GET
        \curl_setopt($ch, CURLOPT_POST, 1);

        //le decimos qué paramáetros enviamos (pares nombre/valor, también acepta un array)
        
        $parametros_string = http_build_query($parametros);
        \curl_setopt($ch, CURLOPT_POSTFIELDS, $parametros_string);

        //le decimos que queremos recoger una respuesta (si no esperas respuesta, ponlo a false)
        \curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //recogemos la respuesta
        $respuesta = \curl_exec($ch);

        //o el error, por si falla
        $error = \curl_error($ch);

        //y finalmente cerramos curl
        \curl_close($ch);
        
        return json_decode($respuesta, TRUE);
    }
    
    public function consultaSaldo($parametros){
        $apiUrl = $this->urlBase."api/consulta-saldo";
        //Lo primerito, creamos una variable iniciando curl, pasándole la url
        $ch = \curl_init($apiUrl);

        //especificamos el POST (tambien podemos hacer peticiones enviando datos por GET
        \curl_setopt($ch, CURLOPT_POST, 1);

        //le decimos qué paramáetros enviamos (pares nombre/valor, también acepta un array)
        
        $parametros_string = http_build_query($parametros);
        \curl_setopt($ch, CURLOPT_POSTFIELDS, $parametros_string);

        //le decimos que queremos recoger una respuesta (si no esperas respuesta, ponlo a false)
        \curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //recogemos la respuesta
        $respuesta = \curl_exec($ch);

        //o el error, por si falla
        $error = \curl_error($ch);

        //y finalmente cerramos curl
        \curl_close($ch);
        
        return json_decode($respuesta, TRUE);
    }

}
