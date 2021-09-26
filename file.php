<?php include('template/header.php'); ?>
<?php get_token_file(); ?>
<?php
include "curl_gd.php";
$file_id 	= $_REQUEST['id'];
$get_file 	= $WiClass->get_file($file_id);
$filename 	= $get_file['file_name'];
$fileext  	= getFileExtension($filename);
$filesize 	= filesize_formatted($get_file['file_size']);
$filedate 	= timeAgo($get_file['created_date']);
$filedls	= $get_file['downloads'];
if($_GET['id'] != ""){
	$file_id = $_GET['id'];
	$gid = my_simple_crypt($file_id, 'd');
}
if($_POST['asdf']){
	$file_id  = $_POST['asdf'];
	$gid = my_simple_crypt($file_id, 'd');
	$url = "https://cord-cinema.glitch.me/drive/$file_id";
	$json = file_get_contents($url);
	$json_data = json_decode($json, true);
	$link = $json_data['src'];
	echo "<meta http-equiv='refresh' content='0;url=$link'>";}
?>
<?php if (!$get_file): changeTitle('File not Found', 'File was not found!'); ?>
<div class="container" style="margin-top: 50px;">
	<div style="text-align: center;" class="alert alert-danger"><h4 class="fa fa-exclamation-triangle fa-4x" aria-hidden="true"></h4><br/><label>The file you are trying to download is no longer available!</label></div>
</div>
<?php goto liwat; else:
# -- Change Title
$title = "$filename - $filesize";
$desc = "Download $filename - $filesize";
$icon = get_icon($fileext);
changeTitle($title, $desc, $icon);
endif;
?>

<div id="teaser2" class="mobile-hide" style="margin-top: 230px;margin-left: 100px;width:auto; height:0; text-align:left; display:scroll;position:absolute; top:0px;left:0px;">
<div>
    <a id="close-teaser" onclick="document.getElementById('teaser2').style.display = 'none';" style="cursor:pointer;"><center>
        <img src='http://4.bp.blogspot.com/-9MWyoN5VsJM/TivTpPyUuhI/AAAAAAAABL0/ldO739MTRBg/s1600/close3.png' alt='close' title='close button'/>
        </center></a>
</div>
<?php echo ($ads['left']) ; ?>
</div>
</div>

<div id="teaser3" class="mobile-hide" style="margin-top: 230px;margin-right: 100px;width:auto; height:600; text-align:right; display:scroll;position:absolute; top:0px;right:0px;">

<div>
    <a id="close-teaser" onclick="document.getElementById('teaser3').style.display = 'none';" style="cursor:pointer;"><center>
        <img src='http://4.bp.blogspot.com/-9MWyoN5VsJM/TivTpPyUuhI/AAAAAAAABL0/ldO739MTRBg/s1600/close3.png' alt='close' title='close button'/>
        </center></a>
        </div>
        <?php echo ($ads['right']) ; ?>
        </div>
</div>
<div class="container" style="margin-top: 40px;">

<?php echo ($ads['player1']) ; ?>
	<br/>
	    <br/>
	         <br/>
	<div>
	    
	        
		<?php if($plugins['player'] && allow_video($fileext)) : ?>
		<div class="embed-responsive embed-responsive-16by9" style="border-radius:1px;">
			<iframe class="embed-responsive-item" src="/player/?id=<?php print $get_file['file_id']; ?>" scrolling="no" allowfullscreen="true" width="100%" height="100%"></iframe>
		</div>
		
		<?php elseif(!$plugins['player']): ?>
			<div class="alert alert-danger"><span>Video plugin was disabled by Admin</span></div>
		<?php else : ?>
			<div class="alert alert-danger"><span>We're sorry, the preview didn't load. This file type may not be supported</span></div>
		<?php endif; ?>
	</div>
	<br/>
<!--	<textarea class="form-control embedcode" readonly onclick="copier(this)"><iframe src="<?php echo $site; ?>/player/?id=<?php print $get_file['file_id']; ?>" scrolling="no" allowfullscreen="true" width="100%" height="100%"></iframe>-->
<!--</textarea>-->
<br/>
<div class="fileinfo">
<span>Filename : <?php echo $filename; ?></span>
<span>Size : <?php echo $filesize; ?></span>
<span>Added on : <?php echo $filedate; ?></span>
<span>Uploader : <?php echo "<b>$get_file[file_owner]</b>";?></span>
</div>

<?php if (!empty($_COOKIE['user'])): ?>
<center><div class="btn" style="margin: 10px;">
<a data-target="dl" href="#dl" onclick="dl(this)" class="btn btn-primary ucen"><span class="glyphicon glyphicon-cloud-download"></span> Download Original</a>
</div></center>
<?php if ($plugins['download']) : ?>
<p><form method="post" action="">
                        <center>
                            <p><input type="hidden" name="asdf" value="<?php print $get_file['file_id']; ?>">
                        <button style="margin: 10px;"class="btn btn-primary ucen" onclick="generate()" id="btns"><span class="glyphicon glyphicon-cloud-download"></span> Direct Download</button>
                        <a id="dlfl" name="asdf" href="<?php print $get_file['file_id']; ?>" style="display:none"><span class="glyphicon glyphicon-cloud-download"></span> Download Ulang</a></center>
                       
                        </form></p>
		<?php endif; ?>
