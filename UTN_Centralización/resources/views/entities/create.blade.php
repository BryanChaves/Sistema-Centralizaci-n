@extends($view)

@section('content')
    <div class="message" id="messages"> 
        @if(Session::has('message'))
            <p id="message">{{Session::get('message')}}<button id="btn-close" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></p>                               
        @endif
    </div>
    <div id="panel-create" class="panel panel-default">



        <div class="panel-body">
            @include('entities.partials.messages') 
            {!!Form::open(['route'=>'entidades.store','method'=>'POST'])!!}   
                @include('entities.partials.fields_Create')                             
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.add')}}</button>
            {!!Form::close()!!}

        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('entidades.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>
@endsection