<div class="gif">
    <img src="lib/gif/meteo.gif" id="GifMeteo">
</div>

<input type="text" class="DatePicker" id="dpFrom"/>
<input type="text" class="DatePicker" id="dpTo"/>


<button type="button" id="btnSearch">Recherche</button>

<canvas id="ChartTemp" width="400" height="400"></canvas>
<canvas id="ChartHumi" width="400" height="400"></canvas>

<script src="lib/js/jquery/jquery-3.6.0.min.js"></script>
<script src="lib/js/chartjs/chart.min.js"></script>
<script src="lib/js/momentjs/momentjs.js"></script>
<script src="https://momentjs.com/downloads/moment-timezone-with-data.min.js"></script>
<script src="lib/js/jquery/jquery.datetimepicker.js"></script>
<script src="lib/js/script/meteo.js"></script>