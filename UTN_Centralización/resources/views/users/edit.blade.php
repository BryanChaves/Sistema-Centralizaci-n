@extends($view)

@section('content')
    <div id="panel-update" class="panel panel-default">

        <div class="panel-body">
            @include('users.partials.messages') 
            {!!Form::model($user,['route'=>['usuarios.update',$user->id],'method'=>'PUT'])!!}
                @include('users.partials.fields')          
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.update')}}</button>
            {!!Form::close()!!}
        </div>
        <a id="btn-back" class="btn btn-info"  href="{{ route('usuarios.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>     
@endsection