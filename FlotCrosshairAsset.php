<?php


namespace softcommerce\flot;

use yii\web\AssetBundle;

class FlotCrosshairAsset extends AssetBundle {
    public $sourcePath = '@vendor/softcommerce/jquery-flot/assets';
    public $js = [
        'js/plugins/jquery.flot.crosshair.min.js',
    ];

    public $depends = [
        'softcommerce\flot\FlotAsset',
    ];
} 