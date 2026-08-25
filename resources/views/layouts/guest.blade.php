<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Portail des Textes Juridiques') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body style="
background:linear-gradient(135deg,#eef3f8 0%,#dde8f5 45%,#edf2f7 100%);
min-height:100vh;
overflow:hidden;
font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;
">

<!-- Background decorations -->
<div style="
position:fixed;
top:-180px;
left:-150px;
width:430px;
height:430px;
background:#0d3b66;
opacity:.06;
border-radius:50%;
filter:blur(10px);
z-index:0;
"></div>

<div style="
position:fixed;
bottom:-180px;
right:-150px;
width:450px;
height:450px;
background:#c89b3c;
opacity:.07;
border-radius:50%;
filter:blur(10px);
z-index:0;
"></div>

<div class="container-fluid min-vh-100 d-flex align-items-center position-relative" style="z-index:1;">

    <div class="row w-100 align-items-center">

        <!-- LEFT -->
        <div class="col-lg-7 d-none d-lg-flex flex-column justify-content-center px-5">

            <img
                src="{{ asset('images/logo.png') }}"
                style="width:170px"
                class="mb-3"
                alt="Logo">

            <div style="
            width:90px;
            height:5px;
            background:#c89b3c;
            border-radius:30px;
            margin-bottom:20px;
            "></div>

            <h1
                class="fw-bold text-dark"
                style="
                font-size:2.15rem;
                line-height:1.35;
                max-width:650px;
                ">

                {{ app()->getLocale() == 'ar'
                ? 'وزارة إعداد التراب الوطني والتعمير والإسكان وسياسة المدينة'
                : "Ministère de l'Aménagement du Territoire, de l'Urbanisme, de l'Habitat et de la Politique de la Ville" }}

            </h1>

            <p
                class="fw-semibold mt-3 mb-2"
                style="
                color:#c89b3c;
                font-size:1.65rem;
                ">

                {{ app()->getLocale() == 'ar'
                ? 'بوابة النصوص القانونية'
                : 'Portail des Textes Juridiques' }}

            </p>

            <p
                class="text-secondary"
                style="
                max-width:470px;
                font-size:.95rem;
                line-height:1.7;
                ">

                {{ app()->getLocale() == 'ar'
                ? 'منصة رقمية لإدارة النصوص القانونية الخاصة بالوزارة.'
                : 'Plateforme numérique permettant la consultation et la gestion des textes juridiques du ministère.' }}

            </p>

        </div>

        <!-- RIGHT -->
        <div class="col-lg-5 d-flex justify-content-center align-items-center">

            <div
                class="shadow-lg"
                style="
                width:430px;
                background:white;
                border-radius:28px;
                padding:42px;
                border:1px solid rgba(0,0,0,.06);
                box-shadow:0 20px 60px rgba(0,0,0,.12);
                ">

                <div class="text-center mb-4">

                    <div
                        style="
                        width:75px;
                        height:75px;
                        margin:auto;
                        background:#0d3b66;
                        border-radius:50%;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        color:white;
                        font-size:28px;
                        ">

                        <i class="bi bi-person-lock-fill"></i>

                    </div>

                    <h2 class="fw-bold mt-4 mb-2">

                        {{ app()->getLocale()=='ar'
                        ? 'تسجيل الدخول'
                        : 'Connexion' }}

                    </h2>

                    <p class="text-muted">

                        {{ app()->getLocale()=='ar'
                        ? 'ولوج إلى الفضاء الإداري'
                        : 'Accédez à votre espace administratif' }}

                    </p>

                    <div class="mt-4">

                        <a href="{{ route('lang.switch','fr') }}"
                           class="btn btn-primary rounded-pill px-4 me-2">
                            Français
                        </a>

                        <a href="{{ route('lang.switch','ar') }}"
                           class="btn btn-outline-secondary rounded-pill px-4">
                            العربية
                        </a>

                    </div>

                </div>

                {{ $slot }}

            </div>

        </div>

    </div>

</div>

</body>
</html>