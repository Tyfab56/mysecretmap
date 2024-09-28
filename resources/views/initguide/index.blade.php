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

        Bienvenue
    </div>

    <script src="https://unpkg.com/framework7/framework7-bundle.min.js"></script>

    <script>
        var app = new Framework7({
            root: '#app',
            routes: [{
                    path: '/travelguide/:country_code_:lang',
                    async: function(routeTo, routeFrom, resolve, reject) {
                        console.log("Trying to load page from: ", './guide/pages/guide.html');
                        resolve({
                            componentUrl: './guide/pages/guide.html'
                        });
                    },
                },
                {
                    path: '(.*)', // catch-all route for unknown paths
                    component: './pages/404.html', // custom 404 page
                    beforeEnter: function(route, redirect, resolve, reject) {
                        console.log("Page non trouvée :", route.url); // Ajouter un log pour voir l'URL recherchée
                        resolve();
                    }
                }
            ]
        });
    </script>
</body>

</html>