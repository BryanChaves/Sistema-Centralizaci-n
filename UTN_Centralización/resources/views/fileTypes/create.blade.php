@extends($view)

@section('content')
    <div id="panel-create" class="panel panel-default">

        

        <div class="panel-body">
            @include('fileTypes.partials.messages') 
            {!!Form::open(['route'=>'tipos-expediente.store','method'=>'POST'])!!}   
                @include('fileTypes.partials.fields')                             
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.add')}}</button>
            {!!Form::close()!!}

        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('tipos-expediente.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>
@endsection