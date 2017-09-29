export default {
    bind(el, binding) {
        let input
        let initialValue

        el.addEventListener('click', onclick)

        function onclick(e) {
            /**
             * wrap innertext into input
             */
            input = document.createElement('input')
            input.value = initialValue = el.innerText
            input.style.fontSize = 'inherit'
            input.style.fontWeight = 'inherit'
            input.style.maxWidth = '100%'
            input.style.color = 'inherit'
            input.classList.add('_v-editable')

            el.textContent = ''
            el.append(input)

            input.focus()

            /**
             * switch listeners
             * click -> enter & blur
             */
            window.addEventListener('keypress', onenter)
            input.addEventListener('blur', onleave)

            el.removeEventListener('click', onclick)
        }

        function onenter(e) {
            if (e.keyCode === 13) {input.blur()}
        }

        function onleave() {
            let currentValue = input.value

            /**
             * apply transformers
             */
            if (binding.modifiers['trim']) {
                currentValue = currentValue.trim()
            }

            /**
             * notify user if there was changes
             */
            if (initialValue != currentValue) {
                const callback = binding.value
                const editableValiableName = binding.arg

                callback(editableValiableName, currentValue)
            }

            /**
             * element takes initial form back
             */
            el.removeChild(input)
            el.textContent = currentValue

            /**
             * switch listeners
             * enter & blur -> click
             */
            window.removeEventListener('keypress', onenter)

            el.addEventListener('click', onclick)
        }
    },

    unbind() {
        window.removeEventListener('keypress', onenter)
    }
}