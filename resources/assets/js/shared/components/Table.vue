<template>
    <table class="table table-striped table-hover" style="text-align: left">

        <thead>
            <tr>
                <th v-for="field in tableFields">{{field.title}}</th>
            </tr>
        </thead>

        <transition-group :name="transition" tag="tbody">
            <tr v-for="(item, index) in tableData" :key="item.id || index">
                <td v-for="field in tableFields">
                    <template v-if="field.name.startsWith('__slot:')"><slot :name="field.name.split(':')[1]" :item="item"></slot></template>
                    <template v-else>{{ item[field.name] }}</template>
                </td>
            </tr>
        </transition-group>

    </table>
</template>

<script>
    import Component from 'vue-class-component'
    import Vue from 'vue'

    @Component({
        props: {
            data: [Object, Array],
            fields: {required: true, type: Array},
            transition: {default: 'list'},
            dataPath: {default: 'data'},
            metaPath: {default: 'meta'}
        }
    })
    export default class MyTable extends Vue {
        count = 0

        get tableFields() {
            return this.fields.map(e => typeof e === 'string' ? {title: e.charAt(0).toUpperCase() + e.slice(1), name: e} : e)
        }

        get tableData() {
            return this.data[this.dataPath]
        }

        get tableMeta() {
            return this.data[this.metaPath]
        }
    }
</script>