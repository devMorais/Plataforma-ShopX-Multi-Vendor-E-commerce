@extends('frontend.dashboard.dashboard-app')

@section('dashboard_contents')

<div class="tab-pane fade active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
    <div class="card">
        <div class="card-header p-0">
            <h3 class="mb-0">Seus pedidos</h3>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="order_table table m-0 mt-20">
                    <thead>
                        <tr>
                            <th>Pedido</th>
                            <th>Loja</th>
                            <th>Data</th>
                            <th>Status do pagamento</th>
                            <th>Status do pedido</th>
                            <th>Total</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>{{ $order->store->name }}</td>
                            <td>{{ date('Y-m-d', strtotime($order->created_at)) }}</td>
                            <td>
                                @if($order->payment_status == 'paid')
                                    <span class="badge bg-success">Pago</span>
                                @elseif($order->payment_status == 'pending')
                                    <span class="badge bg-warning">Pendente</span>
                                @else
                                    <span class="badge bg-danger">Failed</span>
                                @endif
                            </td>
                            <td>
                                {{ $order->order_status }}
                            </td>
                            <td> {{ $order->currency }} {{ $order->total }}</td>
                            <td><a href="{{ route('orders.show', $order) }}" class="btn-small d-block">Ver</a></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
