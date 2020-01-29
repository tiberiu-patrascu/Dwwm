<?php

namespace Models;

class AccountManager
{
    protected $filePath;

    protected $accounts = [];

    public function __construct()
    {
        $this->filePath = dirname(__DIR__).'/data/accounts.php';

        if (\is_file($this->filePath)) {
            //return du account envoie la valeur la est se trouve dans notre methode maintenant 
            $this->accounts= (require $this->filePath);
        }
        else{
            exit('Fichier introuvable');
        }

    }

    /**
     * Vérifier si un utilisateur $_username existe
     * si oui, une instance de Account contenant les donées de l'utilisateur est reenvoyée
     * si non, null est renvoyé
     */
    public function getUser(string $_username) : ?Account
    {
        if (!empty($_username)) {
            foreach($this->accounts as $propertyName => $propertyValue){
                if ($propertyValue['username'] == $_username ) {
                    return new Account($propertyValue);
                }
            }
        }
        return null;
    }

    /**
     *Vérifie si un utilisateur $_username existe et controle la correspondance de mot des passer 
     *Renvoie true en cas de succès et false en cas d'erreur 
     */
    public function login($_username, $_password) : bool
    {

        return true;
    }

    /**
     * Ajouter un nouvel utilisateur après avoir vérifié que $_username n'est pas déjà utilisé
     * Renvoie false en cas d'erreur
     */
    public function addUser($_username, $_password, $_email) : bool
    {
        if (!empty($_username)) {
            foreach($this->accounts as $propertyName => $propertyValue){
                if (\array_key_exists($propertyName, $_username)) {
                    return $propertyName;
                } else {

                }
                
            }
        }


        return true;
    }

    /**
     * vérifie si un utilisaateur $_username existe et le supprime si tel est le cas
     * Renvoie true si un utilisateur a été supprimé
     * Renvoie false si l'utilisateur n'est pas éte trouvé
     */
    public function removeUser($_username) : bool
    {
        return true;
    }
}