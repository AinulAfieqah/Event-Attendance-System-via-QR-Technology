$(document).ready(function(){
	$.ajax({
		url: "http://localhost/lecturer/js/data.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var subjCode = [];
			var totalStud = [];

			for(var i in data) {
				subjCode.push( data[i].subjCode);
				totalStud.push(data[i].totalStud);
			}

			var chartdata = {
				labels: subjCode,
				datasets : [
					{
						label: 'List of Students',
						backgroundColor: 'rgba(255, 87, 51, 0.75)',
						borderColor: 'rgba(255, 87, 51, 0.75)',
						hoverBackgroundColor: 'rgba(255, 87, 51, 1)',
						hoverBorderColor: 'rgba(255, 87, 51, 1)',
						data: totalStud
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});
