import Vue from 'vue'

/**
 * components
 */
import Modal from './components/Modal'
import Button from './components/Button'
import Dropdown from './components/Dropdown'
import Table from './components/Table'

Vue.component('my-modal', Modal)
Vue.component('my-button', Button)
Vue.component('my-dropdown', Dropdown)
Vue.component('my-table', Table)

/**
 * directives
 */
import animate from './directives/animate'
import editable from './directives/editable'

Vue.directive('animate', animate)
Vue.directive('editable', editable)

/**
 * filters
 */