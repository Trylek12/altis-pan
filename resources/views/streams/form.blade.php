<div class="container">
    <div class="col-md-12">
        <div class="col-md-push-3 col-md-9">
            @include('flash')
        </div>
    </div>
</div>

{!! Form::model($streams, ['class' =>'form-horizontal', 'url' => action("StreamsController@$action", $streams), 'method' => $action == 'store' ? 'Post' : 'Put']) !!}

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4 control-label">Nom du streamer</label>

                <div class="col-md-6">
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Slug</label>

                <div class="col-md-6">
                    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Description</label>

                <div class="col-md-6">
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
            </div>


            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Sauvegarder
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


{!! Form::close() !!}