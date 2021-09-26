<?php ob_start(); require_once(realpath($_SERVER['DOCUMENT_ROOT']) . '/library/autoload.php'); ?>
<?php $broken_count = $WiClass->get_count('tb_broken', @$_user['email']); ?>
<?php $broken_badge = ($broken_count >= 1) ? 'badge-danger' : 'badge-secondary'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset=utf-8>
    <meta content="IE=edge" http-equiv=X-UA-Compatible>
    <meta content="width=device-width,initial-scale=1" name=viewport>
<?php if(BASE_PAGE == 'file.php' || BASE_PAGE == 'list-file.php'): ?>
    <meta name="robots" content="noindex,nofollow">
    <meta name="googlebot" content="noindex,nofollow">
<?php endif;?>
  <meta property="og:description" content="<?= $app['description'];?>"/>
    <meta property="og:image" content="/assetsimg/aoi.png"/>
    <meta property="og:type" content="website"/>
    <title><?= _NAME; ?> - Easy way to share your drive</title>
    <link rel="shortcut icon" href="/assets/img/favicons.png" />
    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,600,600i,700,700i,800,800i&amp;subset=latin-ext,vietnamese" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
    <!-- Bootstrap DataTable -->
    <script type='text/javascript' src='https://rawcdn.githack.com/idlocalhost/wimember/7fcdec3d0e6413624aeb5dc949ffc12db971b60f/countup.js'></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://rawcdn.githack.com/idlocalhost/wimember/ed8bf8f3581cef9de344311ef4017a5eae03ca2c/acestyle.css" />
    <link rel="stylesheet" type="text/css" href="https://rawcdn.githack.com/idlocalhost/wimember/6dec9f29a57d2bdc12dbeed990a92e90eabfe0c3/main.css" />
    <!-- Bootstrap DataTable -->
    <link rel="stylesheet" href="https://rawcdn.githack.com/idlocalhost/wimember/57dda2f4710913e4569aeb9badf4ce522daf6e17/bootstrap-table.min.css" />
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.3.4/sweetalert2.all.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- Bootstrap DataTable -->
    <script src="https://rawcdn.githack.com/idlocalhost/wimember/a70e27e095d8c308386a4ce510ef9d64d1eab858/bootstrap-table.min.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<style>
        .card {
	position: relative;
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-orient: vertical;
	-webkit-box-direction: normal;
	-ms-flex-direction: column;
	flex-direction: column;
	min-width: 0;
	word-wrap: break-word;
	background-color: #242a38;
	background-clip: border-box;
	border: 1px solid rgba(0,0,0,0.125);
	border-radius: 0.25rem;
	border-color: #373f53
}

.card>hr {
	margin-right: 0;
	margin-left: 0
}

.card>.list-group:first-child .list-group-item:first-child {
	border-top-left-radius: 0.25rem;
	border-top-right-radius: 0.25rem
}

.card>.list-group:last-child .list-group-item:last-child {
	border-bottom-right-radius: 0.25rem;
	border-bottom-left-radius: 0.25rem
}

.card-body {
	-webkit-box-flex: 1;
	-ms-flex: 1 1 auto;
	flex: 1 1 auto;
	padding: 1.25rem
}

.card-title {
	margin-bottom: 0.75rem
}

.card-subtitle {
	margin-top: -0.375rem;
	margin-bottom: 0
}

.card-text:last-child {
	margin-bottom: 0
}

.card-link:hover {
	text-decoration: none
}

.card-link+.card-link {
	margin-left: 1.25rem
}

.card-header {
	padding: 0.75rem 1.25rem;
	margin-bottom: 0;
	background-color: rgba(0,0,0,0.03);
	border-bottom: 1px solid rgba(0,0,0,0.125)
}

.card-header:first-child {
	border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0
}

.card-header+.list-group .list-group-item:first-child {
	border-top: 0
}

.card-footer {
	padding: 0.75rem 1.25rem;
	background-color: rgba(0,0,0,0.03);
	border-top: 1px solid rgba(0,0,0,0.125)
}

.card-footer:last-child {
	border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px)
}

.card-header-tabs {
	margin-right: -0.625rem;
	margin-bottom: -0.75rem;
	margin-left: -0.625rem;
	border-bottom: 0
}

.card-header-pills {
	margin-right: -0.625rem;
	margin-left: -0.625rem
}

.card-img-overlay {
	position: absolute;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	padding: 1.25rem
}

.card-img {
	width: 100%;
	border-radius: calc(0.25rem - 1px)
}

.card-img-top {
	width: 100%;
	border-top-left-radius: calc(0.25rem - 1px);
	border-top-right-radius: calc(0.25rem - 1px)
}

.card-img-bottom {
	width: 100%;
	border-bottom-right-radius: calc(0.25rem - 1px);
	border-bottom-left-radius: calc(0.25rem - 1px)
}

.card-deck {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-orient: vertical;
	-webkit-box-direction: normal;
	-ms-flex-direction: column;
	flex-direction: column
}

.card-deck .card {
	margin-bottom: 15px
}

@media (min-width: 576px) {
	.card-deck {
		-webkit-box-orient: horizontal;
		-webkit-box-direction: normal;
		-ms-flex-flow: row wrap;
		flex-flow: row wrap;
		margin-right: -15px;
		margin-left: -15px
	}

	.card-deck .card {
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-flex: 1;
		-ms-flex: 1 0 0%;
		flex: 1 0 0%;
		-webkit-box-orient: vertical;
		-webkit-box-direction: normal;
		-ms-flex-direction: column;
		flex-direction: column;
		margin-right: 15px;
		margin-bottom: 0;
		margin-left: 15px
	}
}

.card-group {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-orient: vertical;
	-webkit-box-direction: normal;
	-ms-flex-direction: column;
	flex-direction: column
}

.card-group>.card {
	margin-bottom: 15px
}

@media (min-width: 576px) {
	.card-group {
		-webkit-box-orient: horizontal;
		-webkit-box-direction: normal;
		-ms-flex-flow: row wrap;
		flex-flow: row wrap
	}

	.card-group>.card {
		-webkit-box-flex: 1;
		-ms-flex: 1 0 0%;
		flex: 1 0 0%;
		margin-bottom: 0
	}

	.card-group>.card+.card {
		margin-left: 0;
		border-left: 0
	}

	.card-group>.card:first-child {
		border-top-right-radius: 0;
		border-bottom-right-radius: 0
	}

	.card-group>.card:first-child .card-img-top,.card-group>.card:first-child .card-header {
		border-top-right-radius: 0
	}

	.card-group>.card:first-child .card-img-bottom,.card-group>.card:first-child .card-footer {
		border-bottom-right-radius: 0
	}

	.card-group>.card:last-child {
		border-top-left-radius: 0;
		border-bottom-left-radius: 0
	}

	.card-group>.card:last-child .card-img-top,.card-group>.card:last-child .card-header {
		border-top-left-radius: 0
	}

	.card-group>.card:last-child .card-img-bottom,.card-group>.card:last-child .card-footer {
		border-bottom-left-radius: 0
	}

	.card-group>.card:only-child {
		border-radius: 0.25rem
	}

	.card-group>.card:only-child .card-img-top,.card-group>.card:only-child .card-header {
		border-top-left-radius: 0.25rem;
		border-top-right-radius: 0.25rem
	}

	.card-group>.card:only-child .card-img-bottom,.card-group>.card:only-child .card-footer {
		border-bottom-right-radius: 0.25rem;
		border-bottom-left-radius: 0.25rem
	}

	.card-group>.card:not(:first-child):not(:last-child):not(:only-child) {
		border-radius: 0
	}

	.card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-img-top,.card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-img-bottom,.card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-header,.card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-footer {
		border-radius: 0
	}
}

.card-columns .card {
	margin-bottom: 0.75rem
}

@media (min-width: 576px) {
	.card-columns {
		-webkit-column-count: 3;
		column-count: 3;
		-webkit-column-gap: 1.25rem;
		column-gap: 1.25rem
	}

	.card-columns .card {
		display: inline-block;
		width: 100%
	}
}
    </style>
    <style>
        input.form-control{background:#1a1e27;border-color:#373f53;color:#fff}
    </style>
    <style>
        .form-control[disabled],
.form-control[readonly],
fieldset[disabled] .form-control {
  background-color: #242a38;
  opacity: 1;
}
    </style>
    <style>
        .fixed-table-container tbody 
        .selected td{background-color:transparent};
    </style>
    <style>
        .fixed-table-loading{display:none;position:absolute;top:42px;right:0;bottom:0;left:0;z-index:99;background-color:transparent;text-align:center}
    </style>
<style>
			body{
				color:white;
			}
    .form-control {
  display: block;
  width: 100%;
  height: 34px;
  padding: 6px 12px;
  font-size: 14px;
  color: #fff;
  background-color: #242a38;
  border: 1px solid #ccc;
  .box-shadow(inset 0 1px 1px rgba(0,0,0,.075));
  .transition(~"border-color ease-in-out .15s, box-shadow ease-in-out .15s");
		</style>
		<style>
		  .preload1{background:url(/assets/img/preloader.gif) no-repeat;display:none;height:50px;}  
		</style>
	<style>
	   @media screen and (max-width: 970px) {

  /* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
 .mobile-hide {
    display: none !important;
 }

}
	    </style>
</head>
<body style="background:#242a38;color:#fff;">
<div class="container">
<nav class="navbar navbar-default">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="/"><span class="glyphicon glyphicon-fire"></span> AceFile Clone</a>
</div>
<div id="navbar" class="navbar-collapse collapse">
    <?php if (!empty($_COOKIE['user'])): ?>
<ul class="nav navbar-nav">
    <?php if(!check_public()) : ?>
<li><a href="/">Home</a></li>
<li><a href="/manage/files">Files</a></li>
<li><a href="/upload-drive">Upload</a></li>
<li><a href="/copydrive">Copy Drive</a></li>
<!--<li><a href="/file-report">File Report <sup><span class="badge-pill <?=$broken_badge;?>"><?= $broken_count; ?></span></sup></a></li>-->
<?php if($_user['email'] == $app['admin']): ?>
        <li class="nav-item">
          <a href="/admin">Admin</a>
        </li>
        <?php endif; ?>
      <?php endif; ?>
</ul>
<?php endif;?>
<div class="nav navbar-nav navbar-right">
<?php if (!empty($_COOKIE['user'])): ?>
<div class="profil">
<a href="/account"><img src="<?= $_user['picture'];?>" class="rounded-circle" height="30"></a> 
<span class="name"><?= $_user['name']; ?> </span>
<span class="mail"><?= $_user['email']; ?></span>
 </div>
          <a class="btn btn-success log" href="/logout?r=<?= base64_encode(BASE_URL);?>">Log-out</a>
   
    <?php else: ?>
    <div class="navbar-nav navbar-right">
      <a class="btn btn-primary log" href="/OAuth?r=<?= base64_encode(BASE_URL);?>">Log-in</a>
      <a class="btn btn-primary log" href="/OAuth?r=<?= base64_encode(BASE_URL);?>">Register</a>
    </div>
    <?php endif;?>
        </div>
    </div>
  </div>
</nav>