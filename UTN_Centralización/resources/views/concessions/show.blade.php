@extends($view)

@section('body')
  
  <div id="panel-user" class="panel panel-default">
    <p><a class="btn btn-info" href="{{route('concesiones.index')}}" role="button">{{trans('validation.attributes.back')}}</a></p>
        
        <div class="panel-body">
      @include('concessions.partials.table_Show')  
          
        </div>           
    </div>

   
@endsection