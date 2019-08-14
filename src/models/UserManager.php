<?php

class UserManager extends Model
{
    public function getUsers()
    {
        return $this->getAll("nl_users", "Users");
    }
}