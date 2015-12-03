@extends($view)

@section('content')
<div class="message" id="messages"> 
        @if(Session::has('message'))
            <p id="message">{{Session::get('message')}}<button id="btn-close" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></p>                               
        @endif
    </div>

	<div id="panel-user" class="panel panel-default">
		<p><a class="btn btn-info" href="{{route('registros.create')}}" role="button">{{trans('validation.attributes.new_record')}}</a></p>
		{!! Form::open(['route'=>'registros.index','method'=>'GET','class'=>'navbar-form navbar-left pull-right','id'=>'search','role'=>'search'])!!}
      		<div class="form-group">
          		{!!Form::Text('value',null,['class'=>'form-control','id'=>'txt-search','placeholder'=>'Digite el valor'])!!}
        	</div>
        	<button id="btn-search" type="submit" class="btn btn-default">{{trans('validation.attributes.search')}}</button>
      	{!!Form::close()!!}	

        <div class="panel-heading">{{trans('validation.attributes.list_records')}}</div>
        <div class="panel-body">
			@include('records.partials.table')	
	        {!! $records->render() !!}
        </div>           
    </div>

@endsection