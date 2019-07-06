<?php 

class Connection{

	public $conn;

	public function __construct()
	{
		$this->conn = new PDO('mysql:host=localhost;dbname=ctg219_oop','root','');
	}


    
    public function insertAvenger($name,$utility_bill_amount,$expenditure_daily_commodity)
	{
		try{
			$statement = $this->conn->prepare("INSERT INTO avenger (name,utility_bill_amount,expenditure_daily_commodity) VALUES (:name,:utility_bill_amount,:expenditure_daily_commodity)");
					$statement->execute(
						array(
							':name' => $name,
							':utility_bill_amount' => $utility_bill_amount,
							':expenditure_daily_commodity' => $expenditure_daily_commodity
						)
					);
					echo "Inserted";
		}catch(\Exception $e){
			echo "error: ".$e->getMessage();
		}
		
	}
    
    
    
    
    
	

	public function getAll($query,$array)
	{
		$statement = $this->conn->prepare($query);
		$statement->execute($array);
		return $statement->fetchAll();
	}


	public function update($query,$array)
	{
		$statement = $this->conn->prepare($query);
		$statement->execute($array);
	}


}


?>