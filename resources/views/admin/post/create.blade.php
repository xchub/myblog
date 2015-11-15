@extends('admin.layout')
@section('style')
<link href="{{ asset("/assets/selectize/css/selectize.css")}}" rel="stylesheet">
<link href="{{ asset("/assets/selectize/css/selectize.bootstrap3.css")}}" rel="stylesheet">
<link rel="stylesheet" href="http://cdn.bootcss.com/codemirror/4.10.0/codemirror.min.css">
<link rel="stylesheet" href="http://cdn.bootcss.com/highlight.js/8.4/styles/default.min.css">
<link href="//cdn.bootcss.com/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
<script src="http://cdn.bootcss.com/highlight.js/8.4/highlight.min.js"></script>
<script src="http://cdn.bootcss.com/marked/0.3.2/marked.min.js"></script>
<script type="text/javascript" src="http://cdn.bootcss.com/codemirror/4.10.0/codemirror.min.js"></script>
<script type="text/javascript" src="http://cdn.bootcss.com/zeroclipboard/2.2.0/ZeroClipboard.min.js"></script>
<link rel="stylesheet" href="{{ asset('plugin/editor/css/pygment_trac.css') }}">
<link rel="stylesheet" href="{{ asset('plugin/editor/css/editor.css') }}">
<script type="text/javascript" src="{{ asset('plugin/editor/js/highlight.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugin/editor/js/modal.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugin/editor/js/MIDI.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugin/editor/js/fileupload.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugin/editor/js/bacheditor.js') }}"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(function() {
    url = "{{ url(config('editor.uploadUrl')) }}";
    var myEditor = new Editor(url);
    myEditor.render('#myEditor');
});
</script>

<style>
.editor{
    width:{{ config('editor.width') }};
}
</style>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">写文章</h3>
            </div>
            <div class="box-body">
                @include('admin.partials.errors')
                @include('admin.partials.success')
                <form action="{{ url('admin/post') }}" method="post">
                    <div class="form-group">
                        <label></label>
                        <div class="col-md-12">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="text" name="title" class="form-control" style="border-radius:4px" id="reservation" placeholder='标题：那是我夕阳下的奔跑'>
                        </div>
                    </div><br />

                    <div class="form-group">
                        <div class="col-md-12">
                            <select name="tags[]" id="tags" placeholder="标签：Laravel" class="form-control" multiple>
                                <option value="1">Python</option>
                                <option value="2">Laravel</option>
                                <option value="3">Mysql</option>
                            </select>
                        </div>
                    </div><br /><br />
                    <!-- /.form group -->
                    <div class="form-group">
                        <label></label>
                        <div class="col-md-12">
                            <div class="editor">
                                <textarea name="post" id="myEditor"></textarea>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <input type="text" name='public' class="form-control timepicker" placeholder="发布日期">
                        </div>
                        <div class="col-md-4">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="is_draft">
                                保存为草稿？
                              </label>
                            </div>
                        </div>
                    </div>
                    <!-- /.form group -->
                    <div class="form-group">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary btn-lg btn-flat">发布文章</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.col (right) -->
</div>
<!-- /.row -->
@endsection
@section('scripts')
<script src="{{ asset("/assets/selectize/selectize.min.js")}}"></script>

<script src="//cdn.bootcss.com/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap-datepicker/1.5.0/locales/bootstrap-datepicker.zh-CN.min.js"></script>
<script>
$(function(){
    $("#tags").selectize({
        create: true
      });
    $(".timepicker").datepicker({
        format: 'yyyy-mm-dd'
    });
    
})
</script>
@endsection