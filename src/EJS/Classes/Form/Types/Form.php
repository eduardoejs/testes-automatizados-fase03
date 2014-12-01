<?php
/**
 * Created by PhpStorm.
 * User: eduardo
 * Date: 21/10/14
 * Time: 14:35
 */

namespace EJS\Classes\Form\Types;


use EJS\Classes\Elemento;
use EJS\Classes\Form\Interfaces\FormInterface;
use EJS\Classes\Form\Validador\Validator;

class Form implements FormInterface{

    public $nome;

    public function __construct(Validator $validador, $nome){
        $this->nome = $nome;
    }

    public function createField(Elemento $elemento){
        $form = $elemento;
        $form->setPropriedades('name',"form_basico");
        $form->setPropriedades('method',  'post');
        $form->setPropriedades('action',  '');
        $form->setPropriedades('role',  'form');
        $form->setTag($this->nome);

        $form->render();
    }

    public function close(Elemento $elemento){
        $form = $elemento;
        $form->setTag($this->nome);

        $form->fechaTagElemento();
    }
} 