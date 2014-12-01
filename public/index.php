<?php
error_reporting(E_ALL);
ini_set('display_errors','On');
date_default_timezone_set('America/Sao_Paulo');

require_once '../vendor/autoload.php'; //autoload

$rota = new \EJS\Classes\Rotas();
$rota->validar_rota();
