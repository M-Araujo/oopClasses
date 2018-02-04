<?php

class Log {
    
    private $info;
    private $date;
    private $time;
    private $file = 'logs.txt';
    
    public function __construct($info){
        $this->time = time();
        $this->info = $info;    
        $this->date = date("Y-m-d H:i:s",$this->time);

        $file = fopen($this->file, "a");
        $txt = $this->date .' : '.$this->info;
        fwrite($file, $txt."\n");

        fclose($file);
    }
}