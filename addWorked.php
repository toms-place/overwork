<?php include 'meta.php'; ?>
<title>addWorked</title>

<meta name="description" content="addWorked">
<meta name="keywords" content="HTML, CSS, PHP, JavaScript">
<meta name="author" content="Thomas Weber">
</head> <body> <main>

<?php
include 'site/header.php';

include 'site/nav.php';

echo "<aside>";
require 'site/asideAddWorked.php';
echo "</aside>";

echo "<section><div class='tableSection' id='main_section'>";
require 'views/addWorked.php';
echo "</div></section>";

include 'site/footer.php';
?>

</main> </body> </html>