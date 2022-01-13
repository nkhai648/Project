<?php if(isset($_SESSION['admin'])) {?>
<?php get_sidebar('admin')?>
    <h1 class="text-center mb-4 mt-4">List Products</h1>
    <div class="under-title">
        <a href="?mod=admin&action=add" class="btn">Add Products</a>
        <form action="?mod=admin&action=search" method="POST">
            <div class="field">
                <input type="text" name="name" placeholder="Enter name's product..." value="<?=isset($_POST['name']) ? $_POST['name'] : null?>">
                <button type="submit" name="search">
                    <i class='bx bx-search' ></i>
                </button>
            </div>
        </form>
    </div>
    <table class="table admin-table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Region Name</th>
                <th scope="col">Tool</th>
            </tr>
        </thead>
        <tbody>
            <?php if(isset($_GET['action']) && $_GET['action'] == 'search') { ?>
                <?php foreach($list_by_name as $key => $value) { ?>
                    <tr>
                        <th scope="row"><?=$key+1?></th>
                        <td><?=$value['name']?></td>
                        <td><?=formatPrice($value['price'])?></td>
                        <td>
                            <?php
                            $region = get_name_region_by_id($value['region_id']);
                            echo $region['region_name'];
                            ?>
                        </td>
                        <td class="col-tool">
                            <a href="?mod=admin&action=delete&id=<?=$value['id']?>"><i class='bx bx-trash'></i></a>
                            <a href="?mod=admin&action=edit&id=<?=$value['id']?>"><i class='bx bx-edit'></i></a>
                        </td>
                    </tr>
                <?php }?>
            <?php }else {?>
                <?php foreach($products as $key => $value) { ?>
                    <tr>
                        <th scope="row"><?=$key+1?></th>
                        <td><?=$value['name']?></td>
                        <td><?=formatPrice($value['price'])?></td>
                        <td>
                            <?php
                            $region = get_name_region_by_id($value['region_id']);
                            echo $region['region_name'];
                            ?>
                        </td>
                        <td class="col-tool">
                            <a id="trash-icon" href="?mod=admin&action=delete&id=<?=$value['id']?>"><i class='bx bx-trash'></i></a>
                            <a href="?mod=admin&action=edit&id=<?=$value['id']?>"><i class='bx bx-edit'></i></a>
                        </td>
                    </tr>
                <?php }?>
                
            <?php }?>
        </tbody>
    </table>
    <?php if(!isset($_GET['action']) || $_GET['action'] == 'index') {?>
        <?php require 'paggingView.php'; ?>
    <?php }?>
<?php get_footer('admin') ?>
<?php }else {?>
    <?php get_access();?>
<?php }?>