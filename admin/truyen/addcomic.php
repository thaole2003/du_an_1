<!-- content  -->
<div class="py-4 w-full">
    <div class="bg-red-300">
        <h1 class="text-xl font-medium p-4">Thêm Truyện</h1>
    </div>
    <form action="" method="POST" enctype="multipart/form-data" class="p-4 w-[500px]">
        <label class="font-medium">Mã Truyện </label><br>
        <input class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400 w-full"
            type="text" placeholder="Auto number"><br>
        <label class="font-medium">Tên Truyện</label><br><span class="font-medium text-red-500"><?php if(isset($thongbao)){
            echo $thongbao;
        } ?></span>
        <input class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400 w-full "
            type="text" name="name_comic" placeholder="Tên truyện"><br>
        <label class="font-medium">Detail</label><br>
        <input class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400 w-full "
            type="text" name="detail" placeholder="Chi tiết"><br>
        <label class="font-medium">Author</label><br>
        <input class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400 w-full "
            type="text" name="author" placeholder="Tác giả"><br>
        <label class="font-medium">Intro</label><br>
        <input class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400 w-full "
            type="text" name="intro" placeholder="Giới thiệu"><br>
        <!-- <label class="font-medium">Views</label><br>
        <input class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400 w-full "
            type="text" name="views" placeholder="Lượt xem"><br> -->
        <!-- <label class="font-medium">Likes</label><br>
        <input class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400  w-full"
            type="text" name="like" placeholder="Lượt thích"><br> -->
        <label class="font-medium">Loại truyện</label><br>
        <select name="category">
       <?php 
        foreach( $list_all_loai as $Key => $value){
       ?>
            <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
          
            <?php } ?>
        </select><br>
        <div class="mt-2">
            <label class="font-medium m-2">Images</label>  
            <input class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400 w-full "
            type="number" name="images"><br>
        </div><br>
        <button
            class="bg-orange-400 hover:bg-white hover:text-orange-400 font-medium text-white p-2 px-4 rounded-md border-solid border-2 border-yellow-400"
            name="btnAdd">Thêm</button>
        <button
            class="bg-orange-400 hover:bg-white hover:text-orange-400 font-medium text-white p-2 px-4 rounded-md border-solid border-2 border-yellow-400"><a
                href="comic.html">Danh sách</a></button>
                
    </form>

</div>