<?php else: ?>
<?php if(!check_public()) : ?>
<p><center><div class="btn" style="margin: 10px;">
<a href="/OAuth?r=<?= base64_encode(BASE_URL);?>" class="btn btn-primary ucen"><span class="glyphicon glyphicon-cloud-user"></span> Login to Download</a>
</div></center></p>
    <?php endif; ?>
 <?php endif; ?>


                        
	<center>
	<?php echo ($ads['player2']) ; ?>
	</center>
	<br/>
	    <br/>
	         <br/>
	<div class="embed">
<div class="nv">
	 
	      <a class="btn btn-warning btn-xs"  data-toggle="tab" href="#dlink"><i class="fa fa-download"></i> Link</a>
	 
	 
	      <a class="btn btn-warning btn-xs"  data-toggle="tab" href="#htmlcode"><i class="fa fa-html5"></i> HTML Code</a>
	 
	 
	      <a class="btn btn-warning btn-xs"  data-toggle="tab"  href="#bbcode"><i class="fa fa-code-fork"></i> BB Code</a>
	</div>
	<div id="myTabContent" class="tab-content">
	  <div class="tab-pane fade in active" id="dlink">
	    <textarea style="color: #fff;background-color: #242a38;box-shadow(inset 0 1px 1px rgba(0,0,0,.075));transition(~"border-color ease-in-out .15s, box-shadow ease-in-out .15s");" readonly onclick="copier(this)" class="form-control" value="<?php echo $site; ?>/<?php echo $file_id; ?>"><?php echo $site; ?>/<?php echo $file_id; ?></textarea>
	  </div>
	  <div class="tab-pane fade" id="htmlcode">
	    <textarea style="color: #fff;background-color: #242a38;box-shadow(inset 0 1px 1px rgba(0,0,0,.075));transition(~"border-color ease-in-out .15s, box-shadow ease-in-out .15s");" readonly onclick="copier(this)" class="form-control" value='<?php print htmlcode($file_id, $filename.' - '.$filesize); ?>'><?php print htmlcode($file_id, $filename.' - '.$filesize); ?></textarea>
	  </div>
	  <div class="tab-pane fade" id="bbcode">
	    <textarea style="color: #fff;background-color: #242a38;box-shadow(inset 0 1px 1px rgba(0,0,0,.075));transition(~"border-color ease-in-out .15s, box-shadow ease-in-out .15s");" readonly onclick="copier(this)" class="form-control" value='<?php print bbcode($file_id, $filename.' - '.$filesize); ?>'><?php print bbcode($file_id, $filename.' - '.$filesize); ?></textarea>
	  </div>
	</div><br/>
	 <br/>
	<center>
	<?php echo ($ads['player3']) ; ?>
	</center>
	<br/>
	    <br/>
	</div>
</div>
<?php echo ($popads['player']) ; ?>
<!--/-->
<script type="text/javascript">(function(a,b,c){var e,f=a.getElementsByTagName(b)[0];a.getElementById(c)||(e=a.createElement(b),e.id=c,e.src='//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.10&appId=686664881396932',f.parentNode.insertBefore(e,f))})(document,'script','facebook-jssdk');var file_id='<?php echo $file_id; ?>';function popupwindow(a,b){var c=400,d=400,e=screen.width/2-c/2,f=screen.height/2-d/2;return window.open(a,b,'toolbar=no, location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,copyhistory=no,width='+c+',height='+d+',top='+f+',left='+e)}var dlUrl="/download?token=<?php print $_SESSION['file_token'].'&id='.$file_id; ?>";
</script>
<!-- ADS -->

<!-- PopAds.net Popunder Code End -->
<script src="https://rawcdn.githack.com/idlocalhost/wimember/aac9be084d26b1c96c6789ad62564c4d6b99e92d/adbdetect.packed.js"></script>
<script type="text/javascript">
adBDetect().setup({
	wait:1000,
	setPage:'/page/ad-detect.html'
}).start();
</script>
<script type="text/javascript">
adBDetect().setup({
	wait:1000,
	setPage:'/page/ad-detect.html'
}).start();
</script>
    <script>
        function generate() {
           
    var linkDL = document.getElementById("dlfl"),
        btn = document.getElementById("btns"),
        direklink = document.getElementById("dlfl").href,
        waktu = 10;
    var teks_waktu = document.createElement("span");
    linkDL.parentNode.replaceChild(teks_waktu, linkDL);
    var id;
    id = setInterval(function () {
        waktu--;
        if (waktu < 0) {
            teks_waktu.parentNode.replaceChild(linkDL, teks_waktu);
            clearInterval(id);
            window.location.replace(direklink);
            linkDL.style.display = "inline";
			
        } else {
            teks_waktu.innerHTML = "<i class='fa fa-clock-o' aria-hidden='true style='color:white' '/> " + "Pleasewait.... " + "<i class='fa fa-refresh fa-spin' aria-hidden='true style='color:white' '/>";
            btns.style.display = "none";
        }
    }, 1000);
}

//<![CDATA[
function loadCSS(e, t, n) { "use strict";  document.getElementById("download").style.color = "white"; var i = window.document.createElement("link"); var o = t || window.document.getElementsByTagName("script")[0]; i.rel = "stylesheet"; i.href = e; i.media = "only x"; o.parentNode.insertBefore(i, o); setTimeout(function () { i.media = n || "all" }) }
loadCSS("//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");loadCSS("https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700");
//]]>
    </script>

<?php liwat: include('template/footer.php'); ?>