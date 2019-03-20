<?php 

class ResponseFail extends Response 
{

    function __construct($succes, $message){

        $this->success = $success;
        $this->message = $message;

    }




}
?>