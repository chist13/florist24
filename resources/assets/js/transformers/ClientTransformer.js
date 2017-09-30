import Transformer from './Transformer'

export default class ClientTransformer extends Transformer {
	static fetch(clients) {
		return {
			data: clients.data,
			meta: {
				currentPage: clients.current_page,
				from: clients.from,
				lastPage: clients.last_page,
				nextPageUrl: clients.next_page_url,
				perPage: clients.per_page,
				prevPageUrl: clients.prev_page_url,
				to: clients.to,
				total: clients.total
			}
		}
	}

	static send(clients) {
		return clients
	}
}