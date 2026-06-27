@extends('admin.layouts.app')

@section('contents')

    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Criar etiqueta</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.tags.index') }}" class="btn btn-primary">Voltar</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.contact-settings.store') }}" method="POST" class="tag-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">URL do mapa</label>
                                <input type="text" class="form-control" name="map_url" placeholder="" value="{{ $section?->map_url }}">
                                <x-input-error :messages="$errors->get('map_url')" class="mt-2" />
                            </div>
                        </div>
                        <hr>


                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Título Um</label>
                                <input type="text" class="form-control" name="title_one" placeholder="" value="{{ $section?->title_one }}">
                                <x-input-error :messages="$errors->get('title_one')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Endereço Um</label>
                                <input type="text" class="form-control" name="address_one" placeholder="" value="{{ $section?->address_one }}">
                                <x-input-error :messages="$errors->get('address_one')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">E-mail Um</label>
                                <input type="text" class="form-control" name="email_one" placeholder="" value="{{ $section?->email_one }}">
                                <x-input-error :messages="$errors->get('email_one')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Telefone Um</label>
                                <input type="text" class="form-control" name="phone_one" placeholder="" value="{{ $section?->phone_one }}">
                                <x-input-error :messages="$errors->get('phone_one')" class="mt-2" />
                            </div>
                        </div>


                        <hr>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Título Dois</label>
                                <input type="text" class="form-control" name="title_two" placeholder="" value="{{ $section?->title_two }}">
                                <x-input-error :messages="$errors->get('title_two')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Endereço Dois</label>
                                <input type="text" class="form-control" name="address_two" placeholder="" value="{{ $section?->address_two }}">
                                <x-input-error :messages="$errors->get('address_two')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">E-mail Dois</label>
                                <input type="text" class="form-control" name="email_two" placeholder="" value="{{ $section?->email_two }}">
                                <x-input-error :messages="$errors->get('email_two')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Telefone Dois</label>
                                <input type="text" class="form-control" name="phone_two" placeholder="" value="{{ $section?->phone_two }}">
                                <x-input-error :messages="$errors->get('phone_two')" class="mt-2" />
                            </div>
                        </div>


                        <hr>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Título Três</label>
                                <input type="text" class="form-control" name="title_three" placeholder="" value="{{ $section?->title_three }}">
                                <x-input-error :messages="$errors->get('title_three')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Endereço Três</label>
                                <input type="text" class="form-control" name="address_three" placeholder=""
                                    value="{{ $section?->address_three }}">
                                <x-input-error :messages="$errors->get('address_three')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">E-mail Três</label>
                                <input type="text" class="form-control" name="email_three" placeholder=""
                                    value="{{ $section?->email_three }}">
                                <x-input-error :messages="$errors->get('email_three')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Telefone Três</label>
                                <input type="text" class="form-control" name="phone_three" placeholder=""
                                    value="{{ $section?->phone_three }}">
                                <x-input-error :messages="$errors->get('phone_three')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer text-end">
                <button class="btn btn-primary mt-3" onclick="$('.tag-form').submit()">Atualizar</button>
            </div>
        </div>
    </div>
    </div>
@endsection
