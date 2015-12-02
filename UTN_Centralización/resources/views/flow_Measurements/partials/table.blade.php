<table id="tables" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>{{trans('validation.attributes.capacity')}}</th>
        <th>{{trans('validation.attributes.unit')}}</th>
        <th>{{trans('validation.attributes.method')}}</th>
        <th>{{trans('validation.attributes.observations')}}</th>
        <th>{{trans('validation.attributes.date')}}</th>
        <th>{{trans('validation.attributes.weather')}}</th>
        <th>{{trans('validation.attributes.watersource_id')}}</th>
        <th>{{trans('validation.attributes.actions')}}</th>
    </tr>
    </thead>
    <tbody>
    
      @foreach($flow_Measurements as $flow_Measurement)
           <tr data-id="{{$flow_Measurement->id}}">
              
              <td>{{$flow_Measurement->capacity}}</td>
              <td>L/S</td>
              <td>{{$flow_Measurement->method}}</td>
              <td>{{$flow_Measurement->observations}}</td> 
              <td>{{$flow_Measurement->date}}</td> 
              <td>{{$flow_Measurement->weather}}</td>    
              @foreach($watersources as $watersource)
                  <?php
                    if($watersource->id == $flow_Measurement->watersource_id){
                         echo "<td>$watersource->watersource_name</td>";    
                       } 
                  ?>
              @endforeach
                      
              <td class="center">
                <a class="btn btn-info btn-xs" href="{{ route('medicion-caudal.edit',$flow_Measurement->id)}}">
                  <i class="glyphicon glyphicon-edit icon-white"></i>
                  {{trans('validation.attributes.edit')}}
                </a>
                <a class="btn btn-danger btn-xs" href="">
                {!! Form::open(['method'=>'delete','action'=>['Flow_MeasurementController@destroy',$flow_Measurement->id], 'style' => 'display:inline']) !!}<button type="submit" onclick="return confirm('Seguro que desea eliminar?')" class="btn btn-danger btn-xs">{{trans('validation.attributes.remove')}}</button>{!! Form::close() !!}
                <i class="glyphicon glyphicon-trash icon-white"></i>
                </a>        
              </td>              
           </tr>
      @endforeach 
    </tbody>
</table>