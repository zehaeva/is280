<!DOCTYPE html>
<html>
	<head>
		<title>View Open Invoices</title>
		<link rel="stylesheet" href="php_styles.css" type="text/css" />
		<script type="text/javascript">
		</script>
	</head>
	<body>
		<h1>View Open Invoices</h1>
		<?php
		//	directory for the open invoices
			$dir = "open";
			
		//	does the directory exist?
			if (is_dir($dir)) {
			//	well lets look through it then
				$dir_entries = scandir($dir);
				foreach ($dir_entries as $entry) {
					if (strpos($entry, '.txt') !== false) {
						echo $entry ."<br />";
					}
				}
			}
			else {
				echo '<p>The "open" directory does not exist. You must first save an Invoice to create the "open" directory</p>';
			}
		?>
	</body>
</html>