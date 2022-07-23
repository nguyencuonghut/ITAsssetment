@section('title')
{{ 'Kiểm kê tài sản' }}
@endsection

@push('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@extends('layouts.base')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tất cả tài sản</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form class="form-horizontal" method="post" action="{{ url('admin/audits/doAudit') }}" name="do_audit" id="do_audit" novalidate="novalidate">{{ csrf_field() }}
                            @method('PATCH')
                            <div class="card-body">
                                <table id="audits-table" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tag</th>
                                        <th>Thể loại</th>
                                        <th>Model</th>
                                        <th>Vị trí</th>
                                        <th>Nhân viên</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                    </thead>
                                </table>
                                <br>
                                <div class="control-group">
                                    <div class="controls">
                                        <input type="submit" value="Kiểm kê" class="btn btn-success">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>


<style type="text/css">
    .dataTables_wrapper .dt-buttons {
    margin-bottom: -3em
  }
</style>


<script>
    $(function () {
      $("#audits-table").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        ajax: ' {!! route('admin.audits.data') !!}',
        columns: [
            {data: 'check', name: 'check'},
            {data: 'tag', name: 'tag'},
            {data: 'category', name: 'category'},
            {data: 'model', name: 'model'},
            {data: 'area', name: 'area'},
            {data: 'employee', name: 'employee'},
            {data: 'status', name: 'status'},
       ]
      }).buttons().container().appendTo('#audits-table_wrapper .col-md-6:eq(0)');
    });
</script>
@endpush
