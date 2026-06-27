@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Atualizar usuário</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.role-users.index') }}" class="btn btn-primary">Voltar</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.role-users.update', $admin) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Nome</label>
                                <input type="text" class="form-control" name="name" placeholder="" value="{{ $admin->name }}">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">E-mail</label>
                                <input type="text" class="form-control" name="email" placeholder="" value="{{ $admin->email }}">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Senha</label>
                                <input type="text" class="form-control" name="password" placeholder="" value="">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Confirmar senha</label>
                                <input type="text" class="form-control" name="password_confirmation" placeholder="" value="">
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Função</label>
                                <select name="role" id="" class="form-control">
                                    <option value="">Selecionar</option>
                                    @foreach($roles as $role)
                                        @if($role->name == 'Super Admin') @continue @endif
                                        <option @selected(in_array($role->name, $admin->getRoleNames()->toArray())) value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="card-footer text-end">
                <button class="btn btn-primary mt-3" onclick="$('form').submit()">Atualizar</button>
            </div>
        </div>
    </div>
    </div>
@endsection
