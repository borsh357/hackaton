$('.delque').click(function(){
            event.preventDefault();
            var div = $(this).attr('id');
            $('#'+div).remove();
        });