<div class="charts col-6">  <!-- Диаграмма -->
	<div id="chart" class="h-75"></div>
    <div id="chart2" class="d-none h-75"></div>
    <div id="chart3" class="d-none h-75"></div>
	<script>
      let chart = new Chartisan({
        el: '#chart',
        url: "build/income",

        hooks: new ChartisanHooks()
		    .datasets('doughnut')
        .pieColors()
        .beginAtZero()
      });

      let chart2 = new Chartisan({
        el: '#chart2',
        url: "build/income",

        hooks: new ChartisanHooks()
        .datasets('bar')
        .pieColors()
        .beginAtZero()
      });

      let chart3 = new Chartisan({
        el: '#chart3',
        url: "build/income",

        hooks: new ChartisanHooks()
        .datasets('line')
        .colors()
        .beginAtZero()
      });
    </script>
</div>
