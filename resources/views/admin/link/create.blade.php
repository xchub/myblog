@extends('admin.layout')

      @section('content')
<div class='row'>
    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                @if (isset($id))
                <h3 class="box-title">编辑链接</h3>
                @else
                <h3 class="box-title">新链接</h3>
                @endif
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @include('admin.partials.errors')
            @include('admin.partials.success')
                @if ( isset($id) )
                <form class="form-horizontal" action="{{ url('admin/link') }}/{{ $id }}" method="post">
                @else
                <form class="form-horizontal" action="{{ url('admin/link') }}" method="post">
                    @endif
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputTag" class="col-sm-2 control-label">链接</label>
                            <div class="col-sm-3">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                @if ( isset($id) )
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="id" value="{{ $id }}">
                                @endif
                                <input type="text" class="form-control"   id="inputTag" name="name" value="{{ $name }}" placeholder="链接名称"></div>
                        </div>
                        <div class="form-group">
                            <label for="inputHref" class="col-sm-2 control-label">链接地址</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="inputHref" name="href" value="{{ $href }}" placeholder="链接地址"></div>
                        </div>
                        <div class="form-group">
                            <label for="inputCategory" class="col-sm-2 control-label">选择分类</label>
                            <div class="col-sm-3">
                            <select name="" id="" class='form-control'>
                                @foreach ($linkCategory as $key=>$category )
                                    <option value="{{ $key }}" @if($cid == $key) selected @endif >{{ $category }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-2">
                                <button type="submit" class="btn btn-primary btn-md"> <i class="fa fa-plus-circle"></i>
                                    &nbsp; @if (isset($id))编辑链接
                                      @else 新链接
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