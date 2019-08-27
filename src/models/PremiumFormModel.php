<?php

class PremiumFormModel extends Database
{
	public function send($datas, $table)
	{
		$name 			= $datas['name'];
		$lastName 		= $datas['last_name'];
		$pseudo 		= $datas['pseudo'];
		$donationAmount = $datas['donation_amount'];
		$payementDate 	= date("Y-m-d");

		switch ($donationAmount) {
			case ($donationAmount >= 5 && $donationAmount < 10):
				# code...
				break;
			
			case ($donationAmount >= 10 && $donationAmount < 10):
				# code...
				break;

			case ($donationAmount >= 20 && $donationAmount < 30):
				# code...
				break;

			case ($donationAmount >= 30 && $donationAmount < 40):
				# code...
				break;

			case ($donationAmount >= 40 && $donationAmount < 50):
				# code...
				break;

			case ($donationAmount >= 50 && $donationAmount < 60):
				# code...
				break;

			case ($donationAmount >= 60 && $donationAmount < 70):
				# code...
				break;
			
			case ($donationAmount >= 70 && $donationAmount < 80):
				# code...
				break;

			case ($donationAmount >= 80 && $donationAmount < 90):
				# code...
				break;

			case ($donationAmount >= 90 && $donationAmount < 100):
				# code...
				break;

			case ($donationAmount >= 100 && $donationAmount < 200):
				# code...
				break;

			case ($donationAmount >= 200):
				# code...
				break;
		}
		
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