<!-- content  -->
<div class="py-4 w-full">
    <div class="bg-red-300">
        <h1 class="text-xl font-medium p-4">Ý kiến của khách hàng</h1>
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