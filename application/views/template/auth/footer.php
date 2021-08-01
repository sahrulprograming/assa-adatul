<footer class="bg-white shadow-sm border-top p-2 text-center fixed-bottom d-none d-sm-block">
    <p class="mb-0">Copyright © 2021. All right reserved.</p>
</footer>
</div>
<!--end wrapper-->
<!-- Bootstrap JS -->
<script src="<?= base_url(); ?>assets/template/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="<?= base_url(); ?>assets/template/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/simplebar/js/simplebar.min.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<!--Password show & hide js -->
<script>
    $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("bx-hide");
                $('#show_hide_password i').removeClass("bx-show");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("bx-hide");
                $('#show_hide_password i').addClass("bx-show");
            }
        });
    });
</script>
<!--app JS-->
<script src="<?= base_url(); ?>assets/template/js/app.js"></script>
</body>

</html>