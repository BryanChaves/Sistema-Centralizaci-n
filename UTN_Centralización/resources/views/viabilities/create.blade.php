@extends($view)

@section('content')
    <div id="panel-create" class="panel panel-default">

        

        <div class="panel-body">
            @include('viabilities.partials.messages') 
            {!!Form::open(['route'=>'viabilidades.store','method'=>'POST','files'=>true])!!}   
                @include('viabilities.partials.fields_Create')                             
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.add')}}</button>
            {!!Form::close()!!}

        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('viabilidades.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>
@endsection