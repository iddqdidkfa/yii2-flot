<?php


namespace softcommerce\flot;


use yii\web\AssetBundle;

class FlotResizeAsset extends AssetBundle {
	public $sourcePath = '@vendor/softcommerce/jquery-flot/assets';
	public $js = ['js/plugins/jquery.flot.resize.min.js'];

	public $depends = [
		'softcommerce\flot\FlotAsset',
	];
} 