<?php

namespace EJS\Classes\Form\Types;


class OptionsTest extends \PHPUnit_Framework_TestCase{

    private $class;
    private $connection;

    public function assertPreConditions()
    {
        $this->assertTrue(class_exists($classe = 'EJS\Classes\Form\Types\Options'),"A Classe {$classe} não existe");
    }

    public function setUp() {
        $this->class = new Options('nome');

        $this->connection = new \PDO("sqlite::memory:");
        $query = "create table opcoes (nome varchar(255));";
        $this->connection->exec($query);
    }

    public function tearDown(){
        $query = "drop table opcoes";
        $this->connection->exec($query);
    }

    public function testVerificaSeOTipoDaClasseEstaCorreto()
    {
        $this->assertInstanceOf("EJS\Classes\Form\Types\Options", $this->class);
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

        $element = $this->getMockBuilder('EJS\Classes\Elemento')
            ->setMockClassName('Elemento')
            ->getMock();
        $this->class->createField($element);
        $this->assertTrue(method_exists($this->class, "createField"),"O Método não existe");


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

    public function testVerificaInsertDasOpcoes(){

        $this->class->setParam("opcao teste");

        $query = "insert into opcoes (nome) values ('{$this->class->getParam()}')";
        $this->connection->exec($query);

        $select = "select * from opcoes";
        $opcoes = $this->connection->query($select)->fetchALL();

        $this->class->setParam($opcoes[0]['nome']);
        $this->assertEquals($opcoes[0]['nome'], $this->class->getParam('opcao teste'));
    }
} 