<?php

use yii\helpers\Html;

/**
 * View file for block: TestLabelBlock
 *
 * File has been created with `block/create` command on LUYA version 1.0.0.
 *
 *
 * @var $this \luya\cms\base\PhpBlockView
 */
$this->appView->registerJs("
    var data = ['some', 'data'];
", luya\web\View::POS_READY);

$this->appView->registerCss("
    .data { color: blue; }
");
?>
<?php

if ($this->varValue('beconvert')) {
    echo Html::tag('h1', $this->extraValue('textTransformed'), [
        'class' => 'data'
    ]);
}
?>
