<?php require_once "topbar.php"; ?>
<?php
	require_once "../models/database.php";
	$conn = mysqli_connect($serverName,$userName,$password,$dbName) or die('Database Connection Error');

	$hId = $_SESSION['hotel_id'];

	$query = "SELECT * FROM hotel WHERE id = $hId";
	$result = mysqli_query($conn,$query);
	if($result)
	{
		$row = mysqli_fetch_array($result);

		$name = $row['name'];
		$img1 = $row['img1'];
		$img2 = $row['img2'];
		$img3 = $row['img3'];
		$img4 = $row['img4'];
		$facility = $row['facility'];
		$details = $row['details'];
	}
?>

<html>
	<head>
		<title>Enjoy Your Hotel</title>
	</head>

	<body style="background-color:LightGray">

		<table border="5">
			<tr>
				<font size="6"><b><?php echo $name;?></b></font>
			</tr>
			<tr>
				<td>
					<img
						src="<?php echo $img1;?>"
						height="180"
						width="270"
					/>
				</td>
				<td>
					<img
						src="<?php echo $img2;?>"
						height="180"
						width="270"
					/>
				</td>
				<td style="width:200px;">
					<font size="5">&nbsp;&nbsp;&nbsp;<b>Facility</b></font>
					<?php echo $facility;?>
				</td>
			</tr>
			<tr>
				<td>
					<img
						src="<?php echo $img3;?>"
						height="180"
						width="270"
					/>
				</td>
				<td>
					<img
						src="<?php echo $img4;?>"
						height="180"
						width="270"
					/>
				</td>
				<td style="width:200px; text-align: center;">
					<font size="5"><b>Cost:
						 <?php
							if($hId == 1 or $hId == 3 or $hId == 5 or $hId == 7 or $hId == 9 or $hId == 11)
								echo $_SESSION['cost1'];
							else
								echo $_SESSION['cost2'];
						 ?>
					</b></font>
					<br /><br />
					<a href="reserve.php"
						><font style="background-color: green; color: white;" size="5"
							>Reserve</font
						>
					</a>
				</td>
			</tr>
		</table>

		<br />

		<table border="1">
			<!--Hotel Details-->
			<tr>
				<td style="width: 760px;">
					<font size="5"><b>Details:</b></font
					><br />
					<p>
						<?php echo $details;?>
					</p>
				</td>
			</tr>
		</table>
	</body>
</html>