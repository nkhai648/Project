<ul class="list-page">
    <?php if($current_page > 1) {?>
        <li class="page-item">
            <a href="?mod=admin&action=index&current_page=<?=$current_page-1?>" class="page-link"><i class='bx bx-chevron-left'></i></a>
        </li>
    <?php }?>

    <?php if($current_page > 3) { $first_page = 1?>
        <li class="page-item">
            <a href="?mod=admin&action=index&current_page=<?=$first_page?>" class="page-link"><?=$first_page?></a>
        </li>
        <li class="page-item">
            <span>...</span>
        </li>
    <?php }?>

    <?php for($i = 1; $i <= $total_page; $i++) {?>
        <?php if($i != $current_page) {?>
            <?php if($i > $current_page - 2 && $i < $current_page + 2) {?>
                <li class="page-item">
                    <a href="?mod=admin&action=index&current_page=<?=$i?>" class="page-link"><?=$i?></a>
                </li>
            <?php }?>
        <?php }else {?>
            <li class="page-item">
                <a href="?mod=admin&action=index&current_page=<?=$i?>" class="page-link active"><?=$i?></a>
            </li>
        <?php }?>
    <?php }?>


    <?php if($current_page < $total_page - 2) { $last_page = $total_page?>
        <li class="page-item">
                <span>...</span>
            </li>
        <li class="page-item">
            <a href="?mod=admin&action=index&current_page=<?=$last_page?>" class="page-link"><?=$last_page?></a>
        </li>
    <?php }?>

    <?php if($current_page < $total_page - 1) {?>
        <li class="page-item">
            <a href="?mod=admin&action=index&current_page=<?=$current_page+1?>" class="page-link"><i class='bx bx-chevron-right'></i></a>
        </li>
    <?php }?>

</ul>