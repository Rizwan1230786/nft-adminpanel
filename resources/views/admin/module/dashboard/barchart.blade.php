@extends('admin/contentLayoutMaster')

@section('title', 'Allset')


@section('page-style')
{{-- Page css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/dashboard-ecommerce.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@endsection
@section('content')
<style>
.chart{
    height:350px;
    width:80%;
    text-align:center;
}
</style>
<body>
    <div class="container row ">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                <div class="card-body">
                <div id="chartContainer" class="chart"></div>
                </div>
            </div>
            </div>
        </div>
    </div>
</body>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">
window.onload = function () {
    var userData = <?php echo json_encode($all)?>;
    var userData1 = <?php echo json_encode($personal)?>;
    var userData2 = <?php echo json_encode($gold)?>;
	var chart = new CanvasJS.Chart("chartContainer", {
		title:{
			text: "Clients Of Allset"
		},
		data: [
		{
			// Change type to "doughnut", "line", "splineArea", etc.
			type: "column",
			dataPoints: [
				{ label: "all", y:userData},
				{ label: "Personal", y: userData1  },
				{ label: "Gold", y: userData2  }

			]
		}
		]
	});
	chart.render();
}
</script>
@endsection
