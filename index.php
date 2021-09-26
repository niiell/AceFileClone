<?php include('template/header.php');  ?>

<div class="wrap">
<div class="jumbotron">
<h1><?php echo $app['title'] ;?></h1>
<p class="lead"><?php echo $app['desc'] ;?></p>
<?php if (!empty($_COOKIE['user'])): ?>
<p><a class="btn btn-lg btn-primary" href="/manage/files" role="button">Manage</a></p>
<?php else: ?>
<?php if(!check_public()) : ?>
<p><a class="btn btn-lg btn-primary" href="/OAuth?r=<?= base64_encode(BASE_URL);?>" role="button">Manage</a></p>
    <?php endif; ?>
 <?php endif; ?>

<div class="userstats">
<div class="bxx">
<div class="hexagon user"><span class="glyphicon glyphicon-user"></span></div>
<div class="l">
Users<br />
<i style="display:inline-block" class="lead counter" data-count="0" id="t-user" id="s-users" data-val="0">loading..</i>
</div>
</div>
<div class="bxx">
<div class="hexagon file"><span class="glyphicon glyphicon-file"></span></div>
<div class="l">
Files<br />
<i style="display:inline-block" class="lead counter" data-count="0" id="t-files" data-val="0">loading..</i>
</div>
</div>
</div>

<script type="text/javascript">
setTimeout(getStatistic,2000);
function getStatistic() {
	var options={useEasing:true,useGrouping:true,separator:',',decimal:'.'};
	$.getJSON("/statistic", function(d){
		$('#t-user').attr('data-count',d.users);$('#t-files').attr('data-count',d.files);
		$('#t-space').text(d.space);$('#t-dls').attr('data-count',d.downloads);
		$('.counter').each(function(){
		  var $this=$(this),countTo=$this.attr('data-count'),
		  cUp=new CountUp(this,0,countTo,0,2.0,options);
		  if(!cUp.error)cUp.start();
		});
	});
}
</script>
<?php include('template/footer.php'); ?>