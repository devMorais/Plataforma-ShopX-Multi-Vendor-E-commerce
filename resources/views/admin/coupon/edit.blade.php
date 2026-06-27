@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Atualizar cupom</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.coupons.index') }}" class="btn btn-primary">Voltar</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.coupons.update', $coupon) }}" method="POST" class="coupon-form">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label required">Código</label>
                                <input type="text" class="form-control" name="code" placeholder="" value="{{ $coupon->code }}">
                                <x-input-error :messages="$errors->get('code')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label required">Valor</label>
                                <input type="text" class="form-control" name="value" placeholder="" value="{{ $coupon->value }}">
                                <x-input-error :messages="$errors->get('value')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label required">É porcentagem</label>
                                <select name="is_percent" id="" class="form-control">
                                    <option @selected($coupon->is_percent) value="0">Não</option>
                                    <option @selected($coupon->is_percent) value="1">Sim</option>
                                </select>
                                <x-input-error :messages="$errors->get('is_percent')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Gasto mínimo</label>
                                <input type="text" class="form-control" name="minimum_spend" placeholder=""
                                    value="{{ $coupon->minimum_spend }}">
                                <x-input-error :messages="$errors->get('minimum_spend')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Gasto máximo</label>
                                <input type="text" class="form-control" name="maximum_spend" placeholder=""
                                    value="{{ $coupon->maximum_spend }}">
                                <x-input-error :messages="$errors->get('maximum_spend')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Limite de uso por cupom</label>
                                <input type="text" class="form-control" name="usage_limit_per_coupon" placeholder=""
                                    value="{{ $coupon->usage_limit_per_coupon }}">
                                <x-input-error :messages="$errors->get('usage_limit_per_coupon')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Limite de uso por cliente</label>
                                <input type="text" class="form-control" name="usage_limit_per_customer" placeholder=""
                                    value="{{ $coupon->usage_limit_per_customer }}">
                                <x-input-error :messages="$errors->get('usage_limit_per_customer')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Data inicial</label>
                                <input type="text" class="form-control datepicker" name="start_date" placeholder=""
                                    value="{{ $coupon->start_date }}">
                                <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Data final</label>
                                <input type="text" class="form-control datepicker" name="end_date" placeholder=""
                                    value="{{ $coupon->end_date }}">
                                <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-2">
                                <label class="form-check form-switch form-switch-3">
                                    <input class="form-check-input" @checked($coupon->is_active) type="checkbox" checked="" name="is_active"
                                        id="status" value="1">
                                    <span class="form-check-label">Ativo</span>
                                </label>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <div class="card-footer text-end">
                <button class="btn btn-primary mt-3" onclick="$('.coupon-form').submit()">Atualizar</button>
            </div>
        </div>
    </div>
    </div>
@endsection
