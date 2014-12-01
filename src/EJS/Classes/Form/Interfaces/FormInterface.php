<?php

namespace EJS\Classes\Form\Interfaces;


use EJS\Classes\Elemento;

interface FormInterface {

    public function createField(Elemento $elemento);
    public function close(Elemento $elemento);
} 