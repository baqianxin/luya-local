<?php

namespace app\blocks;

use luya\cms\base\PhpBlock;
use luya\cms\frontend\blockgroups\ProjectGroup;
use luya\cms\helpers\BlockHelper;

/**
 * Test Label Block.
 *
 * File has been created with `block/create` command on LUYA version 1.0.0.
 */
class TestLabelBlock extends PhpBlock {

//    public $module = 'mymodule';

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
        return 'Test Label Block';
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
                ['var' => 'beconvert', 'label' => '转换文本', 'type' => 'zaa-text'],
            ]
        ];
    }

    public function extraVars(){

        return [
            'textTransformed' => strtoupper($this->getVarValue('beconvert')),
        ];

    }


    public function getFieldHelp(){

        return [
            'content' => 'An explain example of this var does and where it is displayed.',
        ];
    }

    /**
     * {@inheritDoc}
     *
     */
    public function admin(){
        return '<h5 class="mb-3">Test Label Block</h5>' .
            '<table class="table table-bordered">' .
            '</table>';
    }
}