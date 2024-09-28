<!DOCTYPE html>
<html>
<head>
    <title>Audioguide</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/framework7/css/framework7.bundle.min.css">
</head>
<body>
    <div id="app">
        <!-- Add loading screen, logo, and choose language here -->
        <div class="loading-screen">
            <img src="{{ asset('img/loading.gif') }}" alt="Loading...">
            <p>Loading content for {{ $country_code }} in {{ strtoupper($lang) }}...</p>
        </div>

        <!-- Your Framework 7 app will go here -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/framework7/js/framework7.bundle.min.js"></script>
    <script>
        var countryCode = '{{ $country_code }}';
        var language = '{{ $lang }}';

        var app = new Framework7({
            root: '#app',
            name: 'MySecretMap',
            id: 'com.mysecretmap.app',
            routes: [
                // Define your PWA routes here
            ]
        });

        // Now use countryCode and language to load the appropriate data
        console.log('Country:', countryCode, 'Language:', language);
    </script>
</body>
</html>