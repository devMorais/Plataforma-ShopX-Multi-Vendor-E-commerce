<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Painel Administrativo</title>

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
                    <h2 class="h2 text-center mb-4">Painel Administrativo</h2>
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <form action="{{ route('admin.login') }}" method="POST" autocomplete="off" novalidate>
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" id="email" :value="old('email')" name="email"
                                class="form-control" placeholder="voce@email.com" autocomplete="off" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mb-2">
                            <label for="password" class="form-label">
                                Senha
                                <span class="form-label-description">
                                    <a href="{{ route('admin.password.request') }}">Esqueceu sua senha?</a>
                                </span>
                            </label>
                            <div class="input-group input-group-flat">
                                <input id="password" type="password" name="password" class="form-control"
                                    placeholder="Senha" autocomplete="off" />
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me -->
                        <div class="mb-2">
                            <label class="form-check">
                                <input id="remember_me" type="checkbox" name="remember" class="form-check-input" />
                                <span class="form-check-label">Lembrar-me neste dispositivo</span>
                            </label>
                        </div>

                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
