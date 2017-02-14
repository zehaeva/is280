<!DOCTYPE html>
<html>
	<head>
		<title>Backup Invoices</title>
		<link rel="stylesheet" href="php_styles.css" type="text/css" />
		<script type="text/javascript">
		</script>
	</head>
	<body>
		<h1>Backup Invoices</h1>
		<?php
			$source = "open";
			$destination = "backups";
			
			if (!file_exists($destination)) {
				mkdir($destination);
			}
			
			if (is_dir($source)) {
				$dir_entries = scandir($source);
				foreach($dir_entries as $entry) {
					if (strpos($entry, ".txt") !== false) {
						copy($source.'\\'.$entry, $destination.'\\'.$entry);
					}
				}
				
				echo "<p>Invoices backed up successfully</p>";
			}
			else {
				echo "<p>There are no open Invoices to backup</p>";
			}
		?>
	</body>
</html>
