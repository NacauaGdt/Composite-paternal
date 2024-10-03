<?php

//funcao autoload
//Carrega uma classe quando ela eh necessaria, ou seja, 
//quando eh instaciado pela primeira vez

spl_autoload_register(function ($classe) {
    if (file_exists("{$classe}.class.php")) {
        include_once "{$classe}.class.php";
    }
});

//cria um criterio de seleção de dados
$criteria = new TCriteria;
$criteria->add(new TFilter('id', '=', '3'));

//cria instrucao de UPDATE
$sql = new TSqlUpdate;

//define a identidade
$sql->setEntity('aluno');

//atribui o valor de cada coluna
$sql->setRowData('nome', 'Pedro Cardoso da Silva');
$sql->setRowData('rua', 'Machado de Assis');
$sql->setRowData('fone', '(12)131231');

//define o criterio de selecao de dados
$sql->setCriteria($criteria);

//processa instrucao SQL

echo $sql->getInstruction();

echo "<br>\n"


?>