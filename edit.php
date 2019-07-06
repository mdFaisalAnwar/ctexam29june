<?php
include 'Connection.php';

$conn = new Connection;
$getId = $_GET['id'];
$res = $conn->getAll("SELECT * FROM avenger WHERE id=$getId",null);

//update method
if(isset($_POST['submit'])){

	$name = $_POST['name'];
	$utility_bill_amount = $_POST['utility_bill_amount'];
	$expenditure_daily_commodity = $_POST['expenditure_daily_commodity'];

	$data = array(
		':name' => $name,
		':utility_bill_amount' => $utility_bill_amount,
		':expenditure_daily_commodity' => $expenditure_daily_commodity
	);

	$conn->update("UPDATE avenger SET name=:name,utility_bill_amount=:utility_bill_amount,expenditure_daily_commodity=:expenditure_daily_commodity WHERE id=$getId",$data);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>edit</title>
</head>
<body>

	<form action="" method="POST">
		<?php
			foreach($res as $r){
		?>
		<input type="text" name="name" value="<?php echo $r['name']; ?>">
		<input type="text" name="utility_bill_amount" value="<?php echo $r['utility_bill_amount']; ?>">
		<input type="text" name="expenditure_daily_commodity" value="<?php echo $r['expenditure_daily_commodity']; ?>">
		<input type="submit" name="submit" value="Update">
		<?php
			}
		?>
	</form>

</body>
</html>