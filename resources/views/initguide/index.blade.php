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
        console.log("Application Framework7 démarrée");
        var app = new Framework7({
            root: '#app',
            routes: [{
                    path: '/',
                    beforeEnter: function(route, redirect, resolve, reject) {
                        console.log("Page d'accueil");
                        resolve();
                    }
                },
                {
                    path: '(.*)', // catch-all route for unknown paths
                    beforeEnter: function(route, redirect, resolve, reject) {
                        console.log("Page non trouvée :", route.url);
                        resolve();
                    }
                }
            ]
        });
    </script>
</body>

</html>