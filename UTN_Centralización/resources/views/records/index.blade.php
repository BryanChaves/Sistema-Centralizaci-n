@extends($view)

@section('content')
  <div class="message" id="messages"> 
        @if(Session::has('message'))
            <p id="message">{{Session::get('message')}}<button id="btn-close" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></p>                               
        @endif
  </div>

	<div id="panel-user" class="panel panel-default">
		<p><a class="btn btn-info" href="{{route('registros.create')}}" role="button">{{trans('validation.attributes.new_record')}}</a></p>
        <div class="panel-heading">{{trans('validation.attributes.list_records')}}</div>
        <div class="panel-body">
			     @include('records.partials.table')	
        </div>           
    </div>

@endsection