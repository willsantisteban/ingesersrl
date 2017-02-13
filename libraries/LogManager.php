<?php

class LogManager 
{ 

    private $pre_name = 'log_';

    private $rootdirectorie = __DIR__;

    private $logdirectorie = "logs";

    public function __construct(){
    }

    private function openfile(){

        //get system time
        $date = new DateTime();
        //echo $date->format('Y-m-d H:i:s');
        
        $filename = $this->pre_name . $date->format('Ymd');
        
        $tmp_faile = $this->rootdirectorie .'\..\\'. $this->logdirectorie .'\\'.$filename;
        
        return fopen($tmp_faile, 'a+');
    }

    public function appendfile($domine, $message){
    
        $afile = $this->openfile();
        $date = new DateTime();
        
        //[date and time] domine - message
        $fullmessage = "[".$date->format('Y-m-d H:i:s')."] : ". $domine -'-'. $message;
        
        if (!$afile){
            fwrite($afile, $fullmessage);
        }
        
        fclose($afile);
    }
}
?>