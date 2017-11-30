<?php include 'meta.php'; ?>
<title>addCustomer</title>
<meta name="description" content="addCustomer">
<meta name="keywords" content="HTML, CSS, PHP, JavaScript">
<meta name="author" content="Thomas Weber">
</head> <body> <main>

<?php
include 'site/header.php';

include 'site/nav.php';

echo "<aside>";
require 'site/asideAddCustomer.php';
echo "</aside>";

echo "<section><div class='tableSection' id='main_section'>";
require 'views/addCustomer.php';
echo "</div></section>";

include 'site/footer.php';
?>

</main> </body> </html>