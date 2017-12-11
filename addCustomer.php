<?php include 'meta.php'; ?>
<title>addCustomer</title>
<meta name="description" content="addCustomer">
<meta name="keywords" content="HTML, CSS, PHP, JavaScript">
<meta name="author" content="Thomas Weber">
</head> <body> <main>

<?php
include 'header.php';

include 'nav.php';

echo "<aside>";
require 'aside/asideAddCustomer.php';
echo "</aside>";

echo "<section><div class='tableSection' id='main_section'>";
require 'views/addCustomer.php';
echo "</div></section>";

include 'footer.php';
?>

</main> </body> </html>