@extends('app')

@section('content')

<div class="container">

    <h3>Create Client</h3>

    @include('errors._check')

    {!! Form::open(['route'=>'admin.clients.store']) !!}

    @include('admin.clients._form')

    <div class="form-group">
        {!! Form::submit('Create client',['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

</div>

@endsection
