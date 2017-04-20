<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\SejourModel;
use \Model\AdherentModel;
use \Model\MembreModel;
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
                                            'dateDepart'=>$dateDepart,
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

        //Initialisation de la variable
        $message = "";


        /*Supression d'un membre*/


        if(isset($_REQUEST['operation']) && ($_REQUEST['operation']=="supprimer")){
         
            //On veut récuperer l'id du formulaire
            $id=intval(trim($_REQUEST['id']));

            if($id>0){   

                $objetSejourModel=new MembreModel;
                $objetSejourModel->delete($id);
                
            }
         
            
        }//fin du if operation supprimer*/



        
        // TRAITER LE FORMULAIRE D'INSCRIPTION
        if (isset($_POST["operation"]) && ($_POST["operation"] == "signup"))
        {
            // RECUPERER LES INFOS DU FORMULAIRE
            
            $nomMembre              = trim($_POST["nomMembre"]);
            $prenomMembre              = trim($_POST["prenomMembre"]);
            $dateNaissanceMembre              = trim($_POST["dateNaissanceMembre"]);
            $emailMembre              = trim($_POST["emailMembre"]);
            $mdpMembre            = trim($_POST["mdpMembre"]);

            
            // SECURITE
            // VERIFIER QUE CHAQUE INFO EST CONFORME
            // http://php.net/manual/en/function.mb-strlen.php
            if (is_string($nomMembre)           && ( mb_strlen($nomMembre) > 1 )
                    && filter_var($emailMembre,FILTER_VALIDATE_EMAIL)
                    && is_string($mdpMembre)  && ( mb_strlen($mdpMembre) > 5 ) &&
                    is_string($prenomMembre)         && ( mb_strlen($prenomMembre) > 1 ) &&
                    is_string($dateNaissanceMembre)           && ( mb_strlen($dateNaissanceMembre) == 10 ) 
                ){
            
                // OK ON A LES BONNES INFOS
                
                //completer les infos manquantes
                $roleMembre="membre"; //debug
                
                //Hasher le mdp
                $passwordHash=password_hash($mdpMembre,PASSWORD_DEFAULT);
                
                
                // VERIFIER SI $username EST DEJA PRESENT
                // VERIFIER SI $email EST DEJA PRESENT
                
                $objetMembreModel=new MembreModel; //on utilise la classe \W\Model\MembreModel du framework
                
                if(!$objetMembreModel->emailExists($emailMembre)){
                    
                    
                        
                     //On ajoute une ligne dans la table Mysql Membre
                     $objetMembreModel->insert([
                    "nomMembre"         => $nomMembre,
                    "prenomMembre"         => $prenomMembre,
                    "dateNaissanceMembre"         => $dateNaissanceMembre, 
                    "emailMembre"         => $emailMembre, 
                    "mdpMembre"       => $passwordHash,
                    "premiereConnexion"       => 1,
                    "dateInscriptionMembre"       => date('Y-m-d'),
                    "roleMembre"          => $roleMembre
                            
                                                ]);
                            
                    $message="Membre Ajouté !";        
                        
                    
                    
                }
                else{
                    
                    $message="Erreur, l'email existe déjà";
                }//fin du else

            }//fin du if verif

        }//Fin du if isset


        //afficher la page
        $this->show("pages/admin/admin-membre",['message'=>$message]);

    }


    public function membreUpdate($id){

        //Ici on va traiter le formulaire de UPDATE
        
        //initialisation de la variable
        $message="";
        
         if(isset($_POST['operation']) && ($_POST['operation']=="modifier")){
             
             $safe=array_map('strip_tags',$_POST);
            
            //Recuperer les infos du formulaire
            //Recuperer les infos du formulaire
            $nomMembre=$safe['nomMembre'];
            $prenomMembre=$safe['prenomMembre'];
            $dateNaissanceMembre=$safe['dateNaissanceMembre'];
            $emailMembre=$safe['emailMembre'];
            $nbAvertissementMembre=$safe['nbAvertissementMembre'];
            
            
            //Securité, verification que chaque info est conforme
            
            if (is_string($nomMembre)           && ( mb_strlen($nomMembre) > 1 )
                    && filter_var($emailMembre,FILTER_VALIDATE_EMAIL)
                    &&
                    is_string($prenomMembre)         && ( mb_strlen($prenomMembre) > 1 ) &&
                    is_numeric($nbAvertissementMembre) &&
                    is_string($dateNaissanceMembre)           && ( mb_strlen($dateNaissanceMembre) == 10 ) 
                ){
                   
                //On va créer un objet de la classe MembreModel
                //Ne pas oublier de faire le use !
                
                $objetMembreModel=new MembreModel;
                //Je peux utiliser la methode insert du framework W
                $objetMembreModel->update(['nomMembre'=>$nomMembre,
                                            'prenomMembre'=>$prenomMembre,
                                            'dateNaissanceMembre'=>$dateNaissanceMembre,
                                            'nbAvertissementMembre'=>$nbAvertissementMembre,
                                            'emailMembre'=>$emailMembre
                                            ],$id,true); 
                   
                $message="Bravo ça marche !";   
                   
                   
            }//Fin des verif et de l'update
        else
        $message="Erreur ! !";
        
         }//fin du isset    


        //afficher la page
        $this->show("pages/admin/admin-membre-update",['id'=>$id,'message'=>$message]);

    }



}