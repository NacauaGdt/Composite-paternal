<?php

//Essa classe prove ,eios para manipulacao de uma instrucao UPDATE nos bancos de dados

final class TSqlUpdate extends TSqlInstruction {

    private $columnValues; 
    ///Método setRowData() 
    //Atribul valores a determiadas colunas no banco de dados que serão modificacados
    //@param $column coluna da tabela
    //@param $value valor a ser armazenado

    public function setRowData($column, $value) {

        if (is_scalar($value)) { //verifica se um eh escalar (string, inteiro)

        if(is_string($value) and (!empty($value))) { //caso seja uma string
            //adiciona \ em aspas
            $value = addslashes($value);
            
            
            $this->columnValues[$column] = "'$value'";
        }
        else if(is_bool($value)) {  //caso seja um booleano

            $this->columnValues[$column] = $value ? 'TRUE': 'FALSE';

        }
          else if($value!==''){ //caso seja um tipo de dado
            
            $this->columnValues[$column] = $value;
          }
          else  //caso seja NULL
      {
        $this->columnValues[$column] = "NULL";
      }
    }
}

    //metodo getInstruction()
    //retorna a instrucao UPDATE em forma de string
    public function getInstruction(){ //monta a string UPDATE

        $this->sql = "UPDATE {$this->entity}";

        //monta os pares: coluna = valor
        if($this->columnValues){
            foreach($this->columnValues as $column=>$value){
                //AVISO: TIRAR O CIFRAO QUALQUER COISA
                $set[] = "{$column} = {$value}";
        }
    }
    $this->sql .= 'SET' . implode(', ', $set) .')';

    // retorna a clausula where do objeto $this->criteria
    if($this->criteria){
        $this->sql .= 'WHERE'.$this->criteria->dump();
    }

    return $this->sql;
}

}

?>