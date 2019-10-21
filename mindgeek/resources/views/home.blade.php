@extends('layout')

@section('content')
    <div class="container">

        <h1 class="text-center m-3">Mindgeek</h1>
        <div class="row">
            @foreach($items as $key => $item)
                <div class="col-12 col-sm-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title"><?= $item['headline'] ?></h3>
                            <p class="card-text">{!! Str::limit($item['synopsis'], 150, ' ...') !!}</p>
                            <div class="d-flex mb-1"><strong
                                        class="mr-3">Director: </strong> <?= $item['directors'][0]['name'] ?></div>
                            <div class="mb-3"><strong class="mr-3">Casting: </strong>
                                @foreach($item['cast'] as $cast)
                                    <span><?= $cast['name'] ?>,</span>
                                @endforeach
                            </div>
                            <a href="\movie\{{$key}}" class="btn btn-success">See more</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
@endsection