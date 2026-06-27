@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Métodos de saque</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.withdraw-methods.create') }}" class="btn btn-primary">Criar método</a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nome</th>
                                <th>Valor mínimo</th>
                                <th>Valor máximo</th>
                                <th>Status</th>
                                <th class="w-8"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($withdrawMethods as $withdrawMethod)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $withdrawMethod->name }}</td>
                                    <td>{{ $withdrawMethod->minimum_amount }}</td>
                                    <td>{{ $withdrawMethod->maximum_amount }}</td>
                                    <td>
                                        @if($withdrawMethod->is_active == 1)
                                            <span class="badge bg-success-lt">Ativo</span>
                                        @else
                                            <span class="badge bg-danger-lt">Inativo</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.withdraw-methods.edit', $withdrawMethod->id) }}"><i class="ti ti-edit"></i></a>
                                        <a class="text-danger delete-item" href="{{ route('admin.withdraw-methods.destroy', $withdrawMethod->id) }}"><i class="ti ti-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Nenhum método disponível</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                  </div>
            </div>
        </div>
    </div>
@endsection
