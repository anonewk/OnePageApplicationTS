<?php
require_once("manager.php");

class membersManager extends Manager
{
    public function checkInfo($checkPseudo, $checkmdp)
    {
        
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, mdp FROM members WHERE pseudo = :pseudo');
        $req->execute(array(
            'pseudo' => $checkPseudo
        ));
        $resultat          = $req->fetch();
        $isPasswordCorrect = password_verify($checkmdp, $resultat['mdp']);
        if (!$resultat) {
            echo 'Mauvais identifiant ou mot de passe !';
            header("Location:./index.php");
        } else {
            if ($isPasswordCorrect) {
                $_SESSION['id']     = $resultat['id'];
                $_SESSION['pseudo'] = $checkPseudo;
            } else {
                echo 'Mauvais identifiant ou mot de passe !';
            }
        }
    }
    public function userInfos($idUser)
    {
        $bdd   = $this->dbConnect();
        $infos = $bdd->prepare('SELECT id, lastname, firstname, pseudo, mail, poste FROM members where id=:id');
        $infos->execute(array(
            ':id' => $idUser
        ));
        
        return $infos;
    }
    public function userAll()
    {
       
    
        $bdd        = $this->dbConnect();
         $page = 1;
        $nombreDeMessagesParPage =10;
        $premierMessageAafficher = ($page - 1) * $nombreDeMessagesParPage;
       
        $infosUser = $bdd->prepare('SELECT id, lastname, firstname, pseudo, mail, poste FROM members LIMIT '.$premierMessageAafficher.' , '.$nombreDeMessagesParPage.'');
      
        $infosUser->execute();
        return $infosUser;
    }

