@extends('frontend.layouts.app')

@section('contents')

    <x-frontend.breadcrumb :items="[['label' => 'Início', 'url' => '/'], ['label' => 'Pagamento aprovado']]" />
    <div class="container mb-60 mt-55">
        <div class="text-center mt-100 mb-100">
            <i class="fa-solid fa-circle-xmark fa-10x text-danger"></i>
            <h1>Pagamento cancelado</h1>
            <p>Your payment has been canceled please try again</p>
            <a href="{{ route('cart.index') }}" class="btn btn-success mt-10">Go To Cart</a>
        </div>
    </div>
@endsection

