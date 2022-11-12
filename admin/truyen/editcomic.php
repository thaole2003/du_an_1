<!-- content  -->
<?php
    if(is_array($load_all_comic)){
        extract($load_all_comic);
    }
?>
<div class="py-4 w-full">
    <div class="bg-red-300">
        <h1 class="text-xl font-medium p-4">Sửa Truyện</h1>
    </div>
    <form action="" method="POST" class="p-4 w-[500px]">
        <label class="font-medium">Mã Truyện </label>
        <br>
        <input class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400 w-full"
            type="text" value="<?php if (isset($id) && ($id != "")) echo $id; ?>">
            <br>
        <label class="font-medium">Tên Truyện</label>
        <br>
        <input class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400 w-full "
            type="text" name="" value="<?php if (isset($name) && ($name != "")) echo $name; ?>">
            <br>
        <label class="font-medium">Detail</label>
        <br>
        <input class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400 w-full "
            type="text" name="" value="<?php if (isset($detail) && ($detail != "")) echo $detail; ?>">
            <br>
        <label class="font-medium">Author</label>
        <br>
        <input class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400 w-full "
            type="text" name="" value="<?php if (isset($author) && ($author != "")) echo $author; ?>">
            <br>
        <label class="font-medium">Intro</label>
        <br>
        <input class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400 w-full "
            type="text" name="" value="<?php if (isset($id) && ($id != "")) echo $id; ?>">
            <br>
        <label class="font-medium">Views</label>
        <br>
        <input class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400 w-full "
            type="text" name="" value="<?php if (isset($id) && ($id != "")) echo $id; ?>">
            <br>
        <label class="font-medium">Likes</label>
        <br>
        <input class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400  w-full"
            type="text" name="" value="<?php if (isset($id) && ($id != "")) echo $id; ?>">
            <br>
        <label class="font-medium">Loại truyện</label>
        <br>
        <select name="">
            <option value="1">Truyện cười</option>
            <option value="2">Truyện trinh thám</option>
            <option value="3">Truyện kiếm hiệp</option>
            <option value="4">Truyện trào phúng</option>
            <option value="5">Truyện anime</option>
        </select><br>
        <div class="mt-2">
            <label class="font-medium m-2">Images</label><input type="file">
        </div><br>
        <button
            class="bg-orange-400 hover:bg-white hover:text-orange-400 font-medium text-white p-2 px-4 rounded-md border-solid border-2 border-yellow-400"
            name="btn-add">Edit</button>
        <button
            class="bg-orange-400 hover:bg-white hover:text-orange-400 font-medium text-white p-2 px-4 rounded-md border-solid border-2 border-yellow-400"
            name=""><a href="addcomic.html">Thêm</a></button>
        <button
            class="bg-orange-400 hover:bg-white hover:text-orange-400 font-medium text-white p-2 px-4 rounded-md border-solid border-2 border-yellow-400"><a
                href="comic.html">Danh sách</a></button>
    </form>

</div>