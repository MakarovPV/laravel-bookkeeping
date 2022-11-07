<div id="main" class="col-4 bg-white border-right pl-0 vh-100 position-relative">  <!-- Поле доходов/расходов -->
	<div id="mainchild ">
				<div class="card text-center w-100">
					<ul class="nav nav-tabs card-header-tabs bg-white border-bottom h3">
					    <li class="nav-item w-50">
					        <a class="nav-link active" data-tab="income" role="tab" aria-selected="false" href="#">Доходы</a>
					    </li>
					    <li class="nav-item w-50">
					        <a class="nav-link" data-tab="expenses" role="tab" aria-selected="true" href="#">Расходы</a>
					    </li>
					</ul>
	            </div>

		        <div class="row main">
					<table class="table w-100 mt-2 h3 border table-hover" data-tab="income">
						@foreach($incomes as $income)

							<tr scope="raw" data-id="{{$income->id}}">

								<td class="item">
									<td class="col-6">
										{{$income->source_of_income}}
									</td>

									<td class="">
										{{$income->price}}
									</td>
								</td>

								<td class="text-center border">
									<a class="d-block text-decoration-none delete" href="#">Удалить</a>
								</td>
							</tr>
			        	@endforeach
			        </table>

			        <table class="table w-100 d-none mt-2 h3 border table-hover" data-tab="expenses">
						@foreach($expenses as $expense)
							<tr scope="raw" data-id="{{$expense->id}}">
								<td class="item">
									<td class="col-6">
									   {{$expense->source_of_expenses}}
									</td>

									<td class="">
									   {{$expense->price}}
									</td>
								</td>
                                <td class="border">
                                    <a class="text-decoration-none delete" href="#">Удалить</a>
                                </td>
								</tr>
			        	@endforeach
			        </table>
		        </div>


				<div class="row w-100 ml-0 fixed-bottom position-absolute button-add d-flex align-items-center">
					<button type="button" class="btn btn-primary h-100 w-100" id="btn">Добавить</button>
		        </div>
			</div>
		</div>
					<div id="modal" class="modal fade">
						<div class="modal-dialog">
						    <div class="modal-content">
							    <div class="modal-header">
							        <h5 class="modal-title">Title</h5>
							        <button type="button" class="close" data-dismiss="modal">
							            <span>&times;</span>
							        </button>
							    </div>
							    <div class="modal-body">
							        <div class="form-group">
							            <label for="recipient-name" class="form-control-label">Источник:</label>
							            <input type="text" class="form-control" id="source_name">
							        </div>
							        <div class="form-group">
							            <label for="message-text" class="form-control-label">Стоимость:</label>
							            <input type="number" class="form-control" id="price">
							        </div>
							    </div>
							    <div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
									<button type="button" id="save" class="btn btn-primary" disabled>Сохранить</button>
						        </div>
						    </div>
					    </div>
					</div>
