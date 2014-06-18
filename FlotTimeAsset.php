<?php


namespace softcommerce\flot;


use yii\web\AssetBundle;

class FlotTimeAsset extends AssetBundle {
	public $sourcePath = '@vendor/softcommerce/jquery-flot/assets';
	public $js = ['js/jquery.flot.time.min.js'];

	public $depends = [
		'yii\flot\FlotAsset',
	];
} 