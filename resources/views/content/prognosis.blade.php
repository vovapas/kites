@extends('main')

@section('content')
    <script src="http://widget.windguru.cz/js/wg_widget.php" type="text/javascript"></script>
    <script language="JavaScript" type="text/javascript">
        //<![CDATA[
        WgWidget({
                    s: 325861, odh:0, doh:24, wj:'ms', tj:'c', waj:'m', fhours:72, lng:'ru',
                    params: ['WINDSPD','GUST','SMER','TMPE','CDC','APCPs'],
                    first_row:true,
                    spotname:true,
                    first_row_minfo:true,
                    last_row:true,
                    lat_lon:true,
                    tz:true,
                    sun:true,
                    link_archive:false,
                    link_new_window:false
                },
                'wg_target_div_325861_11145065'
        );
        //]]>
    </script>
    <div id="wg_target_div_325861_11145065"></div>
@stop