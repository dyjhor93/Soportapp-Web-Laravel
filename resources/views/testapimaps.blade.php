<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test api Geo</title>

    <!-- api geo headers -->
    <script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js"></script>
    <link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css"/>

    <script type="text/javascript">
      window.onload = function() {
        //L.mapquest.key = 'lYrP4vF3Uk5zgTiGGuEzQGwGIVDGuy24';
        L.mapquest.key = 'hefFkz4MkGvxSq9tsG1gBq5WfcM64SnZ';
        var map = L.mapquest.map('map', {
          center: [8.7889593,-75.8597667],
          layers: L.mapquest.tileLayer('map'),
          zoom: 18
        });

        map.addControl(L.mapquest.control());
      }
    </script>
  </head>

  <body style="border: 0; margin: 0;">
    <div id="map" style="width: 100%; height: 530px;"></div>
  </body>
</html>