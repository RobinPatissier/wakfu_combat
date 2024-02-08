<?php
include '../config/autoload.php';
require_once '../config/connexion.php';

$HeroesManager = new HeroesManager($connexion);
$HeroesManager->heal($_POST['id_select_hero']);


header("Location: ../index.php");