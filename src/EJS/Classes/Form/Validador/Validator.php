<?php

namespace EJS\Classes\Form\Validador;

use EJS\Classes\Form\Requisicao\Request;

class Validator {

    private $requisicao = null;

    function __construct(Request $requisicao){
        $this->requisicao = $requisicao;
    }
} 