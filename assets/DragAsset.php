<?php

namespace app\assets;

/**
 * Application Asset File.
 */
class ResourcesAsset extends \luya\web\Asset
{
    public $sourcePath = '@app/resources';
    public $js = [
        '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js',
        'https://cdn.bootcss.com/web-animations/2.3.1/web-animations.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/muuri/0.5.3/muuri.min.js',
        'https://haltu.github.io/muuri/scripts/demo-kanban.js'

    ];
    
    public $css = [
        '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',
//        '//fonts.googleapis.com/css?family=Open+Sans:300,400,600',
        '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css',
        'https://haltu.github.io/muuri/styles/demo-kanban.css?v=5',
        'css/style.css'
    ];
    
    public $publishOptions = [
        'only' => [
            'css/*',
            'js/*',
        ]
    ];
    
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
