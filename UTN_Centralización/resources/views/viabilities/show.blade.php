@extends($view)

@section('body')
  
  <div id="panel-user" class="panel panel-default">
    <p><a class="btn btn-info" href="{{route('viabilidades.index')}}" role="button">Retroceder</a></p>
        
        <div class="panel-body">
      @include('viabilities.partials.table_Show')  
          
        </div>           
    </div>

    

@endsection