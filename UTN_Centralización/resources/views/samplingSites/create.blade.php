@extends($view)

@section('content')
    <div id="panel-create" class="panel panel-default">

        <div class="panel-heading">{{trans('validation.attributes.new_sampling_site')}}</div>

        <div class="panel-body">
            @include('samplingSites.partials.messages') 
            {!!Form::open(['route'=>'sitios-muestreo.store','method'=>'POST'])!!}   
                @include('samplingSites.partials.fields')                             
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.add')}}</button>
            {!!Form::close()!!}

        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('sitios-muestreo.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>
@endsection