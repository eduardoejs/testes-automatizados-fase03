<?php
namespace EJS\Classes\Form\Requisicao;
use EJS\Classes\Form\Requisicao\Request;

class RequestTest extends \PHPUnit_Framework_TestCase{

    public function testVerificaSeOTipoDaClasseEstaCorreto()
    {
        $this->assertInstanceOf('EJS\Classes\Form\Requisicao\Request', new Request());
    }

} 