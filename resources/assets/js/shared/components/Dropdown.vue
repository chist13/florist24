<template>
    <div class="dropdown" :class="{open: active}">
        <div @click="toggle">
            <slot name="trigger">dropdown</slot>
        </div>

        <slot></slot>
    </div>
</template>

<script>
    export default {
        name: 'Dropdown',
        data() {
            return {
                active: false
            }
        },
        mounted() {
            const vnode = this.$slots.default.find(({elm}) => elm.nodeType == 1)

            if (vnode) {
                vnode.elm.classList.add('dropdown-menu')
            }
        },
        methods: {
            open() {
                this.active = true
                document.addEventListener('click', this._onOutsideClick)
            },
            close() {
                this.active = false
                document.removeEventListener('click', this._onOutsideClick)
            },
            toggle() {
                this.active ? this.close() : this.open()
            },
            _onOutsideClick(event) {
                this.$el.contains(event.target) || this.close()
            }
        }
    }
</script>

<style lang="sass" scoped></style>