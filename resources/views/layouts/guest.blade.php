<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Textes Juridiques') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0" style="background-color: #8B1E24;">

        <div class="mb-6 flex gap-3">
            <a href="{{ route('lang.switch', 'fr') }}" class="text-white text-sm underline">Français</a>
            <a href="{{ route('lang.switch', 'ar') }}" class="text-white text-sm underline">العربية</a>
        </div>

        <div class="mb-6 text-white text-center px-4">
            <h1 class="text-xl sm:text-2xl font-bold tracking-wide">
                {{ app()->getLocale() == 'ar' ? 'وزارة إعداد التراب الوطني والتعمير والإسكان وسياسة المدينة' : "Ministère de l'Habitat, de la Politique de la Ville" }}
            </h1>
            <p class="text-sm opacity-90 mt-1">
                {{ app()->getLocale() == 'ar' ? 'بوابة النصوص القانونية' : 'Portail des Textes Juridiques' }}
            </p>
        </div>

        <div class="w-full sm:max-w-md px-6 py-8 bg-white shadow-lg overflow-hidden sm:rounded-lg border-t-4" style="border-top-color: #006233;">
            {{ $slot }}
        </div>

        <div class="mt-6 text-white text-xs opacity-75">
            &copy; {{ date('Y') }} MHPV — {{ app()->getLocale() == 'ar' ? 'جميع الحقوق محفوظة' : 'Tous droits réservés' }}
        </div>
    </div>
</body>
</html>