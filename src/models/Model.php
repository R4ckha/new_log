<?php

abstract class Model extends Database
{
    private static $id;
    private static $acces;
    private static $groupId;
    private static $pseudo;

    protected function getAll($table, $object)
    {
        $var = [];
        $req = $this->getBdd()->prepare('SELECT * FROM '.$table);
        $req->execute();

        while($data = $req->fetch()){
            $var[] = new $object($data);
        }

        $req->closeCursor();
        return $var;
    }

    protected function getUserSession($sessionId)
    {
        $query = "SELECT u.user_id, u.group_id, u.username, s.session_ip, u.user_avatar, j.pseudo 
                    FROM `phpbb_sessions` s
                    JOIN `phpbb_users` u
                    ON u.user_id = s.session_user_id
                    LEFT OUTER JOIN `votage_joueur` j
                    ON j.idForum = u.user_id
                    WHERE session_id = :sessionId";


        $requestSession = $this->getBdd()->prepare($query);
        $requestSession->bindValue(':sessionId', $sessionId, PDO::PARAM_STR);
        $requestSession->execute();
        $userInfo = $requestSession->fetch();
        $requestSession->closeCursor();

        if ( isset($userInfo['user_id']) && $userInfo['user_id'] != 1 ) {
			$sessionIp = implode('.', array_slice(explode('.', $_SERVER['REMOTE_ADDR']), 0, 3));
			$remoteIp = implode('.', array_slice(explode('.', $userInfo['session_ip']), 0, 3));
			
			echo "ip de session = {$userInfo['session_ip']}<br>";
			echo "ip connexion = {$_SERVER['REMOTE_ADDR']}<br>";
            if ( $sessionIp === $remoteIp && $userInfo['group_id'] === "9") {
                $_SESSION['user']['pseudo'] = $userInfo['pseudo'];
                $_SESSION['user']['id'] = $userInfo['user_id'];
                self::$pseudo = $userInfo['pseudo'];

                return ["pseudo" => self::$pseudo, "isConnected" => true];
            } else {
                return ["errorNo" => 1, "error" => "Accès reservé administrateur ou erreur de session", "isConnected" => false];
            }
        } else {
            return ["errorNo" => 2, "error" => "Utilisateur non connecté", "isConnected" => false];
        }
    }
}