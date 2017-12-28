<?php
use luya\cms\widgets\LangSwitcher;
?>
<!--<div class="row">-->
<!--    <div class="col-md-12">-->
<!--    	--><?//= $placeholders['content']; ?>
<!--</div>-->
<!--</div>-->

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="https://luya.io" target="_blank">
                <img alt="luya.io" src="<?= $this->publicHtml; ?>/images/luya_logo_flat_icon.png" height="20px">
            </a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <?php foreach (Yii::$app->menu->findAll(['depth' => 1, 'container' => 'default']) as $item): /* @var $item \luya\cms\menu\Item */ ?>
                    <li <?php if ($item->isActive): ?>class="active"<?php endif; ?>>
                        <a href="<?= $item->link; ?>"><?= $item->title; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <?= LangSwitcher::widget([
                'listElementOptions' => ['class' => 'nav navbar-nav navbar-right hidden-xs'],
                'linkLabel' => function ($lang){
                    return strtoupper($lang['short_code']);
                }
            ]); ?>
        </div>
    </div>
</nav>
<div class="container" id="content">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <?php foreach (Yii::$app->menu->current->teardown as $item): /* @var $item \luya\cms\menu\Item */ ?>
                <li><a href="<?= $item->link; ?>"><?= $item->title; ?></a>
                    <?php endforeach; ?>
            </ol>
        </div>

        <?php if (count(Yii::$app->menu->getLevelContainer(2)) > 0): ?>
            <div class="col-md-3">
                <ul class="nav nav-pills nav-stacked">
                    <?php foreach (Yii::$app->menu->getLevelContainer(2) as $child): /* @var $child \luya\cms\menu\Item */ ?>
                        <li <?php if ($child->isActive): ?>class="active" <?php endif; ?>><a
                                    href="<?= $child->link; ?>"><?= $child->title; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-md-9">
                <?= $placeholders['content']; ?>
            </div>
        <?php else: ?>
            <div class="col-md-12">
                <?= $placeholders['content']; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <ul>
            <li>This website is made with <a href="http://oom-cc.com" target="_blank">OOM</a></li>
            <li><a href="https://github.com/luyadev/luya" target="_blank"><i class="fa fa-github"></i></a></li>
            <li><a href="https://twitter.com/luyadev" target="_blank"><i class="fa fa-twitter"></i></a></li>
            <li><a href="https://www.youtube.com/channel/UCfGs4sHk-D3swX0mhxv98RA" target="_blank"><i
                            class="fa fa-youtube"></i></a></li>
        </ul>
    </div>
</footer>