google.charts.load('current', {packages: ['corechart', 'bar']});
//For content type
$(document).ready(function() {
    $('#content-type').change(function() {
      var query=$(this).val();
      if(query == "Select a type:"){

      }else if(query == "all"){
        $.get("response_time_src/getContent.php", function(data){
            data = JSON.parse(data);
            google.charts.setOnLoadCallback(columnchart(data,query));     
          });
      }else{
        $.get("response_time_src/getContent.php?query="+query, function(data){
            data = JSON.parse(data);
            google.charts.setOnLoadCallback(columnchart(data,query));     
          }); 
      }
      });
});
//For day
$(document).ready(function() {
    $('#wday').change(function() {
      var query=$(this).val();
      if(query == "Select a day:"){

      }else if(query == "all"){
        $.get("response_time_src/getDay.php", function(data){
            data = JSON.parse(data);
            google.charts.setOnLoadCallback(columnchart(data,query));     
          });
      }else{
        $.get("response_time_src/getDay.php?query="+query, function(data){
            data = JSON.parse(data);
            google.charts.setOnLoadCallback(columnchart(data,query));     
          }); 
      }
      });
});
//For HTTP method
$(document).ready(function() {
    $('#method').change(function() {
      var query=$(this).val();
      if(query == "Select a method:"){

      }else if(query == "all"){
        $.get("response_time_src/getMethod.php", function(data){
            data = JSON.parse(data);
            google.charts.setOnLoadCallback(columnchart(data,query));     
          });
      }else{
        $.get("response_time_src/getMethod.php?query="+query, function(data){
            data = JSON.parse(data);
            google.charts.setOnLoadCallback(columnchart(data,query));     
          }); 
      }
      });
});
//For supplier
$(document).ready(function() {
    $('#supplier').change(function() {
      var query=$(this).val();
      if(query == "Select a supplier:"){

      }else if(query == "all"){
        $.get("response_time_src/getSupplier.php", function(data){
            data = JSON.parse(data);
            google.charts.setOnLoadCallback(columnchart(data,query));     
          });
      }else{
        $.get("response_time_src/getSupplier.php?query="+query, function(data){
            data = JSON.parse(data);
            google.charts.setOnLoadCallback(columnchart(data,query));     
          }); 
      }
      });
});

//creating google chart function
function columnchart(result,query) {

    var data = new google.visualization.DataTable();
    data.addColumn('timeofday', 'Time of Day');
    data.addColumn('number', 'Average Response Time(ms)');

    data.addRows(
        result
    );

    var options = {
        title: 'Average Response Time by hour ('+ query +')',
        explorer: { 
            actions: ['dragToZoom', 'rightClickToReset'],
            axis: 'horizontal',
            keepInBounds: true,
            maxZoomIn: 35
        },
        titleTextStyle: {
            color: 'rgb(184, 233, 233)'
        },
        focusTarget: 'category',
        width:1900,
        height:600,
        backgroundColor: { fill:'transparent' },
        colors: ['#bf00f2'],
        bar: {
            groupWidth: 60
        },
        hAxis: {
        title: 'Time of Day',
        format: 'h:mm:s a',
        gridlines: {color: '#444444'},
        
        textStyle: {
            fontSize: 14,
            color: 'rgb(184, 233, 233)',
            bold: true,
            italic: false
        },
        titleTextStyle: {
            fontSize: 18,
            color: 'rgb(184, 233, 233)',
            bold: true,
            italic: false
        }
        },
        vAxis: {
        gridlines: {color: '#444444'},
        title: 'Average Response Time (ms)',
        textStyle: {
            fontSize: 18,
            color: '#E9CF72',
            bold: false,
            italic: false
        },
        titleTextStyle: {
            fontSize: 18,
            color: '#E9CF72',
            bold: true,
            italic: false
        }
        }
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('chart'));
    chart.draw(data, options);
};