<?php
/**
 * Created by PhpStorm.
 * User: OOM-Administrator
 * Date: 2017/12/29
 * Time: 14:37
 */

namespace app\modules\addressbook\frontend\controllers;


use app\modules\addressbook\models\Contact;
use app\modules\addressbook\models\Group;
use luya\web\Controller;
use yii\data\ActiveDataProvider;

class DefaultController extends Controller {
    public function actionIndex(){
        $groups = Group::find()->all();
        return $this->render('index', [
            'groups' => $groups
        ]);
    }

    public function getGroupProvider(Group $group){
        return new ActiveDataProvider([
            'query' => Contact::find()->where(['group_id' => $group->id]),
            'pagination' => [
                'pageSize' => 20,
            ],
            'sort' => [
                'defaultOrder' => [
                    'group_id' => SORT_ASC,
                    'lastname' => SORT_ASC,
                ]
            ],
        ]);
    }

    public function actionDetail($id = null){
        $model = Contact::findOne($id);

        if (!$model) {
            return $this->goHome();
        }

        return $this->render('detail', [
            'model' => $model
        ]);
    }
}