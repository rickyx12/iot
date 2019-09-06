$(function(){

	var base_url = $('body').data('urlbase');

	  var ctx = document.getElementById('temperatureChart').getContext('2d');
	  var detailsArr = [];
	  var tempArr = [];
	  var humidArr = [];
	  var soilMoistArr = [];

	  $.ajax({
	  	url:base_url+'Parameters/getLatestParametersJSON',
	  	type:'GET',
	  	success:function(result) {

	  		var res = JSON.parse(result);
	  		console.log(res);

	  		$.each(res,function(index,value) {

	  			var detailsSplit = value.details.split(" ");
	  			var formattedDate = formatDate(detailsSplit[0]);
	  			var formattedTime = formatTime(detailsSplit[1]);

	  			detailsArr.push(formattedDate+"\n"+formattedTime);
	  			tempArr.push(value.temperature);
	  			humidArr.push(value.humidity);
	  			soilMoistArr.push(value.soil_moisture);
	  		});


		  var data = {
		    // labels: ["match1", "match2", "match3", "match4", "match5"],
		    labels: detailsArr,
		    datasets: [
		      {
		        label: "Temperature",
		        data: tempArr,
		        backgroundColor: "blue",
		        borderColor: "lightblue",
		        fill: false,
		        lineTension: 0,
		        radius: 5
		      },
		      {
		        label: "Humidity",
		        data: humidArr,
		        backgroundColor: "green",
		        borderColor: "lightgreen",
		        fill: false,
		        lineTension: 0,
		        radius: 5
		      },
		      {
		        label: "Soil Moisture",
		        data: soilMoistArr,
		        backgroundColor: "brown",
		        borderColor: "brown",
		        fill: false,
		        lineTension: 0,
		        radius: 5
		      }		      
		    ]
		  };

		  //options
		  var options = {
		    responsive: true,
		    title: {
		      display: true,
		      position: "top",
		      text: "Latest Data",
		      fontSize: 18,
		      fontColor: "#111"
		    },
		    legend: {
		      display: true,
		      position: "bottom",
		      labels: {
		        fontColor: "#333",
		        fontSize: 16
		      }
		    }
		  };

		  var myChart = new Chart(ctx, {
		      type: 'line',
		      data:data,
		      options:options
		  });	


	  	}
	  });
	

});