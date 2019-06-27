<?php
session_start();
require("controller/Back.php");

require("controller/Front.php");

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'selectionevent') {
            getOneEvent();
            
        } elseif ($_GET['action'] == 'connexion') {
            connect();
        } elseif ($_GET['action'] == 'logger') {
            $checkPseudo = htmlspecialchars($_POST['checkPseudo']);
            $checkmdp    = $_POST['checkmdp'];
            if (isset($checkPseudo) && isset($checkmdp)) {
                
                loginAdmin($checkPseudo, $checkmdp);
                
                lastUpdate();
            }
            
        } elseif ($_GET['action'] == 'profile') {
            if ($_SESSION['id']) {
                $idUser = $_SESSION['id'];
                userProfile($idUser);
            } else {
                header('Location: ./index.php');
            }
        } elseif ($_GET['action'] == 'home') {
            if ($_SESSION['id']) {
                lastUpdate();
                
            } else {
                header('Location: ./index.php');
            }
        } elseif ($_GET['action'] == 'admintool') {
            if ($_SESSION['id']) {
                
                
                
                getShowUser();
                
                
            } else {
                header('Location: ./index.php');
            }
        } elseif ($_GET['action'] == 'userinfos') {
            if ($_SESSION['id']) {
                $idUser = $_GET['id'];
                userProfile($idUser);
            } else {
                header('Location: ./index.php');
            }
            
            
            
        } elseif ($_GET['action'] == 'gallerypicture') {
            if ($_SESSION['id']) {
                gallery();
                
                //
                
            } else {
                header('Location: ./index.php');
            }
            
        } elseif ($_GET['action'] == 'delpicture') {
            if ($_SESSION['id']) {
                
                $idPicture = $_GET['id'];
                getDelPicture($idPicture);
                
                
            } else {
                header('Location: ./index.php');
            }
            
        } elseif ($_GET['action'] == 'delfiles') {
            if ($_SESSION['id']) {
                
                $idFiles = $_GET['id'];
                getDelFiles($idFiles);
                
                
            } else {
                header('Location: ./index.php');
            }
            
        } elseif ($_GET['action'] == 'download') {
            if ($_SESSION['id']) {
                
                $idDownload = $_GET['id'];
                getDownload($idDownload);
                
                
            } else {
                header('Location: ./index.php');
            }
            
        } elseif ($_GET['action'] == 'adduser') {
            if ($_SESSION['id']) {
                
                
                
                $lastname   = htmlspecialchars($_POST['lastname']);
                $firstname  = htmlspecialchars($_POST['firstname']);
                $pseudo     = htmlspecialchars($_POST['pseudo']);
                $pass_hache = htmlspecialchars($_POST['mdp']);
                $mail       = htmlspecialchars($_POST['mail']);
                $poste      = htmlspecialchars($_POST['poste']);
                addMembers($lastname, $firstname, $pseudo, $pass_hache, $mail, $poste);
                
                //
                
            } else {
                header('Location: ./index.php');
            }
        } elseif ($_GET['action'] == 'deluser') {
            if ($_SESSION['id']) {
                $idUser = $_GET['id'];
                getDelUser($idUser);
            } else {
                header('Location: ./index.php');
            }
        } elseif ($_GET['action'] == 'uploadfiles') {
            if ($_SESSION['id']) {
                
                getuploadFiles();
            } else {
                header('Location: ./index.php');
            }
        } elseif ($_GET['action'] == 'event') {
            if ($_SESSION['id']) {
                
                getEventPage();
            } else {
                header('Location: ./index.php');
            }
        } elseif ($_GET['action'] == 'eventTool') {
            if ($_SESSION['id']) {
                
                $img_nom         = htmlspecialchars($_POST['name']);
                $img_description = htmlspecialchars($_POST['img_description']);
                $titre_event     = htmlspecialchars($_POST['eventtitre']);
                $date_event      = htmlspecialchars($_POST['eventdate']);
                $text_event      = htmlspecialchars($_POST['eventdescription']);
                
                getAddEvent();
                
                
            } else {
                header('Location: ./index.php');
            }
        } elseif ($_GET['action'] == 'delevent') {
            if ($_SESSION['id']) {
                $idEvent = $_GET['id'];
                getDeleteEvent($idEvent);
            } else {
                header('Location: ./index.php');
            }
        } elseif ($_GET['action'] == 'task') {
            if ($_SESSION['id']) {
                showAllTask();
            } else {
                header('Location: ./index.php');
            }
        } elseif ($_GET['action'] == 'addTask') {
            if ($_SESSION['id']) {
                $task       = htmlspecialchars($_POST['task']);
                $dateLimite = htmlspecialchars($_POST['limitdate']);
                
                getAddTask($task, $dateLimite);
            } else {
                header('Location: ./index.php');
            }
        } elseif ($_GET['action'] == 'deltask') {
            if ($_SESSION['id']) {
                $idTask = $_GET['id'];
                getDeleteTask($idTask, $dateTask);
            } else {
                header('Location: ./index.php');
            }
        } elseif ($_GET['action'] == 'slidertool') {
            if ($_SESSION['id']) {
                getSliderTool();
            } else {
                header('Location : ./index.php');
            }
        } elseif ($_GET['action'] == 'modifyslide') {
            if ($_SESSION['id']) {
                $img_nom    = htmlspecialchars($_POST['name']);
                $text_slide = $_POST['textslide'];
                
                getModifySlide($text_slide);
                
            } else {
                header('Location : ./index.php');
            }
        } elseif ($_GET['action'] == 'modifyinfos') {
            if ($_SESSION['id']) {
             
           
                $idInfos = $_GET['id'];      
                $titre     = htmlspecialchars($_POST['titre']);
                $textinfos = htmlspecialchars($_POST['textinfos']);
                
                
                       
            getModifyInfos($idInfos, $titre, $textinfos);
            
             
               
                
            } else {
                header('Location : ./index.php');
            }
            
        } elseif ($_GET['action'] == 'sendmail') {
            
            getShowPicture();
        }
        
        
        if ($_GET['action'] == 'logOut') { //log ou session
            session_destroy();
            header("Location:index.php");
        }
        
        
    } else {
        getShowPicture();
    }
}

catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}

?>