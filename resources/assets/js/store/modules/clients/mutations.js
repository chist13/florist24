import * as types from './mutation-types'

export default {
    [types.ALL](state, clients) {
        state.items = clients
    },
    [types.DESTROY](state, id) {
        state.items.data = state.items.data.filter(e => e.id !== id)
    },
    [types.CREATE](state, user) {
        state.items.data.push(user)
    },
    [types.UPDATE](state, user) {
        state.items.data = state.items.data.map(e => e.id === user.id ? user : e)
    }
}