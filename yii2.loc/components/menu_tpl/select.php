<option
        value="<?= $category['idCategory'] ?>"
        <?php if($category['idCategory'] == $this->model->parent_id) echo 'selected' ?>
        <?php if($category['idCategory'] == $this->model->idCategory) echo 'disabled' ?>
        ><?= $strel . $category['Category'] ?>
</option>
<?php if( isset($category['childs']) ): ?>
    <ul>
        <?= $this->getMenuHTML($category['childs'], $strel . '=>') ?>
    </ul>
<?php endif;?>


