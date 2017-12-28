<?php

namespace app\modules\addressbook\models;

use luya\admin\components\AdminLanguage;
use Yii;
use luya\admin\ngrest\base\NgRestModel;

/**
 * Contact.
 *
 * File has been created with `crud/create` command on LUYA version 1.0.0.
 *
 * @property integer $id
 * @property integer $group_id
 * @property string $salutation
 * @property string $firstname
 * @property string $lastname
 * @property string $street
 * @property string $zip
 * @property string $city
 * @property string $country
 * @property string $email
 * @property text $notes
 */
class Contact extends NgRestModel {
    /**
     * @inheritdoc
     */
    public $i18n = ['salutation', 'firstname', 'lastname', 'street', 'zip', 'city', 'country', 'email', 'notes'];

    /**
     * @inheritdoc
     */
    public static function tableName(){
        return 'addressbook_contact';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint(){
        return 'api-addressbook-contact';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels(){
        $lang = new AdminLanguage();
        return [
            'id' => Yii::t('app', 'ID', [], $lang->getActiveShortCode()),
            'group_id' => Yii::t('app', 'Group ID'),
            'salutation' => Yii::t('app', 'Salutation',[],'cn'),
            'firstname' => Yii::t('app', 'Firstname',[],'cn'),
            'lastname' => Yii::t('app', 'Lastname'),
            'street' => Yii::t('app', 'Street'),
            'zip' => Yii::t('app', 'Zip'),
            'city' => Yii::t('app', 'City'),
            'country' => Yii::t('app', 'Country'),
            'email' => Yii::t('app', 'Email'),
            'notes' => Yii::t('app', 'Notes'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules(){
        return [
            [['group_id'], 'required'],
            [['group_id'], 'integer'],
            [['notes'], 'string'],
            [['salutation', 'firstname', 'lastname', 'street', 'city', 'country', 'email'], 'string', 'max' => 255],
            [['zip'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function genericSearchFields(){
        return ['salutation', 'firstname', 'lastname', 'street', 'zip', 'city', 'country', 'email', 'notes'];
    }

    /**
     * @inheritdoc
     */
    public function ngRestAttributeTypes(){
        return [
            'group_id' => [
                'selectModel',
                'modelClass' => Group::className(),
                'valueField' => 'id',
                'labelField' => 'name'
            ],
            'salutation' => 'text',
            'firstname' => 'text',
            'lastname' => 'text',
            'street' => 'text',
            'zip' => 'text',
            'city' => 'text',
            'country' => 'text',
            'email' => 'text',
            'notes' => 'textarea',
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes(){
        return [
            ['list', ['group_id', 'salutation', 'firstname', 'lastname', 'street', 'zip', 'city', 'country', 'email', 'notes']],
            [['create', 'update'], ['group_id', 'salutation', 'firstname', 'lastname', 'street', 'zip', 'city', 'country', 'email', 'notes']],
            ['delete', false],
        ];
    }
}