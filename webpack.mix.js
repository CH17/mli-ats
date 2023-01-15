const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.styles(
    [
        "resources/frontend/css/bootstrap.css",
        "resources/frontend/font-awesome/css/font-awesome.css",
        "resources/frontend/css/animate.css",
        "resources/frontend/css/sweetalert.css",
        "resources/frontend/css/style.css",
        "resources/frontend/css/datepicker3.css",
        "resources/frontend/css/plugins/chosen/chosen.css",
        "resources/frontend/css/awesome-bootstrap-checkbox.css",
        "resources/frontend/css/plugins/steps/jquery.steps.css"
    ],
    "public/frontend/css/app.css"
);

/**
 * Frontend js mix
 */
mix.scripts(
    [
        "resources/frontend/js/jquery-2.1.1.js",        
        "resources/frontend/js/jquery-ui.min.js",        
        "resources/frontend/js/bootstrap.js",
        "resources/frontend/js/plugins/chosen/chosen.jquery.js",
        "resources/frontend/js/plugins/datapicker/bootstrap-datepicker.js",
        "resources/frontend/js/plugins/staps/jquery.steps.min.js",
        "resources/frontend/js/sweetalert.min.js",
        "resources/frontend/js/custom.js"
    ],
    "public/frontend/js/app.js"
);

/**
 * Backend css mix
 */

mix.styles(
    [
        "resources/backend/css/bootstrap.css",
        "resources/backend/font-awesome/css/font-awesome.css",
        "resources/backend/css/animate.css",
        "resources/backend/css/datepicker3.css",
        "resources/backend/css/plugins/chosen/chosen.css",
        "resources/backend/css/awesome-bootstrap-checkbox.css",
        "resources/backend/css/sweetalert.css",
        "resources/backend/css/style.css"
    ],
    "public/backend/css/app.css"
);

/**
 * Backend js mix
 */
mix.scripts(
    [
        "resources/backend/js/jquery-2.1.1.js",
        "resources/backend/js/jquery-ui.min.js",
        "resources/backend/js/bootstrap.js",
        "resources/backend/js/plugins/metisMenu/jquery.metisMenu.js",
        "resources/backend/js/plugins/slimscroll/jquery.slimscroll.min.js",
        "resources/backend/js/plugins/datapicker/bootstrap-datepicker.js",
        "resources/frontend/js/plugins/chosen/chosen.jquery.js",
        "resources/backend/js/inspinia.js",
        "resources/backend/js/sweetalert.min.js",
        "resources/backend/js/custom.js"
    ],
    "public/backend/js/app.js"
);
