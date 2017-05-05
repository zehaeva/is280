<?php
include_once('inc/db.php');
include_once('inc/functions.php');
include_once('menu.php');
include_once('bootstrap-cdn.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>MV Go Club Games</title>
		<script src="https://unpkg.com/vue/dist/vue.js"></script>
		<?php echo get_scripts(); ?>
	</head>
	<body>
<?php
  print(menu(2));
?>
		<!-- component template -->
<script type="text/x-template" id="grid-template"><div class="gtable">
<div class="gthrow"><div v-for="key in columns"@click="sortBy(key)" :class="{ active: sortKey == key, gtcell: true }">{{ header[key] | capitalize }}<span class="arrow" :class="sortOrders[key] > 0 ? 'asc' : 'dsc'"></span></div></div>
<?php
	if (isset($_SESSION['user_name'])) {
		echo '<div class="gtrow"><div class="gtcell" v-for="key in columns"><input class="form-control" :type="types[key]" :name="key" /></div><div class="gtcell"><button type=submit class="form-control">Add</button></div>
</div>';
//<div class="gcell"><button type=submit class="form-control">Add</button></div>
	}
?>
	<div class="gtrow" v-for="entry in filteredData"><div class="gtcell" v-for="key in columns">{{entry[key]}} </div></div>
</div></script>

		<div class="container">
			<div class="panel">
				<div class="panel-title"><h3>Go Games Records</h3></div>
		 		<div class="panel-body"> 
					<div id="game-app"><ul><games v-for="details in gameList" v-bind:game="details"></ul></div>

					<div id="demo">
					  <form id="search">
						Search <input name="query" class="form-control" v-model="searchQuery">
					  </form>
					  <demo-grid
						:data="gridData"
						:columns="gridColumns"
						:types="gridTypes"
						:header="gridHeader"
						:filter-key="searchQuery">
					  </demo-grid>
					</div>

					<script src="<?php echo get_http(); ?>://<?php echo $_SERVER['SERVER_NAME'] .'/js/mvgoclub.js'; ?>" type="text/javascript"></script>
				</div>
			</div>
		</div>
	</body>
</html>
