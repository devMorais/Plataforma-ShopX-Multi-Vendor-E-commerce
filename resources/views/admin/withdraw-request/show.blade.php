@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detalhes do saque</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.withdraw-requests.index') }}" class="btn btn-primary">Voltar</a>
                </div>
            </div>

            <div class="card-body p-0">

                <div class="table-responsive">
                    <table class="table table-vcenter">
                        <tbody>
                            <tr>
                                <td>Loja</td>
                                <td>{{ $withdraw_request->store->name }}</td>
                            </tr>

                            <tr>
                                <td>Valor</td>
                                <td>{{ $withdraw_request->amount }}</td>
                            </tr>
                            <tr>
                                <td>Forma de pagamento</td>
                                <td>{{ $withdraw_request->payment_method }}</td>
                            </tr>

                            <tr>
                                <td>Status</td>
                                <td>{{ $withdraw_request->status }}</td>
                            </tr>
                            <tr>
                                <td>Detalhes do gateway</td>
                                <td>{!! $withdraw_request->payment_details !!}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                </div>
            </div>
        </div>

        @if($withdraw_request->status == 'pending')
        <div class="col-md-4">
            <div class="card mt-5">
                <div class="card-body">
                    <form action="{{ route('admin.withdraw-requests.update', $withdraw_request) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="" class="form-label">Atualizar status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="pending" @selected($withdraw_request->status == 'pending')>Pendente</option>
                                <option value="paid" @selected($withdraw_request->status == 'paid')>Pago</option>
                                <option value="rejected" @selected($withdraw_request->status == 'rejected')>Rejeitado</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <button class="btn btn-primary" type="submit">Atualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection
