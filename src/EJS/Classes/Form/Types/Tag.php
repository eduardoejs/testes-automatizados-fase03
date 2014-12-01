<?php

namespace EJS\Classes\Form\Types;


use EJS\Classes\Elemento;
use EJS\Classes\Form\Interfaces\FormInterface;

class Tag implements FormInterface{

    public $nome;
    public $name;
    public $type;
    public $placeholder;
    public $class;
    public $value;

    function __construct($nome)
    {
        $this->nome = $nome;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setPlaceholder($placeholder)
    {
        $this->placeholder = $placeholder;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function setClasse($class) {
        $this->class = $class;
    }

    public function createField(Elemento $elemento)
    {
        $tag = $elemento;
        $tag->setTag($this->nome);
        $tag->setPropriedades('class', $this->class);
        $tag->setPropriedades('type',  $this->type);
        $tag->setPropriedades('name', $this->name);
        $tag->setPropriedades('placeholder', $this->placeholder);
        $tag->setPropriedades('value', $this->value);
        $tag->render();
    }

    public function close(Elemento $elemento)
    {
        $tag = $elemento;
        $tag->setTag($this->nome);
        $tag->fechaTagElemento();
    }
} 