<?php 
include "../config/autoload.php";
include "../config/connexion.php";

$HeroesManager = new HeroesManager($connexion);
$HeroesManager -> healAllHeroes();

$FightManager = new FightsManager($connexion);
$FightManager -> healAllMonsters();

header("Location: ../index.php");

