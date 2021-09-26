<?php include('template/header.php'); check_login(); ?>
<?php changeTitle('Account - WiMember'); ?>
<div class="container" style="margin-top: 30px;">
	<div class="card">
		<strong class="card-header text-center bg-primary text-white"><i class="fa fa-user"></i> Account</strong>
		<div class="card-body">
			<div class="row" style="margin-top: 10px;margin-bottom: 30px;margin-left: 10px;">
				<div class="col-md-6" style="margin-top: 20px;">
				    <label class="control-label"><span class="input-group-text fa fa-envelope"></span> Name:</label>
							<input class="form-control" readonly value="<?php echo $_user['name'];?>">
						</div>
						 
						<div class="col-md-6" style="margin-top: 20px;">
						    <label class="control-label"><span class="input-group-text fa fa-envelope"></span> Email:</label>
							<input type="email" class="form-control bg-light" value="<?php echo $_user['email'];?>" disabled>
						</div>
						
				<div class="col-md-6" style="margin-top: 20px;">
				    <label class="control-label"><span class="input-group-text fa fa-plane"></span> Account Plan:</label>
							<input disabled class="form-control bg-light" value="Paid account">
						</div>
					</div>
				</div>
			</div> <!-- /row -->
		</div> <!-- / card-body -->
	</div> <!-- / card -->
</div>
<?php include('template/footer.php'); ?>