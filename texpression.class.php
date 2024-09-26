<?php

//Classe TExpression
//*Classe abstrata para gerenciar expressões

abstract class TExpression {
//Operadores logicos

const AND_OPERATOR = 'AND';
const OR_OPERATOR = 'OR';

//marca metodo dump como obrigatorio

abstract public function dump();

}
?>