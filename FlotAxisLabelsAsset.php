<?php


namespace yii\flot;


use yii\web\AssetBundle;

class FlotAxisLabelsAsset extends AssetBundle {
	public $sourcePath = '@vendor/softcommerce/jquery-flot/assets';
	public $js = ['js/jquery.flot.axislabels.min.js'];

	public $depends = [
		'yii\flot\FlotAsset',
	];
} 