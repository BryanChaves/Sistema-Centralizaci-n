@extends($view)

@section('content')
    <div id="panel-update" class="panel panel-default">
        


        <div class="panel-body">
            @include('parameterLevels.partials.messages') 
            {!!Form::model($analysis,['route'=>['nivel-parametros.update',$parameterLevel->id],'method'=>'PUT'])!!}
                @include('parameterLevels.partials.fields_Edit')          
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.update')}}</button>
            {!!Form::close()!!}
        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('nivel-parametros.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>     
@endsection