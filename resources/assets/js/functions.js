export function animateCSS(nodes, animationName) {
	Array.isArray(nodes) || (nodes = [nodes])

	const eventNames = ['webkitAnimationEnd', 'mozAnimationEnd', 'MSAnimationEnd', 'oanimationend', 'animationend']

	nodes.forEach(node => {
		if (node.classList.contains('animated')) {
			node.classList.remove('animated', animationName)
			void node.offsetWidth
		}

		node.classList.add('animated', animationName)

		eventNames.forEach(eventName => {
			node.addEventListener(eventName, function func() {
				node.classList.remove('animated', animationName)

				node.removeEventListener(eventName, func)
			})
		})
	})
}