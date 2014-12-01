<?php

namespace EJS\Classes;


class Rotas {

    function validar_rota() {

        $url = parse_url("http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);
        $path = $url['path'];
        $path = explode('/',$path);

        $rota = $path[1];

        $rotas_sistema = ["visualizar" ,"404"];

        if(empty($rota)){
            require_once ('paginas/visualizar.php');
        }elseif(isset($rota) and !in_array($rota, $rotas_sistema)){
            http_response_code(404);
            require_once 'paginas/404.php';
        }else{
            require_once 'paginas/'.$rota.'.php';
        }
    }
} 