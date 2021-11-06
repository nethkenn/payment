<?php require "dbconn.php"?>
<link rel="stylesheet" href="assets/style.css">
<button class="primary"><a href="index.php" >Home</button>
<div class="col-xs-9">
       <table id="subjects" style="width:90%; margin:0 auto;">
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
				 <tbody>
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
								<tr>
										<td><?php echo $row['pay_id']; ?></td>	
										<td><?php echo $row['payer_id']; ?></td>
										<td><?php echo $row['payment_id']; ?></td>
										<td><?php echo $row['payer_email']; ?></td>	
										<td><?php echo $row['amount']; ?></td>	
										<td><?php echo $row['currency']; ?></td>	
										<td><?php echo $row['payment_status']; ?></td>	
									</tr>
						
						<?php 
								}
						}
						?>
			</tbody>
	   </table>