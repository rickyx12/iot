$(function(){

	var base_url = $('body').data('urlbase');

	  var ctx = document.getElementById('humidityChart').getContext('2d');
	  var detailsArr = [];
	  var humidityArr = [];

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
	  			humidityArr.push(value.humidity);
	  		});


		  var data = {
		    // labels: ["match1", "match2", "match3", "match4", "match5"],
		    labels: detailsArr,
		    datasets: [
		      {
		        label: "Humidity",
		        data: humidityArr,
		        backgroundColor: "green",
		        borderColor: "lightgreen",
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
		      text: "Climatic Factors",
		      fontSize: 18,
		      fontColor: "#111"
		    }
		  };

		  var myChart = new Chart(ctx, {
		      type: 'line',
		      data:data,
		      options:options
		  });	


	  	}
	  });
	


	 var humidityTable = $('#humidityTable').DataTable({
	 					processing:true,
						serverSide:true,								
						ajax:{
							url: base_url+'Humidity/dataTableJSON',
						},
						columns:[
							{ 
								data:null,
								render:function(data,type,row) {
									return data.humidity
								}
							},
							{ 
								data:null,
								render:function(data,type,row) {
									return data.soil_type
								}
							},
							{ 
								data:null,
								render:function(data,type,row) {
									return data.soil_type1
								}
							},
							{ 
								data:null,
								render:function(data,type,row) {
									return data.soil_type2
								}
							},																					
							{
								data:null,
								render:function(data,type,row) {

									var splitStr = data.details.split(" ");
									var date = splitStr[0];
									var time = splitStr[1];

									return formatDate(date)+" @ "+formatTime(time);
								}
							},
							{
								data:null,
								render:function(data,type,row) {
									return "<a href='http://www.google.com/maps/place/"+data.latitude+","+data.longitude+"' target='_blank'>Coordinates</a>";
								}								
							}
						]
					});




});