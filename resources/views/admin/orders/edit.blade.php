@extends('app')

@section('content')

<div class="container">

    {!! Form::model($order,['route'=>['admin.orders.update', $order->id]]) !!}

    <h2>Pedido #{{ $order->id  }} - R$ {{ $order->total  }}</h2>
    <h3>Cliente: {{$order->client->user->name}}</h3>
    <h4>Data: {{$order->created_at}}</h4>

    <p>
        <b>Entregar em:</b>
        {{$order->client->address}} - {{$order->client->city}} - {{$order->client->state}}
    </p>
    <br/>
    @include('errors._check')

    <div class="form-group">
        {!! Form::label('Status','Status:') !!}
        {!! Form::select('status', $list_status, null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Entregador','Entregador:') !!}
        {!! Form::select('user_deliveryman_id', $deliveryman, null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Alterar pedido',['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

</div>

@endsection
