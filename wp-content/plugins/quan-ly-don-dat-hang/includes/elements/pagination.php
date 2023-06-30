<?php
/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 6/29/2023
 * Time: 4:15 PM
 */

$paged = isset($_REQUEST['paged']) ? $_REQUEST['paged'] : 1;

?>

<div class="tablenav-pages">
    <span class="displaying-num"><?= $total_items; ?> mục</span>
    <span class="pagination-links">
        <?php
        if ($paged > 1):
        ?>
        <a class="prev-page button" href="admin.php?page=nguoi_dat_tour&paged=<?= $paged-1; ?>">
            <span aria-hidden="true">‹</span>
        </a>
        <?php
        endif;
        ?>
        <span class="screen-reader-text">Trang hiện tại</span>
        <span id="table-paging" class="paging-input">
            <span class="tablenav-paging-text"><?= $paged; ?> trên
                <span class="total-pages"><?= $total_pages; ?></span>
            </span>
        </span>
        <?php
        if ($paged < $total_pages):
        ?>
        <a class="next-page button" href="admin.php?page=nguoi_dat_tour&paged=<?= $paged+1; ?>">
            <span aria-hidden="true">›</span>
        </a>
        <?php
        endif;
        ?>
    </span>
</div> <br class="clear">
