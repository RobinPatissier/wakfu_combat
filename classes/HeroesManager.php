<?php

class HeroesManager {
    private $connexion;

    public function __construct($connexion){
        $this->connexion=$connexion;
    }
    
    public function randomHero(){
        $preparedRequest = $this->connexion->prepare("SELECT * FROM heroes WHERE health_points > 0 AND id = 13 OR id = 14 OR id = 15 ORDER BY RAND() LIMIT 1 ");
        $preparedRequest->execute();
        $randomHero = $preparedRequest->fetch(PDO::FETCH_ASSOC);
        $hero = new Hero($randomHero['name'], $randomHero['health_points']);
        $hero->setHeroId($randomHero['id']);
        $hero->setHeroPhoto($randomHero['photo']);
        $hero->setHeroOrn($randomHero['ornement']);
        return $hero;
    }
    
    public function update($hero){
        $preparedRequest = $this->connexion->prepare("UPDATE heroes SET health_points = ? WHERE heroes.id = ? ");
        $preparedRequest->execute([
            $hero->getHeroHealth_points(),
            $hero->getHeroId()
        ]);
        $hero_update = $preparedRequest->fetch(PDO::FETCH_ASSOC);
        return $hero_update;
    }
    
    public function find($id){
        $preparedRequest = $this->connexion->prepare("SELECT * from heroes WHERE heroes.id = ?");
        $preparedRequest->execute([
            $id
        ]);
        $heroData = $preparedRequest->fetch(PDO::FETCH_ASSOC);

        $hero = new Hero($heroData['name'], $heroData['health_points']);
        $hero->setHeroId($heroData['id']);
        $hero->setHeroPhoto($heroData['photo']);
        $hero->setHeroOrn($heroData['ornement']);
        return $hero;
        
    }

    public function healAllHeroes(){
        $preparedRequest = $this->connexion->prepare("UPDATE heroes SET health_points = 100");
        $preparedRequest->execute();
        $heal = $preparedRequest->fetch(PDO::FETCH_ASSOC);
        return $heal;
    }

    public function heal($id){
        $preparedRequest = $this->connexion->prepare("UPDATE heroes SET health_points = 100 WHERE id = ?");
        $preparedRequest->execute(
            [$id]
        );
        $heal = $preparedRequest->fetch(PDO::FETCH_ASSOC);
        return $heal;
    }

    public function boost($id){
        $preparedRequest = $this->connexion->prepare(" UPDATE heroes SET health_points = health_points + 50 WHERE id= ?");
        $preparedRequest->execute(
            [$id]
        );
        $boost = $preparedRequest->fetch(PDO::FETCH_ASSOC);
        return $boost;
    }

    public function findAlive(){
        $preparedRequest = $this->connexion->prepare("SELECT * FROM heroes WHERE health_points > 0");
        $preparedRequest-> execute();
        $alive = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);
        $result = [];
        foreach ($alive as $heroArray) {
        $hero = new Hero($heroArray['name'], $heroArray['health_points']);
        $hero->setHeroId($heroArray['id']);
        $hero->setHeroPhoto($heroArray['photo']);
        $hero->setHeroOrn($heroArray['ornement']);
        array_push($result, $hero);
        }
        
        return $result;
    }
}
