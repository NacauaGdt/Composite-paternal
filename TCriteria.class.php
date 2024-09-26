<?php

//Esta classe prove uma interface utilizada para definicao de criterios
class TCriteria extends TExpression{
    
    private $expressions; //lista de instrucoes
    private $operators;//lista de operadores
    private $properties;//propriedades do criterio

    //metodo construtor
    function __construct(){
       $this->expression = array();
       $this->operators = array();

    }
    
    /*
    Metodo add
    adiciona uma expressao ao criterio
    @param $espressions = expressao(objeto TExpression)
    @param $operator = operador logico de comparacao
    */

    function addOperator(TExpression $expression, $operator = self::AND_OPERATOR){
    //na primeira vez, nao precisamos de operador logico
    if(empty($this->expressions)){
        $operator = null;
    }

    //agrega o resultado da expressao à lista de expressoes
    $this->expressions[] = $expression;
    $this->operators[] = $operator;
}

//metodo dump()
//retorna a expressao final

public function dump() {
//concatena a lista de expressoes

if(count($this->expressions) > 0){
    $result = "";
    foreach($this->expressions as $i=> $expression){

        $operator = $this->operators[$i];
        $result .= $operator. $expression->dump().' ';
    }
    $result = trim($result);
    return "([$result])";
}
}

    public function setProperties($properties)
    {
        if(isset($value)){
        $this->properties[$property]= $value;
        }
        else{
            $this->properties[$property] = null;
    }

    }

    public function getProperties()
    {
        if(isset($this->properties[$property])){
        return $this->properties[$property];
    }
}
}