<?php
namespace Controllers;

class Velo extends AbstractController 
{

  protected $defaultModelName = \Models\Velo::class;

  /**
   * Affiche l'accueil du magasin avec ses vélos
   */
  public function index()
  {

    $velos= $this->defaultModel->findAll();

    $pageTitle = "Accueil des Vélos";

    return $this->render("velos/index", compact("pageTitle", "velos"));
  }

  /**
   * Afficher un vélo et ses avis clients
   */
  public function show()
  {
    $id = null;

    if( !empty($_GET['id']) && ctype_digit($_GET['id']) ){ $id= $_GET['id']; }

    if(!$id){ 
      
      return $this->redirect([
        'action'=>'index',
        'type'=>'velo'
      ]);
      }

        $velo = $this->defaultModel->findById($id);

        if ( !$velo ) {  return $this->redirect([
            'action'=>'index',
            'type'=>'velo'
        ]); }
        
        $modelAvis = new \Models\Avis();
        $avis = $modelAvis->findAllByVelo($velo); // 

        $pageTitle = $velo->getName();

        $this->render("velos/show", compact("pageTitle", "velo", "avis"));

  }

  /**
   * Supprimer un vélo via son ID et renvoyer vers l'accueil des vélos
   */
  public function delete():Response 
  {

      $id= null;
      if(!empty($_POST['id']) && ctype_digit($_POST['id'])){$id= $_POST['id'];}

      if(!$id){ return $this->redirect([   
                                            "type"=>"velo",
                                            "action"=>"index",
                                            "info"=>"noId"
                                            ]);}

      $velo = $this->defaultModel->findById($id);

      if(!$velo) { 
            return $this->redirect();
         }

        $this->defaultModel->remove($velo);

        return $this->redirect([   
                                "type"=>"velo",
                                "action"=>"index",
                                "info"=>"deleted"
                                 ]);
  }

  /**
   * Ajout d'un nouveau vélo
   */
  public function new()
    {
        

        $name=null;
        $description=null;
        $image=null;
        $price=null;

        if(!empty($_POST['name'])){ $name = $_POST['name'] ; }
        if(!empty($_POST['description'])){ $description = $_POST['description'] ; }
        if(!empty($_POST['image'])){ $image = $_POST['image'] ; }
        if(!empty($_POST['price'])){ $price = $_POST['price'] ; }

        if( $name && $description && $image && $price ){

                $velo = new \Models\Velo();
                $velo->setName($name);
                $velo->setDescription($description);
                $velo->setImage($image);
                $velo->setPrice($price);


            $this->defaultModel->save($velo);

            return $this->redirect([
                                    'type'=>'velo',
                                    'action'=>'index'
                                    ]);

        }

        return $this->render("velos/create", ["pageTitle"=>'Nouveau vélo']);
    }





}