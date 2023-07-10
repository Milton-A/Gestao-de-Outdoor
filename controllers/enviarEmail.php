<?php

class enviarEmail {
    private $emailO;
    private $emialD;
    private $message;
    
    public function __construct($emailOrigem, $emailDestino, $message) {
        $this->emailO = $emailOrigem;
        $this->emialD = $emailDestino;
        $this->message = $message;
        mail($to, $subject, $message);
    }
    
    
}