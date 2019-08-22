<?php

class ControllerPremium
{
    public $tableContent;

    public function __construct()
    {
        $premiumUsers = new PremiumManager();
        $users = $premiumUsers->getAllPremium();
        $content = $this->getTable($users);
        require_once 'src/views/viewPremium.php';
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
                                    <th colspan='2'>nombre de /home</th>
                                </tr>
                            </thead>
                        <tbody>";
                
        foreach ($datas as $value) {
            $content .= "<tr>
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
                            <td>edit</td>
                        </tr>";
        }
                                    
        $content .= "</tbody></table></div>";
        
        $this->tableContent = $content;
    }
}