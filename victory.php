<?php
include './config/autoload.php';
require_once './config/connexion.php';
include './partials/header.php';

$HeroesManager = new HeroesManager($connexion);
$hero = $HeroesManager->findAlive();

?> 
<!-- AUDIO -->
<audio autoplay loop>
  <source src="./assets/audio/Victoire.mp3" type="audio/mp3">
</audio>

<div class="">
    
<!-- RETOUR À L'INDEX -->
      <button class="btn home_end" type="submit"><a href="./index.php"><img src="./assets/images/house(1).png"></a></button>
      <img src="./assets//images/poufpouf.gif" class="pouf">
</div>
<!-- IMAGE VICTOIRE -->
<div class="containerr">
    <img src="./assets/images/victoire_1.png" class="vic">
</div>

<body class="clairiere" style="background-image: url('./assets/images/clairiere.jpg')">


<div class="d-flex flex-wrap row justify-content-around mb-5">
      <?php foreach ($hero as $survivor => $valeur) { ?>
 <div class="card blurr cardd" style="width: 18rem;">
      <img class="card-img-top perso" src="/assets/images/<?= $valeur->getHeroPhoto() ?>">
      <div class="card-body">
      </div>   
</div>
<?php }?>

         

<?php
include './partials/footer.php';
?>