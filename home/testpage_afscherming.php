<?php

// ---begin afscherming niet-ingelogte ---
// deze code is overbodig als er al wordt afgeschermd voor niet-cursisten 

    include '../beheer/account/functions.php';
    session_start();
    $gebruikersnaam = $_SESSION['user'];

    if(!isset($gebruikersnaam)){
        header("location: ../account/login.php"); //evt aanpassen zodat gebruiker correct naar login wordt gestuurd.

    }

// --- eind afscherming niet-ingelogte --- 


// ---- Begin afscherming voor niet-cursisten---- 
// Code om mensen de toegang te ontzeggen die niet zijn ingelogd en de cursus hebben aangeschaft 

include "../beheer/afscherming.php";

// invullen bij welke cursus deze page hoort
$dezecursus = "[Reactieve honden]"; 

// controleren of de gebruiker ingelogt is en de juiste cursus heeft
$magBekijken = magBekijken($dezecursus);

// wegsturen als gebruiker geen toegang heeft tot de pagina 
if (!$magBekijken == 1){
    header("location: ../account/login.php"); //evt aanpassen zodat gebruiker correct naar login wordt gestuurd.
}

// ---- Eind afscherming niet cursisten ----



// Hieronder kan code wat alleen zichtbaar moet zijn voor mensen met WEL de cursus 
if ($magBekijken == 1){
}

// bijv in een html: 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1> Een titel voor iedereen </h1>

<!-- alleen voor mensen met de cursus -->
<?php if ($magBekijken == 1){ ?>
    <h4> Dit mogen alleen hele speciale mensen zien </h4>
    <?php }?>

<!-- of andersom: alleen voor de mensen zonder cursus -->
<?php if (!$magBekijken == 1){ ?>
    <h4> Dit is voor mensen zonder cursus, bijv een slotje over de cursus </h4>
    <?php }?>
    
</body>
</html>


