<?php


session_start();
if(!isset($_SESSION['logged_id'])){
	header("location:login.php");
 }

include 'Connection.php';

$conn = new Connection;


	$result = $conn->getAll("SELECT * FROM avenger",null);


if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$utility_bill_amount = $_POST['utility_bill_amount'];
	$expenditure_daily_commodity = $_POST['expenditure_daily_commodity'];

	$conn->insertAvenger($name,$utility_bill_amount,$expenditure_daily_commodity);
    
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>form collection</title>
</head>
<body>

	<a href="logout.php">logout</a>

	<form action="" method="POST">
		<input type="text" name="name" placeholder="Your Name"><br>
		<input type="text" name="utility_bill_amount" placeholder="utility_bill_amount"><br>
		<input type="text" name="expenditure_daily_commodity" placeholder="expenditure_daily_commodity"><br>
		
		<input type="submit" name="submit" value="Insert">
	</form>

	<hr>

	<hr>

	<table border="1">
		<?php 
		foreach ($result as $res){
		?>
		<tr>
			<td><?php echo $res['id'] ?></td>
			<td><?php echo $res['name'] ?></td>
			<td><?php echo $res['utility_bill_amount'] ?></td>
			<td><?php echo $res['expenditure_daily_commodity'] ?></td>
			<td><a href="edit.php?id=<?php echo $res['id']; ?>">edit</a></td>
			<td><a onclick="return confirm('Are you sure?')" href="delete.php?id=<?php echo $res['id']; ?>">delete</a></td>
		</tr>

		<?php
		}
		?>
	</table>

</body>
</html>