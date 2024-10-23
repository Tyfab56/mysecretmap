<!DOCTYPE html>
<html lang="{{Lang::locale()}}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="My Secret Map, the best place to discover new touristic spots for your next trip">
    <meta name="author" content="">
    <meta name="keywords" content="spot,tourisme,photo, voyage">
    <meta name="robots" content="all">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
</head>

<body>
    <div class="body-inner">
        <div class="col-lg-4 center">
            <deckgo-demo
                src="https://mysecretmap.com/audioguide_iceland_en"
                instant="true"
                style="width: 50vw; height: 100vh;">

            </deckgo-demo>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/@deckdeckgo/demo@latest/dist/deckdeckgo-demo/deckdeckgo-demo.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/@deckdeckgo/demo@latest/dist/deckdeckgo-demo/deckdeckgo-demo.js"></script>
</body>

</html>