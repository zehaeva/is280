<?php
include_once('inc/db.php');
include_once('inc/functions.php');
include_once('menu.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>MV Go Club Games</title>
		<script src="https://unpkg.com/vue/dist/vue.js"></script>
		<?php include_once('bootstrap-cdn.php'); ?>
	</head>
	<body>
<?php
  print(menu(2));
?>
		<!-- component template -->
		<script type="text/x-template" id="grid-template"><table class="table table-hover"><thead><tr><th v-for="key in columns"@click="sortBy(key)":class="{ active: sortKey == key }">{{ header[key] | capitalize }}<span class="arrow" :class="sortOrders[key] > 0 ? 'asc' : 'dsc'"></span></th></tr></thead><tbody><tr v-for="entry in filteredData"><td v-for="key in columns">{{entry[key]}}</td></tr></tbody></table></script>

		<div class="container">
			<div class="panel">
				<div class="panel-title"><h3>Go Games Records</h3></div>
		 		<div class="panel-body"> 
					<div id="game-app"><ul><games v-for="details in gameList" v-bind:game="details"></ul></div>

					<div id="demo">
					  <form id="search">
						Search <input name="query" v-model="searchQuery">
					  </form>
					  <demo-grid
						:data="gridData"
						:columns="gridColumns"
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
