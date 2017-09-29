<template>
    <div id="app">

        <layout>
            <transition name="page" mode="out-in">
                <keep-alive>
                    <router-view></router-view>
                </keep-alive>
            </transition>
        </layout>

        <vue-snotify></vue-snotify>

    </div>
</template>

<script>
    import Layout from './layouts/Default'

    export default {
        components: {
            'layout': Layout
        },
        mounted() {
            setTimeout(n => document.body.classList.add('pace-done'), 200)
        }
    }
</script>