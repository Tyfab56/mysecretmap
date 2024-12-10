<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css" rel="stylesheet" />
</head>

<body>
    <div id="panorama" style="width: 100%; height: 100vh;"></div>
    <script>
        pannellum.viewer('panorama', {
            type: 'equirectangular',
            panorama: '{{ $panoramaData["image"] }}',
            autoLoad: true,
            useOrientation: true, // Active le gyroscope si disponible
        });
    </script>
</body>

</html>