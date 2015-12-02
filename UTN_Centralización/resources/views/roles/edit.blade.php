@extends($view)

@section('content')
    <div id="panel-update" class="panel panel-default">
        
        

        <div class="panel-body">
            @include('roles.partials.messages') 
            {!!Form::model($rol,['route'=>['roles.update',$rol->id],'method'=>'PUT'])!!}
                @include('roles.partials.fields_Edit')          
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.update')}}</button>
            {!!Form::close()!!}
        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('roles.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>     
@endsection