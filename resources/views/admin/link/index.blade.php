@extends('admin.layout')
@section('content')
<div class='row'>
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <div class="col-md-6" style="margin-left:-15px">
                    <h3 class="box-title">链接列表</h3>
                </div>
                <div class="col-md-6 text-right" style="margin-left:15px">
                    <a href="{{ url('admin/link/create') }}" class="btn btn-success btn-md"> <i class="fa fa-plus-circle"></i>
                        新链接
                    </a>
                </div>
                
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('admin.partials.success')
                <table id="tags-table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>名称</th>
                            <th>分类</th>
                            <th>更新时间</th>
                            <th width="100">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if($links->count())
                        @foreach ($links as $link)
                        <tr>
                            <td>{{ $link->name }}</td>
                            <td>{{ $link->cid }}</td>
                            <td>{{ $link->updated_at->format('j-M-y g:ia') }}</td>
                            <td>
                                <a href="{{ url('admin/link') }}/{{ $link->
                                    id }}/edit" class="btn btn-xs btn-info"> <i class="fa fa-edit"></i>
                                    编辑
                                </a>
                                <button onclick="delete_file({{ $link->
                                    id }},'{{ $link->name }}')" class="btn btn-xs btn-danger">
                                    <i class="fa fa-close"></i>
                                    删除
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.col -->

</div>
<!-- /.row -->
<div class="modal fade" id="modal-tag-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">请确认</h4>
            </div>
            <div class="modal-body">
                <p class="lead">
                    <i class="fa fa-question-circle fa-lg"></i>
                    &nbsp;
          确定删除标签
                    <kbd>
                        <span id="delete-tag-name1"></span>
                    </kbd>
                    ?
                </p>
            </div>
            <div class="modal-footer">
                <form method="POST" id="action" action="{{ url('admin/link') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-danger">确定</button>
                </form>
            </div>
        </div>
    </div>
</div>
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
    function delete_file(id, title) {
      $("#delete-tag-name1").html(title);
      $("#delete-tag-name2").val(title);
      $("#action").attr("action","{{ url('admin/link') }}/"+id);
      $("#modal-tag-delete").modal("show");
    }
</script>
@endsection