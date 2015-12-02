<table id="tables" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>{{trans('validation.attributes.level')}}</th>
        <th>{{trans('validation.attributes.parameter')}}</th>
        <th>{{trans('validation.attributes.actions')}}</th>
    </tr>
    </thead>
    <tbody>
          <tr>  
            @foreach($parameterLevels as $parameterLevel)
            <td>{{$parameterLevel->level}}</td> 
              @foreach($parameters as $parameter)
                <?php
                  if($parameter->id == $parameterLevel->parameter_id){
                      echo "<td>$parameter->parameter</td>";    
                    } 
                 ?>
             @endforeach 
                     
              <td class="center">
                <a class="btn btn-info btn-xs" href="{{ route('nivel-parametros.edit',$parameterLevel->id)}}">
                  <i class="glyphicon glyphicon-edit icon-white"></i>
                  {{trans('validation.attributes.edit')}}
                </a>
                <a class="btn btn-danger btn-xs" href="">
                {!! Form::open(['method'=>'delete','action'=>['ParameterlevelController@destroy',$parameterLevel->id], 'style' => 'display:inline']) !!}<button type="submit" onclick="return confirm('Seguro que desea eliminar?')" class="btn btn-danger btn-xs">{{trans('validation.attributes.remove')}}</button>{!! Form::close() !!}
                <i class="glyphicon glyphicon-trash icon-white"></i>
                </a>        
              </td>              
           </tr>
      @endforeach 
    </tbody>
</table>