@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Etiquetas do produto</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.tags.create') }}" class="btn btn-primary">Criar etiqueta</a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nome</th>
                                <th>Status</th>
                                <th class="w-100px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tags as $tag)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td>
                                        @if($tag->is_active == 1)
                                        <span class="badge bg-primary-lt">Ativo</span></td>
                                        @else
                                        <span class="badge bg-danger-lt">Inativo</span></td>
                                        @endif
                                    <td>
                                        <a href="{{ route('admin.tags.edit', $tag) }}"><i class="ti ti-edit"></i></a>
                                        <a class="text-danger delete-item" href="{{ route('admin.tags.destroy', $tag) }}"><i class="ti ti-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Nenhum dado disponível</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $tags->links() }}
                  </div>
            </div>
        </div>
    </div>
@endsection
