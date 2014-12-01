<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Design Patterns - Fase 04</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>

<div class="container">
    <h3>Formulário Básico - Dinâmico - Fase 04</h3>
<?php

    $request = new \EJS\Classes\Form\Requisicao\Request();
    $validation = new \EJS\Classes\Form\Validador\Validator($request);
    $elemento = new \EJS\Classes\Elemento();

    $dados = ['nome' => 'Pneu Aro 14', 'valor'=> 245.90, 'descricao'=> 'Pneu 185 R14 Aro 14'];

    $form = new \EJS\Classes\Form\Types\Form($validation, 'form');
    $form->createField($elemento);

    $elementoFieldset = new \EJS\Classes\Elemento();
    $fieldset = new \EJS\Classes\Form\Types\Fieldset('fieldset');
    $fieldset->createField($elementoFieldset);

    $elementoLegenda = new \EJS\Classes\Elemento();
    $legenda = new \EJS\Classes\Form\Types\Label('legend');
    $legenda->setClasse('legenda');
    $legenda->createField($elementoLegenda);
    $legenda->setParam('Formulário de Produtos');
    echo $legenda->getParam();
    $legenda->close($elementoLegenda);

    echo "<div class=\"form-group\">";

    $elementoForm  = new \EJS\Classes\Elemento();
    $label = new \EJS\Classes\Form\Types\Label('label');
    $label->setClasse('control-label');
    $label->createField($elementoForm);
    $label->setParam("Nome:");
    echo $label->getParam();
    $label->close($elementoForm);

    echo "<div>";

    $elementoInput = new \EJS\Classes\Elemento();
    $input = new \EJS\Classes\Form\Types\Tag('input');
    $input->setType('text');
    $input->setClasse('form-control');
    $input->setName('nome');
    $input->setPlaceholder('Nome do produto');
    if(!array_search('Pneu Aro 14', $dados) && isset($dados['nome'])) {
        $msgErro = "Campo NOME: está vazio ou formato inválido!";
    }else{
        $input->setValue($dados['nome']);
    }
    $input->createField($elementoInput);

    echo "</div></div>";

    echo "<div class=\"form-group\">";

    $label->createField($elementoForm);
    $label->setParam("Valor:");
    echo $label->getParam();
    $label->setClasse('control-label');
    $label->close($elementoForm);

    echo "<div class=\"col-sm-10\">";
    $elementoInput = new \EJS\Classes\Elemento();
    $input = new \EJS\Classes\Form\Types\Tag('input');
    $input->setType('text');
    $input->setClasse('form-control');
    $input->setName('valor');
    $input->setPlaceholder('Valor');
    if(!array_search(is_numeric($dados['valor']), $dados) && !empty($dados['valor'])) {
        $msgErro .= "<br/> Campo VALOR: está vazio ou formato inválido! ex:(1.99)";
    }else{
        $input->setValue($dados['valor']);
    }
    $input->createField($elementoInput);

    echo "</div></div>";

    echo "<div class=\"form-group\">";

    $label->createField($elementoForm);
    $label->setParam("Descrição:");
    echo $label->getParam();
    $label->setClasse('control-label');
    $label->close($elementoForm);

    echo "<div>";

    $elementoInput = new \EJS\Classes\Elemento();
    $input = new \EJS\Classes\Form\Types\Tag('input');
    $input->setClasse('form-control');
    $input->setType('text');
    $input->setName('descricao');
    $input->setPlaceholder('Descrição do Produto');
    if($dados['descricao'] > substr($dados['descricao'],0, 200)){
        $msgErro = "<br/> Campo DESCRIÇÃO: deve conter menos de 200 caracteres!";
    }else{
        $input->setValue($dados['descricao']);
}
    $input->createField($elementoInput);
    $input->close($elementoInput);

    echo "</div></div>";

    echo "<div class=\"form-group\">";

    $label->createField($elementoForm);
    $label->setParam("Categoria:");
    echo $label->getParam();
    $label->setClasse('control-label');
    $label->close($elementoForm);

    echo "<div>";

    $elementoSelect = new \EJS\Classes\Form\Types\Select('select');
    $elementoSelect->setClasse('form-control');
    $elementoSelect->createField($elementoForm);

    try{
        $db = new \PDO("sqlite:database.db");
        $selectCategoria = $db->query("select * from categoria")->fetchAll();

        for($i=0; $i < count($selectCategoria); $i++){

            $optionSelect = new \EJS\Classes\Form\Types\Options('option');
            $optionSelect->createField($elemento);
            $optionSelect->setParam($selectCategoria[$i]['descricao']);
            echo $optionSelect->getParam();
            $optionSelect->close($elemento);
        }

    }catch (\PDOException $e){
        $elementoSelect->close($elementoForm);
        echo $e->getMessage().' - Error Code: '.$e->getCode();
    }

    $elementoSelect->close($elementoForm);
    echo "</div></div>";

    echo "<div class=\"form-group\">";
    echo "<div>";

    $button = new \EJS\Classes\Form\Types\Tag('input');
    $button->setClasse('btn btn-primary');
    $button->setType('submit');
    $button->setName('enviar');
    $button->setPlaceholder('Enviar');
    $button->setValue('Enviar Dados');
    $button->createField($elementoInput);
    $button->close($elemento);

    echo "</div><div>";

    if(isset($msgErro))
        echo "<br/><div class=\"alert alert-danger\" role=\"alert\">$msgErro</div>";

    $form->close($elemento);

        if(isset($_POST)):
            echo '<h3>Dados enviados pelo formulário</h3>';
            echo '<pre>';
            var_dump($_POST);
            echo '</pre>';
        endif;
?>
</div>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
