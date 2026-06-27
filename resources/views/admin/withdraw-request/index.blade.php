@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Todas as solicitações de saque</h3>

            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Loja</th>
                                <th>Valor</th>
                                <th>Forma de pagamento</th>
                                <th>Detalhes</th>
                                <th>Status</th>
                                <th class="w-8"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($withdrawRequests as $withdrawRequest)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $withdrawRequest->store->name }}</td>
                                    <td>{{ config('settings.site_currency') }} {{ $withdrawRequest->amount }}</td>
                                    <td>{{ $withdrawRequest->payment_method }}</td>
                                    <td>
                                        @if ($withdrawRequest->status == 'pending')
                                            <span class="badge bg-warning-lt">Pendente</span>
                                        @elseif($withdrawRequest->status == 'paid')
                                            <span class="badge bg-success-lt">Pago</span>
                                        @else
                                            <span class="badge bg-danger-lt">Rejeitado</span>
                                        @endif
                                    </td>
                                    <td>{{ date('Y-m-d', strtotime($withdrawRequest->created_at)) }}</td>
                                    <td>

                                        <a class="text-primary btn btn-sm btn-primary"
                                            href="{{ route('admin.withdraw-requests.show', $withdrawRequest) }}">
                                            <i class="ti ti-eye text-white"></i></a>

                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">Nenhuma solicitação de saque</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{-- {{ $orders->links() }} --}}
                </div>
            </div>
        </div>
    </div>
@endsection
