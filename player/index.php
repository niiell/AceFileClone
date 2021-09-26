<?php
header( 'Content-Type: text/html' );
require_once( __DIR__ . '/setup.php' );
require_once( __DIR__ . '/configuration.php' );
$setup = json_encode( $configuration );
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php
echo $title;
?></title>
		<script type="text/javascript" src="./resources/js/jwpatch.min.js"></script>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style type="text/css">
		html, body {
			margin: 0;
			padding: 0;
		}
		#jw-container {
			position: absolute;
			width: 100% !important;
			height: 100% !important;
		}
		</style>
	</head>
	<body>
		<div id="jw-container"></div>
		<script type="text/javascript">
		window.drivexceed = function() {
			window.jwplayer.key = 'lNF7IJRDdCbfDkAK0e5dkLSgLayOmkcN0sCV/AI/P1SDfNBkhRl2/KTg+GqppwJH5z1n4XYryTY=';
			window.jwplayer( 'jw-container' ).setup( <?php echo $setup; ?> );
		};
		</script>
	</body>
</html>
<?php
exit;
?>