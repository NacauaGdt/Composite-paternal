<?php  

/*
* classe Tfilter
* esta classe provê a interface para definição de filtros de seleção
*/

class Tfilter extends TExpression {
    private $variable; // variável
    private $operator; // operador
    private $value; // valor

    /*
    * método __construct()
    * instancia um novo filtro
    * @param $variable = variável
    * @param $operator = operador (>, <)
    * @param $value = valor a ser comparado
    */
    public function __construct($variable, $operator, $value) {
        $this->variable = $variable;
        $this->operator = $operator;
        // transforma o valor de acordo com certas regras antes de atribuir à propriedade $this->value
        $this->value = $this->transform($value);
    }

    /*
    * método transform()
    * recebe um valor e faz as modificações necessárias
    * para ele ser implementado pelo banco de dados
    * podendo ser um integer/string/boolean ou array
    * @param $value = valor a ser transformado
    */
    private function transform($value) {
        // caso seja um array
        if (is_array($value)) {
            // percorre os valores 
            foreach ($value as $x) {
                // se for um inteiro 
                if (is_integer($x)) {
                    $foo[] = $x;
                } else if (is_string($x)) {
                    // se for string adiciona aspas
                    $foo[] = "'$x'";
                }
            }
            // converte o array em string separada por ","
            return '('.implode(',', $foo).')';
        } else if (is_string($value)) { 
            // adiciona aspas
            return "'$value'";
        } else if (is_null($value)) {
            // armazena nulo 
            return 'NULL';
        } else if (is_bool($value)) {
            // armazena TRUE ou FALSE
            return $value ? 'TRUE' : 'FALSE';
        } else {
            return $value; // retorna o valor original se não for nenhum dos anteriores
        }
    }

    /*
    * método dump()
    * retorna o filtro em forma de expressão
    */
    public function dump() {
        // concatena a expressão e retorna corretamente a variável value
        return "{$this->variable} {$this->operator} {$this->value}";
    }
}

?>