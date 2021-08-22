</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; PT Roda Wiyata Utama <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery-ui/jquery-ui.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>
<script src="<?= base_url(); ?>assets/js/multi.js"></script>


<!-- Plugin -->
<script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "ordering": false
        });
    });
</script>

<script>
    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
</script>

<!-- <script>
    $(document).ready(function() {
        $("#btn-add-item").click(function() {
            var jumlah = parseInt($("#total-row").val());
            var nextrow = jumlah + 1;
            $("#insert-row").append(
                "<tr>" +
                "<td>" + nextrow + "</td>" +
                "<td>" +
                "<input type='text' class='form-control form-control-sm' id='auto_product' name='product[]' autofocus>" +
                "<input type='text' class='form-control form-control-sm' id='product_id' name='product_id[]'>" +
                "<input type='text' class='form-control form-control-sm' id='price' name='product_id[]'>" +
                "</td>" +
                "<td>" +
                "<input type='number' class='form-control form-control-sm' id='qty' name='qty[]' value='1'>" +
                "</td>" +
                "</tr>"
            );
            $("#total-row").val(nextrow);
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#auto_product').autocomplete({
            source: "<?= base_url('document/get_autocomplete'); ?>",

            select: function(event, ui) {
                $('[name= "product[]"]').val(ui.item.label);
                $('[name= "product_id[]"]').val(ui.item.product_id);
                $('[name= "price[]"]').val(ui.item.price);
            }
        });
    });
</script> -->

<script>
    $(function() {
        $("#datepickerfrom").datepicker({
            'dateFormat': "yy-mm-dd"
        });
        $("#datepickerto").datepicker({
            'dateFormat': "yy-mm-dd"
        });
    });
</script>


</body>

</html>