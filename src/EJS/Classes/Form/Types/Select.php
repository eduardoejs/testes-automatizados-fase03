<?php
namespace EJS\Classes\Form\Types;

use EJS\Classes\Elemento;
use EJS\Classes\Form\Interfaces\FormInterface;

class Select implements FormInterface{

    public $nome;
    public $class;

    function __construct($nome)
    {
        $this->nome = $nome;
    }

    public function setClasse($class) {
        $this->class = $class;
    }

    public function createField(Elemento $elemento)
    {
        $tag = $elemento;
        $tag->setTag($this->nome);
        $tag->setPropriedades('class', $this->class);
        $tag->render();
    }

    public function close(Elemento $elemento)
    {
        $tag = $elemento;
        $tag->setTag($this->nome);
        $tag->fechaTagElemento();
    }
} 