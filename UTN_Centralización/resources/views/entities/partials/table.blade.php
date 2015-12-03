<table id="tables" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>{{trans('validation.attributes.name')}}</th>
        <th>{{trans('validation.attributes.address')}}</th>
        <th>{{trans('validation.attributes.email')}}</th>
        <th>{{trans('validation.attributes.telephone')}}</th>
        <th>{{trans('validation.attributes.description')}}</th>
        <th>{{trans('validation.attributes.rol_id')}}</th>
        <th>{{trans('validation.attributes.actions')}}</th>
    </tr>
    </thead>
    <tbody>
    
      @foreach($entities as $entity)
           <tr data-id="{{$entity->id}}">
              <td>{{$entity->name}}</td>
              <td>{{$entity->address}}</td>
              <td>{{$entity->email}}</td>
              <td>{{$entity->telephone_number}}</td>
              <td>{{$entity->description}}</td>
               @foreach($roles as $rol)
                  <?php
                    if($rol->id == $entity->rol_id){
                         echo "<td>$rol->name</td>";    
                       } 
                  ?>
                @endforeach
              <td class="center">
                <a class="btn btn-info btn-xs btn-block" href="{{ route('entidades.edit',$entity->id)}}">
                  <i class="glyphicon glyphicon-edit icon-white"></i>
                  {{trans('validation.attributes.edit')}}
                </a>
                <a class="btn-danger btn-xs btn-block" href="">
                {!! Form::open(['method'=>'delete','action'=>['EntityController@destroy',$entity->id], 'style' => 'display:inline']) !!}<button type="submit" onclick="return confirm('Seguro que desea eliminar?')" class="btn btn-danger btn-xs">{{trans('validation.attributes.remove')}}</button>{!! Form::close() !!}
                <i class="glyphicon glyphicon-trash"></i>
                </a>        
              </td>              
           </tr>
      @endforeach 
    </tbody>
</table>