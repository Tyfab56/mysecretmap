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
        <div class="view view-main"></div>
    </div>

    <script src="https://unpkg.com/framework7/framework7-bundle.min.js"></script>

    <script>
        console.log("Application Framework7 démarrée");

        var app = new Framework7({
            root: '#app',
            routes: [{
                    path: '/guide/:country_code_:lang',
                    component: './pages/guide.html',
                },
                {
                    path: '(.*)',
                    component: './pages/404.html',
                }
            ]
        });

        // Access the main view and trigger the router
        var mainView = app.views.create('.view-main');
        mainView.router.navigate('/{{ $country_code }}_{{ $lang }}');
    </script>
</body>

</html>