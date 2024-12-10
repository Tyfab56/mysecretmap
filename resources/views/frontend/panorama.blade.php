<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css" rel="stylesheet" />

    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            /* Empêche les scrollbars */
        }

        #panorama {
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body>
    <div id="panorama"></div>
    <script>
        pannellum.viewer('panorama', {
            type: 'equirectangular',
            panorama: '{{ $panoramaData["image"] }}',
            hfov: 80,
            autoLoad: true,
            useOrientation: true, // Active le gyroscope si disponible
        });
    </script>
</body>

</html>