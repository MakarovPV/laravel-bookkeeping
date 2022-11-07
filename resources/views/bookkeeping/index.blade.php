@extends('layouts.app')

@section('content')

<div class="container-fluid">
	<div class="row">

		@include('bookkeeping.modules.sideBar')

		@include('bookkeeping.modules.diagram')

		@include('bookkeeping.modules.settings')

	</div>
</div>



@endsection
