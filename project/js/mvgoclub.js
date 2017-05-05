
Vue.component('members', {
    props: ['member'],
    template: '<li class="list-group-item"><memberName :mData="member"></memberName> <AGALink :mData="member" /><KGSLink :mData="member" /><OGSLink :mData="member" /><PandaNetLink :mData="member" /></li>'
});

var member = {//{{{
    user_id: null,
    given_name: null,
    sur_name: null,
	aga_id: null,
	ogs_id: null,
	kgs_id: null,
	pandanet: null
}//}}}

Vue.component('memberName', {//{{{
	props: ['mData', 'id'],
	template: '<div>{{this.mData.given_name}} {{this.mData.sur_name}}</div>',
});//}}}

Vue.component('OGSLink', {//{{{
	props: ['mData', 'id'],
	template: '<div v-if="this.mData.ogs_id > 0">OGS ID: <a :href="\'https://www.online-go.com/player/\' + this.mData.ogs_id + \'/\'">{{this.mData.ogs_id}}</a></div>',
});//}}}

Vue.component('KGSLink', {//{{{
	props: ['mData', 'id'],
	template: '<div v-if="this.mData.kgs_id">KGS: {{this.mData.kgs_id}}</div>',
});//}}}

Vue.component('AGALink', {//{{{
	props: ['mData', 'id'],
	template: '<a v-if="this.mData.aga_id > 0" :href="\'http://www.usgo.org/ratings-lookup-id?PlayerID=\' + this.mData.aga_id" >AGA Rank Info</a></a>',
});//}}}

Vue.component('PandaNetLink', {//{{{
	props: ['mData', 'id'],
	template: '<div v-if="this.mData.pandanet"> Pandanet User Name: {{this.mData.pandanet}}</div>',
});//}}}

var membersapp = new Vue({//{{{
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
})//}}}

Vue.component('member_select', {
	props: ['members'],
	template: '<option v-for="member in this.members" v-bind={{member.user_id}}>{{member.given_name}} {{member.sur_name}}</option>'
});

var game = {
	game_id: null,
	white_player: null,
	black_player: null,
	file_url: null,
	date_played: null,
	date_uploaded: null
}

Vue.component('game_input', {
	props: ['game'],
	template: '<td><select name="white_player"><member_select :members/></select></td><td><select name="black_player"><member_select :members/></select></td><td><input type=text class="datepicker" /></td>'
});

// register the grid component
Vue.component('demo-grid', {//{{{
	template: '#grid-template',
	props: {
		data: Array,
		columns: Array,
		types: Object,
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
		gridColumns: ['black_player_name', 'white_player_name', 'date_played', 'date_uploaded', 'file_url' ],
		gridTypes: {black_player_name: 'text', white_player_name: 'text', date_played: 'date', date_uploaded: 'date', file_url: 'text' },
		gridHeader: {black_player_name: 'Black Player', white_player_name: 'White Player', date_played: 'Date Played', date_uploaded: 'Date Uploaded', file_url: 'File' },
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
