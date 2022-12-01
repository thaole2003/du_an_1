<!-- content  -->
<div class="py-4 w-full">
    <div class="">
        <h1 class="text-xl font-medium p-4">Thêm loại truyện</h1>
    </div>
    <form action="index.php?act=add_loai" method="POST" class="p-4">
        
        <label class="font-medium text-xl">Loại Truyện</label><br>

        <input class=" border-0 my-2 focus:outline-none border-solid border border-yellow-400 h-[40px] w-[400px] " type="text"
            name="name-loai" placeholder="Tên loại truyện"><br>
        <span class="font-medium text-red-500"><?php if(isset($thong_bao)){
            echo $thong_bao;
        } ?></span><br>
        <button
            class="bg-orange-400 hover:bg-blue-500  hover:text-orange-400 font-medium text-white p-2 px-4  border-solid border border-yellow-400"
            name="btn-add">Thêm</button>
        <button
            class="bg-orange-400 hover:bg-blue-500  hover:text-orange-400 font-medium text-white p-2 px-4  border-solid border border-yellow-400"><a
              class="text-white"   href="index.php?act=list_loai">Danh sách</a></button>

    </form>
</div>