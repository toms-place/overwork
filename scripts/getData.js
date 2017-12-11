
//load Data into ID 
function loadID(id) {
    $("#" + id).load("controller/" + id + ".php", function(responseTxt, statusTxt, xhr){
        if(statusTxt == "success")
            console.log("loadID ok - #" + id);
        if(statusTxt == "error")
            alert("Error: " + xhr.status + ": " + xhr.statusText);
    });
}



//this funciton gets the input controller file and loads it to the main/body
function loadMain(file) {
    $("#main_section").load("controller/" + file + ".php", function(responseTxt, statusTxt, xhr){
        if(statusTxt == "success")
            console.log("loadMain ok - #" + file);
        if(statusTxt == "error")
            alert("Error: " + xhr.status + ": " + xhr.statusText);
    });
}