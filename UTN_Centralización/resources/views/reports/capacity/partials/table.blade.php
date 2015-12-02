<table id="tables" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>{{trans('validation.attributes.capacity')}}</th>
        <th>{{trans('validation.attributes.method')}}</th>
        <th>{{trans('validation.attributes.observations')}}</th>
        <th>{{trans('validation.attributes.date')}}</th>
        <th>{{trans('validation.attributes.weather')}}</th>
        <th>{{trans('validation.attributes.name')}}</th>
    </tr>
    </thead>
        <tbody>
      @foreach($aforos as $aforo)
      
           <tr>
              <td>{{$aforo->capacity}}</td>
              <td>{{$aforo->method}}</td>
              <td>{{$aforo->observations}}</td>
              <td>{{$aforo->date}}</td> 
               <td>{{$aforo->weather}}</td>  
               <td>{{$aforo->name}}</td>        
           </tr>
      @endforeach 
    </tbody>
</table>

watersource_name