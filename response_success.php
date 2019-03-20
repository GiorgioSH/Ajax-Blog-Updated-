<?php 

class ResponseSuccess extends Response 
{

public $object ; 



    function __construct($success, $message, $object){

        parent::__construct($success,$message);
        $this->object = $object;
        
    }


}



?>