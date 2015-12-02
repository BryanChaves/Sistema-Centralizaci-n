<table id="tables" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>{{trans('validation.attributes.user')}}</th>
        <th>{{trans('validation.attributes.entity')}}</th>
        <th>{{trans('validation.attributes.actions')}}</th>
    </tr>
    </thead>
    <tbody>
    
      @foreach($usersEntities as $userEntity)
           <tr data-id="{{$userEntity->id}}">
              @foreach($users as $user)
                  <?php
                    if($user->id == $userEntity->user_id){
                         echo "<td>$user->full_name</td>";    
                       } 
                  ?>
              @endforeach
              @foreach($entities as $entity)
                  <?php
                    if($entity->id == $userEntity->entity_id){
                         echo "<td>$entity->name</td>";    
                       } 
                  ?>
              @endforeach
              
             
              <td class="center">
                <a class="btn btn-info btn-xs" href="{{ route('usuarios-entidades.edit',$userEntity->id)}}">
                  <i class="glyphicon glyphicon-edit icon-white"></i>
                  {{trans('validation.attributes.edit')}}
                </a>
                <a class="btn btn-danger btn-xs" href="">
                {!! Form::open(['method'=>'delete','action'=>['UserEntityController@destroy',$userEntity->id], 'style' => 'display:inline']) !!}<button type="submit" onclick="return confirm('Seguro que desea eliminar?')" class="btn btn-danger btn-xs">{{trans('validation.attributes.remove')}}</button>{!! Form::close() !!}
                <i class="glyphicon glyphicon-trash icon-white"></i>
             
                </a>
        
              </td>              
           </tr>
      @endforeach 
    </tbody>
</table>

