<option
    value="<?= $category['idCategory'] ?>"
    <?php if($category['idCategory'] == $this->model->Category_idCategory) echo 'selected' ?>
><?= $strel . $category['Category'] ?>
</option>
<?php if( isset($category['childs']) ): ?>
    <ul>
        <?= $this->getMenuHTML($category['childs'], $strel . '=>') ?>
    </ul>
<?php endif;?>


