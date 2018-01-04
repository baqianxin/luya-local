<?php
/**
 * View file for block: ImageSliderBlock
 *
 * File has been created with `block/create` command on LUYA version 1.0.0.
 *
 * @param $this ->extraValue('images');
 * @param $this ->varValue('images');
 *
 * @var $this \luya\cms\base\PhpBlockView
 */
$this->appView->registerCssFile('http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css');
$this->appView->registerCssFile('http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css');
$this->appView->registerJsFile(
    'http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js',
    ['depends' => ['\app\assets\ResourcesAsset']]
);

?>

    <div style="background-color:#00b0ff; width:100%">
        <div class="slider" style="position: relative">
            <?php foreach ($this->extraValue("images") as $image): ?>
                <div class="slick-slide text-center" style="max-height: 500px"><img class="slider-image img-fluid" style="max-height: 100%;width: 100%;text-align: center;" src="<?= $image->source ?>"/></div>
            <?php endforeach; ?>
        </div>
    </div>
<?php

$this->appView->registerJs("$('.slider').slick({
dots: true
});");
?>