    public function addUser($idMembers, $lastname, $firstname, $pseudo, $pass_hache, $mail, $poste)
    {
        $bdd        = $this->dbConnect();
        $checkUser  = $bdd->prepare('INSERT INTO members(id, lastname, firstname, pseudo, mdp, mail, poste ) VALUE (:id, :lastname, :firstname, :pseudo, :mdp, :mail, :poste) ');
        $pass_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
        $checkUser->execute(array(
            'id' => $idMembers,
            'lastname' => $lastname,
            'firstname' => $firstname,
            'pseudo' => $pseudo,
            'mdp' => $pass_hache,
            'mail' => $mail,
            'poste' => $poste
        ));
        
        if ($checkUser == TRUE) {
            
            header('Location: ./index.php?action=admintool');
            
        }
        
        // S'il n'y a pas d'inscription en cours alors on affiche le formulaire
        
        
        
        return $checkUser;
        // On rend inoffensif les données de l'utilisateur
        
        
        
    }
    public function delUser($idUser)
    {
        $bdd     = $this->dbConnect();
        $delUser = $bdd->prepare('DELETE FROM members WHERE id=:id');
        $delUser->execute(array(
            ':id' => $idUser
        ));
        
        
        return $delUser;
        
    }
    public function uploadFiles()
    {
        $img_nom         =  $_FILES['fichier']['name'];
        $img_taille      = $_FILES['fichier']['size'];
        $img_type        = $_FILES['fichier']['type'];
        $files_tmp_name  = $_FILES['fichier']['tmp_name'];
        $img_dest   = './view/files/' . $img_nom ;
 
    
        $uploadOk = 1;
        // Check if image file is a actual image or fake image
        if(isset($_POST['submit'])){
            $check = getimagesize($files_tmp_name);
            if($check !== false){
                echo 'Le fichier est une image '.$check['mime'].'.';
                $uploadOk = 1;
            }else{
                echo 'le fichier n\'est pas une image';
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        
//         Taille du fichier
        if($img_taille > 1000000000){
            echo "le fichier est trop grand, taille max : 100mb";
            $uploadOk = 0;
        }
    
        if($uploadOk = 0){
            echo "le fichier n'a pas été upload";
        }else{
            
            if(move_uploaded_file($_FILES['fichier']['tmp_name'], $img_dest)){
                $bdd=$this->dbConnect();
                    $files= $bdd->prepare('INSERT INTO files (img_nom, img_taille, img_type, img_desc) VALUE(?, ?, ?,? )');
                    $files->execute(array(
                        $img_nom,
                        $img_taille,
                        $img_type,
                        $img_dest,
                      
                        ));
                    
                         header('Location: ./index.php?action=event');
                    
                
            }else{
                echo "il y'a une erreur dans l'upload";
            }
            
        }
        return $files;
        
    }
    public function showFiles(){
        $bdd=$this->dbConnect();
        $files= $bdd->prepare('SELECT img_id, img_nom, img_desc FROM files');
        
        $files->execute();
        
        return $files;
    }
    public function addEvent()
    {
        $img_nom         = htmlspecialchars($_POST['name']);
        $img_dest   = './view/eventspicture/' . $img_nom;
        $img_description = htmlspecialchars($_POST['img_description']);
        $img_taille      = $_FILES['fichier']['size'];
        $extensions_autorize = array('.png' , 'jpg', '.PNG', '.JPG' );
        $files_extension = strrchr($img_nom, "." );
        $img_type        = $_FILES['fichier']['type'];
        $titre_event     = htmlspecialchars($_POST['eventtitre']);
        $date_event      = htmlspecialchars($_POST['eventdate']);
        $text_event      = nl2br($_POST['eventdescription']);
        $files_tmp_name  = $_FILES['fichier']['tmp_name'];
        $extensions_autorize = array('.png' , 'jpg', '.PNG', '.JPG' );
 
    
        $uploadOk = 1;
        // Check if image file is a actual image or fake image
        if(isset($_POST['submit'])){
            $check = getimagesize($files_tmp_name);
            if($check !== false){
                echo 'Le fichier est une image '.$check['mime'].'.';
                $uploadOk = 1;
            }else{
                echo 'le fichier n\'est pas une image';
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if(file_exists($img_dest)){
            echo "l'image existe déjà";
            $uploadOk = 0;
        }
//         Taille du fichier
        if($img_taille > 1000000000){
            echo "l'image est trop grande, taille max : 100mb";
            $uploadOk = 0;
        }
        //Format du fichier
        if($img_type != "jpg" and $img_type != ".png"){
            echo "le fichier n'est pas au format jpg, png, jpeg ou gif";
            $uploadOk = 0;
        }
        if($uploadOk = 0){
            echo "le fichier n'a pas été upload";
        }else{
            
            if(move_uploaded_file($_FILES['fichier']['tmp_name'], $img_dest)){
                $bdd=$this->dbConnect();
                    $picture= $bdd->prepare('INSERT INTO events (img_nom, img_taille, img_type,img_description, img_desc, titre_event, date_event, text_event) VALUE(?, ?, ?,? , ?, ?, ?, ?)');
                    $picture->execute(array(
                        $img_nom,
                        $img_taille,
                        $img_type,
                        $img_description, 
                        $img_dest,
                        $titre_event,
                        $date_event,
                        $text_event
                        ));
                    
                         echo "le fichier" .$img_dest .'a bien été upload';
                    header('Location: ./index.php?action=event');
                
            }else{
                echo "il y'a une erreur dans l'upload";
            }
            
        }
        
    }
    public function DeleteEvent($idEvent){
        $bdd        = $this->dbConnect();
        $delEvent = $bdd->prepare('DELETE FROM events WHERE img_id=:id');
        $delEvent->execute(array(
            ':id' => $idEvent
        ));
        
        
        return $delEvent;
        
    }
    public function galleryPicture()
    {
        $bdd        = $this->dbConnect();
        $allPicture = $bdd->query('SELECT img_id, img_nom, img_desc FROM events');
        
        return $allPicture;
        
    }
    public function delPicture($idPicture)
    {
        $bdd        = $this->dbConnect();
        $delPicture = $bdd->prepare('DELETE FROM events WHERE img_id=:id');
        $delPicture->execute(array(
            ':id' => $idPicture
        ));
        
        
        return $delPicture;
    }
    public function delFiles($idFiles)
    {
        $bdd        = $this->dbConnect();
        $delFiles = $bdd->prepare('DELETE FROM files WHERE img_id=:id');
        $delFiles->execute(array(
            ':id' => $idFiles
        ));
        
        
        return $delFiles;
    }
    public function download($idDownload){
        $bdd        = $this->dbConnect();
        $download = $bdd->prepare('SELECT * FROM events WHERE img_id=img_id');
        $data =$download->fetch();
        $img_nom =$data['img_nom'];
        $img_taille =$data['img_taille'];
        $img_type =$data['img_type'];
        $img_desc =$data['img_desc'];
        
        $download->execute(array(
            'img_id' => $idDownload,
            'img_nom' => $img_nom,
            'img_taille' => $img_taille,
            'img_type' => $img_type,
            'img_desc' => $img_desc
            
            
        
        ));
        
        
        var_dump($idDownload);
        var_dump($data['img_nom']);
        die();
                   
        
        


        
        return $download;
    }
    public function showTasks()
    {
        $bdd  = $this->dbConnect();
        $show = $bdd->query('SELECT id, task, date_limite FROM task ORDER BY date_limite DESC');
        
        return $show;
    }
//        public function addTask($task, $dateLimite)
//    {
//        $bdd      = $this->dbConnect();
//        $editTask = $bdd->prepare('INSERT INTO task(task, date_limite) VALUE(?, ?)');
//        $editTask->execute(array(
//            $task,
//            $dateLimite,
//            
//            
//        ));
//        
//        return $editTask;
//    }
    public function addTask($task, $dateLimite)
    {
         
        $bdd      = $this->dbConnect();
        $editTask = $bdd->prepare('INSERT INTO task(task, date_limite) SELECT(:task, :date_limite) FROM task INNERT JOIN members WHERE  members.pseudo IN :pseudo');
    
        $editTask->execute(array(
            ':task'=>$task,
            ':date_limite'=>$dateLimite,
            ':pseudo' =>    $_SESSION['pseudo']
                    
    
            
        ));
        
        return $editTask;
    }
    public function deleteTask($idTask, $dateTask)
    {
        $bdd     = $this->dbConnect();
        $delTask = $bdd->prepare('DELETE FROM task WHERE id=:id AND date_limite  < CURDATE()');
        $delTask->execute(array(
            ':id' => $idTask,
            ':date_limite'=> $dateTask
        ));
        
        return $delTask;
    }
    public function modifySlide($text_slide)
    {
        $img_nom         = htmlspecialchars($_POST['name']);
        $img_dest   = './view/fileslider/' . $img_nom;
        $img_taille      = $_FILES['fileToUpload']['size'];
        $extensions_autorize = array('.png' , 'jpg', '.PNG', '.JPG' );
        $files_extension = strrchr($img_nom, "." );
        $img_type        = $_FILES['fileToUpload']['type'];
        $text_slide      = $_POST['textslide'];
        $files_tmp_name  = $_FILES['fileToUpload']['tmp_name'];
        
    
        $uploadOk = 1;
        // Check if image file is a actual image or fake image
        if(isset($_POST['submit'])){
            $check = getimagesize($files_tmp_name);
            if($check !== false){
                echo 'Le fichier est une image '.$check['mime'].'.';
                $uploadOk = 1;
            }else{
                echo 'le fichier n\'est pas une image';
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if(file_exists($img_dest)){
            echo "l'image existe déjà";
            $uploadOk = 0;
        }
//         Taille du fichier
        if($img_taille > 1000000000){
            echo "l'image est trop grande, taille max : 100mb";
            $uploadOk = 0;
        }
        //Format du fichier
        if($img_type != "jpg" and $img_type != ".png"){
            echo "le fichier n'est pas au format jpg, png, jpeg ou gif";
            $uploadOk = 0;
        }
        if($uploadOk = 0){
            echo "le fichier n'a pas été upload";
        }else{
        
            if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $img_dest)){
                $bdd=$this->dbConnect();
                     $slider = $bdd->prepare('UPDATE slidepictures SET img_id=:img_id,img_nom=:img_nom, img_taille=:img_taille,img_type=:img_type, img_desc=:img_desc, textslide=:textslide WHERE img_id=:img_id');
                $img_id = "";
                    $slider->execute(array(
                        ':img_id' =>$img_id,
                        ':img_nom' =>$img_nom,
                        ':img_taille'=>$img_taille,
                        ':img_type'=>$img_type,
                        ':img_desc'=>$img_dest,
                        ':textslide'=>$text_slide
                        ));
                        
                         echo "le fichier" .$img_dest .'a bien été upload';
//                    header('Location: ./index.php?action=slidertool');
//                
            }else{
                echo "il y'a une erreur dans l'upload";
                
            }
            
        }
            

    }

        public function modifInfos($idInfos, $titre, $textinfos )
    {
        $bdd     = $this->dbConnect();
        $allInfos = $bdd->prepare('UPDATE whoarewe SET titre=:titre, textinfos=:textinfos WHERE id=:id');   
        $allInfos->execute(array(
            ':id' => $idInfos,
            ':titre'=> $titre,
            ':textinfos'=> $textinfos

            
        ));
        
        return $allInfos;
    }
    
}


//end class membersManager();