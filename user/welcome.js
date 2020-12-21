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
         var result = JSON.parse(e.target.result);
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
      //thiggering the read file in order to access the file
      fr.readAsText(files.item(0));
      
    }else{
       alert("Please select a file");
    }
}

function uptoBase(){
   modal.style.display = "none";
}

function download(){
   $.get('welcomev2.php', function (data) {
      var link = document.createElement("a");
      // If you don't know the name or want to use
      // the webserver default set name = ''
      link.setAttribute('download', 'filtered.har');
      link.href = data;
      document.body.appendChild(link);
      link.click();
      link.remove();
   });
   modal.style.display = "none";
}