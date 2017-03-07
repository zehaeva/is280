<!DOCTYPE html>
<html>
	<head>
		<title>MV Go Club Games</title>
	</head>
	<body>
<?php
  include('../menu.php');
?>
		<div id="title">Go Games Records</div>
  
		<div id="game-app"><ul><games v-for="details in gameList" v-bind:game="details"></ul></div>
  		<script type="text/javascript">
Vue.component('games', 
{
	props: {
		data: Array, 
		columns: Array,
		filterKey: String
	}, 
	template: #grid-template, 
	data: function () {
		var sortOrders = {}
		this.columns.forEach(function (key) {
			sortOrders[key] = 1
		})
		return {
			sortKey: '',
			sortOrders: sortOrders
		}
	},
	computed: {
		filteredData: function () {
			var sortKey = this.sortKey
			var filterKey = this.filterKey && this.filterKey.toLowerCase()
			var order = this.sortOrders[sortKey] || 1
			var data = this.data
			if (filterKey) {
				data = data.filter(function (row) {
					return Object.keys(row).some(function (key) {
						return String(row[key]).toLowerCase().indexOf(filterKey) > -1
					})
				})
			}
			if (sortKey) {
				data = data.slice().sort(function (a, b) {
					a = a[sortKey]
					b = b[sortKey]
					return (a === b ? 0 : a > b ? 1 : -1) * order
				})
			}
			return data
		}
	},
	filters: {
		capitalize: function (str) {
			return str.charAt(0).toUpperCase() + str.slice(1)
		}
	},
	methods: {
		sortBy: function (key) {
			this.sortKey = key
			this.sortOrders[key] = this.sortOrders[key] * -1
		}
	}
});
			var gameapp = new Vue({el: '#game-app', data: {gameList: [{name:'Howard'}, {name:'Andrew'}, {name:'Michael'}, {name: 'Ryan'}]}})
		</script>

	</body>
</html>
