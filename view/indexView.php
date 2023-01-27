<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/captcha.css">
    <title>Formulaire</title>
</head>
<body>
    
<h2>test vue</h2>


<h1>Livre d'or</h1>
<form action="" method="POST" id="formulaire">
    <h2> Laissez-nous un message</h2>
    <div class="conteneurChampsLabelInput">
        <label for="firstname">Prénom :</label>
        <input type="text" name="firstname" placeholder="Votre prénom" autocomplete="given-name" maxlength="50">
    </div>
<br>
    <div>
        <label for="lastname">Nom : *</label>
        <input type="text" name="lastname" placeholder="Votre nom" autocomplete="family-name" maxlength="50">
    </div>
<br>
    <div>
        <label for="usermail">Adresse mail : *</label>
        <input type="email" name="usermail" placeholder="Votre adresse mail" autocomplete="email" maxlength="100" required>
    </div>
<br>
    <div>
        <label for="message">Commentaire : *</label>
        <textarea name="message" cols="50" rows="10" maxlength="600" placeholder="veuillez laissez votre commentaire ici" required>
        </textarea>

    <h5>Champs requis (*)</h5>
    </div>
    <input type="submit" id="captchaValidate" value="Envoyer">

    <div class="captcha">
        <p id="captcha"></p></br></br>
        <button id="captchaRefresh" type="button">Refresh</button>
        <input id="captchaInput" type="text" placeholder="Entrez le captcha"><span></span><br></br>
    </div>
</form>
<script src="js/captcha.js"></script>

<?php

/*<h3><?=$message?></h3>
<h3><?$messageGood?></h3>*/
if (isset($erreur)) :
    ?>
    <h4><?=$erreur?></h4>
     <?php
 elseif (isset($messageValider)) :
    ?>
    <h4><?=$messageValider?></h4>
    <?php
 endif;
if ($nbUser == 0):
?>
<h2>Pas de message précédent</h2>
<?php
elseif ($nbUser == 1):
?>
<h2>Message précédent :</h2>
<h3>Il y a un commentaire disponible</h3>
<?php
else:
?>
<h2>Messages précédents:</h2>
<h3>Il y a <?=$nbUser?> commentaires disponibles</h3>
<?php
endif;
//var_dump($_POST);
// si aucun resultat in affiche pas d adresse
if (empty($resultatRecupDB)): 
?>
    
        <h2>Pas encore de commentaire enregistré </h2>
<?php
elseif ($nbUser == 1):
    foreach ($resultatRecupDB as $item):
?>
    <h2> Un commentaire a été enregistré </h2>
    <table>
        <tr>
            <th>
                <h2>Prénom:</h2>
            </th>
            <th>
                <h2>
                    Nom:
                </h2>
            </th>
            <th>
                <h2>Adresse mail:</h2>
            </th>
            <th>
                <h2>Date:</h2>
            </th>
            <th>
                <h2>Commentaires:</h2>
            </th>
        </tr>
        <tr>
            <td>
                <h3><?=$item['firstname']?></h3>
            </td>
            <td>
                <h3> <?=$item['lastname']?></h3>
            </td>
            <td>
                <h3><?=$item['usermail']?></h3>
            </td>
            <td>
                <h3><?=nl2br($item['message'], ENT_QUOTES);?></h3>
            </td>
            <td>
                <h3><?=$item['datemessage']?></h3>
            </td>
        </tr>
    </table>
<?php
        endforeach;
    else:
// si on a plusieurs adresses dans la DB on boucle 

        foreach ($resultatRecupDB as $item):
        
?>
    
    <table>
        <tr>
            <th>
                <h2>Prénom:</h2>
            </th>
            <th>
                <h2>
                    Nom:
                </h2>
            </th>
            <th>
                <h2>Adresse mail:</h2>
            </th>
            <th>
                <h2>Date:</h2>
            </th>
            <th>
                <h2>Commentaires:</h2>
            </th>
        </tr>
        <tr>
            <td>
                <h3><?=$item['firstname']?></h3>
            </td>
            <td>
                <h3><?=$item['lastname']?></h3>
            </td>
            <td>
                <h3><a href="mailto:'.$item['usermail']'"><?=$item['usermail']?></a></h3>
            </td>
            <td>
                <h3><?=nl2br($item['message'], ENT_QUOTES);?></h3>
            </td>
            <td>
                <h3><?=date('d-m-Y H:i:s',strtotime($item['datemessage']))?></h3>
            </td>
        </tr>
    </table>
    <hr>
<?php
           
        endforeach;
    
    endif;

//var_dump($resultatRecupDB);

?>
</body>
</html>