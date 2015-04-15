 <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li>
            <a href="{{ route('cp.dashboard') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>              
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-users"></i> Students <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo" class="collapse">
                <li>
                    <a href="{{ route('cp.students.index') }}">Index</a>
                </li>
                <li>
                    <a href="{{ route('cp.students.create') }}">Add New</a>
                </li>
                <li>
                    <a href="#">Recap</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="fa fa-fw fa-bar-chart-o"></i> Statistics</a>
        </li>
        <li>
            <a href="#"><i class="fa fa-fw fa-file"></i> Blank Page</a>
        </li>
    </ul>
</div>
<!-- /.navbar-collapse -->