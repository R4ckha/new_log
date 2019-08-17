<?php

class UserManager extends Model
{
    public function getUser()
    {   
        return $this->getAll("nl_users", "Users");
    }

    public function isConnectedUser()
    {   
        return $this->getUserSession($_COOKIE['phpbb3_nfxdw_sid']);
    }
}