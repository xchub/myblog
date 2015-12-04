@extends('admin.layout')
@section('style')
<link href="{{ asset("/assets/selectize/css/selectize.css")}}" rel="stylesheet">
<link href="{{ asset("/assets/selectize/css/selectize.bootstrap3.css")}}" rel="stylesheet">
<link rel="stylesheet" href="http://cdn.bootcss.com/codemirror/4.10.0/codemirror.min.css">
<link rel="stylesheet" href="http://cdn.bootcss.com/highlight.js/8.4/styles/default.min.css">
<link href="//cdn.bootcss.com/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css" rel="stylesheet">
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
                <h3 class="box-title">编辑文章</h3>
            </div>
            <div class="box-body">
                @include('admin.partials.errors')
                @include('admin.partials.success')
                <form action="{{ url('admin/post') }}/{{ $id }}" method="post">
                    <div class="form-group">
                        <label></label>
                        <div class="col-md-12">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $id }}">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="text" name="title" class="form-control" style="border-radius:4px" id="reservation" placeholder='标题：那是我夕阳下的奔跑' value="{{ $title }}">
                        </div>
                    </div><br />
                    <div class="form-group">
                        <label></label>
                        <div class="col-md-12">
                            <input type="text" name="first_imgurl" class="form-control" style="border-radius:4px" id="reservation" placeholder='文章头图（500*300）' value="{{ $first_imgurl }}">
                        </div>
                    </div><br />
                    <div class="form-group">
                        <div class="col-md-12">
                            <select name="cid" id="categories" placeholder="" class="form-control" >
                                @foreach ($allCategories as $category)
                                    <option @if ($cid == $category->id) selected @endif
                                    value="{{ $category->id }}">
                                      {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div><br /><br />
                    <div class="form-group">
                        <div class="col-md-12">
                            <select name="tags[]" id="tags" placeholder="标签：Laravel" class="form-control" multiple>
                                @foreach ($allTags as $tag)
                                    <option @if (in_array($tag, $tags)) selected @endif
                                    value="{{ $tag }}">
                                      {{ $tag }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div><br /><br />
                    <!-- /.form group -->
                    <div class="form-group">
                        <label></label>
                        <div class="col-md-12">
                            <div class="editor">
                                <textarea name="content" id="myEditor">{{ $content }}</textarea>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' name="publish_date" value="{{ $publish_date }}" class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        </div>
                        <div class="col-md-4">
                            <div class="checkbox">
                              <label>
                                <input {{ checked($is_draft) }} type="checkbox" name="is_draft">
                                保存为草稿？
                              </label>
                            </div>
                        </div>
                    </div>
                    <!-- /.form group -->
                    <div class="form-group">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary btn-lg btn-flat">编辑文章</button>
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
<script src="//cdn.bootcss.com/moment.js/2.10.6/moment.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script>
$(function(){
    $("#tags").selectize({
        create: true
      });
    $('#datetimepicker1').datetimepicker({
        format: 'MMMM-DD-YYYY hh:mm:ss'
    });
    
})
</script>
@endsection