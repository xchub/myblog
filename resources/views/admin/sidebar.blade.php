<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("/bower_components/AdminLTE/dist/img/") }}/{{config('blog.avatar')}}" class="img-circle" alt="User Image"></div>
            <div class="pull-left info">
                <p>{{ config('blog.author') }}</p>
                <!-- Status -->
                <a href="#"> <i class="fa fa-circle text-success"></i>
                    Online
                </a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"> <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
        @foreach(config('categories') as $menu)
            <li @if ((Request::is('admin/'.$menu['uri'])) || (Request::is('admin/'.$menu['uri'].'/*'))) class="treeview active" @endif class="treeview">
                <a href="@if(empty($menu['submenus'])){{ admin_url($menu['uri']) }}@endif">
                    <i class="{{ $menu['icon'] }}"></i>
                    <span>{{ $menu['label'] }}</span>
                    @if(!empty($menu['submenus']))
                    <i class="fa fa-angle-left pull-right"></i>
                    @endif
                </a>
                @if(!empty($menu['submenus']))
                <ul class="treeview-menu">
                @foreach($menu['submenus'] as $submenu)
                <li @if (Request::is('admin/'.$submenu['uri'])) class="active" @endif><a href="{{ admin_url($submenu['uri']) }}"><i class="fa fa-circle-o"></i>{{ $submenu['label'] }}</a></li>
                @endforeach
                </ul>
                @endif
            </li>
        @endforeach
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<script>
</script>