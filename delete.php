<?php

spl_autoload_register(function ($classe) {
    if(file_exists("{$classe}.class.php")){
        include_once"{$classe}.class.php";
    }
});

//cria selção de dados
$criteria = new Tcriteria;
$criteria->add(new Tfiter('id', '=', '3'));

//cria instrução de DELETE
$sql = new TSQlDelete;

//define a entidade
$sql->setEntity('aluno');

//define o critério de seleção de dodos
$sql->setCriteria($criteria);

//processa a instrução sql
echo $sql->getInstruction();

echo "<br.\n";

?>