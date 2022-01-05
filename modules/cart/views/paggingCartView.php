<ul>
    <?php for($i = 1; $i <= $total_page; $i++) { ?>
        <?php if($i != $current_page) {?>
            <?php if($i > $current_page - 2 && $i < $current_page + 2) {?>
                <li class="pagging-item">
                    <a href="?mod=cart&item_per_page=<?=$item_per_page?>&current_page=<?=$i?>"><?=$i?></a>
                </li>
            <?php }?>
        <?php }else {?>
            <li class="pagging-item">
                <a class="active" href="?mod=products&item_per_page=<?=$item_per_page?>&current_page=<?=$i?>"><?=$i?></a>
            </li> 
        <?php }?>
    <?php }?>
</ul>