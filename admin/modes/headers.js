google.charts.load("43", {packages:["corechart"]});
//For content type
function checkSup(supplier){
    $('#content-type').each(function() {
      var query=$(this).val(); 
      if(query == "Select a type:"){

      }else if(query == "all" && supplier == "all"){
        $.get("headers_src/max_age.php", function(data){
            google.charts.setOnLoadCallback(Histogram(data,query,supplier));     
          });
      }else if(query == "all" && supplier != "all"){
        $.get("headers_src/max_age.php?supplier="+supplier, function(data){
            google.charts.setOnLoadCallback(Histogram(data,query,supplier));     
          });
      }
      else{
        $.get("headers_src/max_age.php?query="+query+"&supplier="+supplier, function(data){
            google.charts.setOnLoadCallback(Histogram(data,query,supplier));     
          }); 
      }
      });
};
//For supplier
function check(){   
    $('#supplier').each(function() {
        checkSup($(this).val());
    });
};

function getMax(arr) {
    var max;
    for (var i=1 ; i<arr.length ; i++) {
        if (max == null || parseInt(arr[i][1]) > parseInt(max))
            max = arr[i][1];
    }
    return max;
}



//creating google chart function
function Histogram(result,query,supplier) {

    var array = JSON.parse(result);
    var max = getMax(array);
    var data = google.visualization.arrayToDataTable(
        JSON.parse(result));

      var options = {
        title: 'Max-Age by Content-Type ('+ query +'---'+ supplier + ')',
        width:1900,
        height:600,
        backgroundColor: { fill:'transparent' },
        colors: ['#600098'],
        titleTextStyle: {
            color: 'rgb(184, 233, 233)'
        },
        hAxis:{
            textStyle: {
                fontSize: 14,
                color: 'rgb(184, 233, 233)',
                bold: true,
                italic: false
            }
        },
        vAxis: {
            title: '# Content-Types',
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
        },
        histogram: {
            bucketSize: (max/10)+1
        },
        legend: { position: 'none' },
      };

      var chart = new google.visualization.Histogram(document.getElementById('chart'));
      chart.draw(data, options);
    
};