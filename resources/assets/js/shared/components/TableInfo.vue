<template lang="pug">
    div.pagination-info
        template(v-if="meta.total") From {{ meta.from }} to {{ meta.to }} - shows {{ meta.to - meta.from + 1 }} from {{ meta.total }}
        template(v-else="") No info
</template>

<script>
    import Component from 'vue-class-component'
    import Vue from 'vue'

    @Component({
        props: ['meta']
    })
    export default class TableInfo extends Vue {}
</script>

<style lang="sass" scoped>
    div
        line-height: 25px
</style>