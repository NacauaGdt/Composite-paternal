<?php

//classe Delete
//Essa classe provê meios paara manipulação de uma instrução de DELETE no BD

final class TSqlDelete extends TSqlInstruction {

    //metodo getInstruction()
    //retorna a instrução de Delete em forma de string
    
    public function getInstruction(){

        //momta a string do DELETE
        $this->sql = "DELETE FROM {$this->entity}";

        //retorna a clausula WHERE do objeto $this->criteria

        if($this->criteria) {
            if($expression){
        }
                $this->sql .= 'WHERE' . $expression;
    }

    

    return $this->sql;
}
}



?>