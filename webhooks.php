<?php 
require_once 'config.php';
include 'layouts/header.php'; 

$paymongoResponse = $paymongo->get('webhooks');

$paymongoWebhooks = json_decode($paymongoResponse->getBody(), true);
?>


<form action="create_webhook.php" method="post">
	<div class="webhook">
			<div class="createWebhook">
				<input type="hidden" name="type" value="paymongo">
				<input class="paymongo" type="submit" name="submit" value="Create Webhook">
				<input type="text" name="url" class="url" placeholder="URL">
			</div>
		<table id="subjects" style="width:80%; margin:0 auto;">
				<thead class="mb-5">
					<tr>
						<th colspan="6" class="title-header">Paymongo Webhooks</th>
					</tr>
					<tr>
						<th scope="col" width="30%">ID</th>
						<th scope="col">Events</th>
						<th scope="col" width="10%">Status</th>
						<th scope="col" width="30%"><center>Url</center></th>
						<th scope="col" width="20%"><center>Created At</center></th>
						<th scope="col"><center>Action</center></th>
					</tr>
			</thead>
			<tbody>

				<?php 
					foreach ($paymongoWebhooks['data'] as $webhook) {
				?>
					<tr>
						<td><?php echo $webhook['id'] ?></td>	
						<td><?php echo implode(', ', $webhook['attributes']['events']) ?></td>
						<td><?php echo $webhook['attributes']['status']?> </td>
						<td><?php echo $webhook['attributes']['url'] ?></td>	
						<td><?php echo date('F j, Y', $webhook['attributes']['created_at']) ?></td>
						<td width="5%">
							<button class="danger delete">
								Delete
							</button>
						</td>	
					</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
</form>
<?php include 'layouts/footer.php'; ?>
