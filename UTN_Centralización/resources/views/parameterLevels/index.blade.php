@extends($view)

@section('content')
<div class="message" id="messages"> 
        @if(Session::has('message'))
            <p id="message">{{Session::get('message')}}<button id="btn-close" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></p>                               
        @endif
    </div>

	<div id="panel-user" class="panel panel-default">
		<p><a class="btn btn-info" href="{{route('nivel-parametros.create')}}" role="button">{{trans('validation.attributes.new_parameter_level')}}</a></p>
		


        <div class="panel-body">
			@include('parameterLevels.partials.table')	
	        
        </div>           
    </div>

@endsection