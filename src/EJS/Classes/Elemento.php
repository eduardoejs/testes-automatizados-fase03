<?php

namespace EJS\Classes;

use EJS\Classes\Form\Interfaces\ElementoInterface;

class Elemento implements ElementoInterface{

    private $nomeElemento;
    private $propriedades;
    private $value;

    public function setTag($nome, $value = null){
        $this->nomeElemento = $nome;
        if($value!=null):
            $this->value = $value;
        endif;
    }

    public function setPropriedades($nome, $valor)
    {
        $this->propriedades[$nome] = $valor;
    }

    public function abreTagElemento()
    {
        echo "<{$this->nomeElemento}";
        if ($this->propriedades){
            foreach ($this->propriedades as $nome=>$valor){
                echo " {$nome}=\"{$valor}\"";
            }
        }
        echo '>';
    }

    public function fechaTagElemento()
    {
        echo "</{$this->nomeElemento}>\n";
    }

    public function render()
    {
        $this->abreTagElemento();
    }
} 
