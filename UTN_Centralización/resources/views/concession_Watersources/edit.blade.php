@extends($view)

@section('content')
    <div id="panel-update" class="panel panel-default">
        
        

        <div class="panel-body">
            @include('concession_Watersources.partials.messages') 
            {!!Form::model($concession_watersource,['route'=>['concesion-naciente.update',$concession_watersource->id],'method'=>'PUT'])!!}
                @include('concession_Watersources.partials.fields_Edit')          
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.update')}}</button>
            {!!Form::close()!!}
        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('concesion-naciente.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>     
@endsection