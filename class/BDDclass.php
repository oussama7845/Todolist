<?php
require_once('class/logclass.php');
class BDD{

private $connexion;

public function __construct($server,$DBnom,$user,$password)
{
    try{
        

      $this->connexion = new PDO("mysql:host=".$server.";dbname=".$DBnom,$user,$password);

    }catch (PDOException $e) {
            Log::directWriteLog("./Logs/LogPDO.txt",$e->getMessage());
        } catch(Exception $e){
            Log::directWriteLog("./Logs/LogPDO.txt",$e->getMessage());
        }


    }


function selectQuery($sql,$param=null){
    $conn = $this->connexion;
    try{
        
        $res = $conn->prepare($sql); //pour savoir si y-a une ? 
        $res->execute($param);    //execute remplace le ? par l'attribut
        $data=$res->fetchAll(PDO::FETCH_ASSOC);
       
        return $data;    

    }catch(PDOException $e){
        Log::directWriteLog("./Logs/LogPDO.txt",$e->getMessage());
        die();
    }catch(Exception $e){
        Log::directWriteLog("./Logs/LogStandard.txt",$e->getMessage());
        die();
    }
}

function nonselectquery($sql,$param=null){
    $conn=$this->connexion;
    try{
        $res=$conn->prepare($sql);
        $res->execute($param);

    }catch(PDOException $e){
        Log::directWriteLog("./Logs/LogPDO.txt",$e->getMessage());
        die();
    }catch(Exception $e){
        Log::directWriteLog("./Logs/LogStandard.txt",$e->getMessage());
        die();
    }
}





    public function __destruct()
{
    $this->connexion=null;
}
    
}








?>