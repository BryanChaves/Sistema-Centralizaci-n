<table id="tables" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>{{trans('validation.attributes.parameter')}}</th>
        <th>{{trans('validation.attributes.unit')}}</th>
        <th>{{trans('validation.attributes.recommended_value')}}</th>
        <th>{{trans('validation.attributes.maximum_allowable')}}</th>
        <th>{{trans('validation.attributes.actions')}}</th>
    </tr>
    </thead>
    <tbody>
    
      @foreach($parameters as $parameter)
            <tr data-id="{{$parameter->id}}">
              <td>{{$parameter->parameter}}</td> 
              <td>{{$parameter->unit}}</td> 
              <td>{{$parameter->recommended_value}}</td>   
              <td>{{$parameter->maximum_allowable}}</td>         
              <td class="center">
                <a class="btn btn-info btn-xs" href="{{ route('parametros.edit',$parameter->id)}}">
                  <i class="glyphicon glyphicon-edit icon-white"></i>
                  {{trans('validation.attributes.edit')}}
                </a>
                <a class="btn btn-danger btn-xs" href="">
                {!! Form::open(['method'=>'delete','action'=>['ParameterController@destroy',$parameter->id], 'style' => 'display:inline']) !!}<button type="submit" onclick="return confirm('Seguro que desea eliminar?')" class="btn btn-danger btn-xs">{{trans('validation.attributes.remove')}}</button>{!! Form::close() !!}
                <i class="glyphicon glyphicon-trash icon-white"></i>
                </a>        
              </td>              
           </tr>
      @endforeach 
    </tbody>
</table>