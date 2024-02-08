<?php

include "../config/autoload.php";
include "../config/connexion.php";


if (!empty($_POST['hero_id']) && (!empty($_POST['monster_id']))) {
    //  Chercher le héros
    $heroManager = new HeroesManager($connexion);
    $hero = $heroManager->find($_POST['hero_id']);

    //  Chercher le monstre
    $fightManager = new FightsManager($connexion);
    $Monster = $fightManager->find($_POST['monster_id']);

    // Lance le fight Ajax
    $result =  $fightManager->fightAjax($hero, $Monster);

    //update monstre et heros
    $heroManager->update($hero);
    $fightManager->update($Monster);

    echo json_encode(
        [
            'hero'=> $hero->toArray(),
            'monster'=> $Monster->toArray(),
            'results' => $result
        ]
    );
}
