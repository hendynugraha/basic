$(function(){
	
    $('#modelButton').click(function(){
        $('.modal').modal('show')
            .find('#modelContent')
            .load($(this).attr('value'));
    });
        
    $(document).on('click','.fc-day', function(){
        var date = $(this).attr('data-date');
        $.get('index.php?r=event/create',{'date':date}, function(data){
            $('.modal').modal('show')
            .find('#modelContent')
            .html(data);
        })
    });
	
	/*$("#Model_attribute").change(function(){
		filter_id = $(this).val();
		if (filter_id != '0') {
			var events = $('#event').fullCalendar( 'clientEvents', function(event) {
			if((filter_id == '0') ) {
				return true;
			}else{
					//what I need to write here to dynamic filter events on calendar?
			});
		}
	}
	});*/
	
	$('#event').fullCalendar('removeEvents' , function(event){  
		return (event.id == calEvent.id);
	})
	
});