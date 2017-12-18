/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function toggleNav() {
    var x = document.getElementById("myTopnav");
    if (x.className === "clearfix topnav") {
        x.className += " responsive";
    } else {
        x.className = "clearfix topnav";
    }
}

/* Toggle the selected user */
function changeDefaultSelect() {
    $.get( "model/getSelectedCustomerID.php", function(data) {
        $("#getCustomerNamesAsOptions option").each(function() {
            for (x=0; x < $(this).length; x++){
                y = $(this)[x].value;
                if (y == data) {
                    $(this).prop('selected', true);
                }
            }                
        });
    });
}