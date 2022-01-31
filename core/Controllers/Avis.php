<?php
namespace Controllers;



class Avis extends AbstractController
{

    protected $defaultModelName = \Models\Avis::class;
   


    /**
     * supprime un avis par son ID
     * @return Response
     * 
     * 
     */
    public function delete():Response
    {

        $id =null;

        if (!empty($_POST['id']) && ctype_digit($_POST['id'])) {
            $id = $_POST['id'];
        }

        if (!$id) {
            die("Erreur sur l'ID. Pars .");
        }
        //verifier que l'avis existe bel et bien avant.


      

        $avis = $this->defaultModel->findById($id);



        if (!$avis) {

            return $this->redirect([   
                                    "type"=>"velo",
                                    "action"=>"index",
                                    "info"=>"noId"
                                    ]);
        }


        $this->defaultModel->remove($avis);

       return $this->redirect([
        "type"=> "velo",
        "action"=> "index"
    ]);

    }
    
    
    
    /**
     * crée un nouvel avis sur le vélo.
     * 
     * @return Response
     */
    public function new():Response
    {


        $veloId = null;
        $author = null;
        $content = null;

        if (!empty($_POST['veloId']) && ctype_digit($_POST['veloId'])) {

            $veloId = $_POST['veloId'];
        }
        if (!empty($_POST['author'])) {

            $author = htmlspecialchars($_POST['author']);
        }

        if (!empty($_POST['content'])) {

            $content = htmlspecialchars($_POST['content']);
        }



        if (!$veloId || !$content || !$author) {

            return $this->redirect([
                                    "type"=>"velo",
                                    "action"=>"show",
                                    "id"=> $veloId
                                ]);
}


        // on vérifie si le vélo existe bien avant de laisser un avis le concernant.

        $modelVelo = new \Models\Velo();

        $velo = $modelVelo->findById($veloId);



        if (!$velo) {
            return $this->redirect([
                "type"=>"velo",
                "action"=>"index",
                "info"=>"noId"
            ]);
        }

            $avis = new \Models\Avis();
            $avis->setAuthor($author);
            $avis->setContent($content);
            $avis->setVeloId($veloId);
                                    

        $this->defaultModel->save($avis);



        return $this->redirect([
                                "type"=>"velo",
                                "action"=>"show",
                                "id"=> $avis->getVeloId()
                            ]);
    
    }
}