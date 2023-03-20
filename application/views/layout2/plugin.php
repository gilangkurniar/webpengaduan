<!-- Bootstrap core JavaScript-->
<script src="<?= base_url() ?>resources2/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>resources2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url() ?>resources2/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url() ?>resources2/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url() ?>resources2/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url() ?>resources2/js/demo/chart-area-demo.js"></script>
<script src="<?= base_url() ?>resources2/js/demo/chart-pie-demo.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url() ?>resources2/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>resources2/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url() ?>resources2/js/demo/datatables-demo.js"></script>

<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    })
</script>

</body>

</html>