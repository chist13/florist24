const eventNames = ['webkitAnimationEnd', 'mozAnimationEnd', 'MSAnimationEnd', 'oanimationend', 'animationend']

export default {
	update(el, binding) {
		/**
		 * reset previous animation
		 */
		if (el.classList.contains('animated')) {
			el.classList.remove('animated', binding.arg)
			void el.offsetWidth
		}

		/**
		* collect classes and styles
		*/
		let styles = {}

		if (binding.hasOwnProperty('value')) {
			if (binding.value.hasOwnProperty('delay'))
				styles['-webkit-animation-delay'] = styles['animation-delay'] = binding.value.delay
			if (binding.value.hasOwnProperty('duration'))
				styles['-webkit-animation-duration'] = styles['animation-duration'] = binding.value.duration
		}

		let classes = ['animated', binding.arg, ...Object.keys(binding.modifiers)]

		/**
		* insert classes and styles
		*/
		el.classList.add(...classes)

		for(const name in styles) {
			el.style[name] = styles[name]
		}

		/**
		* trigger only once
		*/
		eventNames.forEach(eventName => {
			el.addEventListener(eventName, function func() {
				/**
				* remove classes and styles
				*/
				el.classList.remove(...classes)

				for(const name in styles) {
					el.style[name] = ''
				}

				// required by once event
				el.removeEventListener(eventName, func)
			})
		})
	}
}