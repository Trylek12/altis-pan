@extends('app')

@section('content')
    <aside class="fh5co-page-heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="fh5co-page-heading-lead">
                        Streams
                        <span class="fh5co-border"></span>
                    </h1>
                </div>
            </div>
        </div>
    </aside>

    <div class="container stream">
        @if (Auth::guest())
        @else
            @if (Auth::user()->admin == 1)
                <p class="text-right">
                    <a href="{{ action('StreamsController@create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Ajouter un stream </a>
                </p>
            @endif
        @endif
            <div class="container">
                <div class="row">
                    @foreach($streams as $stream)
                        <div class="col-md-12">
                            <div class="col-md-8">
                                <h4 class="text-uppercase"><a href="{{ url("/stream/$stream->slug ")}}">{{ $stream->name }}</a></h4>
                            </div>
                            <div class="col-md-4 text-right">
                                @if (Auth::guest())
                                @else
                                    @if (Auth::user()->admin == 1)
                                    <a href="{{ action('StreamsController@edit', $stream) }}" class="btn btn-primary"><i class="fa fa-pencil"></i> Editer</a>
                                    <a href="{{ action('StreamsController@destroy', $stream) }}" data-method="delete" data-confirm="Voulez vous vraiment suprimer cette enregistrement ?" class="btn btn-danger"><i class="fa fa-trash"></i> Suprimmer</a>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="embed-responsive embed-responsive-4by3">
                                    <iframe src="http://player.twitch.tv/?channel={{ $stream->name }}" frameborder="0"  scrolling="no" class="embed-responsive-item" height="150px"></iframe>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="stream__content">{!!  $stream->content !!}</p>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
    </div>
@endsection