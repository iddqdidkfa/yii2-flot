<?php


namespace yii\flot;


use yii\web\AssetBundle;

class FlotPieAsset extends AssetBundle {
	public $sourcePath = '@vendor/softcommerce/jquery-flot/assets';
	public $js = ['js/jquery.flot.pie.min.js'];
	public $css = ['css/jquery.flot.pie.min.css'];

	public $depends = [
		'yii\flot\FlotAsset',
	];
} 