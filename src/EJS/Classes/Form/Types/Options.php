<?php

namespace EJS\Classes\Form\Types;

use EJS\Classes\Elemento;
use EJS\Classes\Form\Interfaces\FormInterface;

class Options implements FormInterface{

    public $nome;
    public $param;

    function __construct($nome)
    {
        $this->nome = $nome;
    }

    public function getParam() {
        return $this->param;
    }

    public function setParam($param) {
        $this->param = $param;
    }

    public function createField(Elemento $elemento)
    {
        $tag = $elemento;
        $tag->setTag($this->nome);
        $tag->render();
    }

    public function close(Elemento $elemento)
    {
        $tag = $elemento;
        $tag->setTag($this->nome);
        $tag->fechaTagElemento();
    }
} 