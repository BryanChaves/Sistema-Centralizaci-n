<table id="tables" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>{{trans('validation.attributes.agent')}}</th>
        <th>{{trans('validation.attributes.agent_ID')}}</th>
        <th>{{trans('validation.attributes.resolution_id')}}</th> 
        <th>{{trans('validation.attributes.file_id')}}</th>
        <th>{{trans('validation.attributes.conferment_date')}}</th>
        <th>{{trans('validation.attributes.due_date')}}</th>
        <th>{{trans('validation.attributes.fileType_id')}}</th>
        <th>{{trans('validation.attributes.owner')}}</th>
        <th>{{trans('validation.attributes.property_number')}}</th>
        <th>{{trans('validation.attributes.water_tapping_point')}}</th>
        <th>{{trans('validation.attributes.authorized_use')}}</th>
        <th>{{trans('validation.attributes.assigned_flow')}}</th>
        <th>{{trans('validation.attributes.capacity_flow')}}</th>
    </tr>
    </thead>
    <tbody>
    
           <tr data-id="{{$concession->id}}">  
              @foreach($entities as $entity)
                  <?php
                    if($entity->id == $concession->agent_id){
                         echo "<td>$entity->name</td>";    
                       } 
                  ?>
              @endforeach 
              <td>{{$concession->agent_ID}}</td>
              @foreach($resolutions as $resolution)
                <?php
                  if($resolution->id == $concession->resolution_id){
                      echo "<td>$resolution->num_resolution</td>";    
                    } 
                 ?>
              @endforeach
              @foreach($files as $file)
                <?php
                  if($file->id == $concession->file_id){
                      echo "<td>$file->num_file</td>";    
                    } 
                 ?>
              @endforeach
              <td>{{$concession->conferment_date}}</td>
              <td>{{$concession->due_date}}</td>
              @foreach($fileTypes as $fileType)
                <?php
                  if($fileType->id == $concession->fileType_id){
                      echo "<td>$fileType->name</td>";    
                    } 
                 ?>
              @endforeach
              <td>{{$concession->owner}}</td> 
              <td>{{$concession->property_number}}</td>
              <td>{{$concession->water_tapping_point}}</td>
              <td>{{$concession->authorized_use}}</td>
              <td>{{$concession->assigned_flow}}</td>
              <td>{{$concession->capacity_flow}}</td>               
           </tr>
      
    </tbody>
</table>