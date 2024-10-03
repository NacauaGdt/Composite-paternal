<?php
 //carrega as classes necessárias 

 include_once 'TExpression.class.php';
 include_once 'TCriteria.class.php';
 include_once 'TFilter.class.php';

 //aqui vemos um exemplo do critério utilizando o operador OR
 // a idade deve ser menor que 16 anos e maior que 60 anos

$criteria = new TCriteria;
$criteria ->add(new TFilter('idade','<', 16), TExpression::OR_OPERATOR);
$criteria ->add(new TFilter('idade','>',60), TExpression::OR_OPERATOR);

echo $criteria->dump();
echo "<br>\n";

//aqui vemos um exemplo do critério utilizando o operador logico AND
//juntamente com os operadores de conjunto IN(dentro do conjunto) e
//NOT IN(fora dos conjuntos)
//a idade deve estar dentro do conjunto (24, 25, 26) e deve estar fora do conjunto (10)

$criteria = new TCriteria;
$criteria ->add(new TFilter("idade","IN",array(24, 25, 26)));
$criteria ->add(new TFilter("idade","NOT IN",array(10)));

echo $criteria->dump();
echo "<br>\n";

//aqui vemos um exemplo de critério utilizando o operador de comparação
//o nome deve iniciar por "pedro" ou deve iniciar por "maria"

$criteria = new TCriteria;
$criteria ->add(new TFilter("nome "," like",'pedro%'), TExpression::OR_OPERATOR);
$criteria ->add(new TFilter('nome ','like', 'maria%'), TExpression::OR_OPERATOR);

echo $criteria->dump();
echo "<br>\n";

//aqui vemos um exemplo de critério utilizando os operadores '=' e IS NOT
//neste caso o telefone não pode conter o valor nulo (IS NOT NULL)
//e o genero deve ser feminino (sexo = 'F')

$criteria = new TCriteria;
$criteria ->add(new TFilter("telefone "," IS NOT ",NULL));
$criteria ->add(new TFilter("sexo "," = " , ' F '));

echo $criteria->dump();
echo "<br>\n";

//aqui vemos o uso dos operadores de comparação IN e NOT IN juntamente 
//com conjuntos de strings, nesse caso a UF deve estar entre (RS, SC, PR)
//não deve estar entre (AC, PI)

$criteria = new TCriteria;
$criteria ->add(new TFilter("UF","IN",array('RS', 'SC', 'PR')));
$criteria ->add(new TFilter('UF','NOT IN', array('AC','PI')));

echo $criteria->dump();
echo "<br>\n";

//neste caso temos o uso de um critério completo
//o primeiro critério aponta para o sexo = 'F' (feminino) e idade>18

$criteria1 = new TCriteria;
$criteria1 ->add(new TFilter('sexo', '=', 'F'));
$criteria1 ->add(new TFilter('idade','>', '18'));

//o segundo critério aponta para o sexo = 'M'

$criteria2= new TCriteria;
$criteria2 ->add(new TFilter('sexo', '=', 'M'));
$criteria2 ->add(new TFilter('idade','<', '16'));

//agora juntamos os dois critérios utilizando o operador lógico OR
//o resultado deve conter "mulheres maiores que 18 anos" OU "homens menores que 16 anos"

$criteria = new TCriteria;
$criteria ->add($criteria1,TExpression::OR_OPERATOR);
$criteria->add($criteria2,TExpression::OR_OPERATOR);

echo $criteria->dump();
echo "<br>\n";



?>