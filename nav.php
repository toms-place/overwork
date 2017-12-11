<nav class="clearfix topnav" id="myTopnav">
    

    <a href="index.php" >HOME</a>

    <?php
    //Nav List - defines which data to get
    $nav = array("customers", "worked", "payment", "overview");
    $navlength = count($nav);

    for ($x = 0; $x <= $navlength - 1; $x++) {

        $site = strtoupper($nav[$x]);

        echo "<a href='javascript:void(0);' class='navLink' onclick=\"loadMain('$nav[$x]')\">$site</a>";
    } 
    ?>
    
    <a href="addCustomer.php" >NewCUSTOMER</a>

    <a href="javascript:void(0);" class="icon" onclick="toggleNav()">&#9776; MENU</a>

</nav>