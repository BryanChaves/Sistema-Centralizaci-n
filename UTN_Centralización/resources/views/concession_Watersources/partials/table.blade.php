<table id="tables" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>{{trans('validation.attributes.concession')}}</th>
        <th>{{trans('validation.attributes.watersource')}}</th>
        <th>{{trans('validation.attributes.actions')}}</th>
    </tr>
    </thead>
    <tbody>
    
      @foreach($concession_Watersources as $concession_Watersource)
           <tr data-id="{{$concession_Watersource->id}}">
              @foreach($concessions as $concession)
                  <?php
                    if($concession->id == $concession_Watersource->concession_id){
                         echo "<td>$concession->agent</td>";    
                       } 
                  ?>
              @endforeach
              @foreach($watersources as $watersource)
                  <?php
                    if($watersource->id == $concession_Watersource->watersource_id){
                         echo "<td>$watersource->watersource_name</td>";    
                       } 
                  ?>
              @endforeach        
              <td class="center">
                <a class="btn btn-info btn-xs" href="{{ route('concesion-naciente.edit',$concession_Watersource->id)}}">
                  <i class="glyphicon glyphicon-edit icon-white"></i>
                  {{trans('validation.attributes.edit')}}
                </a>
                <a class="btn btn-danger btn-xs" href="">
                {!! Form::open(['method'=>'delete','action'=>['Concession_WatersourceController@destroy',$concession_Watersource->id], 'style' => 'display:inline']) !!}<button type="submit"onclick="return confirm('Seguro que desea eliminar?')" class="btn btn-danger btn-xs">{{trans('validation.attributes.remove')}}</button>{!! Form::close() !!}
                <i class="glyphicon glyphicon-trash icon-white"></i>
                </a>        
              </td>              
           </tr>
      @endforeach 
    </tbody>
</table>