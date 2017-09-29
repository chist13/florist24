<template>
    <li class="nav-header">
        <my-dropdown class="profile-element">

            <ul class="animated fadeInRight m-t-xs">
                <li><a href="#" @click.prevent="">Profile</a></li>
                <li><a href="#" @click.prevent="">Contacts</a></li>
                <li><a href="#" @click.prevent="">Mailbox</a></li>
                <li class="divider"></li>
                <li><a href="#" @click.prevent="">Logout</a></li>
            </ul>

            <div slot="trigger">
                <span>
                    <img alt="image" class="img-circle" src="http://webapplayers.com/inspinia_admin-v2.7.1/img/profile_small.jpg">
                </span>

                <a class="dropdown-toggle" href="#" @click.prevent="">
                    <span class="clear">
                        <span class="block m-t-xs">
                            <strong class="font-bold">David Williams</strong>
                        </span>
                        <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                    </span>
                </a>
            </div>
        </my-dropdown>

        <div class="logo-element">
            F24
        </div>
    </li>
</template>

<script>
    export default {}
</script>

<style lang="sass" scoped></style>