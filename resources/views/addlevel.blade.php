@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add Levels : <b>English Crossword</b></div>

                <div class="card-body">
                  @foreach ($data as $dat)
                    <p>
                        {{$dat -> mode}}
                    </p>
                  @endforeach

                    Show health of the all the games here. <br>
                    Gamewise total packs and total levels in each pack etc.

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
