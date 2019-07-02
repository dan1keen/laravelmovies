@extends('layouts.app')
@section('content')
    <div class="container" >

        <div class="row mt-4">

                @foreach($movie as $single)

                <div class="card card-custom mx-3 mb-4">
                    <a href="/movie/{{$single->getId()}}">
                    <img src="https://image.tmdb.org/t/p/w185_and_h278_bestv2{{$single->getPosterPath()}}"
                         style="width: 185px; height: 278px;" class="card-img">
                    <br>
                    <center>{{ str_limit($single->getTitle(), $limit = 15, $end = '...') }}</center>
                    </a>
                </div>

                @endforeach

        </div>
    </div>
    <div class="row">

@endsection
