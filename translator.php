<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<div>
	<form method="POST" action=" ">
		<table>
			<tr>
				<td>
						English:<input type="text" name="English">
				</td>
				<td>
						
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" value="Translate" name="TranslateToAm">
				</td>
			</tr>
		</table>
	</form>
	<form method="POST" action=" ">
		<table>
			<tr>
				<td>
						Armenian:<input type="text" name="Armenian">
				</td>
				<td>
						
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" value="Translate" name="TranslateToEn">
				</td>
			</tr>
		</table>
	</form>
</div>


<?php
$zz = new mysqli("localhost","root","","translator");
if (!$zz->set_charset("utf8"))
{
	echo 'Connection failed :'.$zz->connection_error;
}

global $trans , $trans1;

if(isset($_POST["English"]) and $_POST["English"] != '' )
	$trans = $_POST['English'];
if(isset($_POST["Armenian"]) and $_POST["Armenian"] != '' )
	$trans1 = $_POST['Armenian'];

		if(isset($_POST['TranslateToAm']) || isset($_POST['TranslateToEn'])){
			$datas = "SELECT * FROM langs WHERE English = '$trans' or Armenian='$trans1' ";
			$conn=$zz->query($datas);
			if($conn->num_rows > 0 ){

				while($row = $conn->fetch_assoc()){
					if($trans){
						echo "<td>"." ".$row['Armenian']."</td>"."<br>";

					}else{
						echo "<td>"." ".$row['English']."</td>"."<br>";
					}
				}
			}

		else{

			echo "no results found! ";

		}

}



$zz->close();
?>

</body>
</html>
