@extends('layout')

@section('content')
    <div class="container">

        <h1 class="text-center m-3">Mindgeek</h1>
        <div class="row">
            @foreach($items as $item)
                <div class="col-12 col-sm-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h3 class="card-title">{{ $item->headline  ?? ''}}</h3>
                                    <p class="card-text">{{ Str::limit($item->synopsis, 150, ' ...')  ?? ''}}</p>
                                    <div class="d-flex mb-1">
                                        <strong class="mr-3">Director: </strong>
                                        @foreach($item->directors as $directorItem)
                                            <span>{{ $directorItem->director_name }},</span>
                                        @endforeach
                                    </div>
                                    <div class="mb-3"><strong class="mr-3">Casting: </strong>
                                        @foreach($item->cast as $castItem)
                                            <span>{{ $castItem->cast_name }},</span>
                                        @endforeach
                                    </div>
                                    <a href="\movie\{{$item->id}}" class="btn btn-primary">See more</a>
                                </div>
                                <div class="col-4">
                                    @foreach($item->keyArtImage as $keyImage)
                                        <div>
                                            <img class="img-fluid img-thumbnail"
                                                 src="{{ App\Libraries\ImageStore::getImageFromUrl($keyImage->url) }}" alt="">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-12 d-flex justify-content-center">
                {{ $items->links() }}
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $("img").on("error", function () {
                $(this).closest("div").hide();
            });
        </script>
    @endpush

@endsection
