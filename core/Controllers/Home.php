<?php
namespace Controllers;

class Home extends AbstractController 
{

      protected $defaultModelName = \Models\Home::class;  //"Préciser le nom du model par défaut";


  /**
   * 
   * Affiche l'accueil de la page
   * 
   * pour déclencer un appel à cette méthode, le Kernel est conçu pour surveiller deux paramètres dans l'url : 
   * 'type' et 'action' pour le controller et la methode.
   * 
   * ici, pour cette methode index, on obtiendra 'type'='home' et 'action'='index'
   * 
   * et donc l'url: 'index.php?type=home&action=index'
   * 
   * 
   */
  public function index()
  {

    //Si besoin d'interargir avec la BDD, on peut utiliser le modele par défaut
    //du controller, et donc faire une requqete sur sa table SQL par défaut.
    //directement depuis cette classe : 

    // $elements = $this->defaultModel->findAll()

    //a besoin de 2 param : un nom de dossier/template (string),
    //et un tableau d'options contenant au moins le titre de la page,
    //et également un indec et valeur pour chaque variable que le template exploite


    //on peut donc créer un dossiernomDeTemplate.html.php dans le dossier template
    //toute variable passée au tableau d'options de $this->resourcebundle_get_error_code
    //sera disponible dans ce template
    return $this->render("home/index", [
      "pageTitle" => "HomePage",
      //"elements"=>$elements
    ]);
  }


  /**
   * 
   * Ajouter un nouvel élément dans la BDD (ex: une Pizza)
   * @param nomDeLObjet $objet
   * 
   * @return void
   */
  public function save(nomDeLObjet $objet):void
  {
    //creer au préalable un obj avec ses propr pour après pouvoir l'appeller et en ajouter de nouveau.



  }

  /**
   * 
   * Editer un objet via son ID
   * @param string $paramObj1
   * @param string $paramObj2
   * @param string $paramObj3
   * 
   */
  public function update($paramObj1, $paramObj2, $paramObj3)
  {
    
  }



}