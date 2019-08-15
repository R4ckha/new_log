<?php

class ControllerHome
{
    private $userManager;
    private $view;

    public function __construct($url)
    {   
        if (isset($url) && count($url) > 1) {
            throw new Exception('Page introuvable');
        } else {
            $this->users();
        }
    }

    private function users()
    {
        $this->userManager = new UserManager();
        $users = $this->userManager->getUsers();
        require_once 'src/views/viewHome.php';
    }

    /**
     * On récupère le token de session dans le cookie phpbb $_COOKIE['phpbb3_nfxdw_sid']
     * Puis on requête les tables users et sessions de phpbb pour récupérer les infos
     * Si l'ip de la connexion en cours est identique à celle de la session en cours alors c'est OK
     * On récupère l'id_group et on en déduis l'ID et le niveau d'accès
     * 
     * 
     * SELECT u.user_id, u.group_id, u.username, s.session_ip, u.user_avatar, j.pseudo
     * FROM `phpbb_sessions` s
     * JOIN `phpbb_users` u
     * ON u.user_id = s.session_user_id
     * LEFT OUTER JOIN `votage_joueur` j
     * ON j.idForum = u.user_id
     * WHERE session_id =
     *  */

}