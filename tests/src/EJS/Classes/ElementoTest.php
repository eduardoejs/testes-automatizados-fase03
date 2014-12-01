<?php

namespace EJS\Classes;
use EJS\Classes\Elemento;

class ElementoTest extends \PHPUnit_Framework_TestCase{

    public function testVerificaSeTipoDaInterfaceEstaCorreto(){
        $this->assertInstanceOf('EJS\Classes\Form\Interfaces\ElementoInterface', new Elemento());
    }

    public function testVerificaSeOTipoDaClasseEstaCorreto()
    {
        $this->assertInstanceOf('EJS\Classes\Elemento', new Elemento());
    }

    public function testVerificaSeMetodoAbreTagElementoExiste(){
        $elemento = new Elemento();
        $elemento->abreTagElemento();
        $this->assertTrue(method_exists($elemento, 'abreTagElemento'), 'Metodo nao existe');
    }

    public function testVerificaSeMetodoFechaTagElementoExiste(){
        $elemento = new Elemento();
        $elemento->fechaTagElemento();
        $this->assertTrue(method_exists($elemento, 'fechaTagElemento'), 'Metodo nao existe');
    }
    public function testVerificaSeMetodoSetPropriedadesExiste(){
        $elemento = new Elemento();
        $elemento->setPropriedades('h1', 'color');
        $this->assertTrue(method_exists($elemento, 'setPropriedades'), 'Metodo nao existe');
    }


} 