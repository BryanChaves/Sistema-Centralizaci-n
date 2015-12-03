<table id="tables" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>{{trans('validation.attributes.project_name')}}</th>
        <th>{{trans('validation.attributes.setena_administrative_record')}}</th>
        <th>{{trans('validation.attributes.province')}}</th>
        <th>{{trans('validation.attributes.actions')}}</th>
    </tr>
    </thead>
    <tbody>
    
      @foreach($viabilities as $viability)
           <tr data-id="{{$viability->id}}">
              <td>{{$viability->project_name}}</td> 
              <td>{{$viability->setena_administrative_record}}</td>   
              @foreach($provinces as $province)
                <?php
              if($province->id == $viability->province){
                echo "<td>$province->name</td>";    
                }     
                ?>
              @endforeach         
              <td class="center">
               <a class="btn btn-success btn-xs" href="{{ route('viabilidades.show',$viability->id)}}">
                  <i class="glyphicon glyphicon-search icon-white"></i>
                  {{trans('validation.attributes.show')}}
                </a>
                <a class="btn btn-info btn-xs" href="{{ route('viabilidades.edit',$viability->id)}}">
                  <i class="glyphicon glyphicon-edit icon-white"></i>
                  {{trans('validation.attributes.edit')}}
                </a>
                <a class="btn-danger btn-xs" href="">
                {!! Form::open(['method'=>'delete','action'=>['ViabilityController@destroy',$viability->id], 'style' => 'display:inline']) !!}<button type="submit" onclick="return confirm('Seguro que desea eliminar?')" class="btn btn-danger btn-xs">{{trans('validation.attributes.remove')}}</button>{!! Form::close() !!}
                <i class="glyphicon glyphicon-trash"></i>
                </a>        
              </td>              
           </tr>
      @endforeach 
    </tbody>
</table>