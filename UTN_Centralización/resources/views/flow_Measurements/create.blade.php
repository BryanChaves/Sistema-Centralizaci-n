@extends($view)

@section('content')
    <div id="panel-create" class="panel panel-default">

        

        <div class="panel-body">
            @include('flow_Measurements.partials.messages') 
            {!!Form::open(['route'=>'medicion-caudal.store','method'=>'POST'])!!}   
                @include('flow_Measurements.partials.fields_Create')                             
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.add')}}</button>
            {!!Form::close()!!}

        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('medicion-caudal.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>
@endsection