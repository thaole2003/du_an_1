<!-- content  -->
<?php
    if(is_array($loai_one)){
        extract($loai_one);
    }
?>
<div class="py-4 w-full">
    <div class="bg-red-300">
        <h1 class="text-xl font-medium p-4">Sửa loại truyện</h1>
    </div>
    <form action="index.php?act=cap_nhat_loai" method="POST" class="p-4">
        <label class="font-medium">Mã Truyện </label><br>
        <input class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400" type="text"
        disabled value="<?php if(isset($id) && ($id != "")) echo $id; ?>"><br>
        <label class="font-medium">Loại Truyện</label><br>
        <input class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400 " type="text"
            name="name" value="<?php if(isset($name) && ($name != "")) echo $name; ?>"><br>

        <input type="hidden" name="id" value="<?php if(isset($id) && ($id > 0)) echo $id; ?>">
        <button
            class="bg-orange-400 hover:bg-white hover:text-orange-400 font-medium text-white p-2 px-4 rounded-md border-solid border-2 border-yellow-400" name="cap_nhat">Cập nhật</button>
        <button
            class="bg-orange-400 hover:bg-white hover:text-orange-400 font-medium text-white p-2 px-4 rounded-md border-solid border-2 border-yellow-400"><a
                href="index.php?act=list_loai">Danh sách</a></button>
    </form>
</div>