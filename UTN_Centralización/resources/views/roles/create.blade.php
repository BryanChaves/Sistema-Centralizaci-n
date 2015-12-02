@extends($view)

@section('content')
    <div id="panel-create" class="panel panel-default">

        

        <div class="panel-body">
            @include('roles.partials.messages') 
            {!!Form::open(['route'=>'roles.store','method'=>'POST'])!!}   
                @include('roles.partials.fields_Create')                             
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.add')}}</button>
            {!!Form::close()!!}

        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('roles.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>
@endsection