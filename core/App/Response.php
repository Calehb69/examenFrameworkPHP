<?php
namespace App;

class Response 
{
/**
 * Redirige vers l'url passée en paramètre
 * 
 * @param string $url
 * 
 * @return void 
 * 
 */

 public static function redirect(?array $parametres=null): void
 {
      $url ="";
          if($parametres){
                      $url = "?";

                      foreach($parametres as $cle => $valeur){

                        $nouveauParamGet = $cle."=".$valeur."&";

                        $url.=$nouveauParamGet;
                      }

          }
  header("Location: ".$url);
  exit();

 }


}