<?php

namespace app\modules\addressbook\admin\controllers;

use app\modules\addressbook\models\Contact;
use Faker\Factory;
use Faker\Generator;
use luya\Exception;

/**
 * Contact Controller.
 * 
 * File has been created with `crud/create` command on LUYA version 1.0.0. 
 */
class ContactController extends \luya\admin\ngrest\base\Controller
{
    /**
     * @var string The path to the model which is the provider for the rules and fields.
     */
    public $modelClass = 'app\modules\addressbook\models\Contact';


    public function actionPaddingData(){
        $user_key = ['group_id','salutation', 'firstname', 'lastname', 'street', 'zip', 'city', 'country', 'email', 'notes'];
        $user_data = [];
        $faker = Factory::create();
        for ($i=0; $i < 10; $i++) {
            $user = [];
            echo $faker->name, "\n<br/>";
            foreach ($user_key as $k=>$key){
                $user['group_id']=random_int(1,2);
                $d_I18n=[];
                try{
                    $d_I18n['en']=$faker->$key;
                    $d_I18n['cn']=$faker->$key;
                }catch (\InvalidArgumentException $e){
                    $d_I18n['en']=$faker->name;
                    $d_I18n['cn']=$faker->name;
                }
                $user[$key]= json_encode($d_I18n);
            }
            $user_data[]=$user;
        }

        Contact::getDb()->createCommand()->batchInsert(Contact::tableName(),$user_key,$user_data)->execute();

        exit();
    }
}