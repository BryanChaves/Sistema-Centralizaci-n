@extends('dashboard')

@section('nav')
 <div id="sidebar-left" class="span2" style="background: #394a59; color: #d0d8df;">
                <div class="nav-collapse sidebar-nav">
                    <ul class="nav nav-tabs nav-stacked main-menu">
                        
                           

                        @include('section')
                        
                       
                       
                    </ul>
                </div>
 </div>


@endsection

@section('body')

@yield('content')
   

@endsection

