@extends('admin.layout')
@section('content')
    <div class='row'>
        <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <div class="col-md-6" style="margin-left:-15px">
                    <h3 class="box-title">标签列表</h3>
                  </div>
                  <div class="col-md-6 text-right" style="margin-left:15px">
                    <a href="{{ url('admin/tag/create') }}" class="btn btn-success btn-md">
                      <i class="fa fa-plus-circle"></i> New Post
                    </a>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="tags-table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>标签</th>
                        <th>名称</th>
                        <th>标签简介</th>
                        <th>图片</th>
                        <th width="80">操作</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($tags as $tag)
                      <tr>
                        <td>{{ $tag->tag }}</td>
                        <td>{{ $tag->title }}</td>
                        <td>{{ $tag->page_image }}</td>
                        <td>{{ $tag->meta_description }}</td>
                        <td>
                        	<a href="{{ url('admin/tag') }}/{{ $tag->id }}/edit" class="btn btn-xs btn-info">
                  				<i class="fa fa-edit"></i> 编辑
                			   </a>
                    			<a href="{{ url('admin/tag') }}/{{ $tag->id }}/delete" class="btn btn-xs btn-danger">
                      				<i class="fa fa-close"></i> 删除	
                    			</a>
                		    </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->

    </div><!-- /.row -->
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
</script>
@endsection