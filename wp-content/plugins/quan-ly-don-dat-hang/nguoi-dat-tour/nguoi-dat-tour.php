<?php
/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 6/28/2023
 * Time: 4:10 PM
 */

$objBookingTour = new ActionDatabase();
$result = $objBookingTour->paginate();
extract($result);
//print_r($result);
?>

<div class="wrap">
    <h1 class="wp-heading-inline">Quản lý đơn đặt tour</h1>
    <hr class="wp-header-end">
    <ul class="subsubsub">
        <li class="all"><a href="admin.php?page=nguoi_dat_tour&status=0" class="current">Tất cả <span class="count">(3)</span></a>|</li>
        <li class="publish"><a href="admin.php?page=nguoi_dat_tour&status=pending">Đơn hàng mới</a> |</li>
        <li class="publish"><a href="admin.php?page=nguoi_dat_tour&status=completed">Đơn hàng đã hoàn thành</a> |</li>
        <li class="publish"><a href="admin.php?page=nguoi_dat_tour&status=canceled">Đơn hàng đã hủy</a></li>
    </ul>
    <form id="posts-filter" method="get">
        <input type="hidden" name="page" value="nguoi_dat_tour">
<!--        <input type="hidden" name="paged" value="1">-->
        <p class="search-box">
            <label class="screen-reader-text" for="post-search-input">Tìm các bài viết:</label>
            <input type="search" id="post-search-input" name="s" value="">
            <input type="submit" id="search-submit" class="button" value="Tìm các bài viết">
        </p>
        <div class="tablenav top">
            <div class="alignleft actions bulkactions">
                <label for="bulk-action-selector-top" class="screen-reader-text">Lựa chọn thao tác hàng loạt</label>
                <select name="action" id="bulk-action-selector-top">
                    <option value="-1">Hành động</option>
                    <option value="trash">Bỏ vào thùng rác</option>
                </select>
                <input type="submit" id="doaction" class="button action" value="Áp dụng">
            </div>
            <div class="alignleft actions">

                <label class="screen-reader-text" for="cat">Lọc theo danh mục</label>
                <select name="status" id="cat" class="postform">
                    <option value="0">Tất cả trạng thái</option>
                    <option class="level-0" value="pending">Đơn hàng mới</option>
                    <option class="level-0" value="completed">Đơn đã hoàn thành</option>
                    <option class="level-0" value="canceled">Đơn đã hủy</option>
                </select>
                <input type="submit" id="post-query-submit" class="button" value="Lọc">
            </div>

            <?php
            include PATH . 'includes/elements/pagination.php';
            ?>
        </div>
        <h2 class="screen-reader-text">Danh sách bài viết</h2>
        <table class="wp-list-table widefat fixed striped table-view-list posts">
            <thead>
            <tr>
                <td id="cb" class="manage-column column-cb check-column"><label class="screen-reader-text"
                                                                                for="cb-select-all-1">Chọn toàn bộ</label><input id="cb-select-all-1" type="checkbox"></td>
                <th class="manage-column column-primary">Mã đơn hàng</th>
                <th class="manage-column">Tổng tiền</th>
                <th class="manage-column">Khách hàng</th>
                <th class="manage-column">Điện thoại</th>
                <th class="manage-column">Email</th>
                <th class="manage-column">Tour date</th>
                <th class="manage-column">Tour Name</th>
                <th class="manage-column">Thành Viên</th>
                <th class="manage-column">Trạng thái</th>
                <th class="manage-column">Thời gian đặt</th>
                <th class="manage-column">Thời gian thanh toán</th>
            </tr>
            </thead>
            <tbody id="the-list">
            <?php foreach ($items as $item):?>
            <tr id="post-3" class="iedit author-self level-0 post-3 status-publish hentry">
                <th scope="row" class="check-column">
                    <input id="cb-select-3" type="checkbox" name="post[]" value="3">
                </th>
                <td class="title column-title has-row-actions column-primary page-title" data-colname="Tiêu đề">
                    <strong>
                        <a class="row-title" href=""># <?= $item->id?></a>
                    </strong>
                </td>
                <td><?= number_format($item->price); ?></td>
                <td><?= $item->username?></td>
                <td><?= $item->phone?></td>
                <td><?= $item->email?></td>
                <td><?= $item->date_tour?></td>
                <td><?= $item->name_tour?></td>
                <td><?= $item->menber?></td>
                <td>
                    <select name="" id="" class="order_status" data-order_id="<?= $item->id?>" style="width: 100%">
                        <option <?= $item->status == 'pending' ? 'selected' : ''; ?> value="pending">Đơn hàng mới</option>
                        <option <?= $item->status == 'completed' ? 'selected' : ''; ?> value="completed">Đơn đã hoàn thành</option>
                        <option <?= $item->status == 'canceled' ? 'selected' : ''; ?> value="canceled">Đơn đã hủy</option>
                    </select>
                </td>
                <td><?= $item->creat_time?></td>
                <td><?= $item->update_time?></td>
            </tr>
            <?php endforeach;?>
            </tbody>
            <tfoot>
            <tr>
                <td id="cb" class="manage-column column-cb check-column"><label class="screen-reader-text"
                                                                                for="cb-select-all-1">Chọn toàn bộ</label><input id="cb-select-all-1" type="checkbox"></td>
                <th class="manage-column column-primary">Mã đơn hàng</th>
                <th class="manage-column">Tổng tiền</th>
                <th class="manage-column">Khách hàng</th>
                <th class="manage-column">Điện thoại</th>
                <th class="manage-column">Email</th>
                <th class="manage-column">Tour date</th>
                <th class="manage-column">Tour Name</th>
                <th class="manage-column">Thành Viên</th>
                <th class="manage-column">Trạng thái</th>
                <th class="manage-column">Thời gian đặt</th>
                <th class="manage-column">Thời gian trả tiền</th>
            </tr>
            </tfoot>
        </table>
        <div class="tablenav bottom">
            <div class="alignleft actions bulkactions">
                <label for="bulk-action-selector-bottom" class="screen-reader-text">Lựa chọn thao tác hàng loạt</label>
                <select name="action2" id="bulk-action-selector-bottom">
                    <option value="-1">Hành động</option>
                    <option value="edit" class="hide-if-no-js">Chỉnh sửa</option>
                    <option value="trash">Bỏ vào thùng rác</option>
                </select>
                <input type="submit" id="doaction2" class="button action" value="Áp dụng">
            </div>
            <div class="alignleft actions">
            </div>

            <?php
            include PATH . 'includes/elements/pagination.php';
            ?>
            <br class="clear">
        </div>
    </form>
</div>

<script>
    let ajax_url = "<?= admin_url('admin-ajax.php'); ?>";
    (function ($) {
        $(document).ready(function () {
            $('.order_status').on('change', function (e) {
                var orderID = $(this).attr('data-order_id');
                var type = $(this).find('option:selected').val();
                console.log('chekd');
                $.ajax({
                    url: ajax_url,
                    method: 'POST',
                    datatype: 'json',
                    data:{
                        action: 'order_admin_ajax',
                        orderID : orderID,
                        type : type
                    },
                    success: function (e) {
                        alert('Update Successful');
                    },
                    error: function (e) {
                        
                    }
                })
            })
        });

    })(jQuery);
</script>

