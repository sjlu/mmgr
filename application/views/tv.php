<div class="container">
	<h2>mmgr - tv</h2>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>History</h3>
			<table class="table table-bordered table-striped">
				<thead>
					<th>Show</th>
					<th>Date</th>
				</thead>
				<tbody>
					<?php foreach ($history as $history_item): ?>
						<tr>
							<td>
								<?php echo $history_item['show_name']; ?>
								<?php echo $history_item['number']; ?>
							</td>
							<td>
								<?php echo $history_item['readable_date']; ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Series</h3>
			<table class="table table-bordered table-striped">
				<thead>
					<th>Name</th>
					<th>Status</th>
					<th>Next Ep.</th>
				</thead>
				<tbody>
					<?php foreach($shows as $show): ?>
						<tr>
							<td><?php echo $show['show_name']; ?></td>
							<td>
								<?php if ($show['status'] == "Ended"): ?>
									Ended
								<?php elseif ($show['paused'] == 1): ?>
									Paused
								<?php else: ?>
									Continuing
								<?php endif; ?>
							</td>
							<td>
								<?php echo $show['readable_next_ep_airdate']; ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>