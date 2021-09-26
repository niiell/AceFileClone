<?php
$configuration = array();
foreach ( array(
	'file' => $source,
	'image' => $image,
	'title' => '',
	'description' => '',
	'mediaid' => $id,
	'type' => 'mp4',
	'mute' => false,
	'autostart' => false,
	'nextupoffset' => -10,
	'repeat' => false,
	'abouttext' => '',
	'aboutlink' => '',
	'playbackRateControls' => false,
// 	'playbackRates' => 	[0.25, 0.5, 0.75, 1, 1.25, 1.5, 1.75, 2],
	'defaultBandwidthEstimate' => false,
	'controls' => true,
	'aspectratio' => false,
	'localization' => false,
	'height' => '100%',
	'width' => '100%',
	'displaytitle' => false,
	'displaydescription' => false,
	'stretching' => 'uniform',
	'nextUpDisplay' => false,
	'qualityLabels' => false,
	'base' => 'https://ssl.p.jwpcdn.com/player/v/8.3.3/',
	'preload' => 'metadata',
	'flashplayer' => 'https://ssl.p.jwpcdn.com/player/v/8.3.3/',
	'hlsjsdefault' => true,
	'skin' => array(
		'controlbar' => array(
			'text' => '#ff0046',
			'icons' => 'rgba( 255, 255, 255, 0.8 )',
			'iconsActive' => '#ff0046',
			'background' => 'rgba( 0, 0, 0, 0 )'
		),
		'timeslider' => array(
			'progress' => '#F2F2F2',
			'rail' => 'rgba( 255, 255, 255, 0.3 )'
		),
		'menus' => array(
			'text' => 'rgba( 255, 255, 255, 0.8 )',
			'textActive' => '#ff0046',
			'background' => '#333333'
		),
		'tooltips' => array(
			'text' => '#000000',
			'background' => '#ff0046'
		),
		'url' => false,
		'name' => false
	),
	'renderCaptionsNatively' => false,
	'captions' => array(
		'color' => '#ff0046',
		'fontSize' => 15,
		'fontFamily' => 'sans',
		'fontOpacity' => 100,
		'backgroundColor' => '#000000',
		'backgroundOpacity' => 75,
		'edgeStyle' => 'none',
		'windowColor' => '#000000',
		'windowOpacity' => 0
	),
	'logo' => array(
		'file' => '',
		'hide' => false,
		'link' => '',
		'margin' => 20,
		'position' => 'top-right'
	),
// 	'sharing' => array(
// 		'link' => $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'],
// 		'heading' => 'Share Video',
// 		'sites' => array(
// 			'facebook',
// 			'twitter',
// 			'interest',
// 			'email',
// 			'tumblr',
// 			'googleplus',
// 			'reddit',
// 			'linkedin'
// 		)
// 	)
) as $name => $value ) {
	$GLOBALS[ $name ] = isset( $_GET[ $name ] ) ? $_GET[ $name ] : $value;
	$configuration[ $name ] = $GLOBALS[ $name ];
}
?>