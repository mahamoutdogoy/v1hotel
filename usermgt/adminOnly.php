<?php
	if ($_SESSION['user']['role'] !== "admin" && $_SESSION['user']['role'] !== "Admin") {
		session_destroy();?>
		<script>window.location = "../hotellogin.php"</script>
	<?php }
?>