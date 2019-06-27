<?php
require_once("./model/eventManager.php");
require_once("./model/adminManager.php");

function lastUpdate(){
    $memberManager = new membersManager();
    $infosUser = $memberManager-> userAll();
        
    $showTask = new membersManager();
    $allTask = $memberManager -> showTasks();
  
	require("./view/pages/admin/adminPage.php");
}
//-------------VIEW------------------
function connect(){
    require("./view/pages/connexion.php");
}
function adminPage(){
     require('./view/pages/admin/adminPage.php');
   
}
//--------------LOGIN------------------
function loginAdmin($checkPseudo,$checkmdp){
	$memberManager= new membersManager();
	$userLogin= $memberManager->checkInfo($checkPseudo,$checkmdp);
    
    header('Location:./index.php?action=home');

}
//------------ADMIN TOOLS--------------
function userProfile($idUser){
    $memberManager = new membersManager();
    $infosProfile = $memberManager-> userInfos($idUser);
    require('./view/pages/admin/userProfile.php');
}
function getShowUser(){
    $memberManager = new membersManager();
    $infosUser = $memberManager-> userAll();
    
    

    require('./view/pages/admin/adminTools.php');
}

function addMembers(){
    $memberManager= new membersManager();
                $lastname = htmlspecialchars($_POST['lastname']);
                $firstname  = htmlspecialchars($_POST['firstname']);
                $pseudo = htmlspecialchars($_POST['pseudo']);
                $pass_hache = htmlspecialchars($_POST['mdp']);
                $mail = htmlspecialchars($_POST['mail']);
                $poste  = htmlspecialchars($_POST['poste']);
    $userAdd = $memberManager -> addUser($idMembers, $lastname, $firstname, $pseudo, $pass_hache, $mail, $poste);
    
    $infosUser = $memberManager-> userAll();
    header('./view/pages/admin/adminTools.php');
}
function getDelUser($idUser){
    $memberManager = new membersManager();
    $infosUser = $memberManager-> delUser($idUser);
    
    header('Location: ./index.php?action=admintool');
    
}
function getuploadFiles(){
    $memberManager = new membersManager();
    $uploadPictures = $memberManager-> uploadFiles();
   
    header('Location: ./index.php?action=admintool');
}
//-------------------ADMIN TOOL END-----------------------

//-----------GALERYPICTURE--------------
function gallery(){
    $membersManager = new membersManager();
    $showGallery = $membersManager->galleryPicture();
    
     
    $showFiles = $membersManager->showFiles();
    
    require('./view/pages/admin/gallery.php');
}
function getDelPicture($idPicture){
    $membersManager = new membersManager();
    $showGallery = $membersManager->delPicture($idPicture);
    header('Location: ./index.php?action=gallerypicture');
}
function getDelFiles($idFiles){
       $membersManager = new membersManager();
    $showGallery = $membersManager->delFiles($idFiles);
    header('Location: ./index.php?action=gallerypicture');
}
function getDownload($idDownload){
    
    $membersManager = new membersManager();
    $download = $membersManager->download($idDownload);
    
     
        
    header('Location: ./index.php?action=gallerypicture');
}
//-------------EVENT-----------------
function getEventPage(){
       $callEvent= new EventManager();

   
    $Events=$callEvent->allEvent();
    require('./view/pages/admin/eventTool.php');;
}
function getAddEvent(){
    $membersManager = new membersManager();
 
    $upload = $membersManager-> addEvent(); 
    
    
    
    
    if($upload == false){
        
        throw new Exception('Impossible d\'ajouter levenemnt !');
    }
    else {
        header('Location: index.php?action=eventTool');
    }
    
    require('./view/pages/admin/eventTool.php');
}
function getDeleteEvent($idEvent){
    $membersManager = new membersManager();
 
    $delEvent = $membersManager-> DeleteEvent($idEvent);
    
    header('Location: ./index.php?action=event');
}
//-------------TASK------------------------

function showAllTask(){
    $memberManager = new membersManager();
    $allTask = $memberManager -> showTasks();
    require('./view/pages/admin/adminTask.php');
}
function getAddTask($task, $dateLimite  ){
    $memberManager = new membersManager();
    $allTask = $memberManager -> addTask($task, $dateLimite);

    header('Location: ./index.php?action=task');
    
}
function getDeleteTask($idTask, $dateTask){
    $memberManager = new membersManager();
    $allTask = $memberManager -> deleteTask($idTask , $dateTask);
    
    header('Location: ./index.php?action=task');
}
//----------------SLIDERTOOL---------------------
function getSliderTool(){

    
    $callEvent = new EventManager();
    $showOnePicture=$callEvent-> slidePicture();
    
    $showOneInfos=$callEvent-> slideInfos();
    
    
    require('./view/pages/admin/adminSlider.php');
}
function getModifySlide($text_slide){
    $memberManager = new membersManager();
    $modifSlider= $memberManager -> modifySlide($text_slide);
    
    
    require('./view/pages/admin/editSlider.php');
    
    
}
function getModifyInfos($idInfos, $titre, $textinfos){
    $memberManager = new membersManager();
    
    $modifInfos= $memberManager -> modifInfos($idInfos, $titre, $textinfos);

    
    require('./view/pages/admin/editWhoAreWe.php');
}

?>