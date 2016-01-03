@extends('app')

@section('content')
    <aside class="fh5co-page-heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="fh5co-page-heading-lead">
                        Mon Compte
                        <span class="fh5co-border"></span>
                    </h1>
                </div>
            </div>
        </div>
    </aside>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">

                        @include('flash')

                        {!! Form::model($user, ['class' => 'form-horizontal', 'files' => true]) !!}
                        <div class="col-md-4">
                            <div class="col-md-12">
                                @if($user->avatar)
                                    <img class="img-responsive img-circle" src="{{ url($user->avatar) }}"><br/>
                                @endif
                            </div>
                            {!! Form::file('avatar', ['class' => '']) !!}
                        </div>
                        <div class="col-md-8">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Identifiant</label>
                                    <div class="col-md-8">
                                        {!! Form::text('name', null, ['class' => 'form-control input-lg']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Prénom</label>
                                    <div class="col-md-8">
                                        {!! Form::text('firstname', null, ['class' => 'form-control input-lg']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Nom</label>
                                    <div class="col-md-8">
                                        {!! Form::text('lastname', null, ['class' => 'form-control input-lg']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Adresse Email</label>
                                    <div class="col-md-8">
                                        {!! Form::email('email', null, ['class' => 'form-control input-lg', 'disabled']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">ID Arma 3</label>
                                    <div class="col-md-8">
                                        @if($user->arma)
                                            {!! Form::text('arma', null, ['class' => 'form-control', 'maxlength' => '17', 'value' => "$user->arma"]) !!}
                                        @else
                                            {!! Form::text('arma', null, ['class' => 'form-control', 'maxlength' => '17']) !!}
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary " value="Modifier">
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection