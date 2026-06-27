@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Todos os pedidos</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>ID do pedido</th>
                                <th>Usuário</th>
                                <th>ID da transação</th>
                                <th>Valor</th>
                                <th>Status do pagamento</th>
                                <th>Status</th>
                                <th>Criado em</th>
                                <th>Loja</th>
                                <th class="w-8"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $order)
                                <tr>
                                    <td>#{{ $order->id }}</td>
                                    <td>
                                        <div>
                                            {{ $order->user?->name }}
                                        </div>
                                        <div>
                                            {{ $order->user?->email }}
                                        </div>
                                        <div>
                                            {{ $order->user?->phone }}
                                        </div>
                                    </td>

                                    <td>
                                        {{ $order->transaction_id }}
                                    </td>

                                    <td>
                                        {{ $order->currency }} {{ $order->total }}
                                    </td>
                                    <td>
                                        @if($order->payment_status == 'paid')
                                            <span class="badge bg-success-lt">Pago</span>
                                        @elseif($order->payment_status == 'pending')
                                            <span class="badge bg-warning-lt">Pendente</span>
                                        @else
                                            <span class="badge bg-danger-lt">Falhou</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $order->order_status }}
                                    </td>
                                    <td>
                                        {{ date('Y-m-d', strtotime($order->created_at)) }}
                                    </td>

                                    <td>
                                        {{ $order->store?->name }}
                                    </td>

                                    <td>
                                        <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-primary"><i class="ti ti-eye"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">Nenhum pedido</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
