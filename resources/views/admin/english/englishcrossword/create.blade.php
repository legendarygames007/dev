@extends('admin.layouts.app')

@section('main-content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      English Crossword
      <small>Add data logic sits here</small>
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
        <h3 class="box-title">Create a pack first</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>

    <div class="box-body" id="packDiv" disabled="true">

  @if (count($errors) > 0)
    @foreach ($errors->all() as $error)
      <p class="alert alert-danger">{{ $error }}</p>
    @endforeach
  @endif

    <form role="form" action="{{ route('englishcrossword.store') }}" method="post">
      {{ csrf_field() }}

        <div class="form-group col-lg-2" >
          <label>Mode</label>
          <select class="form-control" name="mode">
            <option disabled selected value> -- select an option -- </option>
            <option>Classic</option>
            <option>Theme</option>
            <option>Paid</option>
          </select>
        </div>

        <div class="form-group col-lg-2" >
          <label>Difficulty</label>
          <select class="form-control" name="difficultylevel">
            <option disabled selected value> -- select an option -- </option>
            <option>General</option>
            <option>Easy</option>
            <option>Medium</option>
            <option>Hard</option>
          </select>
        </div>

        <div class="form-group col-lg-4">
          <label>Pack Cost (Coin or rs doesn't matter)</label>
          <input type="text" class="form-control" id="packcost" name="packcost" placeholder="How much coins/rs for this pack?">
        </div>

        <input name="levelcount" id="levelcount" type="hidden" value="5">

        <div class="form-group col-mg-2">
          <br>
          <button type="button" class="btn btn-primary" id="createPack" >Create Pack</button>
        </div>

      </div>
    </div>
    <div class="box" id ="testDiv">

      {{-- <table id="example1" class="table table-bordered table-striped">
        <tr>
          <td>hi</td>
          <td>hi</td>
        </tr>
        <tr>
          <td>hi</td>
          <td>hi</td>
        </tr>
      </table> --}}

    </div>

    <div class="box" id="levelDiv" >

      <div class="box-header with-border">
        <h3 class="box-title col-lg-offset-2">Add levels to <b>Pack 5</b></h3>
      </div>
      <div class="box-body">
        <div class="col-lg-12">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Pack #</th>
              <th>Level #</th>
              <th>Data</th>
            </tr>
            </thead>
            <tbody>

              <tr>
                <td>1</td>
                <td>1</td>
                <td><textarea class="form-control" rows="3" name="leveldata_1" placeholder="Enter ..."></textarea></td>
              </tr>
              <tr>
                <td>1</td>
                <td>2</td>
                <td><textarea class="form-control" rows="3" name="leveldata_2" placeholder="Enter ..."></textarea></td>
                </tr>
              <tr>
                <td>1</td>
                <td>3</td>
                <td><textarea class="form-control" rows="3" name="leveldata_3" placeholder="Enter ..."></textarea></td>
              </tr>
            </tbody>
            <tfoot>
            <tr>
              <th>Pack #</th>
              <th>Level #</th>
              <th>Data</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <input name="packno" type="hidden" value="5">


        <div class="col-lg-12" class="form-group">

          <button type="submit" class="btn btn-primary" style="float: right">Submit</button>

        </div>
      </div>


      </form>




      <!-- /.box-body -->
      <div class="box-footer">
        Footer
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>

</div>
<script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
  $('#createPack').click(function(event) {
//    $('#levelDiv').show('fast');
    $('#packDiv').addClass("disabledbutton");

    // $('#testDiv').append('<table><tr><td>hi</td><td>bye</td></tr><tr><td>hi again</td><td>bye again</td></tr></table>');
      console.log($('#packcost').val());
      console.log($('#example1 tr').length);
    // $('#example1').append(rows[]);

    $(function () {
    newRow = "" +
        "E333" +
        "Fujita" +
        "Makoto" +
    "";
    $('#example1 > tbody > tr:last').after(newRow);
});


  });
});



</script>
@section('headsection')
  <style>
  .disabledbutton {
      pointer-events: none;
      opacity: 0.4;
  }
  </style>
@endsection

@endsection
