Vue.component('members', {
    props: ['member'],
    template: '<li class="list-group-item"><memberName :mData="member"></memberName> <a v-if="member.aga_id > 0" :href="\'http://www.usgo.org/ratings-lookup-id?PlayerID=\' + member.aga_id" >AGA Rank Info</a><div v-if="member.pandanet"> Pandanet User Name: {{member.pandanet}}</div></div></li>'
});

var member = {
    user_id: null,
    given_name: null,
    sur_name: null,
	aga_id: null,
	pandanet: null
}

Vue.component('memberName', {
	props: ['mData', 'id'],
	template: '<div>{{this.mData.given_name}} {{this.mData.sur_name}}</div>',
});

var membersapp = new Vue({
  	el: '#member-app',
	data: {memberList: null},
	created: function() {
		this.fetchData()
	},
	methods: {
		fetchData: function() {
			var xhr = new XMLHttpRequest()
			var self = this
			xhr.open('GET', window.location.origin + '/api/members/')
			xhr.onload = function() {
				self.memberList = JSON.parse(xhr.responseText)
			}
			xhr.send()
		}
	}
})

// register the grid component
Vue.component('demo-grid', {//{{{
	template: '#grid-template',
	props: {
		data: Array,
		columns: Array,
		header: Object,
		filterKey: String
	},
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
})//}}}

//bootstrap the demo
var demo = new Vue({
	el: '#demo',
	data: {
		searchQuery: '',
		gridColumns: ['black_player_name', 'white_player_name', 'date_played', 'date_uploaded' ],
		gridHeader: {black_player_name: 'Black Player', white_player_name: 'White Player', date_played: 'Date Played', date_uploaded: 'Date Uploaded' },
		gridData: null
	},
	created: function() {
		this.fetchData()
	},
	methods: {
		fetchData: function() {
			var xhr = new XMLHttpRequest()
			var self = this
			xhr.open('GET', window.location.origin + '/api/games/')
			xhr.onload = function() {
				self.gridData = JSON.parse(xhr.responseText)
			}
			xhr.send()
		}
	}
})
