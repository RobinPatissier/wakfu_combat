<?php
include './config/autoload.php';
require_once './config/connexion.php';
include './partials/header.php';


$FightsManager = new FightsManager($connexion);
$Monster = $FightsManager->randomMonster();

$HeroesManager = new HeroesManager($connexion);
if (isset($_POST['id_select_hero'])) {
  $hero = $HeroesManager->find($_POST['id_select_hero']);
} else {
  $hero = $HeroesManager->randomHero();
}
$HeroesManager->update($hero);
?>

<!-- AUDIO -->
<audio autoplay loop>
  <source src="./assets/audio/fight.mp3" type="audio/mp3">
</audio>

<body class="village" style="background-image: url('./assets/images/village.jpg')">

  <!-- FORMULAIRE DE RETOUR À L'INDEX -->
  <form action="./index.php" method="post">
    <div class="form-group">
      <input id="hp" type="hidden" name="hp" value="<?php $hero->getHeroHealth_points() ?>">
      <button class="btn" type="submit"> <img src="./assets/images/house(1).png" id="home"></button>
    </div>
  </form>


  <div class="d-flex flex-wrap justify-content-around combattants  container">
    <!-- afficher le nom + image + healthpoints du héros choisit -->
    <div class="card blurr cardd" style="width: 18rem;">
      <img class="ornement" src="/assets/images/<?= $hero->getHeroOrn() ?>">
      <img class="card-img-top perso" src="/assets/images/<?= $hero->getHeroPhoto() ?>">
      <div class="card-body">
        <div id="score_hero">
          <?= $hero->getHeroHealth_points() ?> 
        </div>
        <div class="progress">
          <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" 
              role="progressbar_hero" 
              aria-valuenow="<?= $hero->getHeroHealth_points() ?>" 
              aria-valuemin="-20" 
              aria-valuemax="100" 
              style="width: <?= $hero->getHeroHealth_points() ?>%"> 
            </div>
          </div>
         
      </div>
    </div>

<div id="issue" class="issue blur"></div>

    <!-- afficher le nom + image + healthpoints du monstre choisit -->
    <div class="card blurr cardd " style="width: 18rem;">
      <img class="ornement" src="/assets/images/<?= $Monster->getMonsterOrn() ?>">
      <img class="card-img-top perso" src="/assets/images/<?= $Monster->getMonsterPhoto()  ?>">
      <div class="card-body">
        <div id="score_monster">
          <?= $Monster->getMonsterHealth_points() ?>
        </div>
        <div class="progress">
          <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" 
          role="progressbar_monster" 
          aria-valuenow="<?= $Monster->getMonsterHealth_points() ?>" 
          aria-valuemin="-20" 
          aria-valuemax="100" 
          style="width: <?= $Monster->getMonsterHealth_points() ?>%"> 
          </div> 
        </div>       
      </div>
    </div>

    <input type="hidden" name="hero_id" value="<?= $hero->getHeroId() ?>">
    <input type="hidden" name="monster_id" value="<?= $Monster->getMonsterId() ?>">

    <?php
    include './partials/footer.php';
    ?>