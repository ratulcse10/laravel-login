@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('includes.alert')
            <section class="panel">
                <header class="panel-heading">
                    {{ $title }}
                    <span class="pull-right">

                            <a class="btn btn-success btn-sm" href="{{ URL::route('rep.index') }}"><span class="fa fa-chevron-left"></span> Reps</a>

					</span>
                </header>
                <div class="panel-body">
                    {{ Form::open(array('route' => 'rep.create', 'class' => 'form-horizontal')) }}




                    <div class="form-group">
                        {{ Form::label('name', 'Name*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Name')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('email', 'Email*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Email')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('password', 'Password*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('address', 'Address', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('address', null, array('class' => 'form-control', 'placeholder' => 'Address')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('phone', 'Phone Number', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('phone', '', array('class' => 'form-control', 'placeholder' => 'Phone Number')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('city', 'City', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('city', null, array('class' => 'form-control', 'placeholder' => 'City')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('state', 'State', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('state', null, array('class' => 'form-control', 'placeholder' => 'State')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('zip', 'Zip', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('zip', null, array('class' => 'form-control', 'placeholder' => 'Zip')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            {{ Form::submit('Create Rep', array('class' => 'btn btn-primary')) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </section>
        </div>
    </div>
@stop