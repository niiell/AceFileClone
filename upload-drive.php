<?php include('template/header.php'); check_login(); ?>
<?php changeTitle('Upload Drive - GShare'); ?>
<div class="container" style="margin-top: 30px;">
<div class="wrap">
<div class="selectarea">
          <button class="btn btn-success" type="button" onclick="onApiLoad()"><span class="glyphicon glyphicon-folder-open" style="margin-right: 5px;"></span> Select File</button></div>
         
          <form id="upload-picker"></form>
      </div>
      <div class="form-group text-center">
          <button id="btn-share" onclick="$('form').submit()" class="btn btn-primary ucen"><i class="fa fa-upload"></i> Upload</button>
      </div>
    </div>
  </div>
  <div class="container" style="margin-top: 30px;">
  <div class="card" id="shareFrm2" style="margin-top:20px;display:none;">
    <div class="card-body">
      <div class="form-group" id="sharetxt">
        <label for="sharetext">Download Link</label>
        <textarea style="background-color:#242a38;color:#fff;" class="form-control" rows="5" id="sharetext" readonly onclick="copier(this)" ></textarea>
      </div>
    </div>
</div>
</div> <!-- / contaier -->
<script type="text/javascript" src="/assets/js/gpicker.js?v2"></script>
<script src="https://apis.google.com/js/client.js?onload=initPicker"></script>
<?php include('template/footer.php'); ?>