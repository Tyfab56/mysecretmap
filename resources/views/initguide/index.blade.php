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
    </div>

    <script src="https://unpkg.com/framework7/framework7-bundle.min.js"></script>

    <script>
        var app = new Framework7({
                    root: '#app',
                    routes: [{
                            path: '/guide/:country_code_:lang',
                            async: function(routeTo, routeFrom, resolve, reject) {
                                console.log("Trying to load page from: ", './guide/pages/guide.html');
                                resolve({
                                    componentUrl: './guide/pages/guide.html'
                                });
                            },
                            {
                                path: '(.*)',
                                url: './guide/pages/404.html',
                            },
                        ]
                    });
    </script>
</body>

</html>