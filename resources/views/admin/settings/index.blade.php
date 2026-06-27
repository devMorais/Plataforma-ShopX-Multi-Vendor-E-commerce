@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="row g-0">
                <div class="col-12 col-md-3 border-end">
                    <div class="card-body">
                        <h4 class="subheader">Configurações do negócio</h4>
                        <div class="list-group list-group-transparent">
                            <a href="{{ route('admin.settings.index') }}"
                                class="list-group-item list-group-item-action d-flex align-items-center active">Configurações gerais</a>

                            <a href="{{ route('admin.commission-settings.index') }}"
                                class="list-group-item list-group-item-action d-flex align-items-center">Configurações de comissão</a>
                            <a href="{{ route('admin.logo-settings.index') }}"
                                class="list-group-item list-group-item-action d-flex align-items-center">Configurações do logo</a>
                            <a href="{{ route('admin.site-settings.index') }}"
                                class="list-group-item list-group-item-action d-flex align-items-center">Configurações do site</a>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-md-9 d-flex flex-column">
                    @yield('settings_contents')
                </div>
            </div>
        </div>
    </div>
@endsection
