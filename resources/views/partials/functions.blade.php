<script>
    $(document).ready(function () {
        //Initialize Select2 Elements
        $('.select2').select2();
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'DD/MM/YYYY'
        });
        
        //Date picker
        $('#reservationdate2').datetimepicker({
            format: 'DD/MM/YYYY'
        });
        
        //Timepicker
        $('#timepicker').datetimepicker({
          format: 'LT'
        });;
        
        //Timepicker
        $('#timepicker2').datetimepicker({
          format: 'LT'
        });
    });
</script>