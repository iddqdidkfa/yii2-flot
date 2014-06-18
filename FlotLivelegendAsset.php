<?php


namespace softcommerce\flot;

use yii\web\AssetBundle;

class FlotLivelegendAsset extends AssetBundle {
    public $sourcePath = '@vendor/softcommerce/jquery-flot/assets';
    public $js = [
        'js/jquery.flot.livelegend.min.js',
    ];

    public $depends = [
        'softcommerce\flot\FlotAsset',
    ];
} 