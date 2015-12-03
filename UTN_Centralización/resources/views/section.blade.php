<li>
                            <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.files_view')}}</span></a>
                            <ul>                                               
                                <li><a class="submenu" href="{{route('expedientes.index')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.files')}}</span></a></li>                                
                                <li><a class="submenu" href="{{route('tipos-expediente.index')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.files_types')}}</span></a></li>                                
                            </ul>   
                        </li>
                       <li>
                            <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.users')}}</span></a>
                            <ul>
                                <li><a class="submenu" href="{{route('usuarios.index')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.users')}}</span></a></li>
                                <li><a class="submenu" href="{{route('usuarios-entidades.index')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.users_entities')}}</span></a></li>
                                <li><a class="submenu" href="{{route('entidades.index')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.entities')}}</span></a></li>
                                <li><a class="submenu" href="{{route('roles.index')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.roles')}}</span></a></li>
                            </ul>   
                        </li>
                        <li>
                            <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.watersources')}}</span></a>
                            <ul>
                               <li><a class="submenu" href="{{route('concesiones.index')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.concessions')}}</span></a></li>   
                               <li><a class="submenu" href="{{route('concesion-naciente.index')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.concession_watersource')}}</span></a></li>
                               <li><a class="submenu" href="{{route('nacientes.index')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.watersources')}}</span></a></li>   
                               <li><a class="submenu" href="{{route('viabilidades.index')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.viabilities')}}</span></a></li> 
                               <li><a class="submenu" href="{{route('resoluciones.index')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.resolutions')}}</span></a></li> 
                            </ul>   
                        </li>
                        <li>
                            <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.measurements')}}</span></a>
                            <ul>    
                                <li><a class="submenu" href="{{route('medicion-caudal.index')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.flow_measurement')}}</span></a></li>
                                <li><a class="submenu" href="{{route('analisis.index')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.analysis')}}</span></a></li>                             
                                <li><a class="submenu" href="{{route('nivel-parametros.index')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.parameter_level')}}</span></a></li> 
                                <li><a class="submenu" href="{{route('parametros.index')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.parameters')}}</span></a></li>
                            </ul>   
                        </li>
                        <li>
                            <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.reports')}}</span></a>
                            <ul>    
                                <li><a class="submenu" href="{{route('aforos.index')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.capabilities')}}</span></a></li>
                                <li><a class="submenu" href="{{route('calidades.index')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.quality')}}</span></a></li>                             
                                
                            </ul>   
                        </li>