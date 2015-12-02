@extends($view)

@section('content')
    <div id="panel-create" class="panel panel-default">

        

        <div class="panel-body">
            @include('watersources.partials.messages') 
            {!!Form::open(['route'=>'nacientes.store','method'=>'POST','files'=>true])!!}   
                @include('watersources.partials.fields')                             
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.add')}}</button>
            {!!Form::close()!!}

        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('nacientes.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>
@endsection