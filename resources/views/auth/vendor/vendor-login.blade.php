<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Scanno - {{ __('Login') }} Vendor</title>
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<article class="bg-color">
    <section class="login-register scanno-screens">
        <div class="container-xxl">
            <div class="row">
                <div class="col-lg-6">
                    <div class="logo logo-center">
                        <img src="{{asset('/img')}}/login-scanno-logo.png" alt="Scanno Logo" class="img-responsive scanno-logo">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login-form">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST"  action="{{ route('vendor-login') }}">
                            @csrf
                            <div class="inputContainer">
                                <input type="email" name="email" id="email" class="input" placeholder="Email" value="">
                                <label for="" class="label">{{ __('Email Address') }}</label>

                            </div>
                            <div class="inputContainer login-password-container">
                                <input type="password" name="password" id="password" class="input" placeholder="Password (6digits. Ex: 123456)" value="">
                                <label for="" class="label">Password (6digits. Ex: 123456)</label>

                            </div>
                            <div class="forget-password input-check">
                                <div class="auto-login">
                                    <input type="checkbox" id="auto-login" name="auto-login">
                                    <label for="auto-login">Auto Login</label>
                                </div>
                                <div class="forget">
                                    <a href="#" class="anchor-link">Forget Password</a>
                                </div>
                            </div>
                            <div class="registration-btn-block">
                                <button type="submit" class="voilet-bg-btn">
                                    Vendor {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>
</body>

</html>
