<!-- resources/views/guide.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guide for {{ $country_code }} - {{ $lang }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/framework7@7.0.0/css/framework7.bundle.min.css">
</head>

<body>
    <div id="app">
        <!-- This will be replaced by Framework7 components -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/framework7@7.0.0/js/framework7.bundle.min.js"></script>

    <script>
        var app = new Framework7({
            root: '#app',
            routes: [{
                path: '/guide/:country_code_:lang',
                componentUrl: './guide/pages/guide.html', // Updated to 'guide' subfolder
            }, ]
        });
    </script>
</body>

</html>