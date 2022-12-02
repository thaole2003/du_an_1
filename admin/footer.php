</div>
<!-- Content End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../content/css/lib/chart.min.js"></script>
<script src="../content/css/lib/easing/easing.min.js"></script>
<script src="../content/css/lib/waypoints/waypoints.min.js"></script>
<script src="../content/css/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="../content/css/lib/tempusdominus/js/moment.min.js"></script>
<script src="../content/css/lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="../content/css/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Template Javascript -->
<script src="../content/js/main.js"></script>


</body>
<script>

    function del(aaaa) {
        if (confirm('Xác nhận xóa')) {
            return document.location = aaaa;
        }
    }

    function dele(a) {
        if (confirm('Xác nhận xóa tập')) {
            return window.location = a;
            break;
        }
    }

    function delete_img_comic(aaaa) {
        if (confirm('Xác nhận xóa ')) {
            return document.location = aaaa;
        }
    }
</script>
<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }
</script>

</html>