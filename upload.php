<?php include('template/header.php'); check_login(); ?>
<?php changeTitle('Upload Link - GShare'); ?>
<div class="container" style="margin-top: 30px;">
<div class="wrap">
<h1 class="ct">
Copy file from public google drive links to your drive<br />
<small>if the file is already yours, we will insert it into our database instead of copying it.</small>
</h1>
<form method="POST" id="upload-url">
<div class="selectareax">
			      <textarea style="background-color:#242a38;color:#fff;" class="form-control" id="file_url" name="file_url" rows="7" placeholder="Paste google drive link here"></textarea>
			    </div>
                    <div id="fileInfo" style="margin-top:25px;"></div>
			    	<button type="submit" id="btn-share" class="btn btn-primary ucen"><span class="glyphicon glyphicon-cloud-upload" style="margin-right: 5px;"></span> Upload</button>
			    </div>
			</form>
			<center><div class="preload1"> Uploading...</div></center>
		</div>
	</div>
	<div class="container" style="margin-top: 30px;">
  <div class="card" id="shareFrm1" style="margin-top:20px;display:none;">
    <div class="card-body">
      <div class="form-group" id="sharetxt">
        <label for="sharetext">Download Link</label>
        <div class="form-control" id="sharetext"></div>
      </div>
    </div>
</div>
</div> <!-- / contaier -->
<?php kaki: include('template/footer.php'); ?>