export default [
	{
		path: '/',
		name: 'home',
		component: require('./pages/Home')
	},
	{
		path: '/clients',
		name: 'clients',
		component: resolve => require(['./pages/Clients/Clients'], resolve)
	}
]