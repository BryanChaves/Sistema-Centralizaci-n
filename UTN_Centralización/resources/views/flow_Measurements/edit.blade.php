@extends($view)

@section('content')
    <div id="panel-update" class="panel panel-default">
        
        

        <div class="panel-body">
            @include('flow_Measurements.partials.messages') 
            {!!Form::model($flow_measurement,['route'=>['medicion-caudal.update',$flow_measurement->id],'method'=>'PUT'])!!}
                @include('flow_Measurements.partials.fields_Edit')          
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.update')}}</button>
            {!!Form::close()!!}
        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('medicion-caudal.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>     
@endsection