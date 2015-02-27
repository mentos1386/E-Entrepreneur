@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="jumbotron">
                    <h2>You are trying to access protected page!</h2>
                    <br>

                    {!! Form::open(['url' => route('page.password.check', $page_id)]) !!}

                    <div class="form-group">
                        {!! Form::label('password', 'Password:') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Submit', array('class' => 'btn btn-lg btn-danger')) !!}
                    </div>

                    {!! Form::close() !!}
                </div>


            </div>
        </div>
    </div>
@endsection
