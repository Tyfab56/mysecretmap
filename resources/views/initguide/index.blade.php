<!-- resources/views/guide.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guide for {{ $country_code }} - {{ $lang }}</title>
    <link rel="stylesheet" href="https://unpkg.com/framework7/framework7-bundle.min.css">
</head>

<body>
    <div id="app">
        <!-- This will be replaced by Framework7 components -->

        <a href="/nonexistentpage" class="link">Test 404</a>
    </div>

    <script src="https://unpkg.com/framework7/framework7-bundle.min.js"></script>

    <script>
        var app = new Framework7({
            root: '#app',
            routes: [{
                    path: '/travelguide/:country_code_:lang',
                    component: './pages/guide.html',
                },
                {
                    path: '(.*)',
                    component: './pages/404.html',
                }
            ]
        });

        // Appelle la route courante après l'initialisation
        app.router.navigate('/travelguide/{{ $country_code }}_{{ $lang }}');
    </script>
</body>

</html>