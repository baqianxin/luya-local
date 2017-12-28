<?php

namespace app\modules\addressbook\admin;

use luya\admin\components\AdminMenuBuilder;

/**
 * Addressbook Admin Module.
 *
 * File has been created with `module/create` command on LUYA version 1.0.0.
 */
class Module extends \luya\admin\base\Module {

    public $apis = [
        'api-addressbook-contact' => 'app\modules\addressbook\admin\apis\ContactController',
        'api-addressbook-group' => 'app\modules\addressbook\admin\apis\GroupController'
    ];

    public function getMenu(){
        return (new AdminMenuBuilder($this))->node('Contact', 'extension')
            ->group('Group')
            ->itemApi('Contact', 'addressbookadmin/contact/index', 'label', 'api-addressbook-contact')
            ->itemApi('Group', 'addressbookadmin/group/index', 'label', 'api-addressbook-group');
    }

}