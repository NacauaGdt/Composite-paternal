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
echo '<br>';

//aqui vemos um exemplo de criterio utilizando o operador de comparacao like
//o nome deve iniciar por "pedro" ou deve deve iniciar por "maria"

$criteria = new TCriteria;
$criteria->addOperator(new TFilter('nome','like','pedro%'), TExpression::OR_OPERATOR);
$criteria->addOperator(new TFilter('nome','like','maria%'), TExpression::OR_OPERATOR);

echo $criteria->dump();
echo '<br>';
echo '<br>';

//aqui vemos um exemplo de criterio utilizando os operadores "=" e IS Not
//neste caso o telefone nao pode conter o valor nulo(IS NOT NULL)
//e o genero deve ser feminino

$criteria = new TCriteria;
$criteria->addOperator(new TFilter('telefone','IS NOT','NULL'));
$criteria->addOperator(new TFilter('sexo','=','feminino'));

echo $criteria->dump();
echo '<br>';
echo '<br>';

//aqui vemos o uso dos operadores de comparacao IN e NOT IN juntamente
//com conjunto de strings. nesse caso a UF deve estar entre (RS, SC, PR)
//e nao deve estar entre (AC, PI)

$criteria = new TCriteria;
$criteria->addOperator(new TFilter('UF','IN',array('RS', 'SC', 'PR')));
$criteria->addOperator(new TFilter('UF','NOT IN',array('AC','PI')) );

echo $criteria->dump();
echo '<br>';
echo '<br>';

//neste caso temos o uso de um criterio completo
//o primerio criterio aponta para o genero = 'F' e idade > 18

$criteria1 = new TCriteria;
$criteria1->addOperator(new TFilter('sexo','=','F'));
$criteria1->addOperator(new TFilter('idade','>','18') );

//o segundo criterio aponta para o sexo = 'M'
//e idade menor de 16
$criteria2 = new TCriteria;
$criteria2->addOperator(new TFilter('sexo','=','M'));
$criteria2->addOperator(new TFilter('idade','<','18') );

//agora juntamos os dois criterios utilizando o operador logico OR
//o resultado deve conter "mulheres maiores de 18 anos" OU "homens menores de 16"

$criteria = new TCriteria;
$criteria->addOperator($criteria1, TExpression::OR_OPERATOR);
$criteria->addOperator($criteria2, TExpression::OR_OPERATOR);

echo $criteria->dump();
echo '<br>';
echo '<br>';


?>