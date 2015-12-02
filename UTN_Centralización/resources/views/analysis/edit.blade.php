@extends($view)

@section('content')

    <div id="panel-update" class="panel panel-default">
        
        <div class="panel-body">
            @include('analysis.partials.messages') 
            {!!Form::model($analysis,['route'=>['analisis.update',$analysis->id],'method'=>'PUT','files'=>true])!!}
                @include('analysis.partials.fields_Edit')          
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.update')}}</button>
            {!!Form::close()!!}
        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('analisis.index')}}">{{trans('validation.attributes.back')}}</a>
    </div> 
        
@endsection