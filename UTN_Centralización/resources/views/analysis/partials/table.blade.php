<table id="tables" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>{{trans('validation.attributes.agent')}}</th>
        <th>{{trans('validation.attributes.laboratory')}}</th>
        <th>{{trans('validation.attributes.date')}}</th>
        <th>{{trans('validation.attributes.report_number')}}</th>
        <th>{{trans('validation.attributes.actions')}}</th>
    </tr>
    </thead>
    <tbody>
    
      @foreach($analysis as $value)
           <tr data-id="{{$value->id}}">
              @foreach($entities as $entity)
                <?php
                  if($entity->id == $value->agent_id){
                      echo "<td>$entity->name</td>";    
                    } 
                 ?>
              @endforeach 
              <td>{{$value->laboratory_name}}</td> 
              <td>{{$value->date}}</td>   
              <td>{{$value->report_number}}</td>         
              <td class="center">
                <a class="btn btn-info btn-xs" href="{{ route('analisis.edit',$value->id)}}">
                  <i class="glyphicon glyphicon-edit icon-white"></i>
                  {{trans('validation.attributes.edit')}}
                </a>
                <a class="btn-danger btn-xs" href="">
                {!! Form::open(['method'=>'delete','action'=>['AnalysisController@destroy',$value->id], 'style' => 'display:inline']) !!}<button type="submit" onclick="return confirm('Seguro que desea eliminar?')" class="btn btn-danger btn-xs">{{trans('validation.attributes.remove')}}</button>{!! Form::close() !!}
                <i class="glyphicon glyphicon-trash"></i>
                </a>        
              </td>              
           </tr>
      @endforeach 
    </tbody>
</table>


 