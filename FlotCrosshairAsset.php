<?php


namespace yii\flot;

use yii\web\AssetBundle;

class FlotCrosshairAsset extends AssetBundle {
    public $sourcePath = '@vendor/softcommerce/jquery-flot/assets';
    public $js = [
        'js/jquery.flot.crosshair.min.js',
    ];

    public $depends = [
        'yii\flot\FlotAsset',
    ];
} 