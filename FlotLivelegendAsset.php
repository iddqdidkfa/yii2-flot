<?php


namespace yii\flot;

use yii\web\AssetBundle;

class FlotLivelegendAsset extends AssetBundle {
    public $sourcePath = '@vendor/softcommerce/jquery-flot/assets';
    public $js = [
        'js/jquery.flot.livelegend.min.js',
    ];

    public $depends = [
        'yii\flot\FlotAsset',
    ];
} 