@extends($view)

@section('content')

    <div id="panel-create" class="panel panel-default">

        <div class="panel-body">
            @include('analysis.partials.messages') 
            {!!Form::open(['route'=>'analisis.store','method'=>'POST','files'=>true])!!}   
                @include('analysis.partials.fields_Create')                             
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.add')}}</button>
            {!!Form::close()!!}
        </div>
        
        <a id="btn-back" class="btn btn-info"  href="{{ route('analisis.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>
    
@endsection