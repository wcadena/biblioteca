<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        @if (Auth::guest())
        @else
            <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
            
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
            
        </div>
        
        <!-- search form -->
        
        @endif
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        @if (Auth::guest())
        @else
        <ul class="sidebar-menu">
            <li class="header">Biblioteca Virtual</li>
            <li class="active treeview">
                <a href="{{ url('/') }}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{ url('/archivos') }}"><i class="fa fa-circle-o"></i> Archivos</a></li>
                    <!--<li class="active"><a href="{{ url('/trabajador') }}"><i class="fa fa-circle-o"></i> Trabajadores</a></li>-->
                </ul>
               <?php /* <ul class="treeview-menu">
                    <li class="active"><a href="#"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
                </ul> */ ?>
            </li>
            <li class="treeview">
                <a href="{{ url('/fileentry') }}">
                <i class="fa fa-files-o"></i>
                <span>Cargar Archivos</span>
                <!--<span class="label label-primary pull-right">4</span>-->
                </a>                
            </li>
            <li class="treeview">
                <a href="{{ url('/perfil') }}">
                    <i class="fa fa-files-o"></i>
                    <span>Perfiles</span>
                    <!--<span class="label label-primary pull-right">4</span>-->
                </a>
            </li>
            <li class="treeview">
                <a href="{{ url('/usuario') }}">
                    <i class="fa fa-files-o"></i>
                    <span>Usuarios</span>
                    <!--<span class="label label-primary pull-right">4</span>-->
                </a>
            </li>
             <?php /*<li>
                <a href="{{ url('/calendario') }}">
                <i class="fa fa-calendar"></i> <span>Parametrizar Dias</span>
                <!--<small class="label pull-right bg-red">3</small>-->
                </a>
            </li>*/?>
            <li class="treeview">
                <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Reportes</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('reporte/general') }}"><i class="fa fa-circle-o"></i> Reporte General</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Reporte 1</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Reporte 2</a></li>
                </ul>
            </li>
            <?php /*
            <li>
                <a href="pages/widgets.html">
                <i class="fa fa-th"></i> <span>Widgets</span> <small class="label pull-right bg-green">new</small>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                <i class="fa fa-laptop"></i>
                <span>UI Elements</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
                    <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
                    <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
                    <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
                    <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
                    <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                <i class="fa fa-edit"></i> <span>Forms</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
                    <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                    <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                <i class="fa fa-table"></i> <span>Tables</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                    <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
                </ul>
            </li>           
            <li>
                <a href="pages/mailbox/mailbox.html">
                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                <small class="label pull-right bg-yellow">12</small>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                <i class="fa fa-folder"></i> <span>Examples</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                    <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                    <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                    <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                    <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                    <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                    <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                <i class="fa fa-share"></i> <span>Multilevel</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                            <li>
                                <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                </ul>
            </li>
            */ ?>
            <li><a href="#"><i class="fa fa-book"></i> Documentación</a></li>
            <?php /*
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-danger"></i> Important</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-warning"></i> Warning</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-info"></i> Information</a></li>
			*/?>
        </ul>
        @endif
		<a href="Untitled.wmv" download>Download Untitled.wmv</a>
		<a href="Untitled.mp4" download>Download Untitled.mp4</a>
    </section>
    <!-- /.sidebar -->
</aside>