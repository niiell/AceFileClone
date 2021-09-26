<?php include('template/header.php'); check_login(); changeTitle('Files Report - WiMember'); ?>
<div class="container" style="margin-top: 30px;">
	<div class="card">
		<strong class="card-header text-center bg-primary text-white"><i class="fa fa-flag"></i> Files Report</strong>
		<div class="card-body">
		<table data-toggle="table" 
			data-url="/myBrokenjson"
			data-pagination="true"
			data-show-toggle="true"
			data-show-refresh="true">
		<thead>
		<tr>
			<th data-field="filename" data-sortable="true">File Name</th>
			<th data-field="fileid">File ID</th>
			<th data-field="created_date" data-sortable="true">Date</th>
			<th data-field="stats" data-align="center">Status</th>
		</tr>
		</thead>
		</table>
	</div></div>
</div>
<?php include('template/footer.php'); ?>