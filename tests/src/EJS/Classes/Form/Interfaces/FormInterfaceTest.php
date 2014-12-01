<?php

namespace EJS\Classes\Form\Interfaces;


class FormInterfaceTest extends \PHPUnit_Framework_TestCase{

    public function testVerificaSeInterfaceExiste(){
        $this->assertTrue(interface_exists('EJS\Classes\Form\Interfaces\FormInterface'), "A interface não existe");
    }
} 