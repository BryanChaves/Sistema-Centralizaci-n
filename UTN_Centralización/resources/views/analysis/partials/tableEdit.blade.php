<table id="tables" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>{{trans('validation.attributes.consecutive')}}</th>
        <th>{{trans('validation.attributes.label')}}</th>
        <th>{{trans('validation.attributes.level')}}</th>
        <th>{{trans('validation.attributes.name')}}</th>
        <th>{{trans('validation.attributes.date')}}</th>
    </tr>
    </thead>
    <tbody>
      @foreach($consult as $sampling)
           <tr>
              <td>{{$sampling->consecutive}}</td>
              <td>{{$sampling->label}}</td>
              <td>{{$sampling->level}}</td>
              <td>{{$sampling->name}}</td>
              <td>{{$sampling->created_at}}</td>          
           </tr>
      @endforeach 
    </tbody>
</table>