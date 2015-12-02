@extends($view)

@section('content')
    <div id="panel-update" class="panel panel-default">
        
        <div class="panel-heading">{{trans('validation.attributes.update_parameter')}}</div>

        <div class="panel-body">
            @include('parameters.partials.messages') 
            {!!Form::model($parameter,['route'=>['parametros.update',$parameter->id],'method'=>'PUT'])!!}
                @include('parameters.partials.fields')          
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.update')}}</button>
            {!!Form::close()!!}
        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('parametros.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>     
@endsection