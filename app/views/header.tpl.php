<?php 
// Pour voir tous les fichiers qui ont été inclus/required
//dump(get_included_files());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap, CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=$_SERVER['BASE_URI']?>/assets/css/style.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
     
    <title>Compagny</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-inverse navbar-dark bg-dark">
 <!-- Navbar content --> 
        <a class="navbar-brand" href="<?=$_SERVER['BASE_URI']?>">Compagny</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?=$_SERVER['BASE_URI']?>/annexe">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=$_SERVER['BASE_URI']?>/hives">Ruches<span class="badge badge-danger ml-1"><?= $viewVars['nb_hives']; ?></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=$_SERVER['BASE_URI']?>/infos">Informations</a>
            </li>
            </ul>
            <span class="navbar-text">
            Déconnexion
            </span>
        </div>
    </nav>

    <main class="container">
    
