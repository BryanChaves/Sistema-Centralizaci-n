@extends($view)

@section('content')
    <div id="panel-create" class="panel panel-default">

        <div class="panel-body">
            @include('users.partials.messages') 
            {!!Form::open(['route'=>'usuarios.store','method'=>'POST'])!!}   
                @include('users.partials.fields')                             
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.add')}}</button>
            {!!Form::close()!!}
        </div>
        <a id="btn-back" class="btn btn-info"  href="{{ route('usuarios.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>
@endsection