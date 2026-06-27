@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Criar regra de frete</h3>
                <div class="card-actions">
                    <a href="{{ route('admin.shipping-rules.index') }}" class="btn btn-primary">Voltar</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.shipping-rules.store') }}" method="POST" class="shipping-rule-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Nome</label>
                                <input type="text" class="form-control" name="name" placeholder="" value="">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Tipo</label>
                                <select name="type" class="form-select" id="shipping_type">
                                    <option value="flat_amount">Valor fixo</option>
                                    <option value="minimum_order_amount">Valor mínimo do pedido</option>
                                </select>
                                <x-input-error :messages="$errors->get('type')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12 minimum_amount" style="display: none">
                            <div class="mb-3">
                                <label class="form-label required">Valor mínimo</label>
                                <input type="text" class="form-control" name="minimum_amount" placeholder="" value="">
                                <x-input-error :messages="$errors->get('minimum_amount')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label required">Taxa</label>
                                <input type="text" class="form-control" name="charge" placeholder="" value="">
                                <x-input-error :messages="$errors->get('charge')" class="mt-2" />
                            </div>
                        </div>

                         <div class="col-md-12">
                            <div class="mb-2">
                                <label class="form-check form-switch form-switch-3">
                                    <input class="form-check-input" type="checkbox" checked="" name="is_active"
                                        id="status" value="1">
                                    <span class="form-check-label">Ativo</span>
                                </label>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="card-footer text-end">
                <button class="btn btn-primary mt-3" onclick="$('.shipping-rule-form').submit()">Criar</button>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            $('#shipping_type').on('change', function() {
                if ($(this).val() == 'minimum_order_amount') {
                    $('.minimum_amount').show();
                } else {
                    $('.minimum_amount').hide();
                }
            })
        })
    </script>
@endpush
