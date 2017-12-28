# Addressbook Module
 
File has been created with `module/create` command on LUYA version 1.0.0. 
 
## Installation

In order to add the modules to your project go into the modules section of your config:

```php
return [
    'modules' => [
        // ...
        'addressbook' => 'app\modules\addressbook\frontend\Module',
        'addressbookadmin' => 'app\modules\addressbook\admin\Module',
        // ...
    ],
];
```