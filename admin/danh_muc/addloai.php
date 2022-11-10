<!-- content  -->
<div class="py-4 w-full">
    <div class="bg-red-300">
        <h1 class="text-xl font-medium p-4">Thêm loại truyện</h1>
    </div>
    <form action="index.php?act=add_loai" method="POST" class="p-4">
        <label class="font-medium">Mã Loại </label><br>
        <input class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400" type="text" placeholder="Auto number"><br>
        <label class="font-medium">Loại Truyện</label><br>
        <input class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400 " type="text" name="name-loai" placeholder="Tên loại truyện">
        <br>
        <?php
        if (isset($thong_bao)) {
            echo $thong_bao;
        }
        ?>
        <br>
        <button class="bg-orange-400 hover:bg-white hover:text-orange-400 font-medium text-white p-2 px-4 rounded-md border-solid border-2 border-yellow-400" name="btn-add">Thêm</button>
        <button class="bg-orange-400 hover:bg-white hover:text-orange-400 font-medium text-white p-2 px-4 rounded-md border-solid border-2 border-yellow-400"><a href="index.php?act=list_loai">Danh sách</a></button>
    </form>
</div>