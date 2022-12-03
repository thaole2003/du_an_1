<div class="py-4 w-full h-screen  mt-10">
    <div class="home_admin">
        <h1>Chào mừng bạn đến với giao diện quản lý website</h1>
        <h4>
            Tại đây bạn quản lý website tại mục lục
        </h4>

        <p>Chi tiết mục lục</p>

        <div class="ul">
        <?php if ($_SESSION['auth']['role'] == 1) { ?>
            <li>Thể Loại - Quản lý thể loại truyện</li>
            <li>Truyện - Quản lý truyện của website</li>
            <li>Người dùng - Quản lý tài khoản của người dùng</li>
            <li>Bình luận - Quản lý bình luận của người dùng</li>
            <li>Thống kê - Thống kê số liệu của website</li>
            <li>Hóa đơn - Quản lí nạp tiền khách hàng</li>
            <?php }else{
                ?>
            <li>Thể Loại - Quản lý thể loại truyện</li>
            <li>Truyện - Quản lý truyện của website</li>
            <li>Bình luận - Quản lý bình luận của người dùng</li>
            <li>Hóa đơn - Quản lí nạp tiền khách hàng</li>
            <li>Sửa lại truyện - Sửa lại truyện bị từ chối đăng</li>
           <?php } ?>
        </div>
        <div class="back_website">
            <a href="../index.php">Quay về trang web</a>
        </div>
    </div>
</div>