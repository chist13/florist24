<template>
    <nav class="navbar-default navbar-static-side">
        <div class="sidebar-collapse">
            <ul class="nav metismenu">

                <navigation-header/>

                <template v-for="item in list">

                    <navigation-dropdown ref="dropdowns" v-if="hasChildren(item)" :item="item" @open="openDropdown"/>

                    <router-link v-else class="tr-3" exact tag="li" :to="item.to" @click.native="openDropdown">
                        <a href="#">
                            <i :class="['fa', item.icon ? 'fa-' + item.icon : 'fa-home']"></i>
                            <span class="nav-label" v-text="item.label"></span>
                            <span class="label label-primary pull-right">NEW</span>
                        </a>
                    </router-link>

                </template>

            </ul>
        </div>
    </nav>
</template>

<script>
    import { animateCSS } from '../../functions'
    import config from './config.json'

    export default {
        data: () => ({
            list: config,
            isMini: false
        }),
        mounted() {
            this.$event.$on('navigation:minimalize', n => this.toggle())
        },
        watch: {
            isMini(old, value) {
                document.body.classList[value ? 'remove' : 'add']('mini-navbar')
            }
        },
        components: {
            'navigation-header': require('./NavigationHeader'),
            'navigation-dropdown': require('./NavigationDropdown')
        },
        methods: {
            hasChildren(item) {
                return item.pathName == null && item.children && item.children.length > 0
            },
            openDropdown() {
                this.$refs.dropdowns.map(e => e.active ? e.close() : '')
            },
            toggle() {
                if (this.isMini) {
                    animateCSS(document.querySelector('.metismenu'), 'fadeIn')
                }
                this.isMini = !this.isMini
            }
        }
    }
</script>

<style>
    .metismenu {
        animation-delay: .15s;
    }
</style>