  @extends('admin.layout')
  @section('style')
  <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/plugins/select2/select2.min.css")}}">
  @endsection
  @section('content')
      <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">写文章</h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
                  <div class="form-group">
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="reservation" placeholder='标题：那是我夕阳下的奔跑'>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

                  <!-- Date and time range -->
                  <div class="form-group">
                    <div class="input-group col-md-12">
                      <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                      <option>Alabama</option>
                      <option>Alaska</option>
                      <option>California</option>
                      <option>Delaware</option>
                      <option>Tennessee</option>
                      <option>Texas</option>
                      <option>Washington</option>
                    </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

                  <!-- Date and time range -->
                  <div class="form-group">
                    <label>Date range button:</label>
                    <div class="input-group">
                      <button class="btn btn-default pull-right" id="daterange-btn">
                        <i class="fa fa-calendar"></i> Date range picker
                        <i class="fa fa-caret-down"></i>
                      </button>
                    </div>
                  </div><!-- /.form group -->

                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (right) -->
          </div><!-- /.row -->
  @endsection
  @section('scripts')
  <script src="{{ asset("/bower_components/AdminLTE/plugins/select2/select2.full.min.js")}}"></script>
  <script>
  $(function () {
        $(".select2").select2();
  });
  </script>
  
  @endsection