<?php 
include(realpath($_SERVER['DOCUMENT_ROOT']) . '/template/header.php'); ?>
<?php changeTitle('API Docs - WiMember'); ?>
<div class="container" style="margin-top: 30px;">
	<div class="card">
		<div class="card-body text-muted">
			<h3 class="page-header">API Documentation <sup><small>(version 1)</small></sup></h3>
			<hr/>
			<p>For developers prepared API which returns responses in JSON formats.</p>
			<p>Currently there is one method which can be used to shorten links on behalf of your account.</p>
			<p>All you have to do is to send a GET request with your API token and URL Like the following:</p>
			<p><b>Host: </b></p>
			<div class="alert bg-primary"><?php echo BASE_HOST;?></div>
			
			<p><b>Parameters: </b></p>
			<table data-toggle="table">
				<thead>
					<tr>
					<th>Name</th>
					<th>Description</th>
					<th>Required</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>file</td>
						<td>Your Google File ID</td>
						<td><i>YES</i></td>
					</tr>
				</tbody>
			</table><br/><br/>
			<p><b>Example: </b></p>
			<div class="alert alert-dark"><?php echo BASE_HOST;?>/api/v1/?file=<b>FILE_ID</b></div>
		</div>
	</div>
</div>

<?php include(realpath($_SERVER['DOCUMENT_ROOT']).'/template/footer.php'); ?>