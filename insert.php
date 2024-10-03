<?php

// Função para o autoload das classes
spl_autoload_register(function ($classe) {
    if (file_exists("{$classe}.class.php")) {
        include_once "{$classe}.class.php";
    }
});

setlocale(LC_ALL, 'english');

// Criação de um novo objeto da classe TSqlInsert
$sql = new TSqlInsert;

// Definindo a entidade
$sql->setEntity('aluno');

// Inserindo os dados nas colunas da entidade 'aluno'
$sql->setRowData('id', 3);
$sql->setRowData('nome', 'Pedro Cardoso');
$sql->setRowData('fone', '(88) 4444-7777');
$sql->setRowData('nascimento', '1985-04-12');
$sql->setRowData('sexo', 'M');
$sql->setRowData('serie', '4');
$sql->setRowData('mensalidade', 280.40);

// Exibindo a instrução SQL gerada
echo $sql->getInstruction();

echo "<br>\n";

?>
