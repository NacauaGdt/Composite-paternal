<?php

include_once 'TExpression.class.php';
include_once 'TCriteria.class.php';
include_once 'TFilter.class.php';

//aqui vemos um exemplo do criterio utilizando o operador OR
//idade menor que 16 anos e maior que 60 anos
//wtf

$criteria = new TCriteria;
$criteria->addOperator(new TFilter('idade', '<', 16), TExpression::OR_OPERATOR);
$criteria->addOperator(new TFilter('idade', '>', 60), TExpression::OR_OPERATOR);
echo $criteria->dump();
echo '<br>';
echo '<br>';


//aqui vemos um exemplo do criterio utilizando o operador AND
//juntamento com os operadores de conjunto IN(dentro do conjunto) e
//NOT IN(fora dos conjuntos)
//a idade deve estar dentro do conjunto (24,25,26) e deve estar fora do conjunto (10)

$criteria = new TCriteria;
$criteria->addOperator(new TFilter('idade','IN', array(24, 25, 26)));
$criteria->addOperator(new TFilter('idade','NOT IN', array(10)));

echo $criteria->dump();
echo '<br>';




?>