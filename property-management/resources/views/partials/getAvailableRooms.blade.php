$(document).ready(function($){
    $('#check_in_date').change(function(){
        if ($('#check_out_date').val() != ""){
            $('#room_number').empty();
            $('#room_number').append("<option value='1'> Loading... </option>")
                $.get("{{ url('api/getAvailableRooms')}}",{ start_date: $(this).val(), end_date: $('#check_out_date').val()  }, 
                    function(data) {
                        $('#room_number').empty();
                        $.each(data, function(key, value) {
                            $.each(value, function(item, room) {
                                $('#room_number').append("<option value='"+ room +"'>" + room + "</option>");
                            });
                        });
                    }
                );
        }else{
            $('#room_number').empty();
            $('#room_number').append("<option value='1'> Select Checkout </option>")
        }
    });
    $('#check_out_date').change(function(){
        $('#room_number').empty();
        $('#room_number').append("<option value='1'> Loading... </option>")
            $.get("{{ url('api/getAvailableRooms')}}",{ start_date: $('#check_in_date').val(), end_date: $(this).val()  }, 
                function(data) {
                    $('#room_number').empty();
                    $.each(data, function(key, value) {
                        $.each(value, function(item, room) {
                            $('#room_number').append("<option value='"+ room +"'>" + room + "</option>");
                        });
                    });
                }
            );
    });
});