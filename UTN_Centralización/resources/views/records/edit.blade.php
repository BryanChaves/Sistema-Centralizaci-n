@extends($view)

@section('content')
    <div id="panel-update" class="panel panel-default">
        
        <div class="panel-heading">{{trans('validation.attributes.update_record')}}</div>

        <div class="panel-body">
            @include('records.partials.messages') 
            {!!Form::model($record,['route'=>['registros.update',$record->id],'method'=>'PUT'])!!}
                @include('records.partials.fields_Edit')          
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.update')}}</button>
            {!!Form::close()!!}
        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('registros.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>     
@endsection