<section class="main style{{ $data['style'] }} special" style="padding-bottom: 0">
    <div class="container" style="width: 100%">
        <header class="major">
            <div class="wrap">
                <h2>{{ $data['header'] }}</h2>
            </div>
        </header>
        <p>{{ $data['sub_header'] }}</p>

        <div id="map-{{ $str = rand() }}" class="map"></div>
    </div>
</section>
<link rel="stylesheet" type="text/css"
      href="http://js.api.here.com/v3/3.0/mapsjs-ui.css"/>
<script type="text/javascript" charset="UTF-8"
        src="http://js.api.here.com/v3/3.0/mapsjs-core.js"></script>
<script type="text/javascript" charset="UTF-8"
        src="http://js.api.here.com/v3/3.0/mapsjs-service.js"></script>
<script type="text/javascript" charset="UTF-8"
        src="http://js.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>
<script type="text/javascript" charset="UTF-8"
        src="http://js.api.here.com/v3/3.0/mapsjs-ui.js"></script>
<script type="text/javascript" charset="UTF-8">


    /**
     * Adds markers to the map highlighting the locations of the captials of
     * France, Italy, Germany, Spain and the United Kingdom.
     *
     * @param  {H.Map} map      A HERE Map instance within the application
     */
    function addMarkersToMap(map) {
        var parisMarker = new H.map.Marker({lat: 48.8567, lng: 2.3508});
        map.addObject(parisMarker);

        var romeMarker = new H.map.Marker({lat: 41.9, lng: 12.5});
        map.addObject(romeMarker);

        var berlinMarker = new H.map.Marker({lat: 52.5166, lng: 13.3833});
        map.addObject(berlinMarker);

        var madridMarker = new H.map.Marker({lat: 40.4, lng: -3.6833});
        map.addObject(madridMarker);

        var londonMarker = new H.map.Marker({lat: 51.5008, lng: -0.1224});
        map.addObject(londonMarker);
    }


    /**
     * Boilerplate map initialization code starts below:
     */

//Step 1: initialize communication with the platform
    var platform = new H.service.Platform({
        app_id: 'DemoAppId01082013GAL',
        app_code: 'AJKnXv84fjrb0KIHawS0Tg',
        useCIT: true
    });
    var defaultLayers = platform.createDefaultLayers();

    //Step 2: initialize a map - this map is centered over Europe
    var map = new H.Map(document.getElementById('map-{{$str}}'),
            defaultLayers.normal.map, {
                center: {lat: 50, lng: 5},
                zoom: 4
            });

    //Step 3: make the map interactive
    // MapEvents enables the event system
    // Behavior implements default interactions for pan/zoom (also on mobile touch environments)
    // TODO: Scrolling should be disabled (it interferes with browsing the site)
    //var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

    // Create the default UI components
    var ui = H.ui.UI.createDefault(map, defaultLayers);

    // Now use the map as required...
    addMarkersToMap(map);
</script>