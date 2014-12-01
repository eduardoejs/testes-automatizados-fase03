<?php
namespace EJS\Classes\Form\Types;

use EJS\Classes\Elemento;
use EJS\Classes\Form\Interfaces\FormInterface;

class Label implements FormInterface{

    public $nome;
    public $parametro;
    public $classe;

    function __construct($nome)
    {
        $this->nome = $nome;
    }

    public function getParam() {
        return $this->parametro;
    }

    public function setParam($parametro) {
        $this->parametro = $parametro;
    }

    public function setClasse($classe) {
        $this->classe = $classe;
    }

    public function createField(Elemento $elemento)
    {
        $label = $elemento;
        $label->setPropriedades('class', $this->classe);
        $label->setTag($this->nome);
        $label->render();
    }

    public function close(Elemento $elemento)
    {
        $label = $elemento;
        $label->setTag($this->nome);
        $label->fechaTagElemento();
    }
} 