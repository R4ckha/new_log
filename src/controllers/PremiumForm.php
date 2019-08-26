<?php

/**
 * Class PremiumForm
 * Génère le formulaire necessaire à l'ajout de membre premium
 */
class PremiumForm
{
    private $token;
    
    public function insertForm()
    {
        $this->token = $this->addToken($_SESSION['user']['id']);
        $_SESSION['token'] = $this->token;

        $content = "<form action='#' method='post'>
                        <input type='text' name='last_name' placeholder='nom'>
                        <input type='text' name='name' placeholder='prenom'>
                        <input type='text' name='pseudo' placeholder='pseudo'>
                        <input type='text' name='donation_amount' placeholder='montant'>
                        <input type='text' name='payment_date' placeholder='date'>
                        <input type='hidden' name='id_user' value='{$_SESSION['user']['id']}'>
                        <input type='hidden' name='token' value='{$this->token}'>
                        <input type='submit' value='ajouter un membre'>
                    </form>";
        
        return $content; 
    }

    private function addToken($value)
    {
        return sha1($value.SALT);
    }
}

