<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset("/bower_components/AdminLTE/dist/img/") }}/{{config('blog.avatar')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ config('blog.author') }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
  
        <!-- Optionally, you can add icons to the links -->
        
        @foreach (config('categories') as $categories)

        <li @if (Request::is($categories['url'])) class="active" @endif>
          <a href="{{ url($categories['url']) }}">
            <i class="{{$categories['class']}}"></i> <span>{{$categories['name']}}</span>
          </a>
        </li>
        @endforeach
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
