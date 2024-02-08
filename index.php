<?php
include './config/autoload.php';
require_once './config/connexion.php';
include './partials/header.php';

$HeroesManager = new HeroesManager($connexion);
$hero1 = $HeroesManager->find(10);
$hero2 = $HeroesManager->find(11);
$hero3 = $HeroesManager->find(12);

$FightsManager = new FightsManager($connexion);
$aliveMonsters = $FightsManager->victory();
// var_dump($aliveMonsters);

if (empty($aliveMonsters)){
    echo "<a href ='./victory.php' title='Victory'><img src='./assets/images/victoire.png' class='fin'></a>";
} else if (!empty($aliveMonsters)){
    echo "";
}

if (empty($aliveMonsters)){
    echo "<a href ='./process/healAll.php' title='Reset'><img src='./assets/images/reset.png'  class='fin'></a>";
} else if (!empty($aliveMonsters)){
    echo ""; 
}
?>

<!-- AUDIO -->
<audio autoplay loop>
  <source src="./assets/audio/Astrub.mp3" type="audio/mp3">
</audio>

<body class="poire" style="background-image: url('./assets/images/poire.jpg')">


    <!-- IMAGE LOGO -->
    <img src="./assets/images/Wakfu_Logo.png" class="logo">

    <div class="d-flex flex-wrap heros row justify-content-around mb-5">

        <!-- CARTE SELECTIONNER UN HEROS ALEATOIRE -->
        <div class="card col-3 blur" style="width: 18rem;">
            <img class="card-img-top picto_aide" src="./assets/images/picto_aide.png" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Aléatoire</h5>
                <p class="card-text">
                <div class="text-center">
                    ??
                </div>
                </p>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"> ? </div>
                </div>
                <!-- EPEE -->
                <form action="./fight.php" method="post" class="form">
                    <button class="btn mt-2 bouton" type="submit" title="Fight"> <img src="./assets/images/swords.png" id="swords"> </button>
                </form>
                </p>
            </div>
        </div>

        <!-- CARTE SELECTIONNER UN HEROS PINPIN -->
        <div class="card col-3 blur" style="width: 18rem;">
            <img class="card-img-top pinpin" src="./assets/images/tristepin.png" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?= $hero1->getHeroName() ?></h5>
                <p class="card-text">
                <div class="text-center">
                    <?= $hero1->getHeroHealth_points() ?>
                </div>
                </p>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" 
                    role="progressbar" aria-valuenow="<?= $hero1->getHeroHealth_points() ?>" 
                    aria-valuemin="0" 
                    aria-valuemax="100" 
                    style="width: <?= $hero1->getHeroHealth_points() ?>%"></div>
                </div>
                <div id="form">
                    <!-- EPEE -->
                    <form action="./fight.php" method="post" class="form">
                        <input id="id_select_hero" type="hidden" name="id_select_hero" value="10">
                        <button class="btn mt-2 bouton" type="submit" title="Fight"> <img src="./assets/images/swords.png" id="swords"> </button>
                    </form>
                    <!-- HEAL -->
                    <form action="./process/heal.php" method="post" class="form">
                        <input id="id_select_hero" type="hidden" name="id_select_hero" value="10">
                        <button class="btn mt-2 bouton" type="submit" title="Heal"> <img src="./assets/images/heal.png" id="heal"> </button>
                    </form>
                    <!-- BOOST -->
                    <form action="./process/boost.php" method="post" class="form">
                        <input id="id_select_hero" type="hidden" name="id_select_hero" value="10">
                        <button class="btn mt-2 bouton" type="submit" title="Boost + 50"> <img src="./assets/images/egg.png" id="boost"> </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- CARTE SELECTIONNER UN HEROS EVE -->
        <div class="card col-3 blur" style="width: 18rem;">
            <img class="card-img-top eve" src="./assets/images/eve.png" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?= $hero2->getHeroName() ?></h5>
                <p class="card-text">
                <div class="text-center">
                    <?= $hero2->getHeroHealth_points() ?>
                </div>
                </p>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" 
                    role="progressbar" 
                    aria-valuenow="<?= $hero2->getHeroHealth_points() ?>" 
                    aria-valuemin="-20" aria-valuemax="100" 
                    style="width: <?= $hero2->getHeroHealth_points() ?>%"></div>
                </div>
                <div id="form">
                    <!-- EPEE -->
                    <form action="./fight.php" method="post" class="form">
                        <input id="id_select_hero" type="hidden" name="id_select_hero" value="11">
                        <button class="btn mt-2 bouton" type="submit" title="Fight"> <img src="./assets/images/swords.png" id="swords"> </button>
                    </form>
                    <!-- HEAL -->
                    <form action="./process/heal.php" method="post" class="form">
                        <input id="id_select_hero" type="hidden" name="id_select_hero" value="11">
                        <button class="btn mt-2 bouton" type="submit" title="Heal"> <img src="./assets/images/heal.png" id="heal"> </button>
                    </form>
                    <!-- BOOST -->
                    <form action="./process/boost.php" method="post" class="form">
                        <input id="id_select_hero" type="hidden" name="id_select_hero" value="11">
                        <button class="btn mt-2 bouton" type="submit" title="Boost + 50"> <img src="./assets/images/egg.png" id="boost"> </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- CARTE SELECTIONNER UN HEROS YUGO -->
        <div class="card col-3 blur" style="width: 18rem;">
            <img class="card-img-top yugo" src="./assets/images/yugo.png" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?= $hero3->getHeroName() ?></h5>
                <p class="card-text">
                <div class="text-center">
                    <?= $hero3->getHeroHealth_points() ?>
                </div>
                </p>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" 
                    role="progressbar" 
                    aria-valuenow="<?= $hero3->getHeroHealth_points() ?>" 
                    aria-valuemin="0" 
                    aria-valuemax="100" 
                    style="width: <?= $hero3->getHeroHealth_points() ?>%"> </div>
                </div>
                <div id="form">
                    <!-- EPEE -->
                    <form action="./fight.php" method="post" class="form">
                        <input id="id_select_hero" type="hidden" name="id_select_hero" value="12">
                        <button class="btn mt-2 bouton" type="submit" title="Fight"> <img src="./assets/images/swords.png" id="swords"> </button>
                    </form>
                    <!-- HEAL -->
                    <form action="./process/heal.php" method="post" class="form">
                        <input id="id_select_hero" type="hidden" name="id_select_hero" value="12">
                        <button class="btn mt-2 bouton" type="submit" title="Heal"> <img src="./assets/images/heal.png" id="heal"> </button>
                    </form>
                    <!-- BOOST -->
                    <form action="./process/boost.php" method="post" class="form">
                        <input id="id_select_hero" type="hidden" name="id_select_hero" value="12">
                        <button class="btn mt-2 bouton" type="submit" title="Boost + 50"> <img src="./assets/images/egg.png" id="boost"> </button>
                    </form>
                </div>
            </div>
        </div>

        <?php
        include './partials/footer.php';
        ?>