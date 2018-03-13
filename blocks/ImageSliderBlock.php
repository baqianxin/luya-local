<?php

namespace app\blocks;

use app\modules\addressbook\models\Contact;
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
    public $cacheEnabled = false;

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
        return 'photo_library'; // see the list of icons on: https://design.google.com/icons/
    }


    public function injectors()
    {
        return [
            'newsData' => new \luya\cms\injectors\ActiveQueryCheckboxInjector([
                'query' => Contact::find(),
                'label' => 'salutation', // This attribute from the model is used to render the admin block dropdown selection.
                'type' => self::INJECTOR_VAR,
                'varLabel' => 'Select Contact', // The Block form label
            ])
        ];
    }

    /**
     * @inheritDoc
     */
    public function config(){
        return [
            'vars' => [
                ['var' => 'image', 'label' => 'Image', 'type' => self::TYPE_IMAGEUPLOAD, 'options' => ['no_filter' => true]],
                ['var' => 'text', 'label' => 'Text', 'type' => self::TYPE_TEXTAREA],
                ['var' => 'download', 'label' => 'Download', 'type' => self::TYPE_FILEUPLOAD],
                ['var' => 'mytext', 'label' => 'The Text', 'type' => self::TYPE_TEXT],
                ['var' => 'images', 'label' => 'Images', 'type' => self::TYPE_IMAGEUPLOAD_ARRAY, 'options' => ['no_filter' => false]],

                ['var' => 'people', 'label' => 'People', 'type' => self::TYPE_MULTIPLE_INPUTS, 'options' => [
                    [
                        'type' => self::TYPE_SELECT,
                        'var' => 'salutation',
                        'label' => 'Salutation',
                        'options' => [
                            ['value' => 1, 'label' => 'Mr.'],
                            ['value' => 2, 'label' => 'Mrs.'],
                        ]
                    ],
                    [
                        'type' => self::TYPE_TEXT,
                        'var' => 'name',
                        'label' => 'Name'
                    ],
                ]
                ]
            ],
        ];
    }

    /**
     * @inheritDoc
     */
    public function extraVars(){
        return [
            'mytext' => $this->getVarValue('mytext'),
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
            '<tr><td><b>Images</b></td><td><div class="row">'.
            '{% for image in extras.images %}' .
            '<div class="col-md-2 col-lg-2"><img src="{{image.source}}" alt="{{image.caption}}" style="max-width: 100%;padding-top: 5px;" /></div>' .
            '{% endfor %}' .
            '{% endif %}'.
            '</div></td></tr>' .
            '</table>';
    }
}