<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>florist24</title>

    <script async src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>

    <link rel="stylesheet" href="<?php echo asset('css/vendor.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/app.css'); ?>" />

    <style>
        .bg-warn {
            background-color: firebrick
        }

        .bg-accent {
            background-color: forestgreen
        }

        .my-gender >span {
            width: 2em;
            height: 2em;
            margin: auto;
            display: flex;
            color: white;
            justify-content: center;
            align-items: center;
        }

        #page-wrapper {
            min-height: 100vh;
        }

        .client-detail {
            height: initial !important;
            min-height: 400;
        }
    </style>
</head>
<body>

    <div id="app">
        <?php echo $__env->make('partials/navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div id="page-wrapper" class="gray-bg">

            <?php echo $__env->make('partials/navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <transition name="page" mode="out-in">
                <keep-alive>
                    <router-view></router-view>
                </keep-alive>
            </transition>

            <!-- Footer -->
            <?php echo $__env->make('partials/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </div>
    </div>

<script defer src="<?php echo asset('js/app.js'); ?>"></script>

</body>
</html>