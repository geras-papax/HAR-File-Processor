// Upload file
var modal = document.getElementById("myModal");

function uploadFile() {

    var files = document.getElementById("file").files;
    

    if(files.length > 0 ){

      var fr = new FileReader();
      //while i read the file i delete the sensitive data and send the updated to php
      fr.onload = function(e) { 
         console.log(e);
         //filtering file's data
         try {
            var result = JSON.parse(e.target.result);
        } catch (e) {
            if (e instanceof SyntaxError) {
                alert("There has been a problem with the har file. Please try another one.")
            }
        }  
         var length = result.log.entries.length;
         for(var i=0; i<length; i++)
         {
            delete result.log.entries[i].request.postData;
         }
         var formatted = JSON.stringify(result, null, 2);
         var data = formatted;
         console.log(formatted);

         var xhttp = new XMLHttpRequest();
         var formData = new FormData();
         formData.append("file", files[0]);
         formData.append("data",data);

         // Set POST method and ajax file path
         xhttp.open("POST", "ajax_upload.php", true);
         // call on request changes state
         xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;
            if(response == 1){
               alert("Upload successfully.");
               modal.style.display = "block";
            }else{
               alert("File not uploaded.");
            }
            }
         };
         xhttp.send(formData);
      }  
      //triggering the read file in order to access the file
      fr.readAsText(files.item(0));
      
    }else{
       alert("Please select a file");
    }
}
function delete_file(){
   $.ajax({
      url: 'delete.php',
      data: {},
      success: function (response) {}
    });
}

function uptoBase(){
   $.ajax({
      type: "GET",
      url: "sendDatabase.php" ,
      data: {},
  });
   modal.style.display = "none";
   location.reload();
}

function download(){
   $.get('welcomev2.php', function (data) {
      var link = document.createElement("a");
      link.setAttribute('download', 'filtered.har');
      link.href = data;
      document.body.appendChild(link);
      link.click();
      link.remove();
   });
   modal.style.display = "none";
   location.reload();
}

const password1 = document.querySelector("#signup-password");
const password2 = document.querySelector("#signup-password-confirm");
const btn = document.querySelector("#sign-up-btn");

//check if password and confirm password match
btn.onclick = function checkPassword() { 
	if(password1.value != password2.value){
		alert ("\nPassword did not match: Please try again...")
		return false;
   }
   location.reload();	
} 

function showStats() {
   var xhttp;  
   
   xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
     if (this.readyState == 4 && this.status == 200) {
       document.getElementById("stats_field").innerHTML = this.responseText;
     }
   };
   xhttp.open("GET", "show_stats.php", true);
   xhttp.send();
 }

//Map Section
let mymap = L.map('mapid');
let tiles = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {foo: 'bar'});
tiles.addTo(mymap);
mymap.setView([38.2462420, 21.7350847], 6);


function reqListener () {
   console.log(this.responseText);
}

var data;
var oReq = new XMLHttpRequest(); 
oReq.onload = function() {

   data = JSON.parse(this.responseText);
   let testData = data;
   let cfg = {"radius": 40,
   "maxOpacity": 0.8,
   "scaleRadius": false,
   "useLocalExtrema": false,
   latField: "lat",
   lngField: "lng",
   valueField: "count"};
   let heatmapLayer = new HeatmapOverlay(cfg);
   mymap.addLayer(heatmapLayer);
   heatmapLayer.setData(testData);
   
};
oReq.open("get", "map_data.php", true);

oReq.send();
