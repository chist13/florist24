import Vuex from 'vuex'

/**
 * modules
 */
import clients from './modules/clients'

export default new Vuex.Store({
    modules: {
        clients
    },
    /**
     * If strict mode should be enabled.
     */
    strict: process.env.NODE_ENV !== 'production'
});