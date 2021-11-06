<?php require "dbconn.php"?>
<style>
.nav {
	width: 100%;
  background-color: #333;
	height: 55px;
}
.button {
    align-items: center;
    display: flex;
    justify-content: center;
    padding: 8px;
	margin-bottom: 5px;
}


ul {
	list-style:none;
	padding: 0;
margin: 0;
	position: absolute;
}
ul li {
	float: left;
	margin-top: 10px;
	
	
}

ul li .a1{
	
	width: 150px;
	color: white;
	display:block;
	text-decoration: none;
	font-size: 15px;
	text-align:center;
	padding: 0px;
	border-radius: 10px;
	font-family:Century Gothic;
	
}
.a1:hover {
	background:#669900;
	text-decoration: none;
	
}
ul li ul {
	
	  background-color: #333;
}
ul li ul li {
	float:none;
}
ul li ul {
	display: none;
}

ul li:hover ul {
	display:block;
	
}
#subjects {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  table-layout: auto;
  width: 110%;  


}

#subjects td, #subjects th {
  border: 1px solid #ddd;
  padding: 8px;
}

#subjects tr:nth-child(even){background-color: #f2f2f2;}

#subjects tr:hover {background-color: #ddd;}

#subjects th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
.arrow {
	position: relative;
	right: 10px;
)
  
</style>
</style>
<div class="col-xs-9">
       <table id="subjects">
	         <thead class="mb-5">
                 <tr>
		
				        <th scope="col">ID</th>
						<th scope="col">Payer ID</th>
						<th scope="col">Payment ID</th>
						<th scope="col"><center>Email</center></th>
						<th scope="col"><center>Amount</center></th>
						<th scope="col"><center>Currency</center></th>
						<th scope="col"><center>Status</center></th>


				 </tr>
				 </thead>
<?php

$sql = "SELECT * FROM admin_payments ORDER by pay_id";
$result = mysqli_query($con, $sql);


if (mysqli_num_rows($result) > 0)
{

  ?>


				 <?php
	
				       while($row = mysqli_fetch_assoc($result)){
						   $Status = $row['Status'];
    ?>
	
	

						<tbody>
						<tr>
						
								
						        <td><?php echo $row['pay_id']; ?></td>	
								<td><?php echo $row['payer_id']; ?></td>
								<td><?php echo $row['payment_id']; ?></td>
								<td><?php echo $row['payer_email']; ?></td>	
								<td><?php echo $row['amount']; ?></td>	
								<td><?php echo $row['currency']; ?></td>	
								<td><?php echo $row['payment_status']; ?></td>	
						
								  
						 </tr>

			</tbody>
			
			
<?php 

}
?>
			
<?php 

}
?>

<button><a href="index.php" >Home</button>