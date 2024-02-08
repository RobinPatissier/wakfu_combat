<?php
class Hero
{
    private int $id;
    private string $name;
    private int $health_points;
    private string $photo;
    private string $ornement;

    public function   __construct(string $name, int $health_points)
    {
        $this->name = $name;
        $this->health_points = $health_points;
    }

    public function hit(Monster $monster)
    {
        $damage = rand(1, 10);
        $monsterHealthPoints = $monster -> getMonsterHealth_points();
        $monster->setMonsterHealth_points($monsterHealthPoints - $damage);
        return $damage;
    }

    //GETTER
    public function getHeroId() : int
    {
        return $this->id;
    }
    public function getHeroName() : string
    {
        return $this->name;
    }
    public function getHeroHealth_points()
    {
        return $this->health_points;
    }

    public function getHeroPhoto()
    {
        return $this->photo;
    }
    public function getHeroOrn()
    {
        return $this->ornement;
    }


    //SETTER
    public function setHeroId($id)
    {
        $this->id = $id;
    }
    public function setHeroName($name)
    {
        $this->name = $name;
    }
    public function setHeroHealth_points($health_points)
    {
        $this->health_points = $health_points;
    }
    public function setHeroPhoto($photo)
    {
        $this->photo = $photo;
    }
    public function setHeroOrn($ornement)
    {
        $this->ornement = $ornement;
    }


    public function toArray(){
        return [
            'id' => $this->getHeroId(),
            'name' => $this->getHeroName(),
            'health_points' => $this->getHeroHealth_points(),
        ];
    }

}
