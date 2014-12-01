<?php

namespace EJS\Classes\Form\Types;


class TagTest extends \PHPUnit_Framework_TestCase{

    private $class;
    private $tag;


    public function assertPreConditions()
    {
        $this->assertTrue(class_exists($classe = 'EJS\Classes\Form\Types\Tag'),"A Classe {$classe} não existe");
    }

    public function setUp() {
        $this->class = new Tag('nome');
    }

    public function testVerificaSeOTipoDaClasseEstaCorreto()
    {
        $this->assertInstanceOf("EJS\Classes\Form\Types\Tag", $this->class);
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
        $this->class->setType('type');
        $this->assertTrue(method_exists($this->class, "setType"),"O Método não existe");

        $this->class->setValue('values');
        $this->assertTrue(
            method_exists($this->class, "setValue"),
            "O Método não existe"
        );

        $this->class->setName('name');
        $this->assertTrue(
            method_exists($this->class, "setName"),
            "O Método não existe"
        );

        $this->class->setClasse('class');
        $this->assertTrue(
            method_exists($this->class, "setClasse"),
            "O Método não existe"
        );

        $element = $this->getMockBuilder('EJS\Classes\Forms\Element')
            ->setMockClassName('Elemento')
            ->getMock();
        $this->class->createField($element);
        $this->assertTrue(
            method_exists($this->class, "createField"),
            "O Método não existe"
        );


        $this->class->close($element);
        $this->assertTrue(
            method_exists($this->class, "close"),
            "O Método não existe"
        );
    }

    /**
     * @depends testVerificaSeOsMetodosExistem
     */
    public function testVerificaSeAsPropriedadesExistem()
    {
        $element = $this->getMockBuilder('EJS\Classes\Form\Elemento')
            ->setMockClassName('Elemento')
            ->getMock();
        $this->class->createField($element);
        $property = "class";
        $this->assertTrue(
            property_exists($this->class, $property),
            "A propriedade {$property} não existe"
        );
        $property = "type";
        $this->assertTrue(
            property_exists($this->class, $property),
            "A propriedade {$property} não existe"
        );
        $property = "name";
        $this->assertTrue(
            property_exists($this->class, $property),
            "A propriedade {$property} não existe"
        );
        $property = "value";
        $this->assertTrue(
            property_exists($this->class, $property),
            "A propriedade {$property} não existe"
        );
    }
} 