<template>
    <div>
        <navigation></navigation>

        <div id="page-wrapper" class="gray-bg">

            <!-- navigation -->
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top white-bg" style="margin-bottom: 0">

                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary" href="#" @click.prevent="toggleSidebar"><i class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" method="post" action="/">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search" />
                            </div>
                        </form>
                    </div>

                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <a href="#" @click.prevent="">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>
            <!-- end navigation -->

            <slot/>

            <!-- footer -->
            <div class="footer">
                <div class="pull-right">
                    Example text
                </div>
                <div>
                    <strong>Copyright</strong> Example Company &copy; 2014-2017
                </div>
            </div>
            <!-- end footer -->
        </div>
    </div>
</template>

<script>
    import Navigation from './navigation/Navigation'

    export default {
        components: {
            'navigation': Navigation
        },
        methods: {
            toggleSidebar() {
                this.$event.$emit('navigation:minimalize')
            }
        }
    }
</script>