@extends($view)

@section('content')
    <div id="panel-update" class="panel panel-default">
        
        <div class="panel-heading">{{trans('validation.attributes.update_sampling_site')}}</div>

        <div class="panel-body">
            @include('samplingSites.partials.messages') 
            {!!Form::model($sampling_site,['route'=>['sitios-muestreo.update',$sampling_site->id],'method'=>'PUT'])!!}
                @include('samplingSites.partials.fields')          
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.update')}}</button>
            {!!Form::close()!!}
        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('roles.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>     
@endsection