<?php
/**
 * Created by PhpStorm.
 * User: OOM-Administrator
 * Date: 2017/12/29
 * Time: 14:43
 */
?>
    <a href="<?= $route = \luya\helpers\Url::toRoute(['/addressbook']); ?>">Back</a>
<?= \yii\widgets\DetailView::widget([
    'model' => $model,
    'attributes' => [
        'salutation',
        'firstname',
        'lastname',
        'street',
        'notes:html',
    ],
]);