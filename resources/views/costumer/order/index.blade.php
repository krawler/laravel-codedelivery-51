@extends('app')

@section('content')

    <div class="container">

        @if(isset($orders))

            <h3>Meus Pedidos</h3>

            <table class="table table-bordered">
                <thread>
                    <th>ID</th>
                    <th>Total</th>
                    <th>Status</th>
                </thread>
                <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->total}}</td>
                    <td>{{$order->status}}</td>
                    <td></td>
                </tr>
                @endforeach
                </tbody>
            </table>

            {!! $orders->render() !!}
        @endif

    </div>

@endsection

