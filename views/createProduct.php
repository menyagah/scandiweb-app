<?php

use app\core\form\Form;

$form = Form::begin('', "post") ?>


    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <h1>Product Add</h1>
            </div>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <button type="submit" class="nav-link">Save</button>
                </li>
                <li class="nav-item px-2">
                    <button><a class="nav-link"  href="/products">Cancel</a></button>
                </li>
            </ul>
        </nav>
    </header>

<!-- /.w-25 -->
<div class="w-25 p-4">
    <?php
    echo $form->field($model, 'sku') ?>
    <?php
    echo $form->field($model, 'name') ?>
    <?php
    echo $form->field($model, 'price') ?>

    <div class="mb-3 ">
        <select class="form-select" name="s" aria-label="Default select example " id="form-selector">
            <option  selected disabled>Type switcher</option>
            <option  value="size">DVD</option>
            <option value="weight">Book</option>
            <option value="dimensions">Furniture</option>
        </select>
    </div>
    <div id="my-forms">
        <div name="size" id="size">
            <?php
            echo $form->field($model, 'Size (MB)') ?>
        </div>
        <div name="weight" id="weight">
            <?php
            echo $form->field($model, 'Weight (KG)') ?>
        </div>
        <div name="dimensions" id="dimensions">
            <?php
            echo $form->field($model, 'Height (CM)')  ?>
            <?php
            echo $form->field($model, 'Width (CM)') ?>
            <?php
            echo $form->field($model, 'Length (CM)') ?>
        </div>
    </div>
</div>


<?php
$form = Form::end() ?>