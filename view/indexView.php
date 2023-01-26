<h2>test vue</h2>

Affichage des erreurs
<h3><?=$message?></h3>
<h3><?$messageGood?></h3>
<?php


if (empty($resultatRecupDB)): 
    ?>
    
        <h1>Pas encore d'adresse enregistrée </h1>
    <?php
        else:
    ?>
        <h2>Adresses présentes dans la database :</h2>
    <?php
        foreach ($resultatRecupDB as $item):
        
    ?>

        <?php
        endforeach;
    ?>
        <h1>Nombre d'adresses dans la database : <?=$nbUser?></h1>
    <?php
    
    endif;