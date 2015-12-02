<table id="tables" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>{{trans('validation.attributes.num_sampling')}}</th>
        <th>{{trans('validation.attributes.label')}}</th>
        <th>{{trans('validation.attributes.level')}}</th>
        <th>{{trans('validation.attributes.site')}}</th>
        <th>{{trans('validation.attributes.actions')}}</th>
    </tr>
    </thead>
    <tbody>
    
      @foreach($samplings as $sampling)
           
              
              
                
                  <tr> 
                    <td>{{$sampling->consecutive}}</td>
                    <td>{{$sampling->label}}</td>
                    <td>{{$sampling->level}}</td>
                    
                    

                    <td class="center">
                      <a class="btn btn-info btn-xs" href="{{ route('muestras.edit',$sampling->id)}}">
                        <i class="glyphicon glyphicon-edit icon-white"></i>
                        {{trans('validation.attributes.edit')}}
                      </a>
                      <a class="btn btn-danger btn-xs" href="#">
                        {!! Form::open(['method'=>'delete','action'=>['SamplingController@destroy',$sampling->id], 'style' => 'display:inline']) !!}<button type="submit" onclick="return confirm('Seguro que desea eliminar?')" class="btn btn-danger btn-xs">{{trans('validation.attributes.remove')}}</button>{!! Form::close() !!}
                        <i class="glyphicon glyphicon-trash icon-white"></i>
                      </a>
        
                    </td> 
                  </tr>  
                
                
              @endforeach
                           
        
    </tbody>
</table>