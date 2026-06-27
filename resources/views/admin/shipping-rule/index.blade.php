@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Todas as regras de frete</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.shipping-rules.create') }}" class="btn btn-primary">Criar regra de frete</a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nome</th>
                                <th>Tipo</th>
                                <th>Pedido mínimo</th>
                                <th>Taxa</th>
                                <th>Status</th>
                                <th class="w-8"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shippingRules as $shippingRule)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $shippingRule->name }}</td>
                                    @if ($shippingRule->type == 'minimum_order_amount')
                                        <td class="text-secondary"><span class="badge bg-info-lt">Minimum Order
                                                Amount</span></td>
                                    @else
                                        <td class="text-secondary"><span class="badge bg-info-lt">Valor fixo</span></td>
                                    @endif
                                    <td class="text-secondary">{{ $shippingRule->minimum_amount }}</td>
                                    <td class="text-secondary">{{ $shippingRule->charge }}</td>
                                    @if ($shippingRule->is_active == 1)
                                        <td class="text-secondary"><span class="badge bg-success-lt">Ativo</span></td>
                                    @else
                                        <td class="text-secondary"><span class="badge bg-danger-lt">Inativo</span></td>
                                    @endif
                                    <td>
                                        <a href="{{ route('admin.shipping-rules.edit', $shippingRule) }}"><i class="ti ti-edit"></i></a>
                                        <a class="text-danger delete-item"
                                            href="{{ route('admin.shipping-rules.destroy', $shippingRule) }}"><i
                                                class="ti ti-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{-- {{ $kycRequests->links() }} --}}
                </div>
            </div>
        </div>
    </div>
@endsection
