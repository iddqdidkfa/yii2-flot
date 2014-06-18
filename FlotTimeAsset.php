<?php


namespace softcommerce\flot;


use yii\web\AssetBundle;

class FlotTimeAsset extends AssetBundle {
	public $sourcePath = '@vendor/softcommerce/jquery-flot/assets';
	public $js = ['js/plugins/jquery.flot.time.min.js'];

	public $depends = [
		'softcommerce\flot\FlotAsset',
	];
} 