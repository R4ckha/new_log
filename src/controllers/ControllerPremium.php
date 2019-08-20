<?php

class ControllerPremium
{
    public function __construct()
    {
		$premiumUsers = new PremiumManager();
		$users = $premiumUsers->getAllPremium();
        require_once 'src/views/viewPremium.php';
    }
}