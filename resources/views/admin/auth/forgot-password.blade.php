<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Esqueceu sua senha?</title>

    <link href="{{ asset('assets/admin/css/tabler.css') }}" rel="stylesheet" />

    <style>
        @import url("https://rsms.me/inter/inter.css");
    </style>
</head>

<body>
    <script src="{{ asset('assets/admin/js/tabler-theme.min.js') }}"></script>
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="card card-md">
                <div class="card-body">
                    <p class="text-center mb-4">
                        Esqueceu sua senha? Sem problemas. Apenas nos informe seu endereço
                        de e-mail e enviaremos um link de redefinição de senha que permitirá que você escolha uma nova.
                    </p>
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <form action="{{ route('admin.password.email') }}" method="POST" autocomplete="off" novalidate>
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" id="email" :value="old('email')" name="email"
                                class="form-control" placeholder="voce@email.com" autocomplete="off" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Enviar link de redefinição de
                                senha</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
