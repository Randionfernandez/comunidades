<script>
    $(document).ready(function () {
        //Initialize Select2 Elements
        $('.select2').select2();
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
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