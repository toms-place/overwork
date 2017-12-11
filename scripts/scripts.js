/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function toggleNav() {
    var x = document.getElementById("myTopnav");
    if (x.className === "clearfix topnav") {
        x.className += " responsive";
    } else {
        x.className = "clearfix topnav";
    }
}

function changeDefaultSelect() {
    $.get( "controller/selectedName.php", function(data) {
        $("#selectName option").each(function() {
                y = $(this).text();
                if (y == data) {
                    $(this).prop('selected', true);}
        });
    });
}