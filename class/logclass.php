
<?php


class log{
    private $fp;     //id du ficher 

    function __construct($path)
    {
        $this->fp=fopen($path,'a');    //path (/./././nomficher)
    }

    function __destruct()
    {
        fclose($this->fp);
    }

    function writeLog($string)
    {
        fwrite($this->fp,$string);
    }

    static function directWriteLog($path,$string)
    {
        $fp =fopen($path,'a');
        $string = date('d/m/Y H:i:s') . " ; " . $string . "  \n";
        fwrite($fp,$string);
    }
}

?>