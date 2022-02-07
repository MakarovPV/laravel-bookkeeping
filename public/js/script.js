$(document).ready(function() {
	$("#add").click(function(e){
		e.preventDefault();
		$('#li-form').addClass('d-block');
	});

	$('.nav-tabs a').on('click', function(){
		var tab = $(this).attr('data-tab');
		var content= $(`.table[data-tab=${tab}]`);

		$(this).addClass('active').parent().siblings().children().removeClass('active');
		$('.table[data-tab]').addClass('d-none');
		content.removeClass('d-none');
	});


	$('#btn').click(function() {
    	$('#modal').modal('show');

    	$("#save").click(function(e){
			e.preventDefault();
			insertNewData();
		});
  	});


  	$('.item').click(function(){
    	var tr = $(this).parent().attr('data-id');

    	$('#modal').modal('show');

    	$("#save").on("click", function(e){
			e.preventDefault();
			updateData(tr);
		});
    });


	$('#source_name').on('keyup', function(){
		var input = $(this).val().trim();
		if(input.length > 0){
			$('#save').prop("disabled", false);
		}
	});

	function insertNewData(){
		
		let dates = $('.nav-tabs a.active').attr('data-tab');

		let source_name = $('#source_name').val();
		let price = $('#price').val();
		let _token = $("input[name=_token]").val();
	
		$.ajax({
			url: `/${dates}`,
			type: "POST",
			data: {source_name: source_name, price: price, _token: _token},

			success: function() {
				window.location.reload();
      		}	
		});
	};

	function updateData(id){
		
		let dates = $('.nav-tabs a.active').attr('data-tab');

		let source_name = $('#source_name').val();
		let price = $('#price').val();
		let _token = $("input[name=_token]").val();
	
		$.ajax({
			url: `/${dates}/update/${id}`,
			type: "POST",
			data: {source_name: source_name, price: price, _token: _token},

			success: function() {
				window.location.reload();
      		}	
		});
	};


	$('#category_select').change(function(e){
        var query = 'build/' + $(this).val();
        var month = $('#date_select').val();	

        chart.update({url: query + '?date=' + month});
        chart2.update({url: query + '?date=' + month});
        chart3.update({url: query + '?date=' + month});
    });

    $('#date_select').on("change", setDate);

    $(".datepicker").on("change", setDate);


    function setDate()
    {
    	let month = $(this).val();
    	var query = 'build/' + $('#category_select').val();

    	chart.update({url: query + '?date=' + month});
    	chart2.update({url: query + '?date=' + month});
    	chart3.update({url: query + '?date=' + month});
    }

    $('#diagram_type_select').change(function(e){
    	var diagram_type = $(this).val();
    	$(`#${diagram_type}`).siblings().addClass('d-none');
    	$(`#${diagram_type}`).removeClass('d-none');
    });

    $('.delete').click(function(){
    	
    	var id = $(this).parent().parent().attr('data-id');
    
    	let dates = $('.nav-tabs a.active').attr('data-tab');
    	let _token = $("input[name=_token]").val();

    	$.ajax({
			url: `/${dates}/delete/${id}`,
			type: "POST",
			data: {id: id, _token: _token},

			success: function() {
				window.location.reload();
      		}	
		});
    })

});