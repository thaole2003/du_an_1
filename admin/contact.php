<!-- content  -->
<div class="py-4 w-full">
    <div class="bg-red-300">
        <h1 class="text-xl font-medium p-4">Ý kiến của khách hàng</h1>
    </div>
    <div class="p-4">
        <form action="index.php?act=search_y_kien" method="POST">
            <input type="text" placeholder="Mời nhập tên khách hàng muốn tìm kiếm" name="key_search" class="w-[300px] h-[44px]  border border-solid border-yellow-400">

            <button class="bg-orange-400 hover:bg-blue-500 hover:text-orange-400 font-medium text-white p-2 px-4  border-solid border border-yellow-400" name="btn_search">Tìm kiếm</button>
        </form>
    </div>
    <div class="p-4">
        <table class="table-auto w-full">
            <thead class="text-xl border-2">
                <tr class="bg-red-200 ">
                    <th class="p-2 border-2">Mã ý kiến</th>
                    <th class="p-2 border-2">Tên khách hàng</th>
                    <th class="p-2 border-2">Email</th>
                    <th class="p-2 border-2">Ý kiến</th>
                </tr>
            </thead>
            <tbody class="font-medium text-lg border-2">
                <?php
                foreach ($list_contact as $key => $value) {
                    extract($value);
               
                ?>
                    <tr class="text-center  ">
                        <td class="p-2 border-2 border-solid "><?php echo $id ?></td>
                        <td class="p-2 border-2 border-solid "><?php echo $name ?></td>
                        <td class="p-2 border-2 border-solid "><?php echo $email ?></td>
                        <td class="p-2 border-2 border-solid"><?php echo $comment ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>