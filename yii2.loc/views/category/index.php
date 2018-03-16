<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

?>
<div class="container">
    <div class="row">
        <div class="col-md-4" >
            <h2 class="title" style="padding-left: 1rem;">CATALOGUE</h2>
            <ul id="catalog">
<!--Выводим каталог-->
                <?= \app\components\MenuWidget::widget(['tpl' => 'menu'])?>
            </ul>
        </div>
<!-- /.col-md-4 -->
<!-- Выводим товары-->
        <?php if(!empty($popular_model)):?>
        <div class="col-md-8">
<!--            <div class="container" id="container-card" >-->
                <div class="row justify-content-start" style="min-height: 27rem;" id="container-card">
                    <?php foreach($popular_model as $popular): ?>
                    <div class="col-md-4">
                        <div class="mb-4 box-shadow">
                            <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $popular->idProduct]) ?>">
                                <?= Html::img("@web/images/products/{$popular->image}", ['class' => 'card-img-top', 'alt' => $popular->Product])?>
                            </a>
                            <div class="card-body">
                                <p class="text-muted"><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $popular->idProduct]) ?>"><?= $popular->Product?><br><?= $popular->price?>.00$</a></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
        <?php endif;?>
        <!-- /.col-md-8 -->
    </div>
    <!-- /.row -->
</div>

