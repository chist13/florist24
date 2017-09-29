<template>
    <li class="tr-3" :class="{active: active}" v-cloak>
        <a href="#" @click.prevent="toggle()">
            <i class="fa" :class="['fa', item.icon ? 'fa-' + item.icon : 'fa-home']"></i>
            <span class="nav-label">{{item.label}}</span>
            <span class="fa arrow"></span>
        </a>

        <ul class="nav nav-second-level" :class="{in: active}">
            <router-link
                v-for="(subItem, i) in item.children"
                :key="i"
                class="tr-3"
                exact tag="li"
                :to="subItem.to"
            >
                <a href="#">{{subItem.label}}</a>
            </router-link>
        </ul>
    </li>
</template>

<script>
    export default {
        props: ['item'],
        data() {
            return {
                active: false
            }
        },
        methods: {
            open() {
                this.$emit('open')
                this.active = true
            },
            close() {
                this.$emit('close')
                this.active = false
            },
            toggle() {
                this.active ? this.close() : this.open()
            }
        }
    }
</script>

<style lang="sass" scoped>
    .mini-navbar .nav-second-level:not(.in)
        opacity: 0
    .nav-second-level
        max-height: 0
        transition: max-height .5s

        overflow: hidden
        &.in
            max-height: 200px
</style>