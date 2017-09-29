import Vue from 'vue'
import Snotify from 'vue-snotify'

Vue.use(Snotify, {
    config: {
        titleMaxLength: 100,
        bodyMaxLength: 100
    },
})