import Proxy from './Proxy'

export default class ClientProxy extends Proxy {
    constructor(parameters = {}) {
        super('api/clients', parameters)
    }
}