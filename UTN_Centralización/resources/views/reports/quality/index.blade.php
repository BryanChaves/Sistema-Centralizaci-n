@extends($view)

@section('content')
    <ul class="breadcrumb">
        <li>
            <i><img src="/img/calidad.png"></i>
            <li><a>REPORTES DE</a></li>
            <a>CALIDAD</a> 
            <i class="icon-angle-right"></i>
        </li>
    </ul>
    <div class="message" id="messages"> 
        @if(Session::has('message'))
            <p id="message">{{Session::get('message')}}<button id="btn-close" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></p>                               
        @endif
    </div>
    @include('reports.quality.partials.messages') 

	<div id="panel-user" class="panel panel-default">
		
		{!!Form::open(['route'=>'calidades.store','method'=>'POST'])!!} 
      		<div class="form-group">   
  <select  class="form-control"  name="sampling_site_id">
    @foreach($samplingSites as $samplingSite)
      <?php                    
       echo "<option selected value=$samplingSite->id>$samplingSite->name</option>";                    
      ?>
    @endforeach
  </select>
			</div> 
			<div class="form-group">
  				<label class="control-label">{{trans('validation.attributes.startDate')}}</label>
  				<div class='input-group date' id='datetimepicker1'>
    			<input type='text' name='startDate' class='text' id='date5' readonly />
    			<span class="input-group-addon">
      				<span class="glyphicon glyphicon-calendar"></span>
    			</span>
  				</div>
			</div>
			<div class="form-group">
  				<label class="control-label">{{trans('validation.attributes.endDate')}}</label>
  				<div class='input-group date' id='datetimepicker1'>
    			<input type='text' name='endDate' class='text' id='date6' readonly />
    			<span class="input-group-addon">
      				<span class="glyphicon glyphicon-calendar"></span>
    			</span>
  				</div>
			</div>
        	<button id="btn-search" type="submit" class="btn btn-default">{{trans('validation.attributes.search')}}</button>
      	{!!Form::close()!!}
    </div>

@endsection