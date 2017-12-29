<?php

namespace imageslider\assets;

class Main extends \yii\web\AssetBundle
{
    public $sourcePath = '@imageslider/resources';

    public $js = [
        'js/responsiveslides.js',
        'js/image-slider.js',
    ];

    public $css = [
        'css/responsiveslides.css',
        'css/responsiveslides-themes.css',
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
