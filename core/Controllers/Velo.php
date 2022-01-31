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
}