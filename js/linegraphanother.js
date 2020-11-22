$(document).ready(function(){
  $.ajax({
    url : "http://localhost/chartjs/data.php",
    type : "GET",
    success : function(data){
      console.log(data);

      var player= [];
      var score= [];

      for(var i in data) {
		player.push("Player " + data[i].playerid);
		score.push(data[i].score);
      }

      var chartdata = {
        labels: player,
        datasets: [
          {
            label: "Player Score",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(59, 89, 152, 0.75)",
            borderColor: "rgba(59, 89, 152, 1)",
            pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
            pointHoverBorderColor: "rgba(59, 89, 152, 1)",
            data: score
          }
        ]
      };

      var ctx = $("#mycanvas2");

      var LineGraph = new Chart(ctx, {
        type: 'line',
        data: chartdata
      });
    },
    error : function(data) {

    }
  });
});