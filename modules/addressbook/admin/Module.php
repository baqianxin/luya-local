<?php

namespace app\modules\addressbook\admin;

use luya\admin\components\AdminMenuBuilder;
use luya\base\CoreModuleInterface;

/**
 * Addressbook Admin Module.
 *
 * File has been created with `module/create` command on LUYA version 1.0.0.
 */
class Module extends \luya\admin\base\Module implements CoreModuleInterface {

    public $apis = [
        'api-addressbook-contact' => 'app\modules\addressbook\admin\apis\ContactController',
        'api-addressbook-group' => 'app\modules\addressbook\admin\apis\GroupController'
    ];

    public function getMenu(){
        return (new AdminMenuBuilder($this))->node(static::t('Contact'), 'contacts')
            ->group(static::t('Menu'))
            ->itemApi(static::t('Contact'), 'addressbookadmin/contact/index', 'label', 'api-addressbook-contact')
            ->itemApi(static::t('Group'), 'addressbookadmin/group/index', 'label', 'api-addressbook-group');
    }


    /**
     * @inheritdoc
     */
    public static function onLoad(){
        self::registerTranslation('addressbook*', static::staticBasePath() . '/messages', [
            'addressbook' => 'addressbook.php',
        ]);
    }


    /**
     * Translations for CMS Module.
     *
     * @param unknown $message
     * @param array $params
     * @return string
     */
    public static function t($message, array $params = []){
        return parent::baseT('addressbook', $message, $params);
    }


}