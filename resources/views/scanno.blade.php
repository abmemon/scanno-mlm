<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Scanno</title>
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
                    <div class="registration-btn-block">
                        <a href="/login/admin" class="voilet-bg-btn">
                            {{ __('Admin Login') }}
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="registration-btn-block">
                        <a href="/login/vendor" class="voilet-bg-btn">
                            {{ __('Vendor Login') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>
</body>

</html>
