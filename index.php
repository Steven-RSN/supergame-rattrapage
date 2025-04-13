<?php
//CONTROLER DE LA PAGE D'ACCUEIL
include './utils/utils.php';
include './model/Model_joueurs.php';
include './manager/Manager_joueurs.php';

$listUser = '';
$message = '';

$manager = new Manager_joueurs();
$dataPlayers = $manager->getPlayers();

foreach ($dataPlayers as $player) {
    $listUser = $listUser . "<artcicle> <p> {$player['pseudo']} - {$player['email']} -{$player['score']}</p> </artcicle>";
}

if (isset($_POST['envoyer'])) {
    if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['score'])) {
    
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && filter_var($_POST['score'], FILTER_VALIDATE_INT)){
            
            $pseudo = sanitize($_POST['pseudo']);
            $email = sanitize($_POST['email']);
            $score = sanitize($_POST['score']);
            $password = sanitize($_POST['password']);

            $password = password_hash($password, PASSWORD_BCRYPT);

            $manager = new Manager_joueurs();
            $manager->setEmail($email);
            $data = $manager->getPlayerByMail();
            
            if(empty($data)){
                $manager->setPseudo($pseudo);
                $manager->setScore($score);
                $manager->setPassword($password);
                $message = $manager->addPlayer();

            }else{
                $message = "Un joueur existe déjà avec cette adresse mail";
            }

        }else{
            $message = "Le score ou l'email n'est pas au bon format, veuillez vérifier !";
        }
         

    }else{
        $message = "Merci de remplir tous les champs !";
    }
}

if(isset($_POST['submitConnect'])){
    $email = $_POST['emailConnect'];

    $bdd = connect();
    $request = $bdd->prepare("SELECT id , pseudo, psswrd, score, email FROM players WHERE email = ?");

    $request->bindParam(1, $email, PDO::PARAM_STR);
    $request->execute();
    
    $data = $request->fetchAll();

    if(empty($data)){
        echo "Utilisateur non trouvé, veuillez vous inscrire.";
    }else{
        echo "Bravo, vous êtes connecté !! :)";
    }
}

include './view/header.php';
include './view/view_accueil.php';
include './view/footer.php';

