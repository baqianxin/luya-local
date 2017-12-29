<?php

namespace imageslider\blocks;

use imageslider\Module;

class SliderBlock extends \cmsadmin\base\Block
{
    public $module = 'imageslider';

    public $cacheEnabled = true;

    public $assets = [
        'imageslider\assets\Main',
    ];

    public function name()
    {
        return 'Image Slider';
    }

    public function icon()
    {
        return 'image';
    }

    public function config()
    {
        return [
            'vars' => [
                ['var' => 'imageArrays', 'label' => 'Images', 'type' => 'zaa-image-array-upload'],
            ],
        ];
    }

    public function extraVars()
    {
        return [
            'images' => $this->zaaImageArrayUpload($this->getVarValue('imageArrays'))
        ];
    }

    public function twigFrontend()
    {
        return '
        <ul class="image-slider rslides">
        {% for item in extras.images %}
            <li><img src="{{ item.source }}"></li>
        {% endfor %}
        </ul>';
    }

    public function twigAdmin()
    {
        return '{% if extras.images is empty %}<span class="block__empty-text">' . 'empty' . '</span>{% else %}
            {{extras.images|length}} images in slider
        {% endif %}';
    }
}
