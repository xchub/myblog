@extends('admin.layout')
@section('content')
<div class='row'>
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <div class="col-md-6" style="margin-left:-15px">
                    <h3 class="box-title pull-left">附件管理</h3>
                    <div class="pull-left">
                        <ul class="breadcrumb" style="padding: 3px 10px;margin-bottom: 0;">
                            @foreach ($breadcrumbs as $path => $disp)
                            <li>
                                <a href="{{ url('admin/upload') }}?folder={{ $path }}">{{ $disp }}</a>
                            </li>
                            @endforeach
                            <li class="active">{{ $folderName }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 text-right" style="margin-left:15px">
                    <button class="btn btn-success btn-md" data-toggle="modal" data-target="#modal-folder-create"> <i class="fa fa-plus-circle"></i>
                        New Folder
                    </button>
                    <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modal-file-upload"> <i class="fa fa-upload"></i>
                        Upload
                    </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('admin.partials.errors')
                @include('admin.partials.success')
                <table id="tags-table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>名称</th>
                            <th>类型</th>
                            <th>时间</th>
                            <th>大小</th>
                            <th data-sortable="false">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- The Subfolders --}}
                          @foreach ($subfolders as $path => $name)
                        <tr>
                            <td>
                                <a href="{{ url('admin/upload') }}?folder={{ $path }}">
                                    <i class="fa fa-folder fa-lg fa-fw"></i>
                                    {{ $name }}
                                </a>
                            </td>
                            <td>Folder</td>
                            <td>-</td>
                            <td>-</td>
                            <td>
                                <button type="button" class="btn btn-xs btn-danger"
                                        onclick="delete_folder('{{ $name }}')">
                                    <i class="fa fa-times-circle fa-lg"></i>
                                    Delete
                                </button>
                            </td>
                        </tr>
                        @endforeach

                          {{-- The Files --}}
                          @foreach ($files as $file)
                        <tr>
                            <td>
                                <a href="{{ $file['webPath'] }}">
                                    @if (is_image($file['mimeType']))
                                    <i class="fa fa-file-image-o fa-lg fa-fw"></i>
                                    @else
                                    <i class="fa fa-file-o fa-lg fa-fw"></i>
                                    @endif
                                  {{ $file['name'] }}
                                </a>
                            </td>
                            <td>{{ $file['mimeType'] or 'Unknown' }}</td>
                            <td>{{ $file['modified']->format('j-M-y g:ia') }}</td>
                            <td>{{ human_filesize($file['size']) }}</td>
                            <td>
                                <button type="button" class="btn btn-xs btn-danger"
                                        onclick="delete_file('{{ $file['name'] }}')">
                                    <i class="fa fa-times-circle fa-lg"></i>
                                    Delete
                                </button>
                                @if (is_image($file['mimeType']))
                                <button type="button" class="btn btn-xs btn-success"
                                          onclick="preview_image('{{ $file['webPath'] }}')">
                                    <i class="fa fa-eye fa-lg"></i>
                                    Preview
                                </button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body --> </div>
        <!-- /.box --> </div>
    <!-- /.col -->

</div>
<!-- /.row -->
@include('admin.upload._modals')
@endsection
@section('scripts')
<script>
    $(function() {
        $("#tags-table").DataTable({
            language: {
                "sProcessing": "处理中...",
                "sLengthMenu": "显示 _MENU_ 项结果",
                "sZeroRecords": "没有匹配结果",
                "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
                "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
                "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
                "sInfoPostFix": "",
                "sSearch": "搜索:",
                "sUrl": "",
                "sEmptyTable": "表中数据为空",
                "sLoadingRecords": "载入中...",
                "sInfoThousands": ",",
                "oPaginate": {
                    "sFirst": "首页",
                    "sPrevious": "上页",
                    "sNext": "下页",
                    "sLast": "末页"
                },
                "oAria": {
                    "sSortAscending": ": 以升序排列此列",
                    "sSortDescending": ": 以降序排列此列"
                }
            }
        });
    });
    // Confirm file delete
    function delete_file(name) {
      $("#delete-file-name1").html(name);
      $("#delete-file-name2").val(name);
      $("#modal-file-delete").modal("show");
    }

    // Confirm folder delete
    function delete_folder(name) {
      $("#delete-folder-name1").html(name);
      $("#delete-folder-name2").val(name);
      $("#modal-folder-delete").modal("show");
    }

    // Preview image
    function preview_image(path) {
      $("#preview-image").attr("src", path);
      $("#modal-image-view").modal("show");
    }
</script>
@endsection