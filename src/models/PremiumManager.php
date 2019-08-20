<?php
/**
 *  Class PremiumManager
 * 
 */
class PremiumManager extends Model
{
    public function getAllPremium()
    {   
        return $this->getAll("nl_users_premium", "Premium");
    }
}