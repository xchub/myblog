@extends('admin.layout')

      @section('content')
<div class='row'>
    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                @if (isset($id))
                <h3 class="box-title">编辑分类</h3>
                @else
                <h3 class="box-title">新分类</h3>
                @endif
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @include('admin.partials.errors')
            @include('admin.partials.success')
                @if ( isset($id) )
                <form class="form-horizontal" action="{{ url('admin/category') }}/{{ $id }}" method="post">
                @else
                <form class="form-horizontal" action="{{ url('admin/category') }}" method="post">
                    @endif
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputTag" class="col-sm-2 control-label">分类</label>
                            <div class="col-sm-3">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                @if ( isset($id) )
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="id" value="{{ $id }}">
                                @endif
                                <input type="text" class="form-control"   id="inputTag" name="name" value="{{ $name }}" placeholder="分类名称"></div>
                        </div>
                        <div class="form-group">
                            <label for="inputTitle" class="col-sm-2 control-label">副标题</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="inputTitle" name="slug" value="{{ $slug }}" placeholder="标题"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-2">
                                <button type="submit" class="btn btn-primary btn-md"> <i class="fa fa-plus-circle"></i>
                                    &nbsp; @if (isset($id))编辑分类
                                      @else 新分类
                                      @endif
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row -->
    @endsection