<article>

    <div class="truyen">
        <h3 class="text-4xl font-bold m-2 text-center"> <i class="far fa-id-card m-2"></i>Liên hệ</h3>
    </div>

    <div class="w-full flex m-2">

        <div class="m-2">
            <p class="text-base font-normal m-2">Phone: 012.345.6789</p>
            <p class="text-base font-normal m-2">Tòa nhà FPT Polytechnic, P. Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Hà
                Nội, Vietnam</p>
            <form action="" method="POST" class="bg-green-200 rounded-lg">
                <p class="text-xl font-semibold pt-8 text-center"> Contact</p>
                <div class="flex flex-col m-5">
                    <div class="w-full flex">
                        <div class="flex flex-col p-2  w-1/2">
                            <label class="w-1/2 " for="">
                                <i class="fas fa-xs fa-star-of-life pt-2"></i> Họ Tên</label>
                            <input
                                placeholder="<?php echo isset($_SESSION['send_hoten']) ? $_SESSION['send_hoten'] : '' ?>"
                                class="w-full h-[35px]  mt-2" type="text" name="ho_ten">
                        </div>
                        <div class="flex flex-col p-2  w-1/2">
                            <label class="w-1/2 " for="">
                                <i class="fas fa-xs fa-star-of-life pt-2"></i> Email</label> 
                                    <input
                                placeholder="<?php echo isset($_SESSION['send_email']) ? $_SESSION['send_email'] : '' ?>"
                                class="w-full h-[35px]  mt-2" type="text" name="email">
                            </div>
                    </div>
                    <div class="flex flex-col p-2  w-full "><label class="w-1/2 " for=""><i
                                class="fas fa-xs fa-star-of-life pt-2"></i> Bình luận</label>
                                 <textarea
                            placeholder="<?php echo isset($_SESSION['send_comment']) ? $_SESSION['send_comment'] : '' ?>"
                            class=" h-[100px]  mt-2" type="text" name="comment"></textarea></div>
                </div>
                <div class="text-center pb-5">
                    <button name="btn_send"
                        class="rounded-lg m-2 bg-blue-300 p-2 hover:bg-yellow-300 justify-items-center">Send it</button>
                </div>

            </form>

        </div>
        <div class="map mt-10 mb-20 w-1/2">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17841.426818362048!2d105.73945645783236!3d21.04410981349532!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b991d80fd5%3A0x53cefc99d6b0bf6f!2sFPT%20Polytechnic%20Hanoi!5e0!3m2!1sen!2s!4v1652983486742!5m2!1sen!2s"
                width="100%" height="550" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

    </div>
</article>