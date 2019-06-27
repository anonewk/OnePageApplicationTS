<?php
require_once("./model/eventManager.php");


//-----------------VIEW-------------------------
function getShowPage(){
    require('./view/pages/template.php');
}

function getShowPicture(){
    $callEvent = new EventManager();
    $showOnePicture=$callEvent-> slidePicture();
    
   
    $callEvent= new EventManager();
    $Events=$callEvent->allEvent();
    
    
    require("./view/pages/onepageone.php");
    	
}

/*------------------EVENT-----------------------*/


function getOneEvent(){
	$callEvent= new EventManager();
	$pickOneEvent=$callEvent->oneEvent();
    
	require("./view/pages/eventpage.php");
}

?>