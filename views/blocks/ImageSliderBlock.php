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

$this->appView->registerJsFile(
    '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js',
    ['depends' => ['\app\assets\ResourcesAsset']]
);

?>

    <div style="background-color:#00b0ff; width:100%">
        <div class="slider" style="">
            <?php foreach ($this->extraValue("images") as $image): ?>
                <div><img class="slider__image img-fluid" src="<?= $image->source ?>"/></div>
            <?php endforeach; ?>
        </div>
    </div>
<?php
$this->appView->registerCssFile('//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css');
$this->appView->registerCssFile('//cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css');
$this->appView->registerJs("$('.slider').slick({
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 3
});");
?>