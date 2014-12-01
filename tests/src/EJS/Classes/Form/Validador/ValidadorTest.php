<?php
namespace EJS\Classes\Form\Validator;

use EJS\Classes\Form\Requisicao\Request;
use EJS\Classes\Form\Validador\Validator;

class ValidadorTest extends \PHPUnit_Framework_TestCase{

    public function testVerificaSeOTipoDaClasseEstaCorreto()
    {
        $resquest = new Request();
        $this->assertInstanceOf("EJS\Classes\Form\Validador\Validator", new Validator($resquest));
    }
} 