<?php
namespace Models;

class Home extends AbstractModel 
{

  protected string $nomDeLaTable = "ici le nom de la table SQL";

  //il nous faut une propriété privation, ainsi qu'un getter et un setter
  //pour chaque colonne de la table SQL (pas de setter pour l'ID)

  //private description

  //
   /* public function getDescription(){
        return $this->description;
    }

      public function setDescription($description)
      {
          $this->description = $description;
      }
   */

  //du fait d'hériter de la classe AbstractModel, et d'avoir paramétré un nom de table
  //valide, on dispose déjà de trois méthodes pour interargir avec la BDD :

  //findAll(), findById() et delete

  //pour tout autre requete SQL, il faydra développer ici une nouvelle méthode
  //(création, modification, recherche par clé étrangère, etc.)

}