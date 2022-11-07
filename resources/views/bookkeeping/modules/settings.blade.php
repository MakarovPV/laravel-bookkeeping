<div class="col-2">  <!-- Параметры диаграммы -->
		<div class="card text-center bg-white w-100 h-100">
			<div class="row w-100 ml-0 pt-2 border-0 align-items-center">
				<form action="" class="w-100">
				@csrf
				    <select id="category_select" class="browser-default custom-select custom-select-lg mb-3">
					    <option name = "income" value="income">Доходы</option>
					    <option name = "expenses" value="expenses">Расходы</option>
					    <option name = "income_and_expenses" value="income_and_expenses">Доходы и Расходы</option>
				    </select>
				    <select id="date_select" class="browser-default custom-select custom-select-lg mb-3">
					    <option name = "current" value="current">Текущий месяц</option>
					    <option name = "previous" value="previous">Предыдущий месяц</option>
				    </select> 
						<input class="form-control datepicker" placeholder="Выберите дату" name="date" type="month">
					<select id="diagram_type_select" class="browser-default custom-select custom-select-lg mt-3">
						<option id="doughnut" name = "doughnut" value="chart">Круговая диаграмма</option>
					    <option id="bar" name = "bar" value="chart2">Гистограмма</option>
					    <option id="line" name = "line" value="chart3">Линейный график</option>					    
				    </select> 
			    </form>
			</div>
		</div>
</div>