<?php


/* Classe Select
* Essa classe provê meios para manipulação de de uma instrução de SELECT no BD
*/

final class TSqlSelect extends TSqlInstruction {

    /* Metodo getInstruction()
    * retorna a instrução de Delete em forma de String
    */
    public function getInstruction()
    {
         $column; // array de colunas a serem retornadas

       //metodo addcolumn
       //adiciona uma coluna a ser retornada pelo SELECT
       //@param $column = coluna da tabela

        function addcolumn ($column){
        $this->columns [] = $column;
       }

       //metodo getInstruction()
       //retorna a instrução de SELECT em forma de string

        function getInstruction()
       {
        // monta a instrução SQL

        $this-> sql= 'SELECT';

        //monta string com os nomes das colunas
        $this->sql .= implode(', ', $this->columns);

        //adiciona na clausula FROM o nome da tabela
        if($this->criteria){
            $expression = $this->criteria->dump();
            if($expression){
                $this->sql .= 'WHERE'.$expression;
        }

        //obtem as propriedades do criterio

        $oreder = $this->criteria->getProperty('order');
        $oreder = $this->criteria->getProperty('limit');
        $oreder = $this->criteria->getProperty('offset');
       }
}}
}
    ?>


