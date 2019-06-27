<?php
require_once("manager.php");

class EventManager extends Manager
{
    public function slidePicture()
    {
        $bdd        = $this->dbConnect();
        $allPicture = $bdd->prepare('SELECT * FROM slidepictures LIMIT 0,3 ');
        $allPicture->execute();
        return $allPicture;
    }
    public function slideInfos(){
        $bdd        = $this->dbConnect();
        $allinfos = $bdd->prepare('SELECT * FROM whoarewe LIMIT 0,3 ');
        $allinfos->execute();
        return $allinfos;
        
    }
    
    public function allEvent()
    {
        $bdd       = $this->dbConnect();
        $selectOne = $bdd->prepare('SELECT * ,SUBSTR(text_event, 1, 248)as text_event FROM events');
        
        $selectOne->execute();
        
        return $selectOne;
        
    }
    public function oneEvent()
    {
        $bdd       = $this->dbConnect();
        $selectOne = $bdd->prepare('SELECT img_id, img_desc, titre_event, date_event, text_event FROM events WHERE img_id=:id  ');
        $selectOne->execute(array(
            ':id' => $_GET['id']
            
        ));
        $event = $selectOne->fetch();
        
        return $event;
        
    }
    
    
    
    
}
?>