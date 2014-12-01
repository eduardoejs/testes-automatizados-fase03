<?php
namespace EJS\Classes\Form\Interfaces;


class ElementoInterfaceTest extends \PHPUnit_Framework_TestCase{

    public function testVerificaSeInterfaceExiste(){
        $this->assertTrue(interface_exists('EJS\Classes\Form\Interfaces\ElementoInterface'), "A interface não existe");
    }
} 