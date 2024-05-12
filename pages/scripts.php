  <script src="../../vendors/base/vendor.bundle.base.js"></script>
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/todolist.js"></script>
  <script src="../../js/chart.js"></script>
  <!-- End custom js for this page-->
  <script src="../../vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <script src="../../js/sweetalert2.all.min.js"></script>
  
  <!-- DataTables -->
  <script src="../../plugins/datatables/jquery.dataTables.js"></script>
  <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <script>
    $(function() {
      $("#example1").DataTable({
        "scrollX": true,
        "order": [[ 0, "desc" ]],"responsive": true, "lengthChange": false, "autoWidth": false,
			"buttons": [""],
      });
      $("#AllFinancialDetails").DataTable({
        "scrollX": true,
        "order": [[ 0, "desc" ]]
      });
      $("#example4").DataTable();
      $("#example3").DataTable({
        "scrollX": true,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
      });
      // $('#example').DataTable({
      //   dom: 'Bfrtip',
      //   buttons: [
      //     'print'
      //   ]
      // });
    });
  </script>