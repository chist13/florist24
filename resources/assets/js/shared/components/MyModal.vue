<template>
    <div class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true" :style="{display: state ? 'block' : 'none'}">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" @click="close(); $emit('reject')"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <slot name="header"/>
                </div>
                <div class="modal-body">
                    <slot/>
                </div>
                <div class="modal-footer">
                    <slot name="controls">
                        <button type="button" class="btn btn-white" @click="close(); $emit('reject')">Close</button>
                        <button type="button" class="btn btn-primary" @click="close(); $emit('submit')">Submit</button>
                    </slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        data() {
            return {
                state: false
            }
        },

        methods: {
            close() {
                this.state = false
            },
            open() {
                this.state = true
            },
            toggle() {
                this.state = !this.state
            }
        }
    }
</script>
