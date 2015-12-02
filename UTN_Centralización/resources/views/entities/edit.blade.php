@extends($view)

@section('content')
    <div id="panel-update" class="panel panel-default">
        
       

        <div class="panel-body">
            @include('entities.partials.messages') 
            {!!Form::model($entity,['route'=>['entidades.update',$entity->id],'method'=>'PUT'])!!}
                @include('entities.partials.fields_Edit')          
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.update')}}</button>
            {!!Form::close()!!}
        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('entidades.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>     
@endsection