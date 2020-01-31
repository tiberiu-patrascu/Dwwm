<?php

declare(strict_types=1);

namespace Models;

class AccountManager
{
    protected $filePath;

    protected $accounts = [];

    public function __construct()
    {
        // \cherche la function dans lespace globale
        //function dirname is_file
        //instruction if else 
        $this->filePath = \dirname(__DIR__) . '/data/accounts.php';

        //existance dun fichier   \is_dir vers un repertooire
        if (\is_file($this->filePath)) {
            //return du account envoie la valeur la est se trouve dans notre methode maintenant 
            $this->accounts = (require $this->filePath);
        } else {
            exit('Fichier introuvable');
        }
    }

    /**
     * controle la validité d'un non d'utilisateur
     * @param string $_username le nom d'utilisateur 
     */
    public function validUsername(string $_username): bool
    {

        if (empty($_username)) {
            return false;
        }

        if (\strlen($_username) < 2) {
            return false;
        }

        return true;

        //return !empty($_username) && \strlen($_username) > 2;
    }

    /**
     * Vérifier si un utilisateur $_username existe
     * si oui, une instance de Account contenant les donées de l'utilisateur est reenvoyée
     * si non, null est renvoyé
     */
    public function getUser(string $_username): ?Account
    {
        //netoyer la variable securiser le schema
        //recuperer la derniere partie du schema
        $_username = \basename($_username);

        if (!$this->validUsername($_username)) {
            return null;
        }

        //strlen conter les nombres de caracteres

        foreach ($this->accounts as $key => $userinfo) {
            if ($userinfo['username'] === $_username) {
                return new Account($userinfo);
            }
        }

        return null;
    }

    /**
     *Vérifie si un utilisateur $_username existe et controle la correspondance de mot des passer 
     *Renvoie true en cas de succès et false en cas d'erreur 
     */
    public function login($_username, $_password): bool
    {
        return true;
    }

    /**
     * Ajouter un nouvel utilisateur après avoir vérifié que $_username n'est pas déjà utilisé
     * Renvoie false en cas d'erreur
     */
    public function addUser($_username, $_password, $_email): bool
    {
        if (!$this->validUsername($_username)) {
            return false;
        }

        if ($this->getUser($_username) !== null) {
            return false;
        }
        $newUser = [
            'username' => $_username,
            'password' => $_password,
            'email' => $_email,
        ];

        if (!empty($_username)) {
            foreach ($this->accounts as $user) {
                if ($user['username'] !== $_username) {
                    return new Account($user);
                    var_dump($newUser);
                }
            }
            return false;
        }

        
    }

    /**
     * vérifie si un utilisaateur $_username existe et le supprime si tel est le cas
     * Renvoie true si un utilisateur a été supprimé
     * Renvoie false si l'utilisateur n'est pas éte trouvé
     */
    public function removeUser($_username): bool
    {
        return true;
    }
}
