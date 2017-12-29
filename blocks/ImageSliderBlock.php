<?php

namespace app\blocks;

use luya\cms\base\PhpBlock;
use luya\cms\frontend\blockgroups\ProjectGroup;
use luya\cms\helpers\BlockHelper;

/**
 * Image Slider Block.
 *
 * File has been created with `block/create` command on LUYA version 1.0.0.
 */
class ImageSliderBlock extends PhpBlock {
    /**
     * @var bool Choose whether a block can be cached trough the caching component. Be carefull with caching container blocks.
     */
    public $cacheEnabled = true;

    /**
     * @var int The cache lifetime for this block in seconds (3600 = 1 hour), only affects when cacheEnabled is true
     */
    public $cacheExpiration = 3600;

    /**
     * @inheritDoc
     */
    public function blockGroup(){
        return ProjectGroup::class;
    }

    /**
     * @inheritDoc
     */
    public function name(){
        return 'Image Slider Block';
    }

    /**
     * @inheritDoc
     */
    public function icon(){
        return 'extension'; // see the list of icons on: https://design.google.com/icons/
    }

    /**
     * @inheritDoc
     */
    public function config(){
        return [
            'vars' => [
                ['var' => 'images', 'label' => 'Images', 'type' => self::TYPE_IMAGEUPLOAD_ARRAY, 'options' => ['no_filter' => false]],
            ],
        ];
    }

    /**
     * @inheritDoc
     */
    public function extraVars(){
        return [
            'images' => BlockHelper::imageArrayUpload($this->getVarValue('images'), false, true),
        ];
    }

    /**
     * {@inheritDoc}
     *
     * @param {{extras.images}}
     * @param {{vars.images}}
     */
    public function admin(){
        return '<h5 class="mb-3">Image Slider Block</h5>' .
            '<table class="table table-bordered">' .
            '{% if vars.images is not empty %}' .
            '<tr><td><b>Images</b></td><td>'.
            '{% for image in extras.images %}' .
            '<div>{{image.caption}}<img src="{{image.source}}" alt="{{image.caption}}" style="max-width: 100px;float: left; padding-left: 15px; padding-top: 15px;" /></div>' .
            '{% endfor %}' .
            '{% endif %}'.
            '</td></tr>' .
            '</table>';
    }
}