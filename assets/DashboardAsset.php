<?php

namespace app\assets;

/**
 * Application Asset File.
 */
class DashboardAsset extends \luya\web\Asset
{
    public $sourcePath = '@app/resources';

    public $js = [

    ];

    public $css = [
        'css/dashboard.css'
    ];

    public $publishOptions = [
        'only' => [
            'css/*',
            'js/*',
        ]
    ];
    public $depends = [
        'luya\admin\assets\Main',
    ];


}
