<?php

class ControllerPremium
{
    public $tableContent;
    private $userManager;

    public function __construct()
    {
        $premiumUsers = new PremiumManager();
        $this->userManager = new UserManager();

        $users = $premiumUsers->getAllPremium();
        $user = $this->userManager->isConnectedUser();
        $content = $this->getTable($users);

        if ( $user["isConnected"] ) {
            require_once 'src/views/viewPremium.php';
        } else {
            require_once 'src/views/viewErrorConnect.php';
        } 
    }

    public function getTable($datas)
    {
        $this->setTable($datas);
        return $this->tableContent;
    }

    public function setTable($datas)
    {
        $content = "<div class='wrapper-table'>
                        <table>
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>prénom</th>
                                    <th>nom</th>
                                    <th>pseudo</th>
                                    <th>montant du don</th>
                                    <th>date du don</th>
                                    <th>durée du premium</th>
                                    <th>fin du premium</th>
                                    <th>décisionnaire</th>
                                    <th>commande back</th>
                                    <th>nombre de /home</th>
                                </tr>
                            </thead>
                        <tbody>";
                
        foreach ($datas as $value) {
            $content .= "<tr class='premium-{$value->idUserPremium}'>
                            <td>{$value->idUserPremium}</td>
                            <td>{$value->name}</td>
                            <td>{$value->lastName}</td>
                            <td>{$value->pseudo}</td>
                            <td>{$value->donationAmount}</td>
                            <td>{$value->paymentDate}</td>
                            <td>{$value->premiumDuration}</td>
                            <td>{$value->endPremium}</td>
                            <td>{$value->isDecisionMaker}</td>
                            <td>{$value->slashBack}</td>
                            <td>{$value->numberHome}</td>
                            <td><i class='material-icons md-24'>edit</i></td>
                        </tr>";
        }
                                    
        $content .= "</tbody></table></div>";

        $content .= "<div class='wrapper-action-button'><a href='/imperalog/premiumform' class='add-premium-button'><i class='material-icons md-96'>add</i></a></div>";
        
        $this->tableContent = $content;
    }
}