<!-- VUE DE LA PAGE D'ACCUEIL -->
 <form action="" method="POST">
    
    <input type="text" name='pseudo' placeholder="entrez votre pseudo" required>
    <input type="email" name="email" placeholder="entrez votre email" required>
    <input type="number" name="score" placeholder="entrez votre score" required>
    <input type="password" name="password" placeholder="entrez votre mot de passe" required>
    <input type="submit" name="envoyer">
</form>

<form action="" method="POST">
    <input type="email" name="emailConnect" placeholder="entrez votre Email" required>
    <input type="password" name="passwordConnect" placeholder="entrez votre Mot de Passe" required>
    <input type="submit" name="submitConnect">
 </form>

<p><?php
    echo $message;
?>
</p>
<section>
<?php
    var_dump( $listUser);
?>
</section>