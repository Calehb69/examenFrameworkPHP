<?php
namespace Models;

class Velo extends AbstractModel 
{
    protected string $nomDeLaTable = "velos";


    private $id;

    public function getId(){
      return $this->id;
    }

    private $name;
    
    public function getName(){
            return $this->name;
        }

    public function setName($name){
        $this->name = $name;
    }

    private $description;
    
    public function getDescription(){
            return $this->description;
        }

    public function setDescription($description){
        $this->description = $description;
    }

    private $image;
    
    public function getImage(){
            return $this->image;
        }

    public function setImage($image){
        $this->image = $image;
    }

    private $price;
    
    public function getPrice(){
            return $this->price;
        }

    public function setPrice($price){
        $this->price = $price;
    }


    /**
     * 
     * Ajout d'un nouveau vélo dans la BDD avec ses composantes liées
     * @param Velo $velo
     * 
     * @return void
     */
    public function save(Velo $velo):void 
    {
                  $sql = $this->pdo->prepare("INSERT INTO {$this->nomDeLaTable} 
             (name, ,description, image, price) VALUES (:nom, , :description, :image, :price)
            ");

            $sql->execute([
                'nom'=>$velo->name,
                'description'=>$velo->description,
                'image'=>$velo->image,
                'price'=>$velo->price
            ]);
    }
}