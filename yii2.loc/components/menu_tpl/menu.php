<li>
    <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $category['idCategory']]) ?>">
        <?= $category['Category'] ?>
    </a>
    <?php if( isset($category['childs']) ): ?>
        <ul>
            <?= $this->getMenuHTML($category['childs']) ?>
        </ul>
    <?php endif;?>
</li>
