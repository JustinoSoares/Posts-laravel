<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>

    <div class="authentication-card">
        <div class="logo">
            <!-- Coloque aqui o logotipo da sua aplicação -->
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <label for="name">Name</label>
                <input id="name" type="text" name="name" value="" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <!-- Se você tem Termos de Serviço e Política de Privacidade -->
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <label for="terms">
                        <div>
                            <input type="checkbox" name="terms" id="terms" required />
                            <span>{!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'">Terms of Service</a>',
                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'">Privacy Policy</a>',
                            ]) !!}</span>
                        </div>
                    </label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('login') }}">Already registered?</a>
                <button type="submit">Register</button>
            </div>
        </form>
    </div>

</body>
</html>
