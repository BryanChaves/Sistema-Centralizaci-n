<table id="tables" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>{{trans('validation.attributes.sampling')}}</th>
        <th>{{trans('validation.attributes.parameter')}}</th>
        <th>{{trans('validation.attributes.value')}}</th>
        <th>{{trans('validation.attributes.actions')}}</th>
    </tr>
    </thead>
    <tbody>
    
      @foreach($records as $record)
           <tr data-id="{{$sampling->id}}">
              @foreach($samplings as $sampling)
                <?php
                  if($sampling->id == $record->sampling_id){
                      echo "<td>$sampling->label</td>";    
                    } 
                 ?>
              @endforeach
               @foreach($parameters as $parameter)
                <?php
                  if($parameter->id == $record->parameter_id){
                      echo "<td>$parameter->name</td>";    
                    } 
                 ?>
              @endforeach
              <td>{{$record->value}}</td>
              <td class="center">
                <a class="btn btn-info btn-xs" href="{{ route('registros.edit',$record->id)}}">
                  <i class="glyphicon glyphicon-edit icon-white"></i>
                  {{trans('validation.attributes.edit')}}
                </a>
                <a class="btn btn-danger btn-xs" href="#">
                {!! Form::open(['method'=>'delete','action'=>['RecordController@destroy',$record->id], 'style' => 'display:inline']) !!}<button type="submit" onclick="return confirm('Seguro que desea eliminar?')" class="btn btn-danger btn-xs">{{trans('validation.attributes.remove')}}</button>{!! Form::close() !!}
                <i class="glyphicon glyphicon-trash icon-white"></i>
             
                </a>
        
              </td>              
           </tr>
      @endforeach 
    </tbody>
</table>