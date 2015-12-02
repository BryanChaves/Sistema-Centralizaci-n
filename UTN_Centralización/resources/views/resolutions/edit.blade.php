@extends($view)

@section('content')
    <div id="panel-update" class="panel panel-default">
        
       

        <div class="panel-body">
            @include('resolutions.partials.messages') 
            {!!Form::model($resolution,['route'=>['resoluciones.update',$resolution->id],'method'=>'PUT'])!!}
                @include('resolutions.partials.fields')          
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.update')}}</button>
            {!!Form::close()!!}
        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('resoluciones.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>     
@endsection