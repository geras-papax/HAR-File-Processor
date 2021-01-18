google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(numContent);
google.charts.setOnLoadCallback(numStatus);
google.charts.setOnLoadCallback(numDomains);
google.charts.setOnLoadCallback(numSuppliers);
google.charts.setOnLoadCallback(avgContent);

function loadStats() {
    numUsers();
  }

  function numContent() {
    var xhttp;  
    
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var results = JSON.parse(this.responseText);
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Method');
        data.addColumn('number', 'Count');

        data.addRows(
            results
        );

        var options = {
            title: 'Number of records by request type',
            titleTextStyle: {
                color: 'rgb(184, 233, 233)'
            },
            focusTarget: 'category',
            width:500,
            height:400,
            backgroundColor: { fill:'transparent' },
            colors: ['#600098'],
            bar: {
                groupWidth: 50
            },
            hAxis: {
            gridlines: {color: '#1E4D6B'},
            title: 'Methods',
            format: 'string',
            
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
            title: '# Records',
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

        var chart = new google.visualization.ColumnChart(document.getElementById('num_content'));
        chart.draw(data, options);
      }
    };
    xhttp.open("GET", "basic_info_src/numContent.php", true);
    xhttp.send();
  }

  function numUsers() {
    var xhttp;  
    
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("num_users").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "basic_info_src/numUsers.php", true);
    xhttp.send();
  }
  
  function numStatus() {
    var xhttp;  
    
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var results = JSON.parse(this.responseText);
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Status');
        data.addColumn('number', 'Count');

        data.addRows(
            results
        );

        var options = {
            title: 'Number of records by status code',
            titleTextStyle: {
                color: 'rgb(184, 233, 233)'
            },
            focusTarget: 'category',
            width:900,
            height:400,
            backgroundColor: { fill:'transparent' },
            colors: ['#600098'],
            bar: {
                groupWidth: 40
            },
            hAxis: {
            gridlines: {color: '#1E4D6B'},
            title: 'Status Codes',
            
            
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
            title: '# Records',
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

        var chart = new google.visualization.ColumnChart(document.getElementById('num_status'));
        chart.draw(data, options);
      }
    };
    xhttp.open("GET", "basic_info_src/numStatus.php", true);
    xhttp.send();
  }
  function numDomains() {
    var xhttp;  
    
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var results = JSON.parse(this.responseText);
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Domains');
        data.addColumn('number', 'Count');

        data.addRows(
            results
        );

        var options = {
            title: 'Number of records by domain url',
            titleTextStyle: {
                color: 'rgb(184, 233, 233)'
            },
            focusTarget: 'category',
            width:1900,
            height:400,
            backgroundColor: { fill:'transparent' },
            colors: ['#E9CF72'],
            bar: {
                groupWidth: 20
            },
            hAxis: {
            gridlines: {color: '#1E4D6B'},
            title: 'Domains',
            
            
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
            title: '# Records',
            textStyle: {
                fontSize: 18,
                color: '#600098',
                bold: false,
                italic: false
            },
            titleTextStyle: {
                fontSize: 18,
                color: '#600098',
                bold: true,
                italic: false
            }
            }
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('num_domains'));
        chart.draw(data, options);
      }
    };
    xhttp.open("GET", "basic_info_src/numDomains.php", true);
    xhttp.send();
  }
  function numSuppliers() {
    var xhttp;  
    
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var results = JSON.parse(this.responseText);
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Suppliers');
        data.addColumn('number', 'Count');

        data.addRows(
            results
        );

        var options = {
            title: 'Number of records by internet supplier',
            titleTextStyle: {
                color: 'rgb(184, 233, 233)'
            },
            focusTarget: 'category',
            width:500,
            height:400,
            backgroundColor: { fill:'transparent' },
            colors: ['#600098'],
            bar: {
                groupWidth: 40
            },
            hAxis: {
            gridlines: {color: '#1E4D6B'},
            title: 'Suppliers',
            
            
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
            title: '# Records',
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

        var chart = new google.visualization.ColumnChart(document.getElementById('num_suppliers'));
        chart.draw(data, options);
      }
    };
    xhttp.open("GET", "basic_info_src/numSuppliers.php", true);
    xhttp.send();
  }
  function avgContent() {
    var xhttp;  
    
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var results = JSON.parse(this.responseText);
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Content Type');
        data.addColumn('number', 'Average Age');

        data.addRows(
            results
        );

        var options = {
            title: 'Average age of records by content type',
            titleTextStyle: {
                color: 'rgb(184, 233, 233)'
            },
            focusTarget: 'category',
            width:900,
            height:400,
            backgroundColor: { fill:'transparent' },
            colors: ['#600098'],
            bar: {
                groupWidth: 20
            },
            hAxis: {
            gridlines: {color: '#1E4D6B'},
            title: 'Content Type',
            
            
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
            title: 'Average Age',
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

        var chart = new google.visualization.ColumnChart(document.getElementById('avg_content'));
        chart.draw(data, options);
      }
    };
    xhttp.open("GET", "basic_info_src/avgContent.php", true);
    xhttp.send();
  }