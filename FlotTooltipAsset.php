<?php


namespace softcommerce\flot;


use yii\web\AssetBundle;

class FlotTooltipAsset extends AssetBundle {
	public $sourcePath = '@vendor/softcommerce/jquery-flot/assets';
	public $js = ['js/plugins/jquery.flot.tooltip.min.js'];
    public $css = ['css/jquery.flot.tooltip.min.css'];

	public $depends = [
		'softcommerce\flot\FlotAsset',
	];
} 