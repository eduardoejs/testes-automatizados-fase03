<?php

namespace EJS\Classes\Form\Types;


class LabelTest extends \PHPUnit_Framework_TestCase{

    private $class;

    public function assertPreConditions()
    {
        $this->assertTrue(class_exists($classe = 'EJS\Classes\Form\Types\Label'),"A Classe {$classe} não existe");
    }

    public function setUp() {
        $this->class = new Label('nome');
    }

    public function testVerificaSeOTipoDaClasseEstaCorreto()
    {
        $this->assertInstanceOf("EJS\Classes\Form\Types\Label", $this->class);
    }

    /**
     * @depends testVerificaSeOTipoDaClasseEstaCorreto
     */
    public function testVerificaSeestaImplementandoAInterface()
    {
        $interface = $this->getMock('EJS\Classes\Form\Interfaces\FormInterface');
        $this->assertTrue($interface instanceof \EJS\Classes\Form\Interfaces\FormInterface);
    }

    /**
     * @depends testVerificaSeestaImplementandoAInterface
     */
    public function testVerificaSeOTipoDaInterfaceEstaCorreta()
    {
        $this->assertInstanceOf("EJS\Classes\Form\Interfaces\FormInterface", $this->class);
    }

    /**
     * @depends testVerificaSeOTipoDaClasseEstaCorreto
     */
    public function testVerificaSeOsMetodosExistem()
    {
        $this->class->getParam();
        $this->assertTrue(method_exists($this->class, "getParam"),"O Método não existe");

        $this->class->setParam('param');
        $this->assertTrue(method_exists($this->class, "setParam"),"O Método não existe");

        $this->class->setClasse('class');
        $this->assertTrue(method_exists($this->class, "setClasse"),"O Método não existe");

        $element = $this->getMockBuilder('EJS\Classes\Element')
            ->setMockClassName('Elemento')
            ->getMock();
        $this->class->createField($element);
        $this->assertTrue(method_exists($this->class, "createField"),"O Método não existe"
        );

        $this->class->close($element);
        $this->assertTrue(method_exists($this->class, "close"),"O Método não existe");
    }

    /**
     * @depends testVerificaSeOsMetodosExistem
     */
    public function testVerificaOSetEGetFuncionam()
    {
        $this->class->setParam("parametro");
        $this->assertEquals('parametro', $this->class->getParam('parametro'));
    }
} 