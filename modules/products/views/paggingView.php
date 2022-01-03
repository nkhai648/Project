<div class="pagging bd-container">
    <ul class="pagging-list">
        <?php if($current_page > 1) { ?>
            <li class="pagging-item">
                <a class="active prev" href="?mod=products&item_per_page=<?=$item_per_page?>&current_page=<?=$current_page - 1?>"><i class='bx bx-chevron-left'></i></a>
            </li>
        <?php }?>

        <?php if($current_page > 3) {  $first_page = 1;?>
            <li class="pagging-item">
                <a href="?mod=products&item_per_page=<?=$item_per_page?>&current_page=<?=$first_page?>"> <?=$first_page?></a>
            </li> 
            <li class="pagging-item">
                <span>...</span>
            </li>
        <?php } ?>
        <?php for($i = 1; $i <= $total_page; $i ++) { ?>
            <?php if($i != $current_page) { ?>
                <?php if($i > $current_page - 2 && $i < $current_page + 2) {?>
                    <li class="pagging-item">
                        <a href="?mod=products&item_per_page=<?=$item_per_page?>&current_page=<?=$i?>"><?=$i?></a>
                    </li>    
                <?php }?>
            <?php } else { ?>
                <li class="pagging-item">
                    <a class="active" href="?mod=products&item_per_page=<?=$item_per_page?>&current_page=<?=$i?>"><?=$i?></a>
                </li> 
            <?php } ?>
        <?php }?>

        <?php if($current_page < $total_page - 2) {  $last_page = $total_page;?>
            <li class="pagging-item">
                <span>...</span>
            </li>
            <li class="pagging-item">
                <a href="?mod=products&item_per_page=<?=$item_per_page?>&current_page=<?=$last_page?>"> <?=$last_page?></a>
            </li> 
        <?php } ?>

        <?php if($current_page < $total_page - 1) { ?>
            <li class="pagging-item">
                <a class="active prev" href="?mod=products&item_per_page=<?=$item_per_page?>&current_page=<?=$current_page + 1?>"><i class='bx bx-chevron-right'></i></a>
            </li>
        <?php }?>
    </ul>
</div>