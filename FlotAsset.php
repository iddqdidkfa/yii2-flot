<?php


namespace softcommerce\flot;


use yii\web\AssetBundle;

class FlotAsset extends AssetBundle
{
	public $sourcePath = '@vendor/softcommerce/jquery-flot/assets';
	public $js = ['js/jquery.flot.min.js'];

	public $depends = [
		'yii\web\JqueryAsset',
	];
} 