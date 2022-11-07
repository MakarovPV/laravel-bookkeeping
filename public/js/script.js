$(document).ready(function() {
    //Переход по вкладкам категорий (доходы/расходы)
	$('.nav-tabs a').on('click', function(){
        let tab = $(this).attr('data-tab');
        let content= $(`.table[data-tab=${tab}]`);

		$(this).addClass('active').parent().siblings().children().removeClass('active');
		$('.table[data-tab]').addClass('d-none');
		content.removeClass('d-none');
	});

    //Изменение активности кнопки, в зависимости от количества введённых символов
	$('#source_name').on('keyup', function(){
        let input = $(this).val().trim();
		if(input.length > 0){
			$('#save').prop("disabled", false);
		}
	});

    //Модальное окно для добавления поля
    $('#btn').click(function() {
        $('#modal').modal('show');

        $("#save").click(function(e){
            e.preventDefault();
            insertNewData();
        });
    });

    //Добавление нового поля
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

    //Модальное окно для редактирования поля
    $('.item').click(function(){
        let tr = $(this).parent().attr('data-id');
        $('#modal').modal('show');

        $("#save").on("click", function(e){
            e.preventDefault();
            updateData(tr);
        });
    });

    //Редактирование поля
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

    //Изменение данных диаграммы в зависимости от указанной категории (доходы/расходы) и даты
	$('#category_select').change(function(e){
        let query = 'build/' + $(this).val();
        let month = $('#date_select').val();

        chart.update({url: query + '?date=' + month});
        chart2.update({url: query + '?date=' + month});
        chart3.update({url: query + '?date=' + month});
    });
    $('#date_select').on("change", setDate);
    $(".datepicker").on("change", setDate);

    //Установка даты
    function setDate()
    {
    	let month = $(this).val();
        let query = 'build/' + $('#category_select').val();

    	chart.update({url: query + '?date=' + month});
    	chart2.update({url: query + '?date=' + month});
    	chart3.update({url: query + '?date=' + month});
    }

    //Изменение типа диаграммы
    $('#diagram_type_select').change(function(e){
        let diagram_type = $(this).val();
    	$(`#${diagram_type}`).siblings().addClass('d-none');
    	$(`#${diagram_type}`).removeClass('d-none');
    });

    //Удаление поля
    $('.delete').click(function(){
    	let id = $(this).parent().parent().attr('data-id');
    	let datas = $('.nav-tabs a.active').attr('data-tab');
    	let _token = $("input[name=_token]").val();

    	$.ajax({
			url: `/${datas}/delete/${id}`,
			type: "POST",
			data: {id: id, _token: _token},

			success: function() {
				window.location.reload();
      		}
		});
    })

});
