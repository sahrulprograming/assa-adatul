<!--start overlay-->
<div class="overlay toggle-icon"></div>
<!--end overlay-->
<!--Start Back To Top Button-->
<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
<!--End Back To Top Button-->
<footer class="page-footer">
    <p class="mb-0">Copyright © 2021. All right reserved.</p>
</footer>
</div>
<!--end wrapper-->
<!--start switcher-->
<div class="switcher-wrapper">
    <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
    </div>
    <div class="switcher-body">
        <div class="d-flex align-items-center">
            <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
            <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
        </div>
        <hr />
        <h6 class="mb-0">Theme Styles</h6>
        <hr />
        <div class="d-flex align-items-center justify-content-between">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
                <label class="form-check-label" for="lightmode">Light</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
                <label class="form-check-label" for="darkmode">Dark</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
                <label class="form-check-label" for="semidark">Semi Dark</label>
            </div>
        </div>
        <hr />
        <div class="form-check">
            <input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
            <label class="form-check-label" for="minimaltheme">Minimal Theme</label>
        </div>
        <hr />
        <h6 class="mb-0">Sidebar Backgrounds</h6>
        <hr />
        <div class="header-colors-indigators">
            <div class="row row-cols-auto g-3">
                <div class="col">
                    <div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
                </div>
            </div>
        </div>

    </div>
</div>
<!--end switcher-->
<!-- Bootstrap JS -->
<script src="<?= base_url(); ?>assets/template/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="<?= base_url(); ?>assets/template/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/simplebar/js/simplebar.min.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/chartjs/js/Chart.min.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/jquery-knob/excanvas.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/jquery-knob/jquery.knob.js"></script>
<script src="<?= base_url(); ?>assets/template/js/feather.min.js"></script>
<script>
    $(function() {
        $(".knob").knob();
    });
</script>
<script>
    feather.replace()
</script>
<!-- Datatables -->
<script src="<?= base_url(); ?>assets/template/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#table1').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        var table = $('#table2').DataTable({
            lengthChange: false,
            buttons: [{
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: ':visible'
                    },
                    download: 'open'
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                'colvis'
            ]
        });

        table.buttons().container()
            .appendTo('#table2_wrapper .col-md-6:eq(0)');
    });
</script>
<script src="<?= base_url(); ?>assets/template/plugins/datetimepicker/js/legacy.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/datetimepicker/js/picker.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/datetimepicker/js/picker.time.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/datetimepicker/js/picker.date.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/bootstrap-material-datetimepicker/js/moment.min.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js"></script>
<script>
    $(function() {
        $('#date').bootstrapMaterialDatePicker({
            time: false
        });
    });
</script>
<script src="<?= base_url(); ?>assets/template/js/index.js"></script>
<!--app JS-->
<script src="<?= base_url(); ?>assets/template/js/app.js"></script>
</body>

</html>