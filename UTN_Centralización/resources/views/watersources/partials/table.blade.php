<table id="tables" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>{{trans('validation.attributes.watersource_name')}}</th>
        <th>{{trans('validation.attributes.address')}}</th>
        <th>{{trans('validation.attributes.coordinate')}}</th>
        <th>{{trans('validation.attributes.observations')}}</th>
        <th>{{trans('validation.attributes.actions')}}</th>
    </tr>
    </thead>
    <tbody>
    
      @foreach($watersources as $watersource)
           <tr data-id="{{$watersource->id}}">  
              <td>{{$watersource->watersource_name}}</td>
              <td>{{$watersource->address}}</td>
              <td>{{$watersource->coordinate_CRTM05}}</td>
              <td>{{$watersource->observations}}</td>
              <td class="center">
                
                <a class="btn btn-info btn-xs" href="{{ route('nacientes.edit',$watersource->id)}}">
                  <i class="glyphicon glyphicon-edit icon-white"></i>
                  {{trans('validation.attributes.edit')}}
                </a>
                <a class="btn btn-danger btn-xs" href="">
                {!! Form::open(['method'=>'delete','action'=>['WatersourceController@destroy',$watersource->id], 'style' => 'display:inline']) !!}<button type="submit" onclick="return confirm('Seguro que desea eliminar?')" class="btn btn-danger btn-xs">{{trans('validation.attributes.remove')}}</button>{!! Form::close() !!}
                <i class="glyphicon glyphicon-trash icon-white"></i>
             
                </a>
        
              </td>              
           </tr>
      @endforeach 
    </tbody>
</table>