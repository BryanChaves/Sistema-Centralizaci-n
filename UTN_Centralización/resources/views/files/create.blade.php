@extends($view)

@section('content')
    <div id="panel-create" class="panel panel-default">

        

        <div class="panel-body">
            @include('files.partials.messages') 
            {!!Form::open(['route'=>'expedientes.store','method'=>'POST'])!!}   
                @include('files.partials.fields')                             
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.add')}}</button>
            {!!Form::close()!!}

        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('expedientes.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>
@endsection