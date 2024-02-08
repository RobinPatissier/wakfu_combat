<?php 

class Monster {
    private int $id;
    private string $name;
    private int $health_points;
    private string $photo;
    private string $ornement;

    public function hit(Hero $hero)
    {
        $damage = rand(1, 10);
        $heroHealthPoints = $hero -> getHeroHealth_points();
        $hero->setHeroHealth_points($heroHealthPoints - $damage);
        return $damage;
    }

    //GETTER
    public function getMonsterId()
    {
        return $this->id;
    }
    public function getMonsterName()
    {
        return $this->name;
    }
    public function getMonsterHealth_points()
    {
        return $this->health_points;
    }
    public function getMonsterPhoto()
    {
        return $this->photo;
    }
    public function getMonsterOrn()
    {
        return $this->ornement;
    }



    //SETTER
    public function setMonsterId($id)
    {
        $this->id = $id;
    }
    public function setMonsterName($name)
    {
        $this->name = $name;
    }
    public function setMonsterHealth_points($health_points)
    {
        $this->health_points = $health_points;
    }
    public function setMonsterPhoto($photo)
    {
        $this->photo = $photo;
    }
    public function setMonsterOrn($ornement)
    {
        $this->ornement = $ornement;
    }

    public function toArray(){
        return [
            'id' => $this->getMonsterId(),
            'name' => $this->getMonsterName(),
            'health_points' => $this->getMonsterHealth_points(),
        ];
    }
}