<?php

namespace EJS\Classes\Form\Types;


class FormTest extends \PHPUnit_Framework_TestCase{

    private $class;

    public function assertPreConditions()
    {
        $this->assertTrue(class_exists($classe = 'EJS\Classes\Form\Types\Form'),"A Classe {$classe} não existe");
    }

    public function setUp() {

        $validator = $this->getMockBuilder('EJS\Classes\Form\Validador\Validator')
            ->setMockClassName('Validator')
            ->disableOriginalConstructor()
            ->getMock();
        $this->class = new Form($validator, 'formulario');
    }

    public function testVerificaSeOTipoDaClasseEstaCorreto()
    {
        $this->assertInstanceOf("EJS\Classes\Form\Types\Form", $this->class);
    }

    /**
     * @depends testVerificaSeOTipoDaClasseEstaCorreto
     */
    public function testVerificaSeOTipoDaInterfaceEstaCorreta()
    {
        $this->assertInstanceOf("EJS\Classes\Form\Interfaces\FormInterface", $this->class);
    }

    /**
     * @depends testVerificaSeOTipoDaInterfaceEstaCorreta
     */
    public function testVerificaSeestaImplementandoAInterface()
    {
        $interface = $this->getMock('EJS\Classes\Form\Interfaces\FormInterface');
        $this->assertTrue($interface instanceof \EJS\Classes\Form\Interfaces\FormInterface);
    }
} 