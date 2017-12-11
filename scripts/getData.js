function loadID(id) {
    if (id == 'empty') {
        console.log("loadID not ok - #" + id);        
    } else {
        $("#" + id).load("controller/" + id + ".php", function(responseTxt, statusTxt, xhr){
            if(statusTxt == "success")
                console.log("loadID ok - #" + id);
            if(statusTxt == "error")
                alert("Error: " + xhr.status + ": " + xhr.statusText);
        });
    }
}

function loadMain(file) {
    $("#main_section").load("controller/" + file + ".php", function(responseTxt, statusTxt, xhr){
        if(statusTxt == "success")
            console.log("loadMain ok - #" + file);
        if(statusTxt == "error")
            alert("Error: " + xhr.status + ": " + xhr.statusText);
    });
}