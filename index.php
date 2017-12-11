<?php include 'meta.php'; ?>
<title>OVERWORK</title>
<meta name="description" content="Manage my Income">
<meta name="keywords" content="HTML, CSS, PHP, JavaScript">
<meta name="author" content="Thomas Weber">
</head> <body> <main>

<?php
include 'header.php';

include 'nav.php';

echo "<aside>";
require 'aside/asideSetCustomer.php';
echo "</aside>";

echo "<section><div class='tableSection' id='main_section'>";
require 'views/home.php';
echo "</div></section>";

include 'footer.php';
?>

</main> </body> </html>