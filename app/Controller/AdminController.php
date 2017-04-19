<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\SejourModel;
use \Model\AdherentModel;
use \Model\EvenementModel;
use \Model\photosModel;

class AdminController extends Controller{


	public function sejour(){



        //initialisation de la valeur de la variable
        $message="";


        //On veut proteger l'acces à cette page
        /*$this->allowTo(["admin","super-admin"]);*/
        
        
        
        
        //Je peux traiter le formulaire
        //(si un formulaire à traiter)
        
        /*Pour la suppression d'un sejour*/


        if(isset($_REQUEST['operation']) && ($_REQUEST['operation']=="supprimer")){
         
            //On veut récuperer l'id du formulaire
            $id=intval(trim($_REQUEST['id']));

            if($id>0){   

                $objetSejourModel=new SejourModel;
                $objetSejourModel->delete($id);
                
            }
         
            
        }//fin du if operation supprimer*/
        
        
        /*Pour la création d'un sejour*/

        
        if(isset($_POST['operation']) && ($_POST['operation']=="creer")){
            
            
            $safe=array_map('strip_tags',$_POST);
            
            //Recuperer les infos du formulaire
            $nomSejour=$safe['nomSejour'];
            $lieu=$safe['lieu'];
            $dateDepart=$safe['dateDepart'];
            $dateRetour=$safe['dateRetour'];
            $duree=$safe['duree'];
            $tarif=$safe['tarif'];
            
            
            //Securité, verification que chaque info est conforme
            
            if(is_string($nomSejour) && (mb_strlen($nomSejour)>0) &&
               is_string($dateDepart) && (mb_strlen($dateDepart)>0) &&
               is_string($dateRetour) && (mb_strlen($dateRetour)>0) &&
               is_numeric($duree) &&
               is_numeric($tarif)){
                   
                
                
                
                //On va créer un objet de la classe SejourModel
                //Ne pas oublier de faire le use !
                
                $objetSejourModel=new SejourModel;
                //Je peux utiliser la methode insert du framework W
                $objetSejourModel->insert(['nomSejour'=>$nomSejour,
                                            'lieu'=>$lieu,
                                            'dateDepart'=>$dateDepart,
                                            'dateRetour'=>$dateRetour,
                                            'duree'=>$duree,
                                            'tarif'=>$tarif]);
                   
                $message="Bravo, séjour ajouté !";   
            }//fin de la verif securité
            else{
                //une erreur
                $message="Erreur ! Quelque chose cloche...";
                
            }
            
            
            
            
        }//fin du if isset
        
        
        //afficher la page
        $this->show("pages/admin/admin-sejour",['message'=>$message]);
        
    }


    public function sejourUpdate($id){

    	//Ici on va traiter le formulaire de UPDATE
        
        //initialisation de la variable
        $message="";
        
         if(isset($_POST['operation']) && ($_POST['operation']=="modifier")){
             
             $safe=array_map('strip_tags',$_POST);
            
            //Recuperer les infos du formulaire
            //Recuperer les infos du formulaire
            $nomSejour=$safe['nomSejour'];
            $lieu=$safe['lieu'];
            $dateDepart=$safe['dateDepart'];
            $dateRetour=$safe['dateRetour'];
            $duree=$safe['duree'];
            $tarif=$safe['tarif'];
            
            
            //Securité, verification que chaque info est conforme
            
            if(is_string($nomSejour) && (mb_strlen($nomSejour)>0) &&
               is_string($dateDepart) && (mb_strlen($dateDepart)>0) &&
               is_string($dateRetour) && (mb_strlen($dateRetour)>0) &&
               is_numeric($duree) &&
               is_numeric($tarif)){
                   
                //On va créer un objet de la classe SejourModel
                //Ne pas oublier de faire le use !
                
                $objetSejourModel=new SejourModel;
                //Je peux utiliser la methode insert du framework W
                $objetSejourModel->update(['nomSejour'=>$nomSejour,
                                            'lieu'=>$lieu,
                                            'dateDepart'=>$dateRetour,
                                            'dateRetour'=>$dateRetour,
                                            'duree'=>$duree,
                                            'tarif'=>$tarif],$id,true); //le false correspond au striptag
                   
                $message="Bravo ça marche !";   
                   
                   
            }//Fin des verif et de l'update
        else
        $message="Erreur ! !";
        
         }//fin du isset




    	//afficher la page
        $this->show("pages/admin/admin-sejour-update",['id'=>$id,'message'=>$message]);

    }


    public function membre(){

        


        //afficher la page
        $this->show("pages/admin/admin-membre",['message'=>$message]);

    }



}