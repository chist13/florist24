import Vue from 'vue'

/**
 * plugins
 */
import './plugins/axios'
import router from './plugins/vue-router'
import './plugins/snotify'
import './plugins/vue-tabs'
import './plugins/vuetable'
import './plugins/event'
import './plugins/vuex'

/**
 * shared
 */
import './shared'

/**
 * main app
 */
import App from './App'
import store from './store'

Vue.config.productionTip = false

new Vue({
    render: h => h(App),
    store,
    router,
    el: '#app'
})


