<?php
// on importe le fichier config en require once car fichier important et necessaire au site on arrete le script en cas d erreur  
require_once "config.php";

// Try catch permettant de recuperer les erreurs en cas de probleme de connexion a la DB
try {


    // Creation d un variable qui contient les donnees de connection a la DB 
    $donneeDeConnexionSql = mysqli_connect(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME, DB_PORT );

    //var_dump($DonneeDeConnexionSql);
    //On definit les caractere
    mysqli_set_charset($donneeDeConnexionSql, DB_CHARSET);

// On capte les erreurs avec l objet d exexption $e et on les converti en UTF8
}catch(Exception $e){
    exit(mb_convert_encoding($e->getMessage(),'UTF-8', 'ISO-8859-1'));
}


// Creation d une requete qui va recuperer les donnees de la DB

// Variable qui contient la requete SQL 
$requeteRecupDonneesDB = "SELECT * FROM livreor";


// Variable qui envoie la requete SQL a la DB abec la connexion a la DB + la requete
// On arrete le script en cas d erreur , et affiche le message 

$recupDonneesDB = mysqli_query($donneeDeConnexionSql, $requeteRecupDonneesDB) or die("Erreur de récuperation des données de la DB");


// On met la resultante dans un tableau associatif 
$resultatRecupDB = mysqli_fetch_assoc($recupDonneesDB);
//Debugage des variables cree plus haut 
//var_dump($donneeDeConnexionSql, $requeteRecupDonneesDB, $resultatRecupDB, $recupDonneesDB);


//On traite les données recues par le formulaire avant de l envoyer dans la DB

// On verifie l'existance des variables Post envoyee par le formulaire avec un isset 

if (isset($_POST['']))


