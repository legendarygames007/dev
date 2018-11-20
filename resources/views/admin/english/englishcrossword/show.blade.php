@extends('admin.layouts.app')
@section('headsection')
  <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('footersection')
<script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script>
$(function () {
  $('#example1').DataTable()
})
</script>

@endsection


@section('main-content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      English Crossword
      <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Examples</a></li>
      <li class="active">Blank page</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">English Crossword</h3>
        <a class="col-lg-offset-5 btn btn-success" href="{{ route('englishcrossword.create') }}">Add New</a>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">


        <div class="box">
          <div class="box-header">
            <h3 class="box-title">English Crossword Data</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Sr. Id</th>
                <th>Mode</th>
                <th>Diff. Level</th>
                <th>Pack #</th>
                <th>Level #</th>
                <th>Level Data</th>
                <th>Pack Cost</th>
                <th>DB Update Ver.</th>

              </tr>
              </thead>
              <tbody>

              @foreach ($englishcrosswords as $englishcrossword)
              <tr>
                <td>{{ $englishcrossword->id }}</td>
                <td>{{ $englishcrossword->mode }}</td>
                <td>{{ $englishcrossword->difficultylevel }}</td>
                <td>{{ $englishcrossword->packno }}</td>
                <td>{{ $englishcrossword->levelno }}</td>
                <td>{{ $englishcrossword->leveldata }}</td>
                <td>{{ $englishcrossword->packcost }}</td>
                <td>{{ $englishcrossword->dbupdateversion }}</td>
              </tr>
              @endforeach

              {{-- @foreach ($tags as $tag)

              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $tag->name }}</td>
                <td>{{ $tag->slug }}</td>
                <td><a href="{{ route('tag.edit',$tag->id) }}"><span class="glyphicon glyphicon-edit"></span></a></td>
                <td>
                  <form id="delete-form-{{ $tag->id }}" action ="{{ route('tag.destroy', $tag->id) }}" method="post" style="display: none">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                  </form>
                  <a href="" onclick="
                  if(confirm('Are you sure, you want to delete this?'))
                  {
                    event.preventDefault();
                    document.getElementById('delete-form-{{ $tag->id }}').submit();
                  }
                  else{
                    event.preventDefault();
                  }"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
              </tr>

              @endforeach --}}
              </tbody>
              <tfoot>
              <tr>
                <th>Sr. Id</th>
                <th>Mode</th>
                <th>Diff. Level</th>
                <th>Pack #</th>
                <th>Level #</th>
                <th>Level Data</th>
                <th>Pack Cost</th>
                <th>DB Update Ver.</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>




      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        Footer
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>

@endsection
