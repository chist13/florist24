import Transformer from '../../../transformers/ClientTransformer'
import * as types from './mutation-types'

import Client from '../../../proxies/clientProxy'

export default {
    all({commit}) {
        return new Client()
            .all()
            .then(res => commit(types.ALL, Transformer.fetch(res)))
    },
    destroy({commit}, id) {
        return new Client()
            .destroy(id)
            .then(res => commit(types.DESTROY, id))
    },
    create({commit}, user) {
        return new Client()
            .create(user)
            .then(res => commit(types.CREATE, res))
    },
    update({commit}, user) {
        return new Client()
            .update(user.id, user)
            .then(res => commit(types.UPDATE, res))
    }
}