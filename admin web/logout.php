<?php
session_start();
session_destroy();
echo "<meta http-equiv='refresh' content='1 URL=index.php'>";
echo "<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
		<p align=\"center\">Please Wait...<br /><img src=images/loading.gif /></p>";
?>