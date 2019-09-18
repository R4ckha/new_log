<?php

class PremiumFormModel extends Database
{
	public function send($datas, $table)
	{
		$name 			= $datas['name'];
		$lastName 		= $datas['last_name'];
		$pseudo 		= $datas['pseudo'];
		$donationAmount = $datas['donation_amount'];

		var_dump(gettype($donationAmount), $donationAmount);
		//$statement = "INSERT INTO " .$table. " (name, last_name, pseudo, donation_amount, payment_date, premium_duration, end_premium, is_decision_maker, slash_back, number_home) VALUES (:name, :last_name, :pseudo, :donation_amount, :payment_date, :premium_duration, :end_premium, :is_decision_maker, :slash_back, :number_home)";

		/*
		$insertData = $this->getBdd()->prepare($statement);
		$insertData->bindValue(':name', $name, PDO::PARAM_STR);
		$insertData->bindValue(':last_name', $lastName, PDO::PARAM_STR);
		$insertData->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
		$insertData->bindValue(':donation_amount', $donationAmount, PDO::PARAM_STR);
		$insertData->bindValue(':payment_date', $payementDate, PDO::PARAM_STR);
		$insertData->bindValue(':premium_duration', $premiumDuration, PDO::PARAM_INT);
		$insertData->bindValue(':end_premium', $endPremium, PDO::PARAM_STR);
		$insertData->bindValue(':is_decision_maker', $isDecisionMaker, PDO::PARAM_BOOL);
		$insertData->bindValue(':slash_back', $slashBack, PDO::PARAM_BOOL);
		$insertData->bindValue(':number_home', $numberHome, PDO::PARAM_INT);
		*/
	}
}