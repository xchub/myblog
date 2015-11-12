  @extends('admin.layout')

  @section('content')
      <div class='row'>
          <div class="col-md-12">
                <!-- Horizontal Form -->
              <div class="box box-info">
                  <div class="box-header with-border">
                  @if (isset($id))
                    <h3 class="box-title">编辑标签</h3>
                   @else
                   <h3 class="box-title">新标签</h3>
                   @endif
                  </div><!-- /.box-header -->
                  <!-- form start -->
                  @include('admin.partials.errors')
                  @include('admin.partials.success')
                  @if ( isset($id) )
                  <form class="form-horizontal" action="{{ url('admin/tag') }}/{{ $id }}" method="post">
                  @else
                  <form class="form-horizontal" action="{{ url('admin/tag') }}" method="post">
                  @endif
                    <div class="box-body">
                      <div class="form-group">
                        <label for="inputTag" class="col-sm-2 control-label">标签</label>
                        <div class="col-sm-3">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @if ( isset($id) )
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id" value="{{ $id }}">
                        @endif
                          <input type="text" class="form-control"  @if ( isset($id) ) readonly @endif  id="inputTag" name="tag" value="{{ $tag }}" placeholder="标签">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputTitle" class="col-sm-2 control-label">标题</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" id="inputTitle" name="title" value="{{ $title }}" placeholder="标题">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputImage" class="col-sm-2 control-label">图片</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" id="inputImage" name="page_image" value="{{ $page_image }}" placeholder=" 图片">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputMeta" class="col-sm-2 control-label">描述</label>
                        <div class="col-sm-8">
                          <textarea class="form-control" id="inputMeta" name="meta_description" value="{{ $meta_description }}" rows="3">{{ $meta_description }}</textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-7 col-md-offset-2">
                          <button type="submit" class="btn btn-primary btn-md">
                            <i class="fa fa-plus-circle"></i>
                            &nbsp; @if (isset($id))编辑标签
                                  @else 新标签
                                  @endif
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>
              </div><!-- /.box -->
          </div><!--/.col (right) -->

      </div><!-- /.row -->
  @endsection