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
      ENV VARIABLES
      <small>ENV rules them all</small>
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
        <h3 class="box-title">ENV Variables</h3>
        {{-- <a class="col-lg-offset-5 btn btn-success" href="{{ route('englishcrossword.create') }}">Add New</a> --}}

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
            <h3 class="box-title">ENV Variables</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body" id="envdiv">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Sr. No</th>
                <th>ENV Variable</th>
                <th>ENV Value</th>
              </tr>
              </thead>
              <tbody>
              <?  $i = 0; ?>
                @foreach($envs as $env)
                <? $i++; ?>

                <tr>
                  <td>{{ $env->id }}</td>
                  <td>{{ $env->envvariable }}</td>
                  <td class="envtd" data-toggle="modal" data-target="#myModal">{{ $env->envvalue }}<i class="fa fa-edit pull-right "></i>
                    <input type="hidden" id="itemid" value="{{ $env->id }}" ></td>
                </tr>
                @endforeach

                {{-- @foreach ($tags as $tag)

              <tr>
                <!-- <td>{{ $loop->index + 1 }}</td> -->
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
                <th>Sr. No</th>
                <th>ENV Variable</th>
                <th>ENV Value</th>
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



<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Value</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id">
        <p><input type="text" placeholder="Edit Value" id="inputenv" class="form-control"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="saveChanges" data-dismiss="modal" >Save Changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
{{csrf_field()}}

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous">
</script>

<script>

  //var rowCount = $('#example1 >tbody >tr').length; //gives total count of rows
  $(document).ready(function() {
    $(document).on('click', '.envtd', function(event) {
      var id = $(this).find('#itemid').val();
      var value = $(this).text();
      $('#inputenv').val(value);
      $('#id').val(id);
    })

    // $('#example1').find('tr').click( function(){
    //
    //   //Check which table row is clickedx`
    //   //  console.log('You clicked row '+ ($(this).index()+1) );
    //   var tdnumber = $(this).index()+1;
    //   $('#additem').val($('#example1 tr:eq('+tdnumber+') td:eq(2)').text());
    //
    // });
    $(document).on('click', '#saveChanges', function(event) {
      var id = $('#id').val();
      var value = $('#inputenv').val();
      $.post('env/',{'id': id, 'value': value, '_token':$('input[name=_token]').val()}, function(data) {
        //console.log(data);
      $('#envdiv').load(location.href + ' ' + '#envdiv');
      });
    });

  });
</script>





@endsection
