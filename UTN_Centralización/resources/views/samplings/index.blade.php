@extends($view)

@section('content')
<div class="message" id="messages"> 
        @if(Session::has('message'))
            <p id="message">{{Session::get('message')}}<button id="btn-close" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></p>                               
        @endif
    </div>

	<div id="panel-user" class="panel panel-default">
		<p><a class="btn btn-info" href="{{route('muestras.create')}}" role="button">{{trans('validation.attributes.new_sampling')}}</a></p>
		

        
        <div class="panel-body">
			@include('samplings.partials.table')	
	        
        </div>           
    </div>

@endsection