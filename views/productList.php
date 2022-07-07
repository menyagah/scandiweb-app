<?php

/*use app\core\DbModel;

echo "<pre>";
var_dump(DbModel::getData());
echo "</pre>";
exit;



if ($data) {?>
    <?php var_dump($data) ?>
<?php } else { ?>
    <p>no data</p>
<?php } ?>*/
?>

<h1>Home</h1>
<h3>Product List </h3>

<?php foreach ($data as $product) :?>
<div class="card" style="width: 18rem;">
    <ul class="list-group list-group-flush p-8">
        <li class="list-group-item"><?php echo $product['sku']?></li>
        <li class="list-group-item"><?php echo $product['name']?></li>
        <li class="list-group-item"><?php echo $product['price']?></li>
        <?php if($product['size']) { ?>
            <li class="list-group-item">
                <?php echo $product['size'].'mb'." " ;
                ?></li>
        <?php } ?>
        <?php if($product['Weight']) { ?>
            <li class="list-group-item">
                <?php echo $product['Weight'].'kg'." " ;
                ?></li>
        <?php } ?>
        <?php if($product['height']) { ?>
            <li class="list-group-item">
                <?php echo $product['height'].'cm'." " ;
            ?></li>
            <?php } ?>
        <?php if($product['width']) { ?>
            <li class="list-group-item">
                <?php echo $product['width'].'cm'." " ;
                ?></li>
        <?php } ?>
        <?php if($product['length']) { ?>
            <li class="list-group-item">
                <?php echo $product['length'].'cm'." " ;
                ?></li>
        <?php } ?>

        <div class="card" style="width: 18rem;">
    </ul>
    <div class="card-footer">
        Card footer
    </div>
</div>

  <?php endforeach;?>











