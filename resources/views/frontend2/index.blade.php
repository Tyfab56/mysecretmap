@extends('frontend.main_master')

@section('content')
    <!doctype html>
    <html lang="en-US">

    <head>
        <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
        <style>img:is([sizes="auto" i], [sizes^="auto," i]) { contain-intrinsic-size: 3000px 1500px }</style>



        <meta charset="UTF-8">


        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="https://gmpg.org/xfn/11">
        <meta name="theme-color" content="#fff">
        <link rel="shortcut icon" type="image/png"
            href="https://overlandsummers.com/wp-content/themes/overland-summer/assets/images/default-img.png" />

        <!-- This site is optimized with the Yoast SEO plugin v24.3 - https://yoast.com/wordpress/plugins/seo/ -->
        <title>Summer Adventure Camp for Kids &amp; Teens | Overland Summers</title>
        <meta name="description"
            content="Overland Summers | Summer Adventure Camp for Kids &amp; Teens: fun, friends, adventure, and a world of promise await. Your journey begins now!" />
        <link rel="canonical" href="https://overlandsummers.com/" />
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="Summer Adventure Camp for Kids &amp; Teens | Overland Summers" />
        <meta property="og:description"
            content="Overland Summers | Summer Adventure Camp for Kids &amp; Teens: fun, friends, adventure, and a world of promise await. Your journey begins now!" />
        <meta property="og:url" content="https://overlandsummers.com/" />
        <meta property="og:site_name" content="Overland Summers" />
        <meta property="article:publisher" content="https://www.facebook.com/overlandsummers" />
        <meta property="article:modified_time" content="2024-10-02T21:31:01+00:00" />
        <meta name="twitter:card" content="summary_large_image" />
        <script type="application/ld+json" class="yoast-schema-graph">{"@context":"https://schema.org","@graph":[{"@type":"WebPage","@id":"https://overlandsummers.com/","url":"https://overlandsummers.com/","name":"Summer Adventure Camp for Kids & Teens | Overland Summers","isPartOf":{"@id":"https://overlandsummers.com/#website"},"about":{"@id":"https://overlandsummers.com/#organization"},"datePublished":"2023-10-30T18:58:59+00:00","dateModified":"2024-10-02T21:31:01+00:00","description":"Overland Summers | Summer Adventure Camp for Kids & Teens: fun, friends, adventure, and a world of promise await. Your journey begins now!","breadcrumb":{"@id":"https://overlandsummers.com/#breadcrumb"},"inLanguage":"en-US","potentialAction":[{"@type":"ReadAction","target":["https://overlandsummers.com/"]}]},{"@type":"BreadcrumbList","@id":"https://overlandsummers.com/#breadcrumb","itemListElement":[{"@type":"ListItem","position":1,"name":"Home"}]},{"@type":"WebSite","@id":"https://overlandsummers.com/#website","url":"https://overlandsummers.com/","name":"Overland Summers","description":"The premier summer adventure camp for kids &amp; teens","publisher":{"@id":"https://overlandsummers.com/#organization"},"potentialAction":[{"@type":"SearchAction","target":{"@type":"EntryPoint","urlTemplate":"https://overlandsummers.com/?s={search_term_string}"},"query-input":{"@type":"PropertyValueSpecification","valueRequired":true,"valueName":"search_term_string"}}],"inLanguage":"en-US"},{"@type":"Organization","@id":"https://overlandsummers.com/#organization","name":"Overland Summers","url":"https://overlandsummers.com/","logo":{"@type":"ImageObject","inLanguage":"en-US","@id":"https://overlandsummers.com/#/schema/logo/image/","url":"https://overlandsummers.com/wp-content/uploads/2023/10/Layer_1-7.svg","contentUrl":"https://overlandsummers.com/wp-content/uploads/2023/10/Layer_1-7.svg","width":1,"height":1,"caption":"Overland Summers"},"image":{"@id":"https://overlandsummers.com/#/schema/logo/image/"},"sameAs":["https://www.facebook.com/overlandsummers","https://www.instagram.com/overlandsummers/","https://www.linkedin.com/company/overland-travel-inc"]}]}</script>
        <!-- / Yoast SEO plugin. -->



        <link rel='dns-prefetch' href='//cdn.jsdelivr.net' />
        <link rel='dns-prefetch' href='//www.google.com' />
        <link rel="alternate" type="application/rss+xml" title="Overland Summers &raquo; Feed"
            href="https://overlandsummers.com/feed/" />
        <link rel="alternate" type="application/rss+xml" title="Overland Summers &raquo; Comments Feed"
            href="https://overlandsummers.com/comments/feed/" />
        <link rel="alternate" type="text/calendar" title="Overland Summers &raquo; iCal Feed"
            href="https://overlandsummers.com/events/?ical=1" />
        <link rel='stylesheet' id='tribe-events-pro-mini-calendar-block-styles-css'
            href='https://overlandsummers.com/wp-content/plugins/events-calendar-pro/src/resources/css/tribe-events-pro-mini-calendar-block.min.css?ver=7.4.0'
            type='text/css' media='all' />
        <style id='classic-theme-styles-inline-css' type='text/css'>
            /*! This file is auto-generated */
            .wp-block-button__link {
                color: #fff;
                background-color: #32373c;
                border-radius: 9999px;
                box-shadow: none;
                text-decoration: none;
                padding: calc(.667em + 2px) calc(1.333em + 2px);
                font-size: 1.125em
            }

            .wp-block-file__button {
                background: #32373c;
                color: #fff;
                text-decoration: none
            }
        </style>
        <style id='global-styles-inline-css' type='text/css'>
            :root {
                --wp--preset--aspect-ratio--square: 1;
                --wp--preset--aspect-ratio--4-3: 4/3;
                --wp--preset--aspect-ratio--3-4: 3/4;
                --wp--preset--aspect-ratio--3-2: 3/2;
                --wp--preset--aspect-ratio--2-3: 2/3;
                --wp--preset--aspect-ratio--16-9: 16/9;
                --wp--preset--aspect-ratio--9-16: 9/16;
                --wp--preset--color--black: #000000;
                --wp--preset--color--cyan-bluish-gray: #abb8c3;
                --wp--preset--color--white: #ffffff;
                --wp--preset--color--pale-pink: #f78da7;
                --wp--preset--color--vivid-red: #cf2e2e;
                --wp--preset--color--luminous-vivid-orange: #ff6900;
                --wp--preset--color--luminous-vivid-amber: #fcb900;
                --wp--preset--color--light-green-cyan: #7bdcb5;
                --wp--preset--color--vivid-green-cyan: #00d084;
                --wp--preset--color--pale-cyan-blue: #8ed1fc;
                --wp--preset--color--vivid-cyan-blue: #0693e3;
                --wp--preset--color--vivid-purple: #9b51e0;
                --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
                --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
                --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
                --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
                --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
                --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
                --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
                --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
                --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
                --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
                --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
                --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
                --wp--preset--font-size--small: 13px;
                --wp--preset--font-size--medium: 20px;
                --wp--preset--font-size--large: 36px;
                --wp--preset--font-size--x-large: 42px;
                --wp--preset--spacing--20: 0.44rem;
                --wp--preset--spacing--30: 0.67rem;
                --wp--preset--spacing--40: 1rem;
                --wp--preset--spacing--50: 1.5rem;
                --wp--preset--spacing--60: 2.25rem;
                --wp--preset--spacing--70: 3.38rem;
                --wp--preset--spacing--80: 5.06rem;
                --wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
                --wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);
                --wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);
                --wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1), 6px 6px rgba(0, 0, 0, 1);
                --wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);
            }

            :where(.is-layout-flex) {
                gap: 0.5em;
            }

            :where(.is-layout-grid) {
                gap: 0.5em;
            }

            body .is-layout-flex {
                display: flex;
            }

            .is-layout-flex {
                flex-wrap: wrap;
                align-items: center;
            }

            .is-layout-flex> :is(*, div) {
                margin: 0;
            }

            body .is-layout-grid {
                display: grid;
            }

            .is-layout-grid> :is(*, div) {
                margin: 0;
            }

            :where(.wp-block-columns.is-layout-flex) {
                gap: 2em;
            }

            :where(.wp-block-columns.is-layout-grid) {
                gap: 2em;
            }

            :where(.wp-block-post-template.is-layout-flex) {
                gap: 1.25em;
            }

            :where(.wp-block-post-template.is-layout-grid) {
                gap: 1.25em;
            }

            .has-black-color {
                color: var(--wp--preset--color--black) !important;
            }

            .has-cyan-bluish-gray-color {
                color: var(--wp--preset--color--cyan-bluish-gray) !important;
            }

            .has-white-color {
                color: var(--wp--preset--color--white) !important;
            }

            .has-pale-pink-color {
                color: var(--wp--preset--color--pale-pink) !important;
            }

            .has-vivid-red-color {
                color: var(--wp--preset--color--vivid-red) !important;
            }

            .has-luminous-vivid-orange-color {
                color: var(--wp--preset--color--luminous-vivid-orange) !important;
            }

            .has-luminous-vivid-amber-color {
                color: var(--wp--preset--color--luminous-vivid-amber) !important;
            }

            .has-light-green-cyan-color {
                color: var(--wp--preset--color--light-green-cyan) !important;
            }

            .has-vivid-green-cyan-color {
                color: var(--wp--preset--color--vivid-green-cyan) !important;
            }

            .has-pale-cyan-blue-color {
                color: var(--wp--preset--color--pale-cyan-blue) !important;
            }

            .has-vivid-cyan-blue-color {
                color: var(--wp--preset--color--vivid-cyan-blue) !important;
            }

            .has-vivid-purple-color {
                color: var(--wp--preset--color--vivid-purple) !important;
            }

            .has-black-background-color {
                background-color: var(--wp--preset--color--black) !important;
            }

            .has-cyan-bluish-gray-background-color {
                background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
            }

            .has-white-background-color {
                background-color: var(--wp--preset--color--white) !important;
            }

            .has-pale-pink-background-color {
                background-color: var(--wp--preset--color--pale-pink) !important;
            }

            .has-vivid-red-background-color {
                background-color: var(--wp--preset--color--vivid-red) !important;
            }

            .has-luminous-vivid-orange-background-color {
                background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
            }

            .has-luminous-vivid-amber-background-color {
                background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
            }

            .has-light-green-cyan-background-color {
                background-color: var(--wp--preset--color--light-green-cyan) !important;
            }

            .has-vivid-green-cyan-background-color {
                background-color: var(--wp--preset--color--vivid-green-cyan) !important;
            }

            .has-pale-cyan-blue-background-color {
                background-color: var(--wp--preset--color--pale-cyan-blue) !important;
            }

            .has-vivid-cyan-blue-background-color {
                background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
            }

            .has-vivid-purple-background-color {
                background-color: var(--wp--preset--color--vivid-purple) !important;
            }

            .has-black-border-color {
                border-color: var(--wp--preset--color--black) !important;
            }

            .has-cyan-bluish-gray-border-color {
                border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
            }

            .has-white-border-color {
                border-color: var(--wp--preset--color--white) !important;
            }

            .has-pale-pink-border-color {
                border-color: var(--wp--preset--color--pale-pink) !important;
            }

            .has-vivid-red-border-color {
                border-color: var(--wp--preset--color--vivid-red) !important;
            }

            .has-luminous-vivid-orange-border-color {
                border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
            }

            .has-luminous-vivid-amber-border-color {
                border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
            }

            .has-light-green-cyan-border-color {
                border-color: var(--wp--preset--color--light-green-cyan) !important;
            }

            .has-vivid-green-cyan-border-color {
                border-color: var(--wp--preset--color--vivid-green-cyan) !important;
            }

            .has-pale-cyan-blue-border-color {
                border-color: var(--wp--preset--color--pale-cyan-blue) !important;
            }

            .has-vivid-cyan-blue-border-color {
                border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
            }

            .has-vivid-purple-border-color {
                border-color: var(--wp--preset--color--vivid-purple) !important;
            }

            .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
                background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
            }

            .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
                background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
            }

            .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
                background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
            }

            .has-luminous-vivid-orange-to-vivid-red-gradient-background {
                background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
            }

            .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
                background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
            }

            .has-cool-to-warm-spectrum-gradient-background {
                background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
            }

            .has-blush-light-purple-gradient-background {
                background: var(--wp--preset--gradient--blush-light-purple) !important;
            }

            .has-blush-bordeaux-gradient-background {
                background: var(--wp--preset--gradient--blush-bordeaux) !important;
            }

            .has-luminous-dusk-gradient-background {
                background: var(--wp--preset--gradient--luminous-dusk) !important;
            }

            .has-pale-ocean-gradient-background {
                background: var(--wp--preset--gradient--pale-ocean) !important;
            }

            .has-electric-grass-gradient-background {
                background: var(--wp--preset--gradient--electric-grass) !important;
            }

            .has-midnight-gradient-background {
                background: var(--wp--preset--gradient--midnight) !important;
            }

            .has-small-font-size {
                font-size: var(--wp--preset--font-size--small) !important;
            }

            .has-medium-font-size {
                font-size: var(--wp--preset--font-size--medium) !important;
            }

            .has-large-font-size {
                font-size: var(--wp--preset--font-size--large) !important;
            }

            .has-x-large-font-size {
                font-size: var(--wp--preset--font-size--x-large) !important;
            }

            :where(.wp-block-post-template.is-layout-flex) {
                gap: 1.25em;
            }

            :where(.wp-block-post-template.is-layout-grid) {
                gap: 1.25em;
            }

            :where(.wp-block-columns.is-layout-flex) {
                gap: 2em;
            }

            :where(.wp-block-columns.is-layout-grid) {
                gap: 2em;
            }

            :root :where(.wp-block-pullquote) {
                font-size: 1.5em;
                line-height: 1.6;
            }
        </style>
        <link rel='stylesheet' id='overland-style-css'
            href='https://overlandsummers.com/wp-content/themes/overland-summer/style.css?ver=1702925117' type='text/css'
            media='' />
        <link rel='stylesheet' id='main-css-css'
            href='https://overlandsummers.com/wp-content/themes/overland-summer/dist/css/main-live.css?ver=1705070743'
            type='text/css' media='' />
        <link rel='preload' as='style' onload='this.rel="stylesheet"' id='wow-css-css'
            href='https://overlandsummers.com/wp-content/themes/overland-summer/plugins/wow/animate.css?ver=6.7.1'
            type='text/css' media='all' />
        <noscript>
            <link rel='stylesheet' id='wow-css-css'
                href='https://overlandsummers.com/wp-content/themes/overland-summer/plugins/wow/animate.css?ver=6.7.1'
                type='text/css' media='all' />
        </noscript>
        <link rel='preload' as='style' onload='this.rel="stylesheet"' id='dearpdf-style-css'
            href='https://overlandsummers.com/wp-content/plugins/dearpdf-pro/assets/css/dearpdf.min.css?ver=2.0.71'
            type='text/css' media='all' />
        <noscript>
            <link rel='stylesheet' id='dearpdf-style-css'
                href='https://overlandsummers.com/wp-content/plugins/dearpdf-pro/assets/css/dearpdf.min.css?ver=2.0.71'
                type='text/css' media='all' />
        </noscript>
        <link rel='stylesheet' id='popup-maker-site-css'
            href='//overlandsummers.com/wp-content/uploads/pum/pum-site-styles.css?generated=1738215774&#038;ver=1.20.4'
            type='text/css' media='all' />
        <link rel='stylesheet' id='gravity_forms_theme_reset-css'
            href='https://overlandsummers.com/wp-content/plugins/gravityforms/assets/css/dist/gravity-forms-theme-reset.min.css?ver=2.9.2'
            type='text/css' media='all' />
        <link rel='stylesheet' id='gravity_forms_theme_foundation-css'
            href='https://overlandsummers.com/wp-content/plugins/gravityforms/assets/css/dist/gravity-forms-theme-foundation.min.css?ver=2.9.2'
            type='text/css' media='all' />
        <link rel='stylesheet' id='gravity_forms_theme_framework-css'
            href='https://overlandsummers.com/wp-content/plugins/gravityforms/assets/css/dist/gravity-forms-theme-framework.min.css?ver=2.9.2'
            type='text/css' media='all' />
        <link rel='stylesheet' id='gravity_forms_orbital_theme-css'
            href='https://overlandsummers.com/wp-content/plugins/gravityforms/assets/css/dist/gravity-forms-orbital-theme.min.css?ver=2.9.2'
            type='text/css' media='all' />
        <script type="text/javascript" src="https://overlandsummers.com/wp-includes/js/jquery/jquery.min.js?ver=3.7.1"
            id="jquery-core-js"></script>
        <script type="text/javascript" src="https://overlandsummers.com/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.4.1"
            id="jquery-migrate-js"></script>
        <script type="text/javascript"
            src="https://overlandsummers.com/wp-content/plugins/pixelyoursite/dist/scripts/jquery.bind-first-0.2.3.min.js?ver=6.7.1"
            id="jquery-bind-first-js"></script>
        <script type="text/javascript"
            src="https://overlandsummers.com/wp-content/plugins/pixelyoursite/dist/scripts/js.cookie-2.1.3.min.js?ver=2.1.3"
            id="js-cookie-pys-js"></script>
        <script type="text/javascript"
            src="https://overlandsummers.com/wp-content/plugins/pixelyoursite/dist/scripts/tld.min.js?ver=2.3.1" id="js-tld-js">
        </script>
        <script type="text/javascript" id="pys-js-extra">
            /* <![CDATA[ */
            var pysOptions = {
                "staticEvents": {
                    "facebook": {
                        "init_event": [{
                            "delay": 0,
                            "type": "static",
                            "name": "PageView",
                            "pixelIds": ["895928418116899"],
                            "eventID": "0027c02a-6c3d-48a9-8a86-507b72fe29d5",
                            "params": {
                                "page_title": "Homepage",
                                "post_type": "page",
                                "post_id": 227,
                                "plugin": "PixelYourSite",
                                "user_role": "guest",
                                "event_url": "overlandsummers.com\/"
                            },
                            "e_id": "init_event",
                            "ids": [],
                            "hasTimeWindow": false,
                            "timeWindow": 0,
                            "woo_order": "",
                            "edd_order": ""
                        }]
                    }
                },
                "dynamicEvents": {
                    "automatic_event_form": {
                        "facebook": {
                            "delay": 0,
                            "type": "dyn",
                            "name": "Form",
                            "pixelIds": ["895928418116899"],
                            "eventID": "46013dba-d3e9-4b3f-bed8-12bfc87d0f7e",
                            "params": {
                                "page_title": "Homepage",
                                "post_type": "page",
                                "post_id": 227,
                                "plugin": "PixelYourSite",
                                "user_role": "guest",
                                "event_url": "overlandsummers.com\/"
                            },
                            "e_id": "automatic_event_form",
                            "ids": [],
                            "hasTimeWindow": false,
                            "timeWindow": 0,
                            "woo_order": "",
                            "edd_order": ""
                        }
                    },
                    "automatic_event_download": {
                        "facebook": {
                            "delay": 0,
                            "type": "dyn",
                            "name": "Download",
                            "extensions": ["", "doc", "exe", "js", "pdf", "ppt", "tgz", "zip", "xls"],
                            "pixelIds": ["895928418116899"],
                            "eventID": "d63ada4d-ef02-4953-b39d-4f1dbc13de20",
                            "params": {
                                "page_title": "Homepage",
                                "post_type": "page",
                                "post_id": 227,
                                "plugin": "PixelYourSite",
                                "user_role": "guest",
                                "event_url": "overlandsummers.com\/"
                            },
                            "e_id": "automatic_event_download",
                            "ids": [],
                            "hasTimeWindow": false,
                            "timeWindow": 0,
                            "woo_order": "",
                            "edd_order": ""
                        }
                    },
                    "automatic_event_comment": {
                        "facebook": {
                            "delay": 0,
                            "type": "dyn",
                            "name": "Comment",
                            "pixelIds": ["895928418116899"],
                            "eventID": "7a8410de-52e4-46b8-b9a3-51569286b116",
                            "params": {
                                "page_title": "Homepage",
                                "post_type": "page",
                                "post_id": 227,
                                "plugin": "PixelYourSite",
                                "user_role": "guest",
                                "event_url": "overlandsummers.com\/"
                            },
                            "e_id": "automatic_event_comment",
                            "ids": [],
                            "hasTimeWindow": false,
                            "timeWindow": 0,
                            "woo_order": "",
                            "edd_order": ""
                        }
                    },
                    "automatic_event_scroll": {
                        "facebook": {
                            "delay": 0,
                            "type": "dyn",
                            "name": "PageScroll",
                            "scroll_percent": 30,
                            "pixelIds": ["895928418116899"],
                            "eventID": "2f3e1c04-aac3-4c34-88ae-f9b698e6809a",
                            "params": {
                                "page_title": "Homepage",
                                "post_type": "page",
                                "post_id": 227,
                                "plugin": "PixelYourSite",
                                "user_role": "guest",
                                "event_url": "overlandsummers.com\/"
                            },
                            "e_id": "automatic_event_scroll",
                            "ids": [],
                            "hasTimeWindow": false,
                            "timeWindow": 0,
                            "woo_order": "",
                            "edd_order": ""
                        }
                    },
                    "automatic_event_time_on_page": {
                        "facebook": {
                            "delay": 0,
                            "type": "dyn",
                            "name": "TimeOnPage",
                            "time_on_page": 30,
                            "pixelIds": ["895928418116899"],
                            "eventID": "5b47c113-75e6-46fb-b2dc-bcd2dd8519ef",
                            "params": {
                                "page_title": "Homepage",
                                "post_type": "page",
                                "post_id": 227,
                                "plugin": "PixelYourSite",
                                "user_role": "guest",
                                "event_url": "overlandsummers.com\/"
                            },
                            "e_id": "automatic_event_time_on_page",
                            "ids": [],
                            "hasTimeWindow": false,
                            "timeWindow": 0,
                            "woo_order": "",
                            "edd_order": ""
                        }
                    }
                },
                "triggerEvents": [],
                "triggerEventTypes": [],
                "facebook": {
                    "pixelIds": ["895928418116899"],
                    "advancedMatching": {
                        "external_id": "ebbdccecadbaaafcecdeebcecffd"
                    },
                    "advancedMatchingEnabled": true,
                    "removeMetadata": false,
                    "contentParams": {
                        "post_type": "page",
                        "post_id": 227,
                        "content_name": "Homepage"
                    },
                    "commentEventEnabled": true,
                    "wooVariableAsSimple": false,
                    "downloadEnabled": true,
                    "formEventEnabled": true,
                    "serverApiEnabled": true,
                    "wooCRSendFromServer": false,
                    "send_external_id": null,
                    "enabled_medical": false,
                    "do_not_track_medical_param": ["event_url", "post_title", "page_title", "landing_page", "content_name",
                        "categories", "tags"
                    ]
                },
                "debug": "",
                "siteUrl": "https:\/\/overlandsummers.com",
                "ajaxUrl": "https:\/\/overlandsummers.com\/wp-admin\/admin-ajax.php",
                "ajax_event": "689b187ee9",
                "enable_remove_download_url_param": "1",
                "cookie_duration": "7",
                "last_visit_duration": "60",
                "enable_success_send_form": "",
                "ajaxForServerEvent": "1",
                "ajaxForServerStaticEvent": "1",
                "send_external_id": "1",
                "external_id_expire": "180",
                "track_cookie_for_subdomains": "1",
                "google_consent_mode": "1",
                "gdpr": {
                    "ajax_enabled": false,
                    "all_disabled_by_api": false,
                    "facebook_disabled_by_api": false,
                    "analytics_disabled_by_api": false,
                    "google_ads_disabled_by_api": false,
                    "pinterest_disabled_by_api": false,
                    "bing_disabled_by_api": false,
                    "externalID_disabled_by_api": false,
                    "facebook_prior_consent_enabled": true,
                    "analytics_prior_consent_enabled": true,
                    "google_ads_prior_consent_enabled": null,
                    "pinterest_prior_consent_enabled": true,
                    "bing_prior_consent_enabled": true,
                    "cookiebot_integration_enabled": false,
                    "cookiebot_facebook_consent_category": "marketing",
                    "cookiebot_analytics_consent_category": "statistics",
                    "cookiebot_tiktok_consent_category": "marketing",
                    "cookiebot_google_ads_consent_category": null,
                    "cookiebot_pinterest_consent_category": "marketing",
                    "cookiebot_bing_consent_category": "marketing",
                    "consent_magic_integration_enabled": false,
                    "real_cookie_banner_integration_enabled": false,
                    "cookie_notice_integration_enabled": false,
                    "cookie_law_info_integration_enabled": false,
                    "analytics_storage": {
                        "enabled": true,
                        "value": "granted",
                        "filter": false
                    },
                    "ad_storage": {
                        "enabled": true,
                        "value": "granted",
                        "filter": false
                    },
                    "ad_user_data": {
                        "enabled": true,
                        "value": "granted",
                        "filter": false
                    },
                    "ad_personalization": {
                        "enabled": true,
                        "value": "granted",
                        "filter": false
                    }
                },
                "cookie": {
                    "disabled_all_cookie": false,
                    "disabled_start_session_cookie": false,
                    "disabled_advanced_form_data_cookie": false,
                    "disabled_landing_page_cookie": false,
                    "disabled_first_visit_cookie": false,
                    "disabled_trafficsource_cookie": false,
                    "disabled_utmTerms_cookie": false,
                    "disabled_utmId_cookie": false
                },
                "tracking_analytics": {
                    "TrafficSource": "direct",
                    "TrafficLanding": "undefined",
                    "TrafficUtms": [],
                    "TrafficUtmsId": []
                },
                "GATags": {
                    "ga_datalayer_type": "default",
                    "ga_datalayer_name": "dataLayerPYS"
                },
                "woo": {
                    "enabled": false
                },
                "edd": {
                    "enabled": false
                },
                "cache_bypass": "1738323507"
            };
            /* ]]> */
        </script>

        <script type="text/javascript" defer='defer'
            src="https://overlandsummers.com/wp-content/plugins/gravityforms/js/jquery.json.min.js?ver=2.9.2"
            id="gform_json-js"></script>
        <script type="text/javascript" id="gform_gravityforms-js-extra">
            /* <![CDATA[ */
            var gf_global = {
                "gf_currency_config": {
                    "name": "U.S. Dollar",
                    "symbol_left": "$",
                    "symbol_right": "",
                    "symbol_padding": "",
                    "thousand_separator": ",",
                    "decimal_separator": ".",
                    "decimals": 2,
                    "code": "USD"
                },
                "base_url": "https:\/\/overlandsummers.com\/wp-content\/plugins\/gravityforms",
                "number_formats": [],
                "spinnerUrl": "https:\/\/overlandsummers.com\/wp-content\/plugins\/gravityforms\/images\/spinner.svg",
                "version_hash": "cc20fdddbc1543278a65ff1ad7e46ce2",
                "strings": {
                    "newRowAdded": "New row added.",
                    "rowRemoved": "Row removed",
                    "formSaved": "The form has been saved.  The content contains the link to return and complete the form."
                }
            };
            var gf_global = {
                "gf_currency_config": {
                    "name": "U.S. Dollar",
                    "symbol_left": "$",
                    "symbol_right": "",
                    "symbol_padding": "",
                    "thousand_separator": ",",
                    "decimal_separator": ".",
                    "decimals": 2,
                    "code": "USD"
                },
                "base_url": "https:\/\/overlandsummers.com\/wp-content\/plugins\/gravityforms",
                "number_formats": [],
                "spinnerUrl": "https:\/\/overlandsummers.com\/wp-content\/plugins\/gravityforms\/images\/spinner.svg",
                "version_hash": "cc20fdddbc1543278a65ff1ad7e46ce2",
                "strings": {
                    "newRowAdded": "New row added.",
                    "rowRemoved": "Row removed",
                    "formSaved": "The form has been saved.  The content contains the link to return and complete the form."
                }
            };
            var gform_i18n = {
                "datepicker": {
                    "days": {
                        "monday": "Mo",
                        "tuesday": "Tu",
                        "wednesday": "We",
                        "thursday": "Th",
                        "friday": "Fr",
                        "saturday": "Sa",
                        "sunday": "Su"
                    },
                    "months": {
                        "january": "January",
                        "february": "February",
                        "march": "March",
                        "april": "April",
                        "may": "May",
                        "june": "June",
                        "july": "July",
                        "august": "August",
                        "september": "September",
                        "october": "October",
                        "november": "November",
                        "december": "December"
                    },
                    "firstDay": 1,
                    "iconText": "Select date"
                }
            };
            var gf_legacy_multi = {
                "6": ""
            };
            var gform_gravityforms = {
                "strings": {
                    "invalid_file_extension": "This type of file is not allowed. Must be one of the following:",
                    "delete_file": "Delete this file",
                    "in_progress": "in progress",
                    "file_exceeds_limit": "File exceeds size limit",
                    "illegal_extension": "This type of file is not allowed.",
                    "max_reached": "Maximum number of files reached",
                    "unknown_error": "There was a problem while saving the file on the server",
                    "currently_uploading": "Please wait for the uploading to complete",
                    "cancel": "Cancel",
                    "cancel_upload": "Cancel this upload",
                    "cancelled": "Cancelled"
                },
                "vars": {
                    "images_url": "https:\/\/overlandsummers.com\/wp-content\/plugins\/gravityforms\/images"
                }
            };
            /* ]]> */
        </script>
        <script type="text/javascript" defer='defer'
            src="https://overlandsummers.com/wp-content/plugins/gravityforms/js/gravityforms.min.js?ver=2.9.2"
            id="gform_gravityforms-js"></script>
        <script type="text/javascript" id="gform_conditional_logic-js-extra">
            /* <![CDATA[ */
            var gf_legacy = {
                "is_legacy": ""
            };
            var gf_legacy = {
                "is_legacy": ""
            };
            /* ]]> */
        </script>
        <script type="text/javascript" defer='defer'
            src="https://overlandsummers.com/wp-content/plugins/gravityforms/js/conditional_logic.min.js?ver=2.9.2"
            id="gform_conditional_logic-js"></script>
        <script type="text/javascript" defer='defer'
            src="https://www.google.com/recaptcha/api.js?hl=en&amp;ver=6.7.1#038;render=explicit" id="gform_recaptcha-js">
        </script>
        <script type="text/javascript" defer='defer'
            src="https://overlandsummers.com/wp-content/plugins/gravityforms/assets/js/dist/utils.min.js?ver=501a987060f4426fb517400c73c7fc1e"
            id="gform_gravityforms_utils-js"></script>
        <link rel="https://api.w.org/" href="https://overlandsummers.com/wp-json/" />
        <link rel="alternate" title="JSON" type="application/json"
            href="https://overlandsummers.com/wp-json/wp/v2/pages/227" />
        <link rel="EditURI" type="application/rsd+xml" title="RSD"
            href="https://overlandsummers.com/xmlrpc.php?rsd" />
        <link rel='shortlink' href='https://overlandsummers.com/' />
        <link rel="alternate" title="oEmbed (JSON)" type="application/json+oembed"
            href="https://overlandsummers.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Foverlandsummers.com%2F" />
        <link rel="alternate" title="oEmbed (XML)" type="text/xml+oembed"
            href="https://overlandsummers.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Foverlandsummers.com%2F&#038;format=xml" />
        <meta name="et-api-version" content="v1">
        <meta name="et-api-origin" content="https://overlandsummers.com">
        <link rel="https://theeventscalendar.com/" href="https://overlandsummers.com/wp-json/tribe/tickets/v1/" />
        <meta name="tec-api-version" content="v1">
        <meta name="tec-api-origin" content="https://overlandsummers.com">
        <link rel="alternate" href="https://overlandsummers.com/wp-json/tribe/events/v1/" />
        <!-- Google Tag Manager for WordPress by gtm4wp.com -->
        <!-- GTM Container placement set to manual -->
        <script data-cfasync="false" data-pagespeed-no-defer type="text/javascript">
            var dataLayer_content = {
                "pagePostType": "frontpage",
                "pagePostType2": "single-page",
                "pagePostAuthor": "overlandsummer"
            };
            dataLayer.push(dataLayer_content);
        </script>
        <script data-cfasync="false">
            (function(w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({
                    'gtm.start': new Date().getTime(),
                    event: 'gtm.js'
                });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s),
                    dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                    '//www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-N522H6');
        </script>
        <!-- End Google Tag Manager for WordPress by gtm4wp.com -->
        <script data-cfasync="false">
            var dearPdfLocation = "https://overlandsummers.com/wp-content/plugins/dearpdf-pro/assets/";
            var dearpdfWPGlobal = {
                "text": {
                    "blank": ""
                },
                "viewerType": "reader",
                "is3D": true,
                "pageScale": "auto",
                "height": "auto",
                "mobileViewerType": "auto",
                "backgroundColor": "transparent",
                "backgroundImage": "",
                "showDownloadControl": true,
                "sideMenuOverlay": true,
                "readDirection": "ltr",
                "disableRange": false,
                "has3DCover": true,
                "enableSound": true,
                "color3DCover": "#777",
                "controlsPosition": "bottom",
                "rangeChunkSize": "524288",
                "maxTextureSize": "3200",
                "pageMode": "auto",
                "singlePageMode": "auto",
                "pdfVersion": "default",
                "autoPDFLinktoViewer": false,
                "attachmentLightbox": "true",
                "duration": "800",
                "paddingLeft": "15",
                "paddingRight": "15",
                "paddingTop": "20",
                "paddingBottom": "20",
                "moreControls": "download,pageMode,startPage,endPage,sound",
                "hideControls": ""
            };
        </script>
        <link rel="stylesheet" href="https://use.typekit.net/zsx1ygm.css">
    </head>

    <body
        class="home page-template page-template-templates page-template-flexible page-template-templatesflexible-php page page-id-227 tribe-no-js tec-no-tickets-on-recurring tec-no-rsvp-on-recurring tribe-theme-overland-summer">


        <div id="overland-popup">
            <div id="overland-popup--inner">
                <span class="overland-popup--close">
                    <svg width="47" height="47" viewBox="0 0 47 47" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_d_4635_3301)">
                            <circle cx="20.5" cy="17.5" r="14.5" fill="white" />
                        </g>
                        <path d="M15.7031 12.2891L25.7031 22.2891" stroke="#192851" stroke-width="2"
                            stroke-linecap="round" />
                        <path d="M15.2891 22.2891L25.2891 12.2891" stroke="#192851" stroke-width="2"
                            stroke-linecap="round" />
                        <defs>
                            <filter id="filter0_d_4635_3301" x="0" y="0" width="47" height="47"
                                filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                <feColorMatrix in="SourceAlpha" type="matrix"
                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                <feMorphology radius="3" operator="dilate" in="SourceAlpha"
                                    result="effect1_dropShadow_4635_3301" />
                                <feOffset dx="3" dy="6" />
                                <feGaussianBlur stdDeviation="3" />
                                <feComposite in2="hardAlpha" operator="out" />
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.2 0" />
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_4635_3301" />
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_4635_3301"
                                    result="shape" />
                            </filter>
                        </defs>
                    </svg>
                </span>
                <div id="overland-popup--content">

                </div>
            </div>
        </div>

        <div id="page" class="site">
            <a class="skip-link screen-reader-text" href="#content">
                Skip to content </a>

            <header id="site-header" class="site-header">
                <div class="container">
                    <div class="logo-menu-wrapper">
                        <div class="logo-menu-wrapper--box">
                            <div class="top-menu">
                                <nav id="top-site-navigation" class="" role="navigation">
                                    <div class="top-navigation-primary">
                                        <ul class="top-menu-list">
                                            <li class="top-menu-item link-type-none has-submenu">
                                                <span class="menu-link-text top-menu-item-link">
                                                    Request Info </span>
                                                <span class="expand-subemu-arrow">
                                                    <svg width="8" height="8" viewBox="0 0 14 8" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 1L7 7L13 1" stroke="white" stroke-width="0.5" />
                                                    </svg>
                                                </span>

                                                <ul class="menu-submenu">
                                                    <li class="top-submenu-item">

                                                        <a href="https://overlandsummers.com/request-a-catalog/"
                                                            class="menu-link-item top-submenu-item-link ">
                                                            <span class="menu-link-text">
                                                                Request a Catalog </span>
                                                        </a>
                                                    </li>
                                                    <li class="top-submenu-item">

                                                        <a href="https://overlandsummers.com/attend-a-presentation/"
                                                            class="menu-link-item top-submenu-item-link ">
                                                            <span class="menu-link-text">
                                                                Attend a Presentation </span>
                                                        </a>
                                                    </li>
                                                    <li class="top-submenu-item">

                                                        <a href="https://overlandsummers.com/request-references/"
                                                            class="menu-link-item top-submenu-item-link ">
                                                            <span class="menu-link-text">
                                                                Request References </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="top-menu-item link-type-none has-submenu">
                                                <span class="menu-link-text top-menu-item-link">
                                                    Resources </span>
                                                <span class="expand-subemu-arrow">
                                                    <svg width="8" height="8" viewBox="0 0 14 8" fill="none"
                                                        xmlns="http://www.  w3.org/2000/svg">
                                                        <path d="M1 1L7 7L13 1" stroke="white" stroke-width="0.5" />
                                                    </svg>
                                                </span>

                                                <ul class="menu-submenu">
                                                    <li class="top-submenu-item top-submenu-item--no-link">
                                                        <span class="menu-link-text top-submenu-item-link">
                                                            Parent Resources </span>
                                                    </li>
                                                    <li class="top-submenu-item">

                                                        <a href="https://overlandsummers.com/risk-management/"
                                                            class="menu-link-item top-submenu-item-link ">
                                                            <span class="menu-link-text">
                                                                Risk Management </span>
                                                        </a>
                                                    </li>
                                                    <li class="top-submenu-item">

                                                        <a href="https://overlandsummers.com/expectations-communication/"
                                                            class="menu-link-item top-submenu-item-link ">
                                                            <span class="menu-link-text">
                                                                Expectations & Communication </span>
                                                        </a>
                                                    </li>
                                                    <li class="top-submenu-item">

                                                        <a href="https://overlandsummers.com/food-allergy/"
                                                            class="menu-link-item top-submenu-item-link ">
                                                            <span class="menu-link-text">
                                                                Food & Allergy </span>
                                                        </a>
                                                    </li>
                                                    <li class="top-submenu-item">

                                                        <a href="https://overlandsummers.com/financial-aid-scholarships/"
                                                            class="menu-link-item top-submenu-item-link ">
                                                            <span class="menu-link-text">
                                                                Financial Aid & Scholarship </span>
                                                        </a>
                                                    </li>
                                                    <li class="top-submenu-item">

                                                        <a href="https://overlandsummers.com/payment-travel-protection/"
                                                            class="menu-link-item top-submenu-item-link ">
                                                            <span class="menu-link-text">
                                                                Payment & Travel </span>
                                                        </a>
                                                    </li>
                                                    <li class="top-submenu-item top-submenu-item--no-link">
                                                        <span class="menu-link-text top-submenu-item-link">
                                                            More Information </span>
                                                    </li>
                                                    <li class="top-submenu-item">

                                                        <a href="https://overlandsummers.com/faqs/"
                                                            class="menu-link-item top-submenu-item-link ">
                                                            <span class="menu-link-text">
                                                                FAQs </span>
                                                        </a>
                                                    </li>
                                                    <li class="top-submenu-item">

                                                        <a href="https://overlandsummers.com/blog/"
                                                            class="menu-link-item top-submenu-item-link ">
                                                            <span class="menu-link-text">
                                                                Blog </span>
                                                        </a>
                                                    </li>
                                                    <li class="top-submenu-item">

                                                        <a href="https://overlandsummers.com/careers/"
                                                            class="menu-link-item top-submenu-item-link ">
                                                            <span class="menu-link-text">
                                                                Careers </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="top-menu-item link-type-search has-icon">
                                                <div class="top-menu-item-img">
                                                    <img width="1" height="1"
                                                        src="https://overlandsummers.com/wp-content/uploads/2023/11/search.svg"
                                                        class="attachment-thumbnail size-thumbnail" alt=""
                                                        decoding="async" />
                                                </div>

                                                <div class="menu-link-item link-search top-menu-item-link">
                                                    <span class="menu-link-text">
                                                        Site Search </span>
                                                    <div class="link-search-wrapper box-absolute">

                                                        <form role="search" method="get" class="search-form"
                                                            action="https://overlandsummers.com/">
                                                            <div class="search-form--inner">
                                                                <input type="search" class="search-field" title="Search"
                                                                    placeholder="Search" value="" name="s" />
                                                                <button class="submit-button-search" type="submit">
                                                                    <svg width="9" height="9" viewBox="0 0 9 9"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg"
                                                                        aria-label="Submit Search">
                                                                        <path
                                                                            d="M7.31286 3.65571C7.31286 4.46243 7.05093 5.20764 6.6097 5.81223L8.8352 8.03906C9.05493 8.25875 9.05493 8.61553 8.8352 8.83523C8.61546 9.05492 8.25861 9.05492 8.03887 8.83523L5.81337 6.60841C5.20865 7.05131 4.4633 7.31143 3.65643 7.31143C1.6366 7.31143 0 5.67515 0 3.65571C0 1.63628 1.6366 0 3.65643 0C5.67625 0 7.31286 1.63628 7.31286 3.65571ZM3.65643 6.18659C5.05448 6.18659 6.1878 5.0535 6.1878 3.65571C6.1878 2.25793 5.05448 1.12484 3.65643 1.12484C2.25837 1.12484 1.12505 2.25793 1.12505 3.65571C1.12505 5.0535 2.25837 6.18659 3.65643 6.18659Z"
                                                                            fill="white" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="top-menu-item link-type-portal has-icon">
                                                <div class="top-menu-item-img">
                                                    <img width="1" height="1"
                                                        src="https://overlandsummers.com/wp-content/uploads/2023/11/contact-icon.svg"
                                                        class="attachment-thumbnail size-thumbnail" alt=""
                                                        decoding="async" />
                                                </div>

                                                <div class="menu-link-item link-portal top-menu-item-link">
                                                    <span class="menu-link-text">
                                                        Family Portal </span>
                                                    <div class="link-porta-wrapper box-absolute">
                                                        <iframe src="https://portal.overlandsummers.com/sidebar"
                                                            loading="lazy"></iframe>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>

                            <div class="logo-menu-wrapper--box-bottom">
                                <div class="site-logo-description">
                                    <div class="site-logo">
                                        <a href="https://overlandsummers.com">
                                            <svg width="217" height="21" viewBox="0 0 217 21" fill="none"
                                                aria-label="Overland" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_3545_7840)">
                                                    <path
                                                        d="M12.172 21C4.5431 21 0 16.1866 0 10.5C0 4.81338 4.5431 0 12.172 0C19.8009 0 24.344 4.81338 24.344 10.5C24.344 16.1866 19.8009 21 12.172 21ZM12.172 4.19747C7.24057 4.19747 4.79782 7.12515 4.79782 10.5042C4.79782 13.8833 7.2364 16.811 12.172 16.811C17.1076 16.811 19.542 13.8833 19.542 10.5042C19.542 7.12515 17.1034 4.19747 12.172 4.19747Z"
                                                        fill="white" />
                                                    <path
                                                        d="M41.5839 20.3533H35.7714L26.2969 0.648438H31.3578L38.6777 16.1896L45.9976 0.648438H51.0585L41.5839 20.3533Z"
                                                        fill="white" />
                                                    <path
                                                        d="M55.0859 20.3533V0.648438H76.9663V4.90075H59.6541V8.44856H74.891V12.279H59.6541V16.1095H77.6428V20.3618H55.0859V20.3533Z"
                                                        fill="white" />
                                                    <path
                                                        d="M101.418 13.0637L104.584 20.3576H99.7022L96.7959 13.629H87.2713V20.3576H82.7031V0.648438H99.0299C100.976 0.648438 104.976 1.88869 104.976 7.12393C104.976 10.5578 103.16 12.3043 101.418 13.0637ZM98.3534 4.90075H87.2713V9.37664H98.3534C98.7418 9.37664 100.404 8.95479 100.404 7.12393C100.404 5.29307 98.9255 4.90075 98.3534 4.90075Z"
                                                        fill="white" />
                                                    <path
                                                        d="M110.172 20.3533V0.648438H114.74V16.1052H130.858V20.3576H110.172V20.3533Z"
                                                        fill="white" />
                                                    <path
                                                        d="M156.094 20.3533L153.989 16.4132H141.191L139.086 20.3533H134.234L144.673 0.648438H150.515L160.95 20.3533H156.098H156.094ZM147.605 4.33546L143.45 12.1609H151.755L147.605 4.33546Z"
                                                        fill="white" />
                                                    <path
                                                        d="M182.677 20.3533L169.545 6.58817V20.3533H164.977V0.648438H169.545L182.677 14.4136V0.648438H187.245V20.3533H182.677Z"
                                                        fill="white" />
                                                    <path
                                                        d="M205.525 20.3533H192.961V0.648438H205.525C212.845 0.648438 216.996 5.06949 216.996 10.503C216.996 15.9365 212.845 20.3533 205.525 20.3533ZM205.421 4.75732H197.529V16.2445H205.421C210.069 16.2445 212.194 13.6838 212.194 10.503C212.194 7.3222 210.064 4.75732 205.421 4.75732Z"
                                                        fill="white" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_3545_7840">
                                                        <rect width="217" height="21" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <!--#site-navigation menu animations: anim-left, anim-right, anim-top, anim-popup -->
                                <div class="header-navigations-wrapper">
                                    <div class="header-navigations">

                                        <nav id="custom-site-navigation" class="" role="navigation">

                                            <div class="main-navigation-primary">
                                                <ul class="main-menu-list">
                                                    <li
                                                        class="type-mega first-levelmenu-item link-type-internal has-submenu">

                                                        <a href="https://overlandsummers.com/trips/"
                                                            class="menu-link-item  ">
                                                            <span class="menu-link-text">
                                                                Trips </span>
                                                        </a>
                                                        <span class="expand-subemu-arrow">
                                                            <svg width="8" height="8" viewBox="0 0 14 8"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M1 1L7 7L13 1" stroke="white"
                                                                    stroke-width="0.5" />
                                                            </svg>
                                                        </span>
                                                        <ul class="menu-submenu">
                                                            <li
                                                                class="type-mega menu-submenu-itemmenu-item link-type-custom">

                                                                <a href="https://overlandsummers.com/trips/adventure/"
                                                                    class="menu-link-item  ">
                                                                    <span class="menu-link-text">
                                                                        Adventure </span>
                                                                </a>
                                                                <span class="expand-subemu-arrow">
                                                                    <svg width="8" height="8" viewBox="0 0 14 8"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M1 1L7 7L13 1" stroke="white"
                                                                            stroke-width="0.5" />
                                                                    </svg>
                                                                </span>
                                                                <div class="menu-submenu mega-menu-level-2">
                                                                    <div class="mega-menu-columns mega-menu-column-1">
                                                                        <ul>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/adventure/berkshire-adventure/"
                                                                                    class="menu-link-item mega-menu-item-link ">
                                                                                    <span class="menu-link-text">
                                                                                        Berkshire Adventure </span>
                                                                                </a>
                                                                                <div class="mega-menu-item-description">
                                                                                    Grades 4 - 6 </div>
                                                                            </li>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/adventure/new-england-adventure/"
                                                                                    class="menu-link-item mega-menu-item-link ">
                                                                                    <span class="menu-link-text">
                                                                                        New England Adventure </span>
                                                                                </a>
                                                                                <div class="mega-menu-item-description">
                                                                                    Grades 4 - 6 </div>
                                                                            </li>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/adventure/maine-adventure/"
                                                                                    class="menu-link-item mega-menu-item-link ">
                                                                                    <span class="menu-link-text">
                                                                                        Maine Adventure </span>
                                                                                </a>
                                                                                <div class="mega-menu-item-description">
                                                                                    Grades 4 - 6 </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="mega-menu-columns mega-menu-column-2">
                                                                        <ul>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/adventure/mountains-sea-adventure/"
                                                                                    class="menu-link-item mega-menu-item-link ">
                                                                                    <span class="menu-link-text">
                                                                                        Mountains &#038; Sea Adventure
                                                                                    </span>
                                                                                </a>
                                                                                <div class="mega-menu-item-description">
                                                                                    Grades 4 - 6 </div>
                                                                            </li>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/adventure/rocky-mountain-adventure/"
                                                                                    class="menu-link-item mega-menu-item-link ">
                                                                                    <span class="menu-link-text">
                                                                                        Rocky Mountain Adventure </span>
                                                                                </a>
                                                                                <div class="mega-menu-item-description">
                                                                                    Grades 4 - 6 </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="mega-menu-columns mega-menu-column-3">
                                                                        <ul>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/adventure/sierra-adventure/"
                                                                                    class="menu-link-item mega-menu-item-link ">
                                                                                    <span class="menu-link-text">
                                                                                        Sierra Adventure </span>
                                                                                </a>
                                                                                <div class="mega-menu-item-description">
                                                                                    Grades 4 - 6 </div>
                                                                            </li>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/adventure/yellowstone-teton-adventure/"
                                                                                    class="menu-link-item mega-menu-item-link ">
                                                                                    <span class="menu-link-text">
                                                                                        Yellowstone Teton Adventure </span>
                                                                                </a>
                                                                                <div class="mega-menu-item-description">
                                                                                    Grades 4 - 6 </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="mega-menu-columns mega-menu-column-4">
                                                                        <ul>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/compare-trips/"
                                                                                    class="menu-link-item mega-menu-item-link btn-outline button transparent-button ">
                                                                                    <span class="menu-link-text">
                                                                                        compare trips </span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/adventure/"
                                                                                    class="menu-link-item mega-menu-item-link btn-outline button transparent-button ">
                                                                                    <span class="menu-link-text">
                                                                                        view all </span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="mega-menu-columns mega-menu-column-5">
                                                                        <img width="380" height="250"
                                                                            src="https://overlandsummers.com/wp-content/uploads/2023/11/Rectangle-525.jpg"
                                                                            class="attachment-full size-full"
                                                                            alt="" decoding="async"
                                                                            fetchpriority="high"
                                                                            srcset="https://overlandsummers.com/wp-content/uploads/2023/11/Rectangle-525.jpg 380w, https://overlandsummers.com/wp-content/uploads/2023/11/Rectangle-525-300x197.jpg 300w"
                                                                            sizes="(max-width: 380px) 100vw, 380px" />
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li
                                                                class="type-mega menu-submenu-itemmenu-item link-type-custom">

                                                                <a href="https://overlandsummers.com/trips/explorer/"
                                                                    class="menu-link-item  ">
                                                                    <span class="menu-link-text">
                                                                        Explorer </span>
                                                                </a>
                                                                <span class="expand-subemu-arrow">
                                                                    <svg width="8" height="8" viewBox="0 0 14 8"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M1 1L7 7L13 1" stroke="white"
                                                                            stroke-width="0.5" />
                                                                    </svg>
                                                                </span>
                                                                <div class="menu-submenu mega-menu-level-2">
                                                                    <div class="mega-menu-columns mega-menu-column-1">
                                                                        <ul>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/explorer/alaska-explorer/"
                                                                                    class="menu-link-item mega-menu-item-link ">
                                                                                    <span class="menu-link-text">
                                                                                        Alaska Explorer </span>
                                                                                </a>
                                                                                <div class="mega-menu-item-description">
                                                                                    Grades 7 - 9 </div>
                                                                            </li>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/explorer/alpine-explorer/"
                                                                                    class="menu-link-item mega-menu-item-link ">
                                                                                    <span class="menu-link-text">
                                                                                        Alpine Explorer </span>
                                                                                </a>
                                                                                <div class="mega-menu-item-description">
                                                                                    Grades 7 - 9 </div>
                                                                            </li>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/explorer/iceland-explorer/"
                                                                                    class="menu-link-item mega-menu-item-link ">
                                                                                    <span class="menu-link-text">
                                                                                        Iceland Explorer </span>
                                                                                </a>
                                                                                <div class="mega-menu-item-description">
                                                                                    Grades 7 - 9 </div>
                                                                            </li>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/explorer/maine-coast-explorer/"
                                                                                    class="menu-link-item mega-menu-item-link ">
                                                                                    <span class="menu-link-text">
                                                                                        Maine Coast Explorer </span>
                                                                                </a>
                                                                                <div class="mega-menu-item-description">
                                                                                    Grades 6 - 9 </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="mega-menu-columns mega-menu-column-2">
                                                                        <ul>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/explorer/mountains-sea-explorer/"
                                                                                    class="menu-link-item mega-menu-item-link ">
                                                                                    <span class="menu-link-text">
                                                                                        Mountains &#038; Sea Explorer
                                                                                    </span>
                                                                                </a>
                                                                                <div class="mega-menu-item-description">
                                                                                    Grades 6 - 9 </div>
                                                                            </li>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/explorer/new-england-explorer/"
                                                                                    class="menu-link-item mega-menu-item-link ">
                                                                                    <span class="menu-link-text">
                                                                                        New England Explorer </span>
                                                                                </a>
                                                                                <div class="mega-menu-item-description">
                                                                                    Grades 6 - 9 </div>
                                                                            </li>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/explorer/northwest-explorer/"
                                                                                    class="menu-link-item mega-menu-item-link ">
                                                                                    <span class="menu-link-text">
                                                                                        Northwest Explorer </span>
                                                                                </a>
                                                                                <div class="mega-menu-item-description">
                                                                                    Grades 6 - 9 </div>
                                                                            </li>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/explorer/norway-explorer/"
                                                                                    class="menu-link-item mega-menu-item-link ">
                                                                                    <span class="menu-link-text">
                                                                                        Norway Explorer </span>
                                                                                </a>
                                                                                <div class="mega-menu-item-description">
                                                                                    Grades 7 - 9 </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="mega-menu-columns mega-menu-column-3">
                                                                        <ul>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/explorer/rocky-mountain-explorer/"
                                                                                    class="menu-link-item mega-menu-item-link ">
                                                                                    <span class="menu-link-text">
                                                                                        Rocky Mountain Explorer </span>
                                                                                </a>
                                                                                <div class="mega-menu-item-description">
                                                                                    Grades 6 - 9 </div>
                                                                            </li>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/explorer/sierra-explorer/"
                                                                                    class="menu-link-item mega-menu-item-link ">
                                                                                    <span class="menu-link-text">
                                                                                        Sierra Explorer </span>
                                                                                </a>
                                                                                <div class="mega-menu-item-description">
                                                                                    Grades 6 - 9 </div>
                                                                            </li>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/explorer/yellowstone-teton-explorer/"
                                                                                    class="menu-link-item mega-menu-item-link ">
                                                                                    <span class="menu-link-text">
                                                                                        Yellowstone Teton Explorer </span>
                                                                                </a>
                                                                                <div class="mega-menu-item-description">
                                                                                    Grades 6 - 9 </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="mega-menu-columns mega-menu-column-4">
                                                                        <ul>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/compare-trips/"
                                                                                    class="menu-link-item mega-menu-item-link btn-outline button transparent-button ">
                                                                                    <span class="menu-link-text">
                                                                                        Compare Trips </span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/explorer/"
                                                                                    class="menu-link-item mega-menu-item-link btn-outline button transparent-button ">
                                                                                    <span class="menu-link-text">
                                                                                        View all </span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="mega-menu-columns mega-menu-column-5">
                                                                        <img width="380" height="250"
                                                                            src="https://overlandsummers.com/wp-content/uploads/2023/11/Rectangle-526.jpg"
                                                                            class="attachment-full size-full"
                                                                            alt="" decoding="async"
                                                                            srcset="https://overlandsummers.com/wp-content/uploads/2023/11/Rectangle-526.jpg 380w, https://overlandsummers.com/wp-content/uploads/2023/11/Rectangle-526-300x197.jpg 300w"
                                                                            sizes="(max-width: 380px) 100vw, 380px" />
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li
                                                                class="type-mega menu-submenu-itemmenu-item link-type-custom">

                                                                <a href="https://overlandsummers.com/trips/expedition/"
                                                                    class="menu-link-item  ">
                                                                    <span class="menu-link-text">
                                                                        Expedition </span>
                                                                </a>
                                                                <span class="expand-subemu-arrow">
                                                                    <svg width="8" height="8" viewBox="0 0 14 8"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M1 1L7 7L13 1" stroke="white"
                                                                            stroke-width="0.5" />
                                                                    </svg>
                                                                </span>
                                                                <div class="menu-submenu mega-menu-level-2">
                                                                    <div class="mega-menu-columns mega-menu-column-1">
                                                                        <ul>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/expedition/alaska-expedition/"
                                                                                    class="menu-link-item mega-menu-item-link ">
                                                                                    <span class="menu-link-text">
                                                                                        Alaska Expedition </span>
                                                                                </a>
                                                                                <div class="mega-menu-item-description">
                                                                                    Grades 9 - 11 </div>
                                                                            </li>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/expedition/appalachian-trail-expedition/"
                                                                                    class="menu-link-item mega-menu-item-link ">
                                                                                    <span class="menu-link-text">
                                                                                        Appalachian Trail Expedition </span>
                                                                                </a>
                                                                                <div class="mega-menu-item-description">
                                                                                    Grades 9 - 11 </div>
                                                                            </li>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/expedition/iceland-expedition/"
                                                                                    class="menu-link-item mega-menu-item-link ">
                                                                                    <span class="menu-link-text">
                                                                                        Iceland Expedition </span>
                                                                                </a>
                                                                                <div class="mega-menu-item-description">
                                                                                    Grades 9 - 11 </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="mega-menu-columns mega-menu-column-2">
                                                                        <ul>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/expedition/northwest-expedition/"
                                                                                    class="menu-link-item mega-menu-item-link ">
                                                                                    <span class="menu-link-text">
                                                                                        Northwest Expedition </span>
                                                                                </a>
                                                                                <div class="mega-menu-item-description">
                                                                                    Grades 9 - 11 </div>
                                                                            </li>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/expedition/norway-expedition/"
                                                                                    class="menu-link-item mega-menu-item-link ">
                                                                                    <span class="menu-link-text">
                                                                                        Norway Expedition </span>
                                                                                </a>
                                                                                <div class="mega-menu-item-description">
                                                                                    Grades 9 - 11 </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="mega-menu-columns mega-menu-column-3">
                                                                        <ul>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/expedition/pyrenees-expedition/"
                                                                                    class="menu-link-item mega-menu-item-link ">
                                                                                    <span class="menu-link-text">
                                                                                        Pyrenees Expedition </span>
                                                                                </a>
                                                                                <div class="mega-menu-item-description">
                                                                                    Grades 9 - 11 </div>
                                                                            </li>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/expedition/rocky-mountain-expedition/"
                                                                                    class="menu-link-item mega-menu-item-link ">
                                                                                    <span class="menu-link-text">
                                                                                        Rocky Mountain Expedition </span>
                                                                                </a>
                                                                                <div class="mega-menu-item-description">
                                                                                    Grades 9 - 11 </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="mega-menu-columns mega-menu-column-4">
                                                                        <ul>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/compare-trips/"
                                                                                    class="menu-link-item mega-menu-item-link btn-outline button transparent-button ">
                                                                                    <span class="menu-link-text">
                                                                                        Compare Trips </span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/explorer/"
                                                                                    class="menu-link-item mega-menu-item-link btn-outline button transparent-button ">
                                                                                    <span class="menu-link-text">
                                                                                        view all </span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="mega-menu-columns mega-menu-column-5">
                                                                        <img width="380" height="250"
                                                                            src="https://overlandsummers.com/wp-content/uploads/2023/11/Rectangle-526-1.jpg"
                                                                            class="attachment-full size-full"
                                                                            alt="" decoding="async"
                                                                            srcset="https://overlandsummers.com/wp-content/uploads/2023/11/Rectangle-526-1.jpg 380w, https://overlandsummers.com/wp-content/uploads/2023/11/Rectangle-526-1-300x197.jpg 300w"
                                                                            sizes="(max-width: 380px) 100vw, 380px" />
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li
                                                                class="type-mega menu-submenu-itemmenu-item link-type-custom">

                                                                <a href="https://overlandsummers.com/trips/challenge/"
                                                                    class="menu-link-item  ">
                                                                    <span class="menu-link-text">
                                                                        Challenge </span>
                                                                </a>
                                                                <span class="expand-subemu-arrow">
                                                                    <svg width="8" height="8" viewBox="0 0 14 8"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M1 1L7 7L13 1" stroke="white"
                                                                            stroke-width="0.5" />
                                                                    </svg>
                                                                </span>
                                                                <div class="menu-submenu mega-menu-level-2">
                                                                    <div class="mega-menu-columns mega-menu-column-1">
                                                                        <ul>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/challenge/alpine-challenge/"
                                                                                    class="menu-link-item mega-menu-item-link ">
                                                                                    <span class="menu-link-text">
                                                                                        Alpine Challenge </span>
                                                                                </a>
                                                                                <div class="mega-menu-item-description">
                                                                                    Grades 10 - 12 </div>
                                                                            </li>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/challenge/sierra-challenge/"
                                                                                    class="menu-link-item mega-menu-item-link ">
                                                                                    <span class="menu-link-text">
                                                                                        Sierra Challenge </span>
                                                                                </a>
                                                                                <div class="mega-menu-item-description">
                                                                                    Grades 9 - 12 </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="mega-menu-columns mega-menu-column-2">
                                                                        <ul>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/challenge/kilimanjaro-challenge/"
                                                                                    class="menu-link-item mega-menu-item-link ">
                                                                                    <span class="menu-link-text">
                                                                                        Kilimanjaro Challenge </span>
                                                                                </a>
                                                                                <div class="mega-menu-item-description">
                                                                                    Grades 10 - 12 </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="mega-menu-columns mega-menu-column-3">
                                                                        <ul>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/challenge/teton-challenge/"
                                                                                    class="menu-link-item mega-menu-item-link ">
                                                                                    <span class="menu-link-text">
                                                                                        Teton Challenge </span>
                                                                                </a>
                                                                                <div class="mega-menu-item-description">
                                                                                    Grades 10 - 12 </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="mega-menu-columns mega-menu-column-4">
                                                                        <ul>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/compare-trips/"
                                                                                    class="menu-link-item mega-menu-item-link btn-outline button transparent-button ">
                                                                                    <span class="menu-link-text">
                                                                                        Compare Trips </span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/challenge/"
                                                                                    class="menu-link-item mega-menu-item-link btn-outline button transparent-button ">
                                                                                    <span class="menu-link-text">
                                                                                        View All </span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="mega-menu-columns mega-menu-column-5">
                                                                        <img width="380" height="250"
                                                                            src="https://overlandsummers.com/wp-content/uploads/2023/11/Rectangle-526-2.jpg"
                                                                            class="attachment-full size-full"
                                                                            alt="" decoding="async"
                                                                            srcset="https://overlandsummers.com/wp-content/uploads/2023/11/Rectangle-526-2.jpg 380w, https://overlandsummers.com/wp-content/uploads/2023/11/Rectangle-526-2-300x197.jpg 300w"
                                                                            sizes="(max-width: 380px) 100vw, 380px" />
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li
                                                                class="type-mega menu-submenu-itemmenu-item link-type-custom">

                                                                <a href="https://overlandsummers.com/trips/service-language/"
                                                                    class="menu-link-item  ">
                                                                    <span class="menu-link-text">
                                                                        Service/Language </span>
                                                                </a>
                                                                <span class="expand-subemu-arrow">
                                                                    <svg width="8" height="8" viewBox="0 0 14 8"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M1 1L7 7L13 1" stroke="white"
                                                                            stroke-width="0.5" />
                                                                    </svg>
                                                                </span>
                                                                <div class="menu-submenu mega-menu-level-2">
                                                                    <div class="mega-menu-columns mega-menu-column-1">
                                                                        <ul>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/service-language/service-hiking-alaska/"
                                                                                    class="menu-link-item mega-menu-item-link ">
                                                                                    <span class="menu-link-text">
                                                                                        Service &#038; Hiking Alaska </span>
                                                                                </a>
                                                                                <div class="mega-menu-item-description">
                                                                                    Grades 8 - 11 </div>
                                                                            </li>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/service-language/service-hiking-new-england/"
                                                                                    class="menu-link-item mega-menu-item-link ">
                                                                                    <span class="menu-link-text">
                                                                                        Service &#038; Hiking New England
                                                                                    </span>
                                                                                </a>
                                                                                <div class="mega-menu-item-description">
                                                                                    Grades 8 - 11 </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="mega-menu-columns mega-menu-column-2">
                                                                        <ul>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/service-language/language-hiking-france/"
                                                                                    class="menu-link-item mega-menu-item-link ">
                                                                                    <span class="menu-link-text">
                                                                                        Language &#038; Hiking France
                                                                                    </span>
                                                                                </a>
                                                                                <div class="mega-menu-item-description">
                                                                                    Grades 8 - 11 </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="mega-menu-columns mega-menu-column-3">
                                                                        <ul>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/service-language/language-hiking-spain/"
                                                                                    class="menu-link-item mega-menu-item-link ">
                                                                                    <span class="menu-link-text">
                                                                                        Language &#038; Hiking Spain </span>
                                                                                </a>
                                                                                <div class="mega-menu-item-description">
                                                                                    Grades 8 - 11 </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="mega-menu-columns mega-menu-column-4">
                                                                        <ul>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/compare-trips/"
                                                                                    class="menu-link-item mega-menu-item-link btn-outline button transparent-button ">
                                                                                    <span class="menu-link-text">
                                                                                        Compare Trips </span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="mega-menu-item">

                                                                                <a href="https://overlandsummers.com/trips/service-language/"
                                                                                    class="menu-link-item mega-menu-item-link btn-outline button transparent-button ">
                                                                                    <span class="menu-link-text">
                                                                                        view all </span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="mega-menu-columns mega-menu-column-5">
                                                                        <img width="380" height="250"
                                                                            src="https://overlandsummers.com/wp-content/uploads/2023/11/Rectangle-526-3.jpg"
                                                                            class="attachment-full size-full"
                                                                            alt="" decoding="async"
                                                                            srcset="https://overlandsummers.com/wp-content/uploads/2023/11/Rectangle-526-3.jpg 380w, https://overlandsummers.com/wp-content/uploads/2023/11/Rectangle-526-3-300x197.jpg 300w"
                                                                            sizes="(max-width: 380px) 100vw, 380px" />
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li
                                                                class="type-mega menu-submenu-itemmenu-item link-type-internal">

                                                                <a href="https://overlandsummers.com/compare-trips/"
                                                                    class="menu-link-item  ">
                                                                    <span class="menu-link-text">
                                                                        Compare Trips </span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="type-cards first-levelmenu-item link-type-none has-submenu">
                                                        <span class="menu-link-text ">
                                                            Stories </span>
                                                        <span class="expand-subemu-arrow">
                                                            <svg width="8" height="8" viewBox="0 0 14 8"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M1 1L7 7L13 1" stroke="white"
                                                                    stroke-width="0.5" />
                                                            </svg>
                                                        </span>
                                                        <ul class="menu-submenu">
                                                            <li class="type-cards card-menu-item">
                                                                <a href="https://overlandsummers.com/stories/student/">

                                                                    <div class="card-menu-item-img">
                                                                        <img width="280" height="221"
                                                                            src="https://overlandsummers.com/wp-content/uploads/2023/11/Rectangle-527.jpg"
                                                                            class="attachment-full size-full"
                                                                            alt="" decoding="async" />
                                                                    </div>

                                                                    <div class="card-menu-item-title">
                                                                        Student stories </div>
                                                                </a>

                                                                <a href="https://overlandsummers.com/stories/student/"
                                                                    class="menu-link-item card-menu-item-link ">
                                                                    <span class="menu-link-text">
                                                                        view Student Stories › </span>
                                                                </a>
                                                            </li>
                                                            <li class="type-cards card-menu-item">
                                                                <a href="https://overlandsummers.com/stories/leader/">

                                                                    <div class="card-menu-item-img">
                                                                        <img width="280" height="221"
                                                                            src="https://overlandsummers.com/wp-content/uploads/2023/11/Rectangle-528.jpg"
                                                                            class="attachment-full size-full"
                                                                            alt="" decoding="async" />
                                                                    </div>

                                                                    <div class="card-menu-item-title">
                                                                        Leader stories </div>
                                                                </a>

                                                                <a href="https://overlandsummers.com/stories/leader/"
                                                                    class="menu-link-item card-menu-item-link ">
                                                                    <span class="menu-link-text">
                                                                        view leader Stories › </span>
                                                                </a>
                                                            </li>
                                                            <li class="type-cards card-menu-item">
                                                                <a href="https://overlandsummers.com/stories/parent/">

                                                                    <div class="card-menu-item-img">
                                                                        <img width="280" height="221"
                                                                            src="https://overlandsummers.com/wp-content/uploads/2023/11/Rectangle-529.jpg"
                                                                            class="attachment-full size-full"
                                                                            alt="" decoding="async" />
                                                                    </div>

                                                                    <div class="card-menu-item-title">
                                                                        Parent stories </div>
                                                                </a>

                                                                <a href="https://overlandsummers.com/stories/parent/"
                                                                    class="menu-link-item card-menu-item-link ">
                                                                    <span class="menu-link-text">
                                                                        view parent Stories › </span>
                                                                </a>
                                                            </li>
                                                            <li class="type-cards card-menu-item">
                                                                <a href="https://overlandsummers.com/trip-gallery/">

                                                                    <div class="card-menu-item-img">
                                                                        <img width="280" height="221"
                                                                            src="https://overlandsummers.com/wp-content/uploads/2023/11/Rectangle-530-1.jpg"
                                                                            class="attachment-full size-full"
                                                                            alt="" decoding="async" />
                                                                    </div>

                                                                    <div class="card-menu-item-title">
                                                                        Trip Gallery </div>
                                                                </a>

                                                                <a href="https://overlandsummers.com/trip-gallery/"
                                                                    class="menu-link-item card-menu-item-link ">
                                                                    <span class="menu-link-text">
                                                                        view now › </span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li
                                                        class="type-group first-levelmenu-item link-type-custom has-submenu">

                                                        <a href="https://overlandsummers.com/trip-leaders/"
                                                            class="menu-link-item  ">
                                                            <span class="menu-link-text">
                                                                Trip Leaders </span>
                                                        </a>
                                                        <span class="expand-subemu-arrow">
                                                            <svg width="8" height="8" viewBox="0 0 14 8"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M1 1L7 7L13 1" stroke="white"
                                                                    stroke-width="0.5" />
                                                            </svg>
                                                        </span>
                                                        <div class="menu-submenu">
                                                            <div class="group-menu-submenu-items-wrapper">
                                                                <div class="group-menu-item-main-wrapper">
                                                                    <div class="group-menu-item-main-title">
                                                                        our leaders </div>
                                                                    <ul class="type-group group-menu-item-wrapper">
                                                                        <li
                                                                            class="type-group group-menu-item card-menu-item">
                                                                            <a
                                                                                href="https://overlandsummers.com/trip-leaders/leadership-style/">
                                                                                <div class="card-menu-item-img">
                                                                                    <img width="280" height="221"
                                                                                        src="https://overlandsummers.com/wp-content/uploads/2023/11/Rectangle-527-1.jpg"
                                                                                        class="attachment-full size-full"
                                                                                        alt="" decoding="async" />
                                                                                </div>
                                                                                <div class="card-menu-item-title">
                                                                                    Our Leadership style </div>
                                                                            </a>

                                                                            <a href="https://overlandsummers.com/trip-leaders/leadership-style/"
                                                                                class="menu-link-item card-menu-item-link ">
                                                                                <span class="menu-link-text">
                                                                                    LEARN MORE › </span>
                                                                            </a>
                                                                        </li>
                                                                        <li
                                                                            class="type-group group-menu-item card-menu-item">
                                                                            <a
                                                                                href="https://overlandsummers.com/trip-leaders/meet-our-leaders/">
                                                                                <div class="card-menu-item-img">
                                                                                    <img width="280" height="221"
                                                                                        src="https://overlandsummers.com/wp-content/uploads/2023/11/Rectangle-528-1.jpg"
                                                                                        class="attachment-full size-full"
                                                                                        alt="" decoding="async" />
                                                                                </div>
                                                                                <div class="card-menu-item-title">
                                                                                    Meet our leaders </div>
                                                                            </a>

                                                                            <a href="https://overlandsummers.com/trip-leaders/meet-our-leaders/"
                                                                                class="menu-link-item card-menu-item-link ">
                                                                                <span class="menu-link-text">
                                                                                    VIEW NOW › </span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="group-menu-item-main-wrapper">
                                                                    <div class="group-menu-item-main-title">
                                                                        LEAD FOR US </div>
                                                                    <ul class="type-group group-menu-item-wrapper">
                                                                        <li
                                                                            class="type-group group-menu-item card-menu-item">
                                                                            <a
                                                                                href="https://overlandsummers.com/trip-leaders/apply-to-lead/">
                                                                                <div class="card-menu-item-img">
                                                                                    <img width="280" height="221"
                                                                                        src="https://overlandsummers.com/wp-content/uploads/2023/11/Rectangle-527-2.jpg"
                                                                                        class="attachment-full size-full"
                                                                                        alt="" decoding="async" />
                                                                                </div>
                                                                                <div class="card-menu-item-title">
                                                                                    APPLY TO LEAD </div>
                                                                            </a>

                                                                            <a href="https://overlandsummers.com/trip-leaders/apply-to-lead/"
                                                                                class="menu-link-item card-menu-item-link ">
                                                                                <span class="menu-link-text">
                                                                                    LEARN MORE › </span>
                                                                            </a>
                                                                        </li>
                                                                        <li
                                                                            class="type-group group-menu-item card-menu-item">
                                                                            <a
                                                                                href="https://overlandsummers.com/trip-leaders/open-arms-fellowship/">
                                                                                <div class="card-menu-item-img">
                                                                                    <img width="280" height="221"
                                                                                        src="https://overlandsummers.com/wp-content/uploads/2023/11/Rectangle-528-2.jpg"
                                                                                        class="attachment-full size-full"
                                                                                        alt="" decoding="async" />
                                                                                </div>
                                                                                <div class="card-menu-item-title">
                                                                                    OPEN ARMS FELLOWSHIP </div>
                                                                            </a>

                                                                            <a href="https://overlandsummers.com/trip-leaders/open-arms-fellowship/"
                                                                                class="menu-link-item card-menu-item-link ">
                                                                                <span class="menu-link-text">
                                                                                    LEARN MORE › </span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="menu-submenu-bottom">

                                                                <div class="bottom-description">
                                                                    <h6>OVERLAND LEADER PORTAL</h6>
                                                                    <p>Sign into the portal here:</p>
                                                                </div>
                                                                <div class="overland-link">
                                                                    <a href="https://portal.overlandsummers.com/leaders/"
                                                                        class="btn button btn-outline" target="_blank">
                                                                        LEADER PORTAL LOGIN </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li
                                                        class="type-group first-levelmenu-item link-type-internal has-submenu">

                                                        <a href="https://overlandsummers.com/about/"
                                                            class="menu-link-item  ">
                                                            <span class="menu-link-text">
                                                                About </span>
                                                        </a>
                                                        <span class="expand-subemu-arrow">
                                                            <svg width="8" height="8" viewBox="0 0 14 8"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M1 1L7 7L13 1" stroke="white"
                                                                    stroke-width="0.5" />
                                                            </svg>
                                                        </span>
                                                        <div class="menu-submenu">
                                                            <div class="group-menu-submenu-items-wrapper">
                                                                <div class="group-menu-item-main-wrapper">
                                                                    <div class="group-menu-item-main-title">
                                                                        Why overland </div>
                                                                    <ul class="type-group group-menu-item-wrapper">
                                                                        <li
                                                                            class="type-group group-menu-item card-menu-item">
                                                                            <a
                                                                                href="https://overlandsummers.com/about/our-values/">
                                                                                <div class="card-menu-item-img">
                                                                                    <img width="280" height="220"
                                                                                        src="https://overlandsummers.com/wp-content/uploads/2024/01/Rectangle-527-e1705092751533.jpg"
                                                                                        class="attachment-full size-full"
                                                                                        alt="" decoding="async" />
                                                                                </div>
                                                                                <div class="card-menu-item-title">
                                                                                    Our values </div>
                                                                            </a>

                                                                            <a href="https://overlandsummers.com/about/our-values/"
                                                                                class="menu-link-item card-menu-item-link ">
                                                                                <span class="menu-link-text">
                                                                                    LEARN MORE › </span>
                                                                            </a>
                                                                        </li>
                                                                        <li
                                                                            class="type-group group-menu-item card-menu-item">
                                                                            <a
                                                                                href="https://overlandsummers.com/about/our-commitments/">
                                                                                <div class="card-menu-item-img">
                                                                                    <img width="280" height="221"
                                                                                        src="https://overlandsummers.com/wp-content/uploads/2023/11/Rectangle-528-3.jpg"
                                                                                        class="attachment-full size-full"
                                                                                        alt="" decoding="async" />
                                                                                </div>
                                                                                <div class="card-menu-item-title">
                                                                                    our commitments </div>
                                                                            </a>

                                                                            <a href="https://overlandsummers.com/about/our-commitments/"
                                                                                class="menu-link-item card-menu-item-link ">
                                                                                <span class="menu-link-text">
                                                                                    learn more › </span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="group-menu-item-main-wrapper">
                                                                    <div class="group-menu-item-main-title">
                                                                        About overland </div>
                                                                    <ul class="type-group group-menu-item-wrapper">
                                                                        <li
                                                                            class="type-group group-menu-item card-menu-item">
                                                                            <a
                                                                                href="https://overlandsummers.com/about/our-story/">
                                                                                <div class="card-menu-item-img">
                                                                                    <img width="280" height="221"
                                                                                        src="https://overlandsummers.com/wp-content/uploads/2023/11/Rectangle-527-4.jpg"
                                                                                        class="attachment-full size-full"
                                                                                        alt="" decoding="async" />
                                                                                </div>
                                                                                <div class="card-menu-item-title">
                                                                                    our story </div>
                                                                            </a>

                                                                            <a href="https://overlandsummers.com/about/our-story/"
                                                                                class="menu-link-item card-menu-item-link ">
                                                                                <span class="menu-link-text">
                                                                                    view story › </span>
                                                                            </a>
                                                                        </li>
                                                                        <li
                                                                            class="type-group group-menu-item card-menu-item">
                                                                            <a href="/about/our-team/">
                                                                                <div class="card-menu-item-img">
                                                                                    <img width="280" height="221"
                                                                                        src="https://overlandsummers.com/wp-content/uploads/2023/12/team-1.jpg"
                                                                                        class="attachment-full size-full"
                                                                                        alt="" decoding="async" />
                                                                                </div>
                                                                                <div class="card-menu-item-title">
                                                                                    our team </div>
                                                                            </a>

                                                                            <a href="/about/our-team/"
                                                                                class="menu-link-item card-menu-item-link ">
                                                                                <span class="menu-link-text">
                                                                                    Meet the team › </span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="type-default first-levelmenu-item link-type-internal">

                                                        <a href="https://overlandsummers.com/contact-us/"
                                                            class="menu-link-item  ">
                                                            <span class="menu-link-text">
                                                                Contact </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                        </nav><!-- #site-navigation -->
                                    </div>

                                </div>
                                <div class="mobile-menu-toggle menu-toggle">
                                    <div class="open-menu-icon">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                    <div class="close-menu-icon">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 12.7578L12.6152 1.14258" stroke="white" stroke-width="2" />
                                            <path d="M1.14062 1L12.7559 12.6152" stroke="white" stroke-width="2" />
                                        </svg>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="overland-link">
                            <a href="https://application.overlandsummers.com/" class="btn" target="_blank">
                                Apply Now </a>
                        </div>

                        <div id="header-mobile" class="header-mobile-navigation">
                            <div class="header-mobile-navigation-inner">
                                <div class="header-mobile-navigation-logo">
                                    <div class="site-logo">
                                        <a href="https://overlandsummers.com">
                                            <svg width="217" height="21" viewBox="0 0 217 21" fill="none"
                                                aria-label="Overland" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_3545_7840)">
                                                    <path
                                                        d="M12.172 21C4.5431 21 0 16.1866 0 10.5C0 4.81338 4.5431 0 12.172 0C19.8009 0 24.344 4.81338 24.344 10.5C24.344 16.1866 19.8009 21 12.172 21ZM12.172 4.19747C7.24057 4.19747 4.79782 7.12515 4.79782 10.5042C4.79782 13.8833 7.2364 16.811 12.172 16.811C17.1076 16.811 19.542 13.8833 19.542 10.5042C19.542 7.12515 17.1034 4.19747 12.172 4.19747Z"
                                                        fill="white" />
                                                    <path
                                                        d="M41.5839 20.3533H35.7714L26.2969 0.648438H31.3578L38.6777 16.1896L45.9976 0.648438H51.0585L41.5839 20.3533Z"
                                                        fill="white" />
                                                    <path
                                                        d="M55.0859 20.3533V0.648438H76.9663V4.90075H59.6541V8.44856H74.891V12.279H59.6541V16.1095H77.6428V20.3618H55.0859V20.3533Z"
                                                        fill="white" />
                                                    <path
                                                        d="M101.418 13.0637L104.584 20.3576H99.7022L96.7959 13.629H87.2713V20.3576H82.7031V0.648438H99.0299C100.976 0.648438 104.976 1.88869 104.976 7.12393C104.976 10.5578 103.16 12.3043 101.418 13.0637ZM98.3534 4.90075H87.2713V9.37664H98.3534C98.7418 9.37664 100.404 8.95479 100.404 7.12393C100.404 5.29307 98.9255 4.90075 98.3534 4.90075Z"
                                                        fill="white" />
                                                    <path
                                                        d="M110.172 20.3533V0.648438H114.74V16.1052H130.858V20.3576H110.172V20.3533Z"
                                                        fill="white" />
                                                    <path
                                                        d="M156.094 20.3533L153.989 16.4132H141.191L139.086 20.3533H134.234L144.673 0.648438H150.515L160.95 20.3533H156.098H156.094ZM147.605 4.33546L143.45 12.1609H151.755L147.605 4.33546Z"
                                                        fill="white" />
                                                    <path
                                                        d="M182.677 20.3533L169.545 6.58817V20.3533H164.977V0.648438H169.545L182.677 14.4136V0.648438H187.245V20.3533H182.677Z"
                                                        fill="white" />
                                                    <path
                                                        d="M205.525 20.3533H192.961V0.648438H205.525C212.845 0.648438 216.996 5.06949 216.996 10.503C216.996 15.9365 212.845 20.3533 205.525 20.3533ZM205.421 4.75732H197.529V16.2445H205.421C210.069 16.2445 212.194 13.6838 212.194 10.503C212.194 7.3222 210.064 4.75732 205.421 4.75732Z"
                                                        fill="white" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_3545_7840">
                                                        <rect width="217" height="21" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="header-main-close-icon">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 12.7578L12.6152 1.14258" stroke="white" stroke-width="2" />
                                            <path d="M1.14062 1L12.7559 12.6152" stroke="white" stroke-width="2" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="header-mobile-navigation-top">
                                    <!-- Harcode Portal Link -->

                                    <a href="https://portal.overlandsummers.com/" class="family-portal">
                                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.3213 10.1461C9.83633 8.96035 8.6709 8.125 7.3125 8.125H5.6875C4.3291 8.125 3.16367 8.96035 2.67871 10.1461C1.7748 9.19648 1.21875 7.91426 1.21875 6.5C1.21875 3.58262 3.58262 1.21875 6.5 1.21875C9.41738 1.21875 11.7812 3.58262 11.7812 6.5C11.7812 7.91426 11.2252 9.19648 10.3213 10.1461ZM9.30312 10.9764C8.49062 11.4867 7.53086 11.7812 6.5 11.7812C5.46914 11.7812 4.50938 11.4867 3.69434 10.9764C3.87969 10.0445 4.70234 9.34375 5.6875 9.34375H7.3125C8.29766 9.34375 9.12031 10.0445 9.30566 10.9764H9.30312ZM6.5 13C10.0897 13 13 10.0897 13 6.5C13 2.91027 10.0897 0 6.5 0C2.91027 0 0 2.91027 0 6.5C0 10.0897 2.91027 13 6.5 13ZM6.5 6.09375C5.93912 6.09375 5.48438 5.639 5.48438 5.07812C5.48438 4.51725 5.93912 4.0625 6.5 4.0625C7.06088 4.0625 7.51562 4.51725 7.51562 5.07812C7.51562 5.639 7.06088 6.09375 6.5 6.09375ZM4.26562 5.07812C4.26562 6.31211 5.26602 7.3125 6.5 7.3125C7.73398 7.3125 8.73438 6.31211 8.73438 5.07812C8.73438 3.84414 7.73398 2.84375 6.5 2.84375C5.26602 2.84375 4.26562 3.84414 4.26562 5.07812Z"
                                                fill="#276CAE" />
                                        </svg>
                                        Family Portal </a>
                                    <div class="overland-link">
                                        <a href="https://application.overlandsummers.com/" class="btn"
                                            target="_blank">
                                            Apply Now </a>
                                    </div>
                                </div>
                                <ul class="mobile-menu-list">
                                    <li class="mobile-menu-item link-type-internal has-submenu">


                                        <a href="https://overlandsummers.com/trips/"
                                            class="menu-link-item mobile-menu-item-link ">
                                            <span class="menu-link-text">
                                                Trips </span>
                                        </a>
                                        <span class="expand-subemu-arrow">
                                            <svg width="8" height="8" viewBox="0 0 14 8" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 1L7 7L13 1" stroke="white" stroke-width="0.5" />
                                            </svg>
                                        </span>
                                        <ul class="menu-submenu">
                                            <li class="mobile-submenu-item">

                                                <a href="https://overlandsummers.com/trips/"
                                                    class="menu-link-item mobile-submenu-item-link ">
                                                    <span class="menu-link-text">
                                                        View All </span>
                                                </a>
                                            </li>
                                            <li class="mobile-submenu-item">

                                                <a href="/trips/adventure/"
                                                    class="menu-link-item mobile-submenu-item-link ">
                                                    <span class="menu-link-text">
                                                        Adventure </span>
                                                </a>
                                            </li>
                                            <li class="mobile-submenu-item">

                                                <a href="/trips/explorer/"
                                                    class="menu-link-item mobile-submenu-item-link ">
                                                    <span class="menu-link-text">
                                                        Explorer </span>
                                                </a>
                                            </li>
                                            <li class="mobile-submenu-item">

                                                <a href="/trips/expedition/"
                                                    class="menu-link-item mobile-submenu-item-link ">
                                                    <span class="menu-link-text">
                                                        Expedition </span>
                                                </a>
                                            </li>
                                            <li class="mobile-submenu-item">

                                                <a href="/trips/challenge/"
                                                    class="menu-link-item mobile-submenu-item-link ">
                                                    <span class="menu-link-text">
                                                        Challenge </span>
                                                </a>
                                            </li>
                                            <li class="mobile-submenu-item">

                                                <a href="/trips/service-language/"
                                                    class="menu-link-item mobile-submenu-item-link ">
                                                    <span class="menu-link-text">
                                                        Service + Language </span>
                                                </a>
                                            </li>
                                            <li class="mobile-submenu-item">

                                                <a href="https://overlandsummers.com/compare-trips/"
                                                    class="menu-link-item mobile-submenu-item-link ">
                                                    <span class="menu-link-text">
                                                        Compare Trips </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="mobile-menu-item link-type-custom has-submenu">


                                        <a href="#" class="menu-link-item mobile-menu-item-link ">
                                            <span class="menu-link-text">
                                                Stories </span>
                                        </a>
                                        <span class="expand-subemu-arrow">
                                            <svg width="8" height="8" viewBox="0 0 14 8" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 1L7 7L13 1" stroke="white" stroke-width="0.5" />
                                            </svg>
                                        </span>
                                        <ul class="menu-submenu">
                                            <li class="mobile-submenu-item">

                                                <a href="/stories/student/"
                                                    class="menu-link-item mobile-submenu-item-link ">
                                                    <span class="menu-link-text">
                                                        Student stories </span>
                                                </a>
                                            </li>
                                            <li class="mobile-submenu-item">

                                                <a href="/stories/parent/"
                                                    class="menu-link-item mobile-submenu-item-link ">
                                                    <span class="menu-link-text">
                                                        Parent stories </span>
                                                </a>
                                            </li>
                                            <li class="mobile-submenu-item">

                                                <a href="/stories/leader/"
                                                    class="menu-link-item mobile-submenu-item-link ">
                                                    <span class="menu-link-text">
                                                        Leader stories </span>
                                                </a>
                                            </li>
                                            <li class="mobile-submenu-item">

                                                <a href="https://overlandsummers.com/trip-gallery/"
                                                    class="menu-link-item mobile-submenu-item-link ">
                                                    <span class="menu-link-text">
                                                        trip gallery </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="mobile-menu-item link-type-internal has-submenu">


                                        <a href="https://overlandsummers.com/trip-leaders/"
                                            class="menu-link-item mobile-menu-item-link ">
                                            <span class="menu-link-text">
                                                Trip Leaders </span>
                                        </a>
                                        <span class="expand-subemu-arrow">
                                            <svg width="8" height="8" viewBox="0 0 14 8" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 1L7 7L13 1" stroke="white" stroke-width="0.5" />
                                            </svg>
                                        </span>
                                        <ul class="menu-submenu">
                                            <li class="mobile-submenu-item">

                                                <a href="https://overlandsummers.com/trip-leaders/"
                                                    class="menu-link-item mobile-submenu-item-link ">
                                                    <span class="menu-link-text">
                                                        Overview </span>
                                                </a>
                                            </li>
                                            <li class="mobile-submenu-item">

                                                <a href="https://overlandsummers.com/trip-leaders/leadership-style/"
                                                    class="menu-link-item mobile-submenu-item-link ">
                                                    <span class="menu-link-text">
                                                        Our Leadership Style </span>
                                                </a>
                                            </li>
                                            <li class="mobile-submenu-item">

                                                <a href="https://overlandsummers.com/trip-leaders/meet-our-leaders/"
                                                    class="menu-link-item mobile-submenu-item-link ">
                                                    <span class="menu-link-text">
                                                        Meet Our Leaders </span>
                                                </a>
                                            </li>
                                            <li class="mobile-submenu-item">

                                                <a href="https://overlandsummers.com/trip-leaders/apply-to-lead/"
                                                    class="menu-link-item mobile-submenu-item-link ">
                                                    <span class="menu-link-text">
                                                        Apply To Lead </span>
                                                </a>
                                            </li>
                                            <li class="mobile-submenu-item">

                                                <a href="https://overlandsummers.com/trip-leaders/open-arms-fellowship/"
                                                    class="menu-link-item mobile-submenu-item-link ">
                                                    <span class="menu-link-text">
                                                        Open Arms Fellowship </span>
                                                </a>
                                            </li>
                                            <li class="mobile-submenu-item">

                                                <a href="https://portal.overlandsummers.com/leaders/"
                                                    class="menu-link-item mobile-submenu-item-link ">
                                                    <span class="menu-link-text">
                                                        Leader Portal </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="mobile-menu-item link-type-internal has-submenu">


                                        <a href="https://overlandsummers.com/about/"
                                            class="menu-link-item mobile-menu-item-link ">
                                            <span class="menu-link-text">
                                                About </span>
                                        </a>
                                        <span class="expand-subemu-arrow">
                                            <svg width="8" height="8" viewBox="0 0 14 8" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 1L7 7L13 1" stroke="white" stroke-width="0.5" />
                                            </svg>
                                        </span>
                                        <ul class="menu-submenu">
                                            <li class="mobile-submenu-item">

                                                <a href="https://overlandsummers.com/about/"
                                                    class="menu-link-item mobile-submenu-item-link ">
                                                    <span class="menu-link-text">
                                                        Overview </span>
                                                </a>
                                            </li>
                                            <li class="mobile-submenu-item">

                                                <a href="https://overlandsummers.com/about/our-values/"
                                                    class="menu-link-item mobile-submenu-item-link ">
                                                    <span class="menu-link-text">
                                                        Our Values </span>
                                                </a>
                                            </li>
                                            <li class="mobile-submenu-item">

                                                <a href="https://overlandsummers.com/about/our-commitments/"
                                                    class="menu-link-item mobile-submenu-item-link ">
                                                    <span class="menu-link-text">
                                                        Our Commitments </span>
                                                </a>
                                            </li>
                                            <li class="mobile-submenu-item">

                                                <a href="https://overlandsummers.com/about/our-story/"
                                                    class="menu-link-item mobile-submenu-item-link ">
                                                    <span class="menu-link-text">
                                                        Our Story </span>
                                                </a>
                                            </li>
                                            <li class="mobile-submenu-item">

                                                <a href="https://overlandsummers.com/our-team/"
                                                    class="menu-link-item mobile-submenu-item-link ">
                                                    <span class="menu-link-text">
                                                        Our Team </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="mobile-menu-item link-type-internal">


                                        <a href="https://overlandsummers.com/contact-us/"
                                            class="menu-link-item mobile-menu-item-link ">
                                            <span class="menu-link-text">
                                                Contact </span>
                                        </a>
                                    </li>
                                    <li class="mobile-menu-item link-type-custom has-submenu">


                                        <a href="#" class="menu-link-item mobile-menu-item-link ">
                                            <span class="menu-link-text">
                                                Request info </span>
                                        </a>
                                        <span class="expand-subemu-arrow">
                                            <svg width="8" height="8" viewBox="0 0 14 8" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 1L7 7L13 1" stroke="white" stroke-width="0.5" />
                                            </svg>
                                        </span>
                                        <ul class="menu-submenu">
                                            <li class="mobile-submenu-item">

                                                <a href="https://overlandsummers.com/request-a-catalog/"
                                                    class="menu-link-item mobile-submenu-item-link ">
                                                    <span class="menu-link-text">
                                                        Request A Catalog </span>
                                                </a>
                                            </li>
                                            <li class="mobile-submenu-item">

                                                <a href="https://overlandsummers.com/attend-a-presentation/"
                                                    class="menu-link-item mobile-submenu-item-link ">
                                                    <span class="menu-link-text">
                                                        Attend A Presentation </span>
                                                </a>
                                            </li>
                                            <li class="mobile-submenu-item">

                                                <a href="https://overlandsummers.com/request-references/"
                                                    class="menu-link-item mobile-submenu-item-link ">
                                                    <span class="menu-link-text">
                                                        Request References </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="mobile-menu-item link-type-custom has-submenu">


                                        <a href="#" class="menu-link-item mobile-menu-item-link ">
                                            <span class="menu-link-text">
                                                Resources </span>
                                        </a>
                                        <span class="expand-subemu-arrow">
                                            <svg width="8" height="8" viewBox="0 0 14 8" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 1L7 7L13 1" stroke="white" stroke-width="0.5" />
                                            </svg>
                                        </span>
                                        <ul class="menu-submenu">
                                            <li class="mobile-submenu-item">

                                                <a href="https://overlandsummers.com/risk-management/"
                                                    class="menu-link-item mobile-submenu-item-link ">
                                                    <span class="menu-link-text">
                                                        Risk Management </span>
                                                </a>
                                            </li>
                                            <li class="mobile-submenu-item">

                                                <a href="https://overlandsummers.com/expectations-communication/"
                                                    class="menu-link-item mobile-submenu-item-link ">
                                                    <span class="menu-link-text">
                                                        Expectations & Communication </span>
                                                </a>
                                            </li>
                                            <li class="mobile-submenu-item">

                                                <a href="https://overlandsummers.com/food-allergy/"
                                                    class="menu-link-item mobile-submenu-item-link ">
                                                    <span class="menu-link-text">
                                                        Food & Allergy </span>
                                                </a>
                                            </li>
                                            <li class="mobile-submenu-item">

                                                <a href="https://overlandsummers.com/financial-aid-scholarships/"
                                                    class="menu-link-item mobile-submenu-item-link ">
                                                    <span class="menu-link-text">
                                                        Financial Aid & Scholarship </span>
                                                </a>
                                            </li>
                                            <li class="mobile-submenu-item">

                                                <a href="https://overlandsummers.com/payment-travel-protection/"
                                                    class="menu-link-item mobile-submenu-item-link ">
                                                    <span class="menu-link-text">
                                                        Payment & Travel Protection </span>
                                                </a>
                                            </li>
                                            <li class="mobile-submenu-item">

                                                <a href="https://overlandsummers.com/faqs/"
                                                    class="menu-link-item mobile-submenu-item-link ">
                                                    <span class="menu-link-text">
                                                        FAQs </span>
                                                </a>
                                            </li>
                                            <li class="mobile-submenu-item">

                                                <a href="https://overlandsummers.com/blog/"
                                                    class="menu-link-item mobile-submenu-item-link ">
                                                    <span class="menu-link-text">
                                                        Blog </span>
                                                </a>
                                            </li>
                                            <li class="mobile-submenu-item">

                                                <a href="https://overlandsummers.com/careers/"
                                                    class="menu-link-item mobile-submenu-item-link ">
                                                    <span class="menu-link-text">
                                                        Careers </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="header-mobile-navigation-bottom">
                                    <span class="search-mobile-link">
                                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.563 5.28048C10.563 6.44574 10.1847 7.52214 9.54734 8.39545L12.762 11.612C13.0793 11.9293 13.0793 12.4447 12.762 12.762C12.4446 13.0793 11.9291 13.0793 11.6117 12.762L8.39709 9.54548C7.52361 10.1852 6.44699 10.561 5.28151 10.561C2.36398 10.561 0 8.19743 0 5.28048C0 2.36352 2.36398 0 5.28151 0C8.19903 0 10.563 2.36352 10.563 5.28048ZM5.28151 8.93619C7.30092 8.93619 8.93794 7.2995 8.93794 5.28048C8.93794 3.26146 7.30092 1.62476 5.28151 1.62476C3.26209 1.62476 1.62508 3.26146 1.62508 5.28048C1.62508 7.2995 3.26209 8.93619 5.28151 8.93619Z"
                                                fill="#276CAE" />
                                        </svg>

                                        <span class="search-mobile-link-text"> Search</span>
                                        <div class="search-mobile-link-form">

                                            <form role="search" method="get" class="search-form"
                                                action="https://overlandsummers.com/">
                                                <div class="search-form--inner">
                                                    <input type="search" class="search-field" title="Search"
                                                        placeholder="Search" value="" name="s" />
                                                    <button class="submit-button-search" type="submit">
                                                        <svg width="9" height="9" viewBox="0 0 9 9"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg"
                                                            aria-label="Submit Search">
                                                            <path
                                                                d="M7.31286 3.65571C7.31286 4.46243 7.05093 5.20764 6.6097 5.81223L8.8352 8.03906C9.05493 8.25875 9.05493 8.61553 8.8352 8.83523C8.61546 9.05492 8.25861 9.05492 8.03887 8.83523L5.81337 6.60841C5.20865 7.05131 4.4633 7.31143 3.65643 7.31143C1.6366 7.31143 0 5.67515 0 3.65571C0 1.63628 1.6366 0 3.65643 0C5.67625 0 7.31286 1.63628 7.31286 3.65571ZM3.65643 6.18659C5.05448 6.18659 6.1878 5.0535 6.1878 3.65571C6.1878 2.25793 5.05448 1.12484 3.65643 1.12484C2.25837 1.12484 1.12505 2.25793 1.12505 3.65571C1.12505 5.0535 2.25837 6.18659 3.65643 6.18659Z"
                                                                fill="white" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>


                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header><!-- #site-header -->
            <div id="content" class="site-content">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main">
                        <section id="section-0" wow fadeIn>

                            <div class="container">
                                <div class="section-big-slider--title big-title">
                                    <h2>Nous ne vendons pas des guides<br><strong>nous vendons le frisson de l’exploration
                                            sans se
                                            perdre.</strong></h2>

                                </div>

                            </div>
                        </section>
                        <section id="section-1" class="big-hero-section  wow fadeIn">
                            <div class="container big-hero-section--box">

                                <div class="big-hero-section--box-content">
                                    <p class="tagline">
                                        Découvrez nos destinations </p>
                                    <h1>ON VOUS EMMENE ICI ...</h1>
                                    <h4>Summer Hiking Trips for 4th to 12th Graders</h4>

                                    <div class="big-hero-section--box-content-links">
                                        <a href="https://overlandsummers.com/request-a-catalog/"
                                            class="btn button secondary-button" target="_self">
                                            REQUEST INFORMATION </a>
                                        <button class="button transparent-button popmake-1554">
                                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_3545_7819)">
                                                    <path
                                                        d="M0.0781789 8.46428C0.0636357 3.75032 3.86348 -0.122444 8.4472 0.00296242C12.6822 0.121705 16.3846 3.76365 16.3666 8.52698C16.3587 10.7764 15.4928 12.9304 13.9599 14.5153C12.4271 16.1001 10.3524 16.9859 8.19241 16.9774C6.03245 16.9692 3.96412 16.0674 2.44232 14.4711C0.92052 12.8747 0.0703256 10.7137 0.0781789 8.46428ZM12.1121 8.61331C12.0062 8.46004 11.882 8.3216 11.7424 8.20104C10.1136 7.19446 8.4792 6.19605 6.8396 5.20552C6.43064 4.95622 6.10488 5.131 6.10488 5.61748C6.08859 7.62369 6.08859 9.62989 6.10488 11.6361C6.10488 12.1262 6.43064 12.3146 6.83785 12.0653C8.49054 11.0702 10.1368 10.0637 11.7764 9.04587C11.8968 8.96621 11.9687 8.79324 12.1135 8.61331H12.1121Z"
                                                        fill="white" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_3545_7819">
                                                        <rect width="16.2884" height="16.9775" fill="white"
                                                            transform="translate(0.078125)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <span>
                                                Watch our video </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="iframe-wrapper">
                                <video playsinline autoplay loop muted
                                    poster="https://assets.overlandsummers.com/HomeBanner.jpg">
                                    <source src="https://assets.overlandsummers.com/HomeBanner.mp4" type="video/mp4" />
                                </video>
                            </div>
                        </section>
                        <section id="section-2" class="section-big-slider  wow fadeIn">
                            <div class="container">
                                <div class="section-big-slider--title big-title">
                                    <h2>Choose your next <strong>Adventure</strong></h2>
                                    <p>Overland&#8217;s trips take our students on a journey of growth and discovery.
                                        Focused on<br />
                                        safety, and free of screens, Overland is wholesome, adventurous, and fun.</p>
                                </div>
                                <div class="section-big-slider--items">

                                    <div class="section-big-slider--items-item"
                                        style="
                     background: linear-gradient(
                       to left,
                       rgba(25, 40, 81, 0.00) 47.02%,
                       #192A51 100%
                     ),
                     url(https://overlandsummers.com/wp-content/uploads/2023/11/bk.jpg) lightgray;
                     background-position: center;
                     background-size: cover;
                     background-repeat: no-repeat;
                   ">
                                        <div class="section-big-slider--items-item-description">
                                            <p class="tagline-left">
                                                featured trip </p>
                                            <div class="text">
                                                <h3>BERKSHIRE ADVENTURE</h3>
                                                <p>With a wide range of fun outdoor activities, Berkshire Adventure is a
                                                    great introductory hiking trip for our youngest students.</p>
                                            </div>

                                            <a href="https://overlandsummers.com/trips/adventure/berkshire-adventure/"
                                                class="button secondary-button">
                                                View Trip </a>
                                        </div>
                                        <p class="category">
                                            Grades 4 - 6 </p>
                                    </div>

                                    <div class="section-big-slider--items-item"
                                        style="
                     background: linear-gradient(
                       to left,
                       rgba(25, 40, 81, 0.00) 47.02%,
                       #192A51 100%
                     ),
                     url(https://overlandsummers.com/wp-content/uploads/2023/11/newengland-explorer.jpg) lightgray;
                     background-position: center;
                     background-size: cover;
                     background-repeat: no-repeat;
                   ">
                                        <div class="section-big-slider--items-item-description">
                                            <p class="tagline-left">
                                                featured trip </p>
                                            <div class="text">
                                                <h3>New England Explorer</h3>
                                                <p>Explore Massachusetts’ Berkshire Hills, Vermont’s Green Mountains, New
                                                    Hampshire’s White Mountains, and Maine’s famous coast.</p>
                                            </div>

                                            <a href="https://overlandsummers.com/trips/explorer/new-england-explorer/"
                                                class="button secondary-button">
                                                View Trip </a>
                                        </div>
                                        <p class="category">
                                            Grades 6 - 9 </p>
                                    </div>

                                    <div class="section-big-slider--items-item"
                                        style="
                     background: linear-gradient(
                       to left,
                       rgba(25, 40, 81, 0.00) 47.02%,
                       #192A51 100%
                     ),
                     url(https://overlandsummers.com/wp-content/uploads/2023/11/rocky-expedition-feature.jpg) lightgray;
                     background-position: center;
                     background-size: cover;
                     background-repeat: no-repeat;
                   ">
                                        <div class="section-big-slider--items-item-description">
                                            <p class="tagline-left">
                                                featured trip </p>
                                            <div class="text">
                                                <h3>Rocky Mountain Expedition</h3>
                                                <p>Over two weeks, we’ll backpack, raft, and summit a 14er. Standing at over
                                                    14,000 feet, we’ll look back on accomplishments, laughter and smiles.
                                                </p>
                                            </div>

                                            <a href="https://overlandsummers.com/trips/expedition/rocky-mountain-expedition/"
                                                class="button secondary-button">
                                                View Trip </a>
                                        </div>
                                        <p class="category">
                                            Grades 9 - 11 </p>
                                    </div>

                                    <div class="section-big-slider--items-item"
                                        style="
                     background: linear-gradient(
                       to left,
                       rgba(25, 40, 81, 0.00) 47.02%,
                       #192A51 100%
                     ),
                     url(https://overlandsummers.com/wp-content/uploads/2023/11/alps.jpg) lightgray;
                     background-position: center;
                     background-size: cover;
                     background-repeat: no-repeat;
                   ">
                                        <div class="section-big-slider--items-item-description">
                                            <p class="tagline-left">
                                                featured trip </p>
                                            <div class="text">
                                                <h3>Alpine Challenge</h3>
                                                <p>Hike the best of the Alps—across the Bernese Oberland, below the
                                                    Matterhorn, through deep green valleys and over Alpine passes.</p>
                                            </div>

                                            <a href="https://overlandsummers.com/trips/challenge/alpine-challenge/"
                                                class="button secondary-button">
                                                View Trip </a>
                                        </div>
                                        <p class="category">
                                            Grades 10 - 12 </p>
                                    </div>
                                </div>
                        </section>
                        <section id="section-3" class="section-big-cards  wow fadeIn">
                            <div class="container">
                                <div class="section-big-cards--title big-title">
                                    <h2>Four Levels, <strong>One Goal</strong></h2>
                                    <p>There&#8217;s a reason families return to Overland year after year: at every level,
                                        our trips<br />
                                        offer thoughtful planning, appropriate challenges, and supportive groups.</p>
                                </div>
                            </div>

                            <div class="trip-filters inital-state">
                                <div class="container">

                                    <div class="trip-filters-selects">

                                        <div class="select-option">
                                            <select name="programType" autocomplete="off">
                                                <option value="">
                                                    Select trip type </option>
                                                <option value="15">
                                                    Adventure </option>
                                                <option value="17">
                                                    Explorer </option>
                                                <option value="18">
                                                    Expedition </option>
                                                <option value="19">
                                                    Challenge </option>
                                                <option value="30">
                                                    Service/Language </option>
                                            </select>
                                        </div>
                                        <div class="select-option">
                                            <select name="grade" autocomplete="off">
                                                <option value="">
                                                    Select by grade </option>

                                                <option value="2">
                                                    4 </option>
                                                <option value="3">
                                                    5 </option>
                                                <option value="4">
                                                    6 </option>
                                                <option value="5">
                                                    7 </option>
                                                <option value="8">
                                                    8 </option>
                                                <option value="9">
                                                    9 </option>
                                                <option value="7">
                                                    10 </option>
                                                <option value="10">
                                                    11 </option>
                                                <option value="11">
                                                    12 </option>
                                            </select>
                                        </div>
                                        <div class="select-option">
                                            <select name="duration" autocomplete="off">

                                                <option value="">
                                                    Select by length </option>
                                                <option value="22">
                                                    1 week </option>
                                                <option value="23">
                                                    2 weeks </option>
                                                <option value="41">
                                                    3 weeks </option>
                                            </select>

                                        </div>


                                        <div class="button-second buttons">
                                            <a class="button secondary-button"
                                                href="https://overlandsummers.com/trips/">
                                                see all trips </a>
                                        </div>
                                        <div class="buttons compare-reset-button">
                                            <a class="button " href="https://overlandsummers.com/compare-trips/">
                                                compare trips </a>

                                            <div class="reset-filter">
                                                Clear All filters
                                            </div>
                                        </div>
                                    </div>



                                    <div class="section-big-cards--items">
                                        <div class="section-big-cards--items-item">
                                            <div class="image-text">
                                                <div class="image-wrapper">
                                                    <img src="https://overlandsummers.com/wp-content/uploads/2023/12/adventure-3.svg"
                                                        class="attachment-full size-full" alt=""
                                                        decoding="async" loading="lazy" />
                                                </div>
                                                <p>
                                                    Adventure <span>
                                                        Grades 4-6 </span>
                                                </p>
                                            </div>

                                            <a href="https://overlandsummers.com/trips/adventure/berkshire-adventure/"
                                                class="section-big-cards--items-item-description-wrapper">
                                                <div class="section-big-cards--items-item-description"
                                                    style="background-image: url('https://overlandsummers.com/wp-content/uploads/2023/11/bk-filter.jpg');">
                                                    <h3>
                                                        Berkshire Adventure </h3>
                                                    <p class="link secondary-link">
                                                        View Trip ›
                                                    </p>
                                                </div>
                                            </a>
                                            <a href="https://overlandsummers.com/trips/adventure/"
                                                class="button secondary-button">View All
                                                Adventure Trips
                                            </a>
                                        </div>
                                        <div class="section-big-cards--items-item">
                                            <div class="image-text">
                                                <div class="image-wrapper">
                                                    <img src="https://overlandsummers.com/wp-content/uploads/2023/12/explorer-2.svg"
                                                        class="attachment-full size-full" alt=""
                                                        decoding="async" loading="lazy" />
                                                </div>
                                                <p>
                                                    Explorer <span>
                                                        Grades 6-9 </span>
                                                </p>
                                            </div>

                                            <a href="https://overlandsummers.com/trips/explorer/alaska-explorer/"
                                                class="section-big-cards--items-item-description-wrapper">
                                                <div class="section-big-cards--items-item-description"
                                                    style="background-image: url('https://overlandsummers.com/wp-content/uploads/2023/11/ak-card.jpg');">
                                                    <h3>
                                                        Alaska Explorer </h3>
                                                    <p class="link secondary-link">
                                                        View Trip ›
                                                    </p>
                                                </div>
                                            </a>
                                            <a href="https://overlandsummers.com/trips/explorer/"
                                                class="button secondary-button">View All
                                                Explorer Trips
                                            </a>
                                        </div>
                                        <div class="section-big-cards--items-item">
                                            <div class="image-text">
                                                <div class="image-wrapper">
                                                    <img src="https://overlandsummers.com/wp-content/uploads/2023/12/expedition.svg"
                                                        class="attachment-full size-full" alt=""
                                                        decoding="async" loading="lazy" />
                                                </div>
                                                <p>
                                                    Expedition <span>
                                                        Grades 9-11 </span>
                                                </p>
                                            </div>

                                            <a href="https://overlandsummers.com/trips/expedition/alaska-expedition/"
                                                class="section-big-cards--items-item-description-wrapper">
                                                <div class="section-big-cards--items-item-description"
                                                    style="background-image: url('https://overlandsummers.com/wp-content/uploads/2023/11/alaska-expedition-card.jpg');">
                                                    <h3>
                                                        Alaska Expedition </h3>
                                                    <p class="link secondary-link">
                                                        View Trip ›
                                                    </p>
                                                </div>
                                            </a>
                                            <a href="https://overlandsummers.com/trips/expedition/"
                                                class="button secondary-button">View All
                                                Expedition Trips
                                            </a>
                                        </div>
                                        <div class="section-big-cards--items-item">
                                            <div class="image-text">
                                                <div class="image-wrapper">
                                                    <img src="https://overlandsummers.com/wp-content/uploads/2023/12/challenge.svg"
                                                        class="attachment-full size-full" alt=""
                                                        decoding="async" loading="lazy" />
                                                </div>
                                                <p>
                                                    Challenge <span>
                                                        Grades 10-12 </span>
                                                </p>
                                            </div>

                                            <a href="https://overlandsummers.com/trips/challenge/alpine-challenge/"
                                                class="section-big-cards--items-item-description-wrapper">
                                                <div class="section-big-cards--items-item-description"
                                                    style="background-image: url('https://overlandsummers.com/wp-content/uploads/2023/11/alp-card.jpg');">
                                                    <h3>
                                                        Alpine Challenge </h3>
                                                    <p class="link secondary-link">
                                                        View Trip ›
                                                    </p>
                                                </div>
                                            </a>
                                            <a href="https://overlandsummers.com/trips/challenge/"
                                                class="button secondary-button">View All
                                                Challenge Trips
                                            </a>
                                        </div>
                                    </div>
                                    <div class="trip-filters-details">
                                        <ul>
                                            <li class="available">Available</li>
                                            <li class="limited">Limited</li>
                                            <li class="waitlist">Waitlist</li>
                                        </ul>
                                    </div>
                                    <div class="trip-filters-items with-slider">
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section id="section-4"
                            class="half-section right-image section-with-icons dark-bg-gradient  wow fadeIn">
                            <div class="container-sm">
                                <div class="half-section--box">
                                    <div class="half-section--box-text">
                                        <p class="tagline-left">
                                            FORTY YEARS OF SUMMER ADVENTURE </p>
                                        <div class="half-section--box-text-content">
                                            <h2>SUPERB LEADERSHIP, HIGH STANDARDS, &amp; <strong>ROCK-SOLID VALUES</strong>
                                            </h2>
                                            <p>For four decades, families have trusted Overland to create nurturing
                                                environments where their children thrive.</p>
                                        </div>
                                        <a href="https://overlandsummers.com/about/our-values/"
                                            class="btn button secondary-button" target="_self">
                                            Overland's values </a>
                                    </div>
                                    <div class="half-section--box-img">
                                        <img width="683" height="462"
                                            src="https://overlandsummers.com/wp-content/uploads/2023/11/about.png"
                                            class="attachment-full size-full" alt="" decoding="async"
                                            loading="lazy"
                                            srcset="https://overlandsummers.com/wp-content/uploads/2023/11/about.png 683w, https://overlandsummers.com/wp-content/uploads/2023/11/about-300x203.png 300w"
                                            sizes="auto, (max-width: 683px) 100vw, 683px" />
                                    </div>
                                </div>
                            </div>

                            <div class="container">
                                <div class="half-section--icons">
                                    <div class="half-section--item">
                                        <div class="half-section--item-icon">
                                            <img src="https://overlandsummers.com/wp-content/uploads/2023/10/Ebene_1-1.svg"
                                                class="attachment-full size-full" alt="" decoding="async"
                                                loading="lazy" />
                                        </div>
                                        <div class="half-section--item-description">
                                            <p class="half-section--item-title">
                                                carefully crafted trips </p>
                                            <p class="half-section--item-text">
                                                Every Overland trip offers thoughtfully planned itineraries full of
                                                adventure. </p>
                                        </div>
                                    </div>
                                    <div class="half-section--item">
                                        <div class="half-section--item-icon">
                                            <img src="https://overlandsummers.com/wp-content/uploads/2023/10/elements-1.svg"
                                                class="attachment-full size-full" alt="" decoding="async"
                                                loading="lazy" />
                                        </div>
                                        <div class="half-section--item-description">
                                            <p class="half-section--item-title">
                                                exceptional leaders </p>
                                            <p class="half-section--item-text">
                                                Capable and caring, Overland’s leaders are role models of the highest order.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="half-section--item">
                                        <div class="half-section--item-icon">
                                            <img src="https://overlandsummers.com/wp-content/uploads/2023/10/Layer_1-5.svg"
                                                class="attachment-full size-full" alt="" decoding="async"
                                                loading="lazy" />
                                        </div>
                                        <div class="half-section--item-description">
                                            <p class="half-section--item-title">
                                                FOCUSED ON SAFETY </p>
                                            <p class="half-section--item-text">
                                                Overland is accredited by the nationally recognized American Camp
                                                Association.<br />
                                            </p>
                                        </div>
                                    </div>
                                    <div class="half-section--item">
                                        <div class="half-section--item-icon">
                                            <img src="https://overlandsummers.com/wp-content/uploads/2023/10/Layer_1-6.svg"
                                                class="attachment-full size-full" alt="" decoding="async"
                                                loading="lazy" />
                                        </div>
                                        <div class="half-section--item-description">
                                            <p class="half-section--item-title">
                                                phone & Internet Free </p>
                                            <p class="half-section--item-text">
                                                Overland offers supportive, wholesome experiences free of phones and
                                                screens. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section id="section-5" class="half-section right-image wider-container  wow fadeIn">
                            <div class="container">
                                <div class="half-section--box">
                                    <div class="half-section--box-text">
                                        <p class="tagline-left">
                                            Meet Our Leaders </p>
                                        <div class="half-section--box-text-content">
                                            <h2><strong>Role Models</strong> of the Highest Order</h2>
                                            <p>Capable and caring, our leaders focus on creating supportive and wholesome
                                                groups.</p>
                                        </div>
                                        <a href="https://overlandsummers.com/trip-leaders/leadership-style/"
                                            class="btn button secondary-button" target="_self">
                                            Our leadership style </a>
                                    </div>
                                    <div class="half-section--box-img">
                                        <img width="959" height="652"
                                            src="https://overlandsummers.com/wp-content/uploads/2023/11/leaders-2.jpg"
                                            class="attachment-full size-full" alt="" decoding="async"
                                            loading="lazy"
                                            srcset="https://overlandsummers.com/wp-content/uploads/2023/11/leaders-2.jpg 959w, https://overlandsummers.com/wp-content/uploads/2023/11/leaders-2-300x204.jpg 300w, https://overlandsummers.com/wp-content/uploads/2023/11/leaders-2-768x522.jpg 768w"
                                            sizes="auto, (max-width: 959px) 100vw, 959px" />
                                    </div>
                                </div>
                            </div>

                            <div class="container">
                            </div>
                        </section>
                        <section id="section-6" class="half-section left-image wider-container  wow fadeIn">
                            <div class="container">
                                <div class="half-section--box">
                                    <div class="half-section--box-text">
                                        <p class="tagline-left">
                                            The Best of the Best </p>
                                        <div class="half-section--box-text-content">
                                            <h2>Overland’s Leaders</h2>
                                            <p>Our talented leaders have one goal: the success of each of their students.
                                                This, perhaps more than anything else, has made the difference for us as a
                                                summer adventure camp and for the forty thousand students who have joined
                                                us.</p>
                                        </div>
                                        <a href="https://overlandsummers.com/trip-leaders/meet-our-leaders/"
                                            class="btn button secondary-button" target="_self">
                                            Meet our leaders </a>
                                    </div>
                                    <div class="half-section--box-img">
                                        <img width="960" height="654"
                                            src="https://overlandsummers.com/wp-content/uploads/2023/11/leaders-3.jpg"
                                            class="attachment-full size-full" alt="" decoding="async"
                                            loading="lazy"
                                            srcset="https://overlandsummers.com/wp-content/uploads/2023/11/leaders-3.jpg 960w, https://overlandsummers.com/wp-content/uploads/2023/11/leaders-3-300x204.jpg 300w, https://overlandsummers.com/wp-content/uploads/2023/11/leaders-3-768x523.jpg 768w"
                                            sizes="auto, (max-width: 960px) 100vw, 960px" />
                                    </div>
                                </div>
                            </div>

                            <div class="container">
                            </div>
                        </section>
                        <section id="section-7" class="stories-slider-section  wow fadeIn">
                            <div class="container">

                                <div class="stories-slider-items">
                                    <div class="stories-slider-item active " data-tab="0">
                                        <div class="stories-slider-item--content">
                                            <div class="stories-slider-item--content-description">
                                                <p class="tagline-left">
                                                    Far More Than Just A Summer Experience </p>
                                                <h2>Four Decades of <strong>Adventure</strong></h2>
                                                <p>The Overland story is best told by our families, students, and leaders.
                                                </p>
                                                <a class="link secondary-link"
                                                    href="https://overlandsummers.com/stories/student/">
                                                    View all Student stories › </a>
                                            </div>

                                            <div class="stories-slider-navigation">
                                                <span class="sories-slider-navigation-item active" data-target="0">
                                                    Student </span>
                                                <span class="sories-slider-navigation-item " data-target="1">
                                                    Parent </span>
                                                <span class="sories-slider-navigation-item " data-target="2">
                                                    Leader </span>
                                            </div>
                                        </div>
                                        <div class="stories-slider-item--wrapper">

                                            <img width="381" height="427"
                                                src="https://overlandsummers.com/wp-content/uploads/2023/11/Rectangle-496-3.jpg"
                                                class="attachment-full size-full wp-post-image" alt=""
                                                decoding="async" loading="lazy"
                                                srcset="https://overlandsummers.com/wp-content/uploads/2023/11/Rectangle-496-3.jpg 381w, https://overlandsummers.com/wp-content/uploads/2023/11/Rectangle-496-3-268x300.jpg 268w"
                                                sizes="auto, (max-width: 381px) 100vw, 381px" />

                                            <div class="stories-slider-item--wrapper-description">
                                                <p><strong>“Words cannot describe the intimate dynamic of an Overland
                                                        trip&#8230;</strong></p>
                                                <p>something I crave every day I am not on a trip or visiting my Overland
                                                    friends. At Overland, everyone is important and everything that we do is
                                                    as a team. Such a supportive and collaborative environment is hard to
                                                    find anywhere else. I am so grateful for the long-lasting connections
                                                    that I made on my trips!”</p>
                                                <strong class="stories-slider-item--name">
                                                    Ali </strong>
                                                <p class="trip-type">
                                                    Alpine Challenge </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="stories-slider-item  " data-tab="1">
                                        <div class="stories-slider-item--content">
                                            <div class="stories-slider-item--content-description">
                                                <p class="tagline-left">
                                                    Beyond the bounds of single summer </p>
                                                <h2>The sky <strong>is the limit</strong></h2>
                                                <p>Families witness the growth born out of an independent experience and
                                                    age-appropriate challenges.</p>
                                                <a class="link secondary-link"
                                                    href="https://overlandsummers.com/stories/parent/">
                                                    View all Parent stories › </a>
                                            </div>

                                            <div class="stories-slider-navigation">
                                                <span class="sories-slider-navigation-item active" data-target="0">
                                                    Student </span>
                                                <span class="sories-slider-navigation-item " data-target="1">
                                                    Parent </span>
                                                <span class="sories-slider-navigation-item " data-target="2">
                                                    Leader </span>
                                            </div>
                                        </div>
                                        <div class="stories-slider-item--wrapper">

                                            <img width="381" height="427"
                                                src="https://overlandsummers.com/wp-content/uploads/2023/11/Rectangle-496-4.jpg"
                                                class="attachment-full size-full wp-post-image" alt=""
                                                decoding="async" loading="lazy"
                                                srcset="https://overlandsummers.com/wp-content/uploads/2023/11/Rectangle-496-4.jpg 381w, https://overlandsummers.com/wp-content/uploads/2023/11/Rectangle-496-4-268x300.jpg 268w"
                                                sizes="auto, (max-width: 381px) 100vw, 381px" />

                                            <div class="stories-slider-item--wrapper-description">
                                                <p><strong>“In sending our kids to Overland, our goal was for them to become
                                                        adventurous, acquire independence, confidence and
                                                        leadership.</strong></p>
                                                <p>We also wanted them to be exposed to different cultures and experiences
                                                    which would stretch them beyond their comfort zone.”</p>
                                                <div class="full-name-wrapper">
                                                    <p><strong>Apurva and Seema</strong></p>
                                                    <p>Aditi &amp; Krisha&#8217;s Parents</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="stories-slider-item  " data-tab="2">
                                        <div class="stories-slider-item--content">
                                            <div class="stories-slider-item--content-description">
                                                <p class="tagline-left">
                                                    More than counselors or guides </p>
                                                <h2>Nurture and <strong>inspire</strong></h2>
                                                <p>Overland leaders are role models of the highest caliber &#8211; and love
                                                    what they do.</p>
                                                <a class="link secondary-link"
                                                    href="https://overlandsummers.com/stories/leader/">
                                                    View all Leaders stories › </a>
                                            </div>

                                            <div class="stories-slider-navigation">
                                                <span class="sories-slider-navigation-item active" data-target="0">
                                                    Student </span>
                                                <span class="sories-slider-navigation-item " data-target="1">
                                                    Parent </span>
                                                <span class="sories-slider-navigation-item " data-target="2">
                                                    Leader </span>
                                            </div>
                                        </div>
                                        <div class="stories-slider-item--wrapper">

                                            <img width="342" height="427"
                                                src="https://overlandsummers.com/wp-content/uploads/2023/11/leader-nico.jpg"
                                                class="attachment-full size-full wp-post-image" alt=""
                                                decoding="async" loading="lazy"
                                                srcset="https://overlandsummers.com/wp-content/uploads/2023/11/leader-nico.jpg 342w, https://overlandsummers.com/wp-content/uploads/2023/11/leader-nico-240x300.jpg 240w"
                                                sizes="auto, (max-width: 342px) 100vw, 342px" />

                                            <div class="stories-slider-item--wrapper-description">
                                                <p><strong>“I believe leadership is being able to love and care for all of
                                                        the team members&#8230;</strong></p>
                                                <p>I’ve learned that leadership does not only rest on the “leader.” In a
                                                    team, we all can and should lead. This summer, I’ll strive to empower
                                                    and encourage ownership in each and every team member over our summer
                                                    adventure!”</p>
                                                <div class="full-name-wrapper">
                                                    <p><strong>Ninco<br />
                                                        </strong>PYRENEES EXPEDITION<strong><br />
                                                        </strong></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </main><!-- #main -->
                </div><!-- #primary -->

                <section class="bottom-page" id="bottom-page">
                    <div class="container">
                        <div class="bottom-page--items">


                            <div class="bottom-page--items-item">
                                <div class="bottom-page--img">
                                    <img src="https://overlandsummers.com/wp-content/uploads/2023/11/Layer_1.svg"
                                        class="attachment-full size-full" alt="Apply for Trip" decoding="async"
                                        loading="lazy" />
                                </div>
                                <div class="bottom-page--items-item--content">
                                    <p class="bottom-page--text">
                                        Apply for trip </p>
                                    <div class="overland-link">
                                        <a href="https://application.overlandsummers.com/" class=""
                                            target="_blank">
                                            apply now › </a>
                                    </div>
                                </div>
                            </div>


                            <div class="bottom-page--items-item">
                                <div class="bottom-page--img">
                                    <img src="https://overlandsummers.com/wp-content/uploads/2023/11/Layer_1-1.svg"
                                        class="attachment-full size-full" alt="View Catalog" decoding="async"
                                        loading="lazy" />
                                </div>
                                <div class="bottom-page--items-item--content">
                                    <p class="bottom-page--text">
                                        view catalog </p>
                                    <div class="overland-link">
                                        <a href="https://overlandsummers.com/request-a-catalog/" class=""
                                            target="_self">
                                            REQUEST CATALOG › </a>
                                    </div>
                                </div>
                            </div>


                            <div class="bottom-page--items-item">
                                <div class="bottom-page--img">
                                    <img src="https://overlandsummers.com/wp-content/uploads/2023/11/Group-7738.svg"
                                        class="attachment-full size-full" alt="Info Sessions" decoding="async"
                                        loading="lazy" />
                                </div>
                                <div class="bottom-page--items-item--content">
                                    <p class="bottom-page--text">
                                        info sessions </p>
                                    <div class="overland-link">
                                        <a href="https://overlandsummers.com/attend-a-presentation/" class=""
                                            target="_self">
                                            sign up › </a>
                                    </div>
                                </div>
                            </div>


                            <div class="bottom-page--items-item">
                                <div class="bottom-page--img">
                                    <img src="https://overlandsummers.com/wp-content/uploads/2023/11/Layer_1-2.svg"
                                        class="attachment-full size-full" alt="Talk with Us" decoding="async"
                                        loading="lazy" />
                                </div>
                                <div class="bottom-page--items-item--content">
                                    <p class="bottom-page--text">
                                        talk with us </p>
                                    <div class="overland-link">
                                        <a href="https://overlandsummers.com/request-references/" class=""
                                            target="_self">
                                            REQUEST REFERENCES › </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
            </div><!-- #content -->
            <footer id="site-footer" class="site-footer">
                <div class="site-footer-wrapper">
                    <div class="site-footer-widgets-wrapper">
                        <div class="container">
                            <div class="site-footer-widgets-inner">
                                <div class="footer-row">
                                    <div class="footer-column footer-column-1 first-column">
                                        <aside id="media_image-2" class="widget widget_media_image"><a
                                                href="https://overlandsummers.com/"><img
                                                    src="https://overlandsummers.com/wp-content/uploads/2023/11/Layer_1-10.svg"
                                                    class="image wp-image-1231  attachment-full size-full"
                                                    alt="Overland Logo" style="max-width: 100%; height: auto;"
                                                    decoding="async" loading="lazy" /></a></aside>
                                        <aside id="text-13" class="widget widget_text">
                                            <div class="textwidget">
                                                <p>Call Us: <a href="tel:4134589672">(413) 458-9672</a><br />
                                                    Email Us: <a
                                                        href="/cdn-cgi/l/email-protection#8fe6e1e9e0cfe0f9eafde3eee1ebfcfae2e2eafdfca1ece0e2">Send
                                                        Message ›</a></p>
                                            </div>
                                        </aside>
                                        <aside id="text-15" class="widget widget_text">
                                            <div class="textwidget">
                                                <div class="social-wrapper">
                                                    <ul class="social-list">
                                                        <li class="social-item social-item-facebook"><a target="_blank"
                                                                class="social-link"
                                                                href="https://www.facebook.com/overlandsummers"><span
                                                                    class="social-icon"><svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="8" height="14"
                                                                        viewBox="0 0 8 14" aria-label="Facebook">
                                                                        <path id="Icon_awesome-facebook-f"
                                                                            data-name="Icon awesome-facebook-f"
                                                                            d="M9.085,7.875,9.5,5.341H6.906V3.7c0-.693.362-1.369,1.524-1.369H9.609V.171A15.314,15.314,0,0,0,7.516,0,3.2,3.2,0,0,0,3.984,3.41V5.341H1.609V7.875H3.984V14H6.906V7.875Z"
                                                                            transform="translate(-1.609)"
                                                                            fill="currentColor" />
                                                                    </svg></span></a></li>
                                                        <li class="social-item social-item-instagram"><a target="_blank"
                                                                class="social-link"
                                                                href="https://www.instagram.com/overlandsummers/"><span
                                                                    class="social-icon"><svg
                                                                        id="Icon_ionic-logo-instagram"
                                                                        data-name="Icon ionic-logo-instagram"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="14" height="14"
                                                                        viewBox="0 0 14 14" aria-label="Instagram">
                                                                        <path id="Path_3" data-name="Path 3"
                                                                            d="M14.417,5.667a2.925,2.925,0,0,1,2.917,2.917v5.833a2.925,2.925,0,0,1-2.917,2.917H8.583a2.925,2.925,0,0,1-2.917-2.917V8.583A2.925,2.925,0,0,1,8.583,5.667h5.833m0-1.167H8.583A4.1,4.1,0,0,0,4.5,8.583v5.833A4.1,4.1,0,0,0,8.583,18.5h5.833A4.1,4.1,0,0,0,18.5,14.417V8.583A4.1,4.1,0,0,0,14.417,4.5Z"
                                                                            transform="translate(-4.5 -4.5)"
                                                                            fill="currentColor" />
                                                                        <path id="Path_4" data-name="Path 4"
                                                                            d="M24.562,10.873a.937.937,0,1,1,.937-.937A.934.934,0,0,1,24.562,10.873Z"
                                                                            transform="translate(-13.808 -6.69)"
                                                                            fill="currentColor" />
                                                                        <path id="Path_5" data-name="Path 5"
                                                                            d="M15,12.5A2.5,2.5,0,1,1,12.5,15,2.5,2.5,0,0,1,15,12.5m0-1.249A3.746,3.746,0,1,0,18.742,15,3.747,3.747,0,0,0,15,11.25Z"
                                                                            transform="translate(-7.996 -7.996)"
                                                                            fill="currentColor" />
                                                                    </svg></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </aside>
                                    </div>
                                    <div class="footer-column footer-column-2 ">
                                        <aside id="text-6" class="widget widget_text">
                                            <h4 class="widget-title">Find us</h4>
                                            <div class="textwidget">
                                                <p>Overland Summers<br />
                                                    P.O. Box 31<br />
                                                    Williamstown, MA 01267</p>
                                            </div>
                                        </aside>
                                        <aside id="custom_html-2" class="widget_text widget widget_custom_html">
                                            <h4 class="widget-title">Hours</h4>
                                            <div class="textwidget custom-html-widget">
                                                <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                                                <script type="text/javascript">
                                                    const ts_start = new Date(Date.UTC(2024, 1, 1, 13, 30, 0));
                                                    const ts_end = new Date(Date.UTC(2024, 1, 1, 23, 30, 0));
                                                    const ts_end_fri = new Date(Date.UTC(2024, 1, 1, 20, 0, 0));
                                                    document.write("Mon-Fri: " + ts_start.toLocaleTimeString('en-US', {
                                                        hour12: true,
                                                        hour: "numeric",
                                                        minute: "2-digit"
                                                    }) + "-" + ts_end.toLocaleTimeString('en-US', {
                                                        hour12: true,
                                                        hour: "numeric",
                                                        minute: "2-digit",
                                                        timeZoneName: "shortGeneric"
                                                    }));
                                                    document.write("<br/>");
                                                </script>
                                            </div>
                                        </aside>
                                    </div>
                                    <div class="footer-column footer-column-3 ">
                                        <aside id="nav_menu-2" class="widget widget_nav_menu">
                                            <h4 class="widget-title">explore our world</h4>
                                            <div class="menu-footer-menu-container">
                                                <ul id="menu-footer-menu" class="menu">
                                                    <li id="menu-item-1279"
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1279">
                                                        <a href="https://overlandsummers.com/trips/">Trips</a>
                                                    </li>
                                                    <li id="menu-item-1278"
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1278">
                                                        <a href="https://overlandsummers.com/trip-leaders/">Trip
                                                            Leaders</a>
                                                    </li>
                                                    <li id="menu-item-1266"
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1266">
                                                        <a href="https://overlandsummers.com/about/">About</a>
                                                    </li>
                                                    <li id="menu-item-1269"
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1269">
                                                        <a href="https://overlandsummers.com/contact-us/">Contact Us</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </aside>
                                    </div>
                                    <div class="footer-column footer-column-4 ">
                                        <aside id="text-17" class="widget widget_text">
                                            <h4 class="widget-title">portal logins</h4>
                                            <div class="textwidget">
                                                <p>Family Portal: <a href="https://portal.overlandsummers.com/"
                                                        target="_blank">Login ›</a><br />
                                                    Leader Portal: <a href="https://portal.overlandsummers.com/leaders/"
                                                        target="_blank">Login ›</a></p>
                                            </div>
                                        </aside>
                                    </div>
                                </div>
                            </div>
                            <div class="copyright">
                                <aside id="text-18" class="widget widget_text">
                                    <div class="textwidget">
                                        <p>© 2023 Overland Summers All Rights Reserved. | <a
                                                href="https://overlandsummers.com/privacy-policy/" target="_blank"
                                                rel="noopener">Privacy Policy</a></p>
                                    </div>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </footer><!-- #site-footer -->
        </div><!-- #page -->

        <script>
            (function(body) {
                'use strict';
                body.className = body.className.replace(/\btribe-no-js\b/, 'tribe-js');
            })(document.body);
        </script>
        <div id="pum-3719" role="dialog" aria-modal="false"
            class="pum pum-overlay pum-theme-1105 pum-theme-hello-box popmake-overlay auto_open click_open"
            data-popmake="{&quot;id&quot;:3719,&quot;slug&quot;:&quot;slideshow-sign-up&quot;,&quot;theme_id&quot;:1105,&quot;cookies&quot;:[{&quot;event&quot;:&quot;on_popup_close&quot;,&quot;settings&quot;:{&quot;name&quot;:&quot;pum-3719&quot;,&quot;key&quot;:&quot;&quot;,&quot;session&quot;:null,&quot;path&quot;:true,&quot;time&quot;:&quot;1 week&quot;}}],&quot;triggers&quot;:[{&quot;type&quot;:&quot;auto_open&quot;,&quot;settings&quot;:{&quot;cookie_name&quot;:[&quot;pum-3719&quot;],&quot;delay&quot;:&quot;500&quot;}},{&quot;type&quot;:&quot;click_open&quot;,&quot;settings&quot;:{&quot;extra_selectors&quot;:&quot;&quot;,&quot;cookie_name&quot;:null}}],&quot;mobile_disabled&quot;:null,&quot;tablet_disabled&quot;:null,&quot;meta&quot;:{&quot;display&quot;:{&quot;stackable&quot;:false,&quot;overlay_disabled&quot;:false,&quot;scrollable_content&quot;:false,&quot;disable_reposition&quot;:false,&quot;size&quot;:&quot;tiny&quot;,&quot;responsive_min_width&quot;:&quot;0%&quot;,&quot;responsive_min_width_unit&quot;:false,&quot;responsive_max_width&quot;:&quot;100%&quot;,&quot;responsive_max_width_unit&quot;:false,&quot;custom_width&quot;:&quot;640px&quot;,&quot;custom_width_unit&quot;:false,&quot;custom_height&quot;:&quot;380px&quot;,&quot;custom_height_unit&quot;:false,&quot;custom_height_auto&quot;:false,&quot;location&quot;:&quot;center&quot;,&quot;position_from_trigger&quot;:false,&quot;position_top&quot;:&quot;100&quot;,&quot;position_left&quot;:&quot;0&quot;,&quot;position_bottom&quot;:&quot;0&quot;,&quot;position_right&quot;:&quot;0&quot;,&quot;position_fixed&quot;:false,&quot;animation_type&quot;:&quot;fade&quot;,&quot;animation_speed&quot;:&quot;350&quot;,&quot;animation_origin&quot;:&quot;center top&quot;,&quot;overlay_zindex&quot;:false,&quot;zindex&quot;:&quot;1999999999&quot;},&quot;close&quot;:{&quot;text&quot;:&quot;X&quot;,&quot;button_delay&quot;:&quot;0&quot;,&quot;overlay_click&quot;:false,&quot;esc_press&quot;:false,&quot;f4_press&quot;:false},&quot;click_open&quot;:[]}}">

            <div id="popmake-3719"
                class="pum-container popmake theme-1105 pum-responsive pum-responsive-tiny responsive size-tiny">




                <div class="pum-content popmake-content" tabindex="0">
                    <p>&nbsp;</p>
                    <h3 style="text-align: center;">Overland Presentations</h2>
                        <h4 style="text-align: center;"><strong>In-person in Dallas 1/30, Zoom In during
                                February!</strong></h2>
                            <h6 style="text-align: center;">Take the next step in finalizing your summer plans.</h6>
                            <h6 style="text-align: center;">Meet the Overland team and have all your questions answered!
                            </h6>
                            <p style="text-align: center;"><a class="btn-outline button transparent-button"
                                    href="https://overlandsummers.com/attend-a-presentation/">RSVP for a presentation!</a>
                            </p>
                            <p>&nbsp;</p>
                </div>


                <button type="button" class="pum-close popmake-close" aria-label="Close">
                    X </button>

            </div>

        </div>
        <div id="pum-1554" role="dialog" aria-modal="false"
            class="pum pum-overlay pum-theme-1102 pum-theme-default-theme popmake-overlay click_open"
            data-popmake="{&quot;id&quot;:1554,&quot;slug&quot;:&quot;home-hero-video&quot;,&quot;theme_id&quot;:1102,&quot;cookies&quot;:[],&quot;triggers&quot;:[{&quot;type&quot;:&quot;click_open&quot;,&quot;settings&quot;:{&quot;extra_selectors&quot;:&quot;&quot;,&quot;cookie_name&quot;:null}}],&quot;mobile_disabled&quot;:null,&quot;tablet_disabled&quot;:null,&quot;meta&quot;:{&quot;display&quot;:{&quot;stackable&quot;:false,&quot;overlay_disabled&quot;:false,&quot;scrollable_content&quot;:false,&quot;disable_reposition&quot;:false,&quot;size&quot;:&quot;medium&quot;,&quot;responsive_min_width&quot;:&quot;0%&quot;,&quot;responsive_min_width_unit&quot;:false,&quot;responsive_max_width&quot;:&quot;100%&quot;,&quot;responsive_max_width_unit&quot;:false,&quot;custom_width&quot;:&quot;640px&quot;,&quot;custom_width_unit&quot;:false,&quot;custom_height&quot;:&quot;380px&quot;,&quot;custom_height_unit&quot;:false,&quot;custom_height_auto&quot;:false,&quot;location&quot;:&quot;center top&quot;,&quot;position_from_trigger&quot;:false,&quot;position_top&quot;:&quot;100&quot;,&quot;position_left&quot;:&quot;0&quot;,&quot;position_bottom&quot;:&quot;0&quot;,&quot;position_right&quot;:&quot;0&quot;,&quot;position_fixed&quot;:false,&quot;animation_type&quot;:&quot;fade&quot;,&quot;animation_speed&quot;:&quot;350&quot;,&quot;animation_origin&quot;:&quot;center top&quot;,&quot;overlay_zindex&quot;:false,&quot;zindex&quot;:&quot;1999999999&quot;},&quot;close&quot;:{&quot;text&quot;:&quot;X&quot;,&quot;button_delay&quot;:&quot;0&quot;,&quot;overlay_click&quot;:false,&quot;esc_press&quot;:false,&quot;f4_press&quot;:false},&quot;click_open&quot;:[]}}">

            <div id="popmake-1554"
                class="pum-container popmake theme-1102 pum-responsive pum-responsive-medium responsive size-medium">




                <div class="pum-content popmake-content" tabindex="0">
                    <p><iframe loading="lazy" data-vimeo-defer
                            src="https://player.vimeo.com/video/1032033552?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479"
                            width="1024" height="576" frameborder="0"
                            allow="fullscreen; picture-in-picture; clipboard-write" title="Our Story - 2025"></iframe>
                    </p>
                </div>


                <button type="button" class="pum-close popmake-close" aria-label="Close">
                    X </button>

            </div>

        </div>
        <div id="pum-5417" role="dialog" aria-modal="false"
            class="pum pum-overlay pum-theme-1105 pum-theme-hello-box popmake-overlay exit_intent click_open"
            data-popmake="{&quot;id&quot;:5417,&quot;slug&quot;:&quot;home-exit-intent-catalog-request&quot;,&quot;theme_id&quot;:1105,&quot;cookies&quot;:[{&quot;event&quot;:&quot;form_submission&quot;,&quot;settings&quot;:{&quot;name&quot;:&quot;pum-5417&quot;,&quot;key&quot;:&quot;&quot;,&quot;session&quot;:false,&quot;path&quot;:&quot;1&quot;,&quot;time&quot;:&quot;1 month&quot;,&quot;form&quot;:&quot;any&quot;,&quot;only_in_popup&quot;:&quot;1&quot;}},{&quot;event&quot;:&quot;on_popup_close&quot;,&quot;settings&quot;:{&quot;name&quot;:&quot;pum-5417&quot;,&quot;time&quot;:&quot;1 month&quot;,&quot;session&quot;:false,&quot;path&quot;:&quot;1&quot;,&quot;key&quot;:&quot;&quot;}}],&quot;triggers&quot;:[{&quot;type&quot;:&quot;exit_intent&quot;,&quot;settings&quot;:{&quot;methods&quot;:{&quot;mouseleave&quot;:&quot;mouseleave&quot;,&quot;lostfocus&quot;:&quot;lostfocus&quot;},&quot;cookie_name&quot;:[&quot;pum-5417&quot;],&quot;top_sensitivity&quot;:27,&quot;delay_sensitivity&quot;:350,&quot;linkclick_custom_targeting&quot;:&quot;&quot;,&quot;link_hover_delay&quot;:300,&quot;mobile_time_delay&quot;:500,&quot;mobilescroll_up_percent&quot;:10}},{&quot;type&quot;:&quot;click_open&quot;,&quot;settings&quot;:{&quot;extra_selectors&quot;:&quot;&quot;,&quot;cookie_name&quot;:null}}],&quot;mobile_disabled&quot;:null,&quot;tablet_disabled&quot;:null,&quot;meta&quot;:{&quot;display&quot;:{&quot;stackable&quot;:false,&quot;overlay_disabled&quot;:false,&quot;scrollable_content&quot;:false,&quot;disable_reposition&quot;:false,&quot;size&quot;:&quot;small&quot;,&quot;responsive_min_width&quot;:&quot;0%&quot;,&quot;responsive_min_width_unit&quot;:false,&quot;responsive_max_width&quot;:&quot;100%&quot;,&quot;responsive_max_width_unit&quot;:false,&quot;custom_width&quot;:&quot;640px&quot;,&quot;custom_width_unit&quot;:false,&quot;custom_height&quot;:&quot;380px&quot;,&quot;custom_height_unit&quot;:false,&quot;custom_height_auto&quot;:false,&quot;location&quot;:&quot;center top&quot;,&quot;position_from_trigger&quot;:false,&quot;position_top&quot;:&quot;100&quot;,&quot;position_left&quot;:&quot;0&quot;,&quot;position_bottom&quot;:&quot;0&quot;,&quot;position_right&quot;:&quot;0&quot;,&quot;position_fixed&quot;:false,&quot;animation_type&quot;:&quot;fade&quot;,&quot;animation_speed&quot;:&quot;350&quot;,&quot;animation_origin&quot;:&quot;center top&quot;,&quot;overlay_zindex&quot;:false,&quot;zindex&quot;:&quot;1999999999&quot;},&quot;close&quot;:{&quot;text&quot;:&quot;x&quot;,&quot;button_delay&quot;:&quot;0&quot;,&quot;overlay_click&quot;:false,&quot;esc_press&quot;:false,&quot;f4_press&quot;:false},&quot;click_open&quot;:[]}}">

            <div id="popmake-5417"
                class="pum-container popmake theme-1105 pum-responsive pum-responsive-small responsive size-small">




                <div class="pum-content popmake-content" tabindex="0">
                    <h1>REQUEST OUR<strong> CATALOG</strong></h1>
                    <h6>We are happy to share a preview of next summer&#8217;s trip offerings.</h6>
                    <h6><strong>Get a jump on 2025!</strong></h6>
                    <script type="text/javascript"></script>
                    <div class='gf_browser_chrome gform_wrapper gform-theme gform-theme--foundation gform-theme--framework gform-theme--orbital gravity-form_wrapper'
                        data-form-theme='orbital' data-form-index='0' id='gform_wrapper_6' style='display:none'>
                        <style>
                            #gform_wrapper_6[data-form-index="0"].gform-theme,
                            [data-parent-form="6_0"] {
                                --gf-color-primary: #204ce5;
                                --gf-color-primary-rgb: 32, 76, 229;
                                --gf-color-primary-contrast: #fff;
                                --gf-color-primary-contrast-rgb: 255, 255, 255;
                                --gf-color-primary-darker: #001AB3;
                                --gf-color-primary-lighter: #527EFF;
                                --gf-color-secondary: #fff;
                                --gf-color-secondary-rgb: 255, 255, 255;
                                --gf-color-secondary-contrast: #112337;
                                --gf-color-secondary-contrast-rgb: 17, 35, 55;
                                --gf-color-secondary-darker: #F5F5F5;
                                --gf-color-secondary-lighter: #FFFFFF;
                                --gf-color-out-ctrl-light: rgba(17, 35, 55, 0.1);
                                --gf-color-out-ctrl-light-rgb: 17, 35, 55;
                                --gf-color-out-ctrl-light-darker: rgba(104, 110, 119, 0.35);
                                --gf-color-out-ctrl-light-lighter: #F5F5F5;
                                --gf-color-out-ctrl-dark: #585e6a;
                                --gf-color-out-ctrl-dark-rgb: 88, 94, 106;
                                --gf-color-out-ctrl-dark-darker: #112337;
                                --gf-color-out-ctrl-dark-lighter: rgba(17, 35, 55, 0.65);
                                --gf-color-in-ctrl: #fff;
                                --gf-color-in-ctrl-rgb: 255, 255, 255;
                                --gf-color-in-ctrl-contrast: #112337;
                                --gf-color-in-ctrl-contrast-rgb: 17, 35, 55;
                                --gf-color-in-ctrl-darker: #F5F5F5;
                                --gf-color-in-ctrl-lighter: #FFFFFF;
                                --gf-color-in-ctrl-primary: #204ce5;
                                --gf-color-in-ctrl-primary-rgb: 32, 76, 229;
                                --gf-color-in-ctrl-primary-contrast: #fff;
                                --gf-color-in-ctrl-primary-contrast-rgb: 255, 255, 255;
                                --gf-color-in-ctrl-primary-darker: #001AB3;
                                --gf-color-in-ctrl-primary-lighter: #527EFF;
                                --gf-color-in-ctrl-light: rgba(17, 35, 55, 0.1);
                                --gf-color-in-ctrl-light-rgb: 17, 35, 55;
                                --gf-color-in-ctrl-light-darker: rgba(104, 110, 119, 0.35);
                                --gf-color-in-ctrl-light-lighter: #F5F5F5;
                                --gf-color-in-ctrl-dark: #585e6a;
                                --gf-color-in-ctrl-dark-rgb: 88, 94, 106;
                                --gf-color-in-ctrl-dark-darker: #112337;
                                --gf-color-in-ctrl-dark-lighter: rgba(17, 35, 55, 0.65);
                                --gf-radius: 3px;
                                --gf-font-size-secondary: 14px;
                                --gf-font-size-tertiary: 13px;
                                --gf-icon-ctrl-number: url("data:image/svg+xml,%3Csvg width='8' height='14' viewBox='0 0 8 14' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath fill-rule='evenodd' clip-rule='evenodd' d='M4 0C4.26522 5.96046e-08 4.51957 0.105357 4.70711 0.292893L7.70711 3.29289C8.09763 3.68342 8.09763 4.31658 7.70711 4.70711C7.31658 5.09763 6.68342 5.09763 6.29289 4.70711L4 2.41421L1.70711 4.70711C1.31658 5.09763 0.683417 5.09763 0.292893 4.70711C-0.0976311 4.31658 -0.097631 3.68342 0.292893 3.29289L3.29289 0.292893C3.48043 0.105357 3.73478 0 4 0ZM0.292893 9.29289C0.683417 8.90237 1.31658 8.90237 1.70711 9.29289L4 11.5858L6.29289 9.29289C6.68342 8.90237 7.31658 8.90237 7.70711 9.29289C8.09763 9.68342 8.09763 10.3166 7.70711 10.7071L4.70711 13.7071C4.31658 14.0976 3.68342 14.0976 3.29289 13.7071L0.292893 10.7071C-0.0976311 10.3166 -0.0976311 9.68342 0.292893 9.29289Z' fill='rgba(17, 35, 55, 0.65)'/%3E%3C/svg%3E");
                                --gf-icon-ctrl-select: url("data:image/svg+xml,%3Csvg width='10' height='6' viewBox='0 0 10 6' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath fill-rule='evenodd' clip-rule='evenodd' d='M0.292893 0.292893C0.683417 -0.097631 1.31658 -0.097631 1.70711 0.292893L5 3.58579L8.29289 0.292893C8.68342 -0.0976311 9.31658 -0.0976311 9.70711 0.292893C10.0976 0.683417 10.0976 1.31658 9.70711 1.70711L5.70711 5.70711C5.31658 6.09763 4.68342 6.09763 4.29289 5.70711L0.292893 1.70711C-0.0976311 1.31658 -0.0976311 0.683418 0.292893 0.292893Z' fill='rgba(17, 35, 55, 0.65)'/%3E%3C/svg%3E");
                                --gf-icon-ctrl-search: url("data:image/svg+xml,%3Csvg version='1.1' xmlns='http://www.w3.org/2000/svg' width='640' height='640'%3E%3Cpath d='M256 128c-70.692 0-128 57.308-128 128 0 70.691 57.308 128 128 128 70.691 0 128-57.309 128-128 0-70.692-57.309-128-128-128zM64 256c0-106.039 85.961-192 192-192s192 85.961 192 192c0 41.466-13.146 79.863-35.498 111.248l154.125 154.125c12.496 12.496 12.496 32.758 0 45.254s-32.758 12.496-45.254 0L367.248 412.502C335.862 434.854 297.467 448 256 448c-106.039 0-192-85.962-192-192z' fill='rgba(17, 35, 55, 0.65)'/%3E%3C/svg%3E");
                                --gf-label-space-y-secondary: var(--gf-label-space-y-md-secondary);
                                --gf-ctrl-border-color: #686e77;
                                --gf-ctrl-size: var(--gf-ctrl-size-md);
                                --gf-ctrl-label-color-primary: #112337;
                                --gf-ctrl-label-color-secondary: #112337;
                                --gf-ctrl-choice-size: var(--gf-ctrl-choice-size-md);
                                --gf-ctrl-checkbox-check-size: var(--gf-ctrl-checkbox-check-size-md);
                                --gf-ctrl-radio-check-size: var(--gf-ctrl-radio-check-size-md);
                                --gf-ctrl-btn-font-size: var(--gf-ctrl-btn-font-size-md);
                                --gf-ctrl-btn-padding-x: var(--gf-ctrl-btn-padding-x-md);
                                --gf-ctrl-btn-size: var(--gf-ctrl-btn-size-md);
                                --gf-ctrl-btn-border-color-secondary: #686e77;
                                --gf-ctrl-file-btn-bg-color-hover: #EBEBEB;
                                --gf-field-img-choice-size: var(--gf-field-img-choice-size-md);
                                --gf-field-img-choice-card-space: var(--gf-field-img-choice-card-space-md);
                                --gf-field-img-choice-check-ind-size: var(--gf-field-img-choice-check-ind-size-md);
                                --gf-field-img-choice-check-ind-icon-size: var(--gf-field-img-choice-check-ind-icon-size-md);
                                --gf-field-pg-steps-number-color: rgba(17, 35, 55, 0.8);
                            }
                        </style>
                        <div id='gf_6' class='gform_anchor' tabindex='-1'></div>
                        <div class='gform_heading'>
                            <p class='gform_required_legend'>&quot;<span
                                    class="gfield_required gfield_required_asterisk">*</span>&quot; indicates required
                                fields</p>
                        </div>
                        <form method='post' enctype='multipart/form-data' target='gform_ajax_frame_6'
                            id='gform_6' class='gravity-form' action='/#gf_6' data-formid='6' novalidate>
                            <div class='gf_invisible ginput_recaptchav3'
                                data-sitekey='6LeoSy8pAAAAAAIfAyLsRH1jXMkA23BZTfVQQ6Pb' data-tabindex='0'><input
                                    id="input_e5e3b1f4b28fc34530a842900157c22e" class="gfield_recaptcha_response"
                                    type="hidden" name="input_e5e3b1f4b28fc34530a842900157c22e" value="" />
                            </div>
                            <input type='hidden' class='gforms-pum'
                                value='{"closepopup":false,"closedelay":0,"openpopup":false,"openpopup_id":0}' />
                            <div class='gform-body gform_body'>
                                <div id='gform_fields_6'
                                    class='gform_fields top_label form_sublabel_below description_below validation_below'>
                                    <div id="field_6_23"
                                        class="gfield gfield--type-html gfield--input-type-html gfield--width-full form-title gfield_html gfield_html_formatted gfield_no_follows_desc field_sublabel_below gfield--no-description field_description_below field_validation_below gfield_visibility_visible"
                                        data-js-reload="field_6_23">YOUR INFORMATION*</div>
                                    <fieldset id="field_6_2"
                                        class="gfield gfield--type-name gfield--input-type-name gfield_contains_required field_sublabel_hidden_label gfield--no-description field_description_below hidden_label field_validation_below gfield_visibility_visible"
                                        data-js-reload="field_6_2">
                                        <legend class='gfield_label gform-field-label gfield_label_before_complex'>Your
                                            Name<span class="gfield_required"><span
                                                    class="gfield_required gfield_required_asterisk">*</span></span>
                                        </legend>
                                        <div class='ginput_complex ginput_container ginput_container--name no_prefix has_first_name no_middle_name has_last_name no_suffix gf_name_has_2 ginput_container_name gform-grid-row'
                                            id='input_6_2'>

                                            <span id='input_6_2_3_container'
                                                class='name_first gform-grid-col gform-grid-col--size-auto'>
                                                <input type='text' name='input_2.3' id='input_6_2_3'
                                                    value='' aria-required='true' placeholder='First Name' />
                                                <label for='input_6_2_3'
                                                    class='gform-field-label gform-field-label--type-sub hidden_sub_label screen-reader-text'>First</label>
                                            </span>

                                            <span id='input_6_2_6_container'
                                                class='name_last gform-grid-col gform-grid-col--size-auto'>
                                                <input type='text' name='input_2.6' id='input_6_2_6'
                                                    value='' aria-required='true' placeholder='Last Name' />
                                                <label for='input_6_2_6'
                                                    class='gform-field-label gform-field-label--type-sub hidden_sub_label screen-reader-text'>Last</label>
                                            </span>

                                        </div>
                                    </fieldset>
                                    <div id="field_6_3"
                                        class="gfield gfield--type-email gfield--input-type-email gfield_contains_required field_sublabel_below gfield--no-description field_description_below hidden_label field_validation_below gfield_visibility_visible"
                                        data-js-reload="field_6_3"><label class='gfield_label gform-field-label'
                                            for='input_6_3'>Your Email<span class="gfield_required"><span
                                                    class="gfield_required gfield_required_asterisk">*</span></span></label>
                                        <div class='ginput_container ginput_container_email'>
                                            <input name='input_3' id='input_6_3' type='email' value=''
                                                class='large' placeholder='Email' aria-required="true"
                                                aria-invalid="false" />
                                        </div>
                                    </div>
                                    <div id="field_6_26"
                                        class="gfield gfield--type-phone gfield--input-type-phone gfield--width-full gfield_contains_required field_sublabel_below gfield--no-description field_description_below hidden_label field_validation_below gfield_visibility_visible"
                                        data-js-reload="field_6_26"><label class='gfield_label gform-field-label'
                                            for='input_6_26'>Phone<span class="gfield_required"><span
                                                    class="gfield_required gfield_required_asterisk">*</span></span></label>
                                        <div class='ginput_container ginput_container_phone'><input name='input_26'
                                                id='input_6_26' type='tel' value='' class='large'
                                                placeholder='Phone' aria-required="true" aria-invalid="false" /></div>
                                    </div>
                                    <div id="field_6_19"
                                        class="gfield gfield--type-html gfield--input-type-html gfield--width-half gfield_html gfield_html_formatted gfield_no_follows_desc field_sublabel_below gfield--no-description field_description_below field_validation_below gfield_visibility_visible"
                                        data-js-reload="field_6_19">Who are you requesting this catalog for?</div>
                                    <fieldset id="field_6_10"
                                        class="gfield gfield--type-radio gfield--type-choice gfield--input-type-radio gfield--width-half custom-class gfield_contains_required field_sublabel_below gfield--no-description field_description_below field_validation_below gfield_visibility_visible"
                                        data-js-reload="field_6_10">
                                        <legend class='gfield_label gform-field-label'>Who are you requesting this catalog
                                            for?<span class="gfield_required"><span
                                                    class="gfield_required gfield_required_asterisk">*</span></span>
                                        </legend>
                                        <div class='ginput_container ginput_container_radio'>
                                            <div class='gfield_radio' id='input_6_10'>
                                                <div class='gchoice gchoice_6_10_0'>
                                                    <input class='gfield-choice-input' name='input_10' type='radio'
                                                        value='Myself' checked='checked' id='choice_6_10_0'
                                                        onchange='gformToggleRadioOther( this )' />
                                                    <label for='choice_6_10_0' id='label_6_10_0'
                                                        class='gform-field-label gform-field-label--type-inline'>Myself</label>
                                                </div>
                                                <div class='gchoice gchoice_6_10_1'>
                                                    <input class='gfield-choice-input' name='input_10' type='radio'
                                                        value='A friend' id='choice_6_10_1'
                                                        onchange='gformToggleRadioOther( this )' />
                                                    <label for='choice_6_10_1' id='label_6_10_1'
                                                        class='gform-field-label gform-field-label--type-inline'>A
                                                        friend</label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div id="field_6_11"
                                        class="gfield gfield--type-text gfield--input-type-text gfield--width-full gfield_contains_required field_sublabel_below gfield--no-description field_description_below field_validation_below gfield_visibility_visible"
                                        data-js-reload="field_6_11"><label class='gfield_label gform-field-label'
                                            for='input_6_11'>Who should we address our catalog to?<span
                                                class="gfield_required"><span
                                                    class="gfield_required gfield_required_asterisk">*</span></span></label>
                                        <div class='ginput_container ginput_container_text'><input name='input_11'
                                                id='input_6_11' type='text' value='' class='large'
                                                aria-required="true" aria-invalid="false" /></div>
                                    </div>
                                    <div id="field_6_20"
                                        class="gfield gfield--type-html gfield--input-type-html gfield--width-full form-title gfield_html gfield_html_formatted gfield_no_follows_desc field_sublabel_below gfield--no-description field_description_below field_validation_below gfield_visibility_visible"
                                        data-js-reload="field_6_20">MAILING ADDRESS*</div>
                                    <fieldset id="field_6_4"
                                        class="gfield gfield--type-address gfield--input-type-address gfield_contains_required field_sublabel_hidden_label gfield--no-description field_description_below field_validation_below gfield_visibility_visible"
                                        data-js-reload="field_6_4">
                                        <legend class='gfield_label gform-field-label gfield_label_before_complex'>Mailing
                                            Address<span class="gfield_required"><span
                                                    class="gfield_required gfield_required_asterisk">*</span></span>
                                        </legend>
                                        <div class='ginput_complex ginput_container has_street has_street2 has_city has_state has_zip has_country ginput_container_address gform-grid-row'
                                            id='input_6_4'>
                                            <span class='ginput_full address_line_1 ginput_address_line_1 gform-grid-col'
                                                id='input_6_4_1_container'>
                                                <input type='text' name='input_4.1' id='input_6_4_1'
                                                    value='' placeholder='Street Address'
                                                    aria-required='true' />
                                                <label for='input_6_4_1' id='input_6_4_1_label'
                                                    class='gform-field-label gform-field-label--type-sub hidden_sub_label screen-reader-text'>Street
                                                    Address</label>
                                            </span><span
                                                class='ginput_full address_line_2 ginput_address_line_2 gform-grid-col'
                                                id='input_6_4_2_container'>
                                                <input type='text' name='input_4.2' id='input_6_4_2'
                                                    value='' placeholder='Apt. Suite, etc.'
                                                    aria-required='false' />
                                                <label for='input_6_4_2' id='input_6_4_2_label'
                                                    class='gform-field-label gform-field-label--type-sub hidden_sub_label screen-reader-text'>Address
                                                    Line 2</label>
                                            </span><span
                                                class='ginput_left address_city ginput_address_city gform-grid-col'
                                                id='input_6_4_3_container'>
                                                <input type='text' name='input_4.3' id='input_6_4_3'
                                                    value='' placeholder='City' aria-required='true' />
                                                <label for='input_6_4_3' id='input_6_4_3_label'
                                                    class='gform-field-label gform-field-label--type-sub hidden_sub_label screen-reader-text'>City</label>
                                            </span><span
                                                class='ginput_right address_state ginput_address_state gform-grid-col'
                                                id='input_6_4_4_container'>
                                                <input type='text' name='input_4.4' id='input_6_4_4'
                                                    value='' placeholder='State' aria-required='true' />
                                                <label for='input_6_4_4' id='input_6_4_4_label'
                                                    class='gform-field-label gform-field-label--type-sub hidden_sub_label screen-reader-text'>State
                                                    / Province / Region</label>
                                            </span><span class='ginput_left address_zip ginput_address_zip gform-grid-col'
                                                id='input_6_4_5_container'>
                                                <input type='text' name='input_4.5' id='input_6_4_5'
                                                    value='' placeholder='ZIP' aria-required='true' />
                                                <label for='input_6_4_5' id='input_6_4_5_label'
                                                    class='gform-field-label gform-field-label--type-sub hidden_sub_label screen-reader-text'>ZIP
                                                    / Postal Code</label>
                                            </span><span
                                                class='ginput_right address_country ginput_address_country gform-grid-col'
                                                id='input_6_4_6_container'>
                                                <select name='input_4.6' id='input_6_4_6' aria-required='true'>
                                                    <option value=''>Country</option>
                                                    <option value='Afghanistan'>Afghanistan</option>
                                                    <option value='Albania'>Albania</option>
                                                    <option value='Algeria'>Algeria</option>
                                                    <option value='American Samoa'>American Samoa</option>
                                                    <option value='Andorra'>Andorra</option>
                                                    <option value='Angola'>Angola</option>
                                                    <option value='Anguilla'>Anguilla</option>
                                                    <option value='Antarctica'>Antarctica</option>
                                                    <option value='Antigua and Barbuda'>Antigua and Barbuda</option>
                                                    <option value='Argentina'>Argentina</option>
                                                    <option value='Armenia'>Armenia</option>
                                                    <option value='Aruba'>Aruba</option>
                                                    <option value='Australia'>Australia</option>
                                                    <option value='Austria'>Austria</option>
                                                    <option value='Azerbaijan'>Azerbaijan</option>
                                                    <option value='Bahamas'>Bahamas</option>
                                                    <option value='Bahrain'>Bahrain</option>
                                                    <option value='Bangladesh'>Bangladesh</option>
                                                    <option value='Barbados'>Barbados</option>
                                                    <option value='Belarus'>Belarus</option>
                                                    <option value='Belgium'>Belgium</option>
                                                    <option value='Belize'>Belize</option>
                                                    <option value='Benin'>Benin</option>
                                                    <option value='Bermuda'>Bermuda</option>
                                                    <option value='Bhutan'>Bhutan</option>
                                                    <option value='Bolivia'>Bolivia</option>
                                                    <option value='Bonaire, Sint Eustatius and Saba'>Bonaire, Sint
                                                        Eustatius and Saba</option>
                                                    <option value='Bosnia and Herzegovina'>Bosnia and Herzegovina</option>
                                                    <option value='Botswana'>Botswana</option>
                                                    <option value='Bouvet Island'>Bouvet Island</option>
                                                    <option value='Brazil'>Brazil</option>
                                                    <option value='British Indian Ocean Territory'>British Indian Ocean
                                                        Territory</option>
                                                    <option value='Brunei Darussalam'>Brunei Darussalam</option>
                                                    <option value='Bulgaria'>Bulgaria</option>
                                                    <option value='Burkina Faso'>Burkina Faso</option>
                                                    <option value='Burundi'>Burundi</option>
                                                    <option value='Cabo Verde'>Cabo Verde</option>
                                                    <option value='Cambodia'>Cambodia</option>
                                                    <option value='Cameroon'>Cameroon</option>
                                                    <option value='Canada'>Canada</option>
                                                    <option value='Cayman Islands'>Cayman Islands</option>
                                                    <option value='Central African Republic'>Central African Republic
                                                    </option>
                                                    <option value='Chad'>Chad</option>
                                                    <option value='Chile'>Chile</option>
                                                    <option value='China'>China</option>
                                                    <option value='Christmas Island'>Christmas Island</option>
                                                    <option value='Cocos Islands'>Cocos Islands</option>
                                                    <option value='Colombia'>Colombia</option>
                                                    <option value='Comoros'>Comoros</option>
                                                    <option value='Congo'>Congo</option>
                                                    <option value='Congo, Democratic Republic of the'>Congo, Democratic
                                                        Republic of the</option>
                                                    <option value='Cook Islands'>Cook Islands</option>
                                                    <option value='Costa Rica'>Costa Rica</option>
                                                    <option value='Croatia'>Croatia</option>
                                                    <option value='Cuba'>Cuba</option>
                                                    <option value='Curaçao'>Curaçao</option>
                                                    <option value='Cyprus'>Cyprus</option>
                                                    <option value='Czechia'>Czechia</option>
                                                    <option value='Côte d&#039;Ivoire'>Côte d&#039;Ivoire</option>
                                                    <option value='Denmark'>Denmark</option>
                                                    <option value='Djibouti'>Djibouti</option>
                                                    <option value='Dominica'>Dominica</option>
                                                    <option value='Dominican Republic'>Dominican Republic</option>
                                                    <option value='Ecuador'>Ecuador</option>
                                                    <option value='Egypt'>Egypt</option>
                                                    <option value='El Salvador'>El Salvador</option>
                                                    <option value='Equatorial Guinea'>Equatorial Guinea</option>
                                                    <option value='Eritrea'>Eritrea</option>
                                                    <option value='Estonia'>Estonia</option>
                                                    <option value='Eswatini'>Eswatini</option>
                                                    <option value='Ethiopia'>Ethiopia</option>
                                                    <option value='Falkland Islands'>Falkland Islands</option>
                                                    <option value='Faroe Islands'>Faroe Islands</option>
                                                    <option value='Fiji'>Fiji</option>
                                                    <option value='Finland'>Finland</option>
                                                    <option value='France'>France</option>
                                                    <option value='French Guiana'>French Guiana</option>
                                                    <option value='French Polynesia'>French Polynesia</option>
                                                    <option value='French Southern Territories'>French Southern
                                                        Territories</option>
                                                    <option value='Gabon'>Gabon</option>
                                                    <option value='Gambia'>Gambia</option>
                                                    <option value='Georgia'>Georgia</option>
                                                    <option value='Germany'>Germany</option>
                                                    <option value='Ghana'>Ghana</option>
                                                    <option value='Gibraltar'>Gibraltar</option>
                                                    <option value='Greece'>Greece</option>
                                                    <option value='Greenland'>Greenland</option>
                                                    <option value='Grenada'>Grenada</option>
                                                    <option value='Guadeloupe'>Guadeloupe</option>
                                                    <option value='Guam'>Guam</option>
                                                    <option value='Guatemala'>Guatemala</option>
                                                    <option value='Guernsey'>Guernsey</option>
                                                    <option value='Guinea'>Guinea</option>
                                                    <option value='Guinea-Bissau'>Guinea-Bissau</option>
                                                    <option value='Guyana'>Guyana</option>
                                                    <option value='Haiti'>Haiti</option>
                                                    <option value='Heard Island and McDonald Islands'>Heard Island and
                                                        McDonald Islands</option>
                                                    <option value='Holy See'>Holy See</option>
                                                    <option value='Honduras'>Honduras</option>
                                                    <option value='Hong Kong'>Hong Kong</option>
                                                    <option value='Hungary'>Hungary</option>
                                                    <option value='Iceland'>Iceland</option>
                                                    <option value='India'>India</option>
                                                    <option value='Indonesia'>Indonesia</option>
                                                    <option value='Iran'>Iran</option>
                                                    <option value='Iraq'>Iraq</option>
                                                    <option value='Ireland'>Ireland</option>
                                                    <option value='Isle of Man'>Isle of Man</option>
                                                    <option value='Israel'>Israel</option>
                                                    <option value='Italy'>Italy</option>
                                                    <option value='Jamaica'>Jamaica</option>
                                                    <option value='Japan'>Japan</option>
                                                    <option value='Jersey'>Jersey</option>
                                                    <option value='Jordan'>Jordan</option>
                                                    <option value='Kazakhstan'>Kazakhstan</option>
                                                    <option value='Kenya'>Kenya</option>
                                                    <option value='Kiribati'>Kiribati</option>
                                                    <option value='Korea, Democratic People&#039;s Republic of'>Korea,
                                                        Democratic People&#039;s Republic of</option>
                                                    <option value='Korea, Republic of'>Korea, Republic of</option>
                                                    <option value='Kuwait'>Kuwait</option>
                                                    <option value='Kyrgyzstan'>Kyrgyzstan</option>
                                                    <option value='Lao People&#039;s Democratic Republic'>Lao
                                                        People&#039;s Democratic Republic</option>
                                                    <option value='Latvia'>Latvia</option>
                                                    <option value='Lebanon'>Lebanon</option>
                                                    <option value='Lesotho'>Lesotho</option>
                                                    <option value='Liberia'>Liberia</option>
                                                    <option value='Libya'>Libya</option>
                                                    <option value='Liechtenstein'>Liechtenstein</option>
                                                    <option value='Lithuania'>Lithuania</option>
                                                    <option value='Luxembourg'>Luxembourg</option>
                                                    <option value='Macao'>Macao</option>
                                                    <option value='Madagascar'>Madagascar</option>
                                                    <option value='Malawi'>Malawi</option>
                                                    <option value='Malaysia'>Malaysia</option>
                                                    <option value='Maldives'>Maldives</option>
                                                    <option value='Mali'>Mali</option>
                                                    <option value='Malta'>Malta</option>
                                                    <option value='Marshall Islands'>Marshall Islands</option>
                                                    <option value='Martinique'>Martinique</option>
                                                    <option value='Mauritania'>Mauritania</option>
                                                    <option value='Mauritius'>Mauritius</option>
                                                    <option value='Mayotte'>Mayotte</option>
                                                    <option value='Mexico'>Mexico</option>
                                                    <option value='Micronesia'>Micronesia</option>
                                                    <option value='Moldova'>Moldova</option>
                                                    <option value='Monaco'>Monaco</option>
                                                    <option value='Mongolia'>Mongolia</option>
                                                    <option value='Montenegro'>Montenegro</option>
                                                    <option value='Montserrat'>Montserrat</option>
                                                    <option value='Morocco'>Morocco</option>
                                                    <option value='Mozambique'>Mozambique</option>
                                                    <option value='Myanmar'>Myanmar</option>
                                                    <option value='Namibia'>Namibia</option>
                                                    <option value='Nauru'>Nauru</option>
                                                    <option value='Nepal'>Nepal</option>
                                                    <option value='Netherlands'>Netherlands</option>
                                                    <option value='New Caledonia'>New Caledonia</option>
                                                    <option value='New Zealand'>New Zealand</option>
                                                    <option value='Nicaragua'>Nicaragua</option>
                                                    <option value='Niger'>Niger</option>
                                                    <option value='Nigeria'>Nigeria</option>
                                                    <option value='Niue'>Niue</option>
                                                    <option value='Norfolk Island'>Norfolk Island</option>
                                                    <option value='North Macedonia'>North Macedonia</option>
                                                    <option value='Northern Mariana Islands'>Northern Mariana Islands
                                                    </option>
                                                    <option value='Norway'>Norway</option>
                                                    <option value='Oman'>Oman</option>
                                                    <option value='Pakistan'>Pakistan</option>
                                                    <option value='Palau'>Palau</option>
                                                    <option value='Palestine, State of'>Palestine, State of</option>
                                                    <option value='Panama'>Panama</option>
                                                    <option value='Papua New Guinea'>Papua New Guinea</option>
                                                    <option value='Paraguay'>Paraguay</option>
                                                    <option value='Peru'>Peru</option>
                                                    <option value='Philippines'>Philippines</option>
                                                    <option value='Pitcairn'>Pitcairn</option>
                                                    <option value='Poland'>Poland</option>
                                                    <option value='Portugal'>Portugal</option>
                                                    <option value='Puerto Rico'>Puerto Rico</option>
                                                    <option value='Qatar'>Qatar</option>
                                                    <option value='Romania'>Romania</option>
                                                    <option value='Russian Federation'>Russian Federation</option>
                                                    <option value='Rwanda'>Rwanda</option>
                                                    <option value='Réunion'>Réunion</option>
                                                    <option value='Saint Barthélemy'>Saint Barthélemy</option>
                                                    <option value='Saint Helena, Ascension and Tristan da Cunha'>Saint
                                                        Helena, Ascension and Tristan da Cunha</option>
                                                    <option value='Saint Kitts and Nevis'>Saint Kitts and Nevis</option>
                                                    <option value='Saint Lucia'>Saint Lucia</option>
                                                    <option value='Saint Martin'>Saint Martin</option>
                                                    <option value='Saint Pierre and Miquelon'>Saint Pierre and Miquelon
                                                    </option>
                                                    <option value='Saint Vincent and the Grenadines'>Saint Vincent and the
                                                        Grenadines</option>
                                                    <option value='Samoa'>Samoa</option>
                                                    <option value='San Marino'>San Marino</option>
                                                    <option value='Sao Tome and Principe'>Sao Tome and Principe</option>
                                                    <option value='Saudi Arabia'>Saudi Arabia</option>
                                                    <option value='Senegal'>Senegal</option>
                                                    <option value='Serbia'>Serbia</option>
                                                    <option value='Seychelles'>Seychelles</option>
                                                    <option value='Sierra Leone'>Sierra Leone</option>
                                                    <option value='Singapore'>Singapore</option>
                                                    <option value='Sint Maarten'>Sint Maarten</option>
                                                    <option value='Slovakia'>Slovakia</option>
                                                    <option value='Slovenia'>Slovenia</option>
                                                    <option value='Solomon Islands'>Solomon Islands</option>
                                                    <option value='Somalia'>Somalia</option>
                                                    <option value='South Africa'>South Africa</option>
                                                    <option value='South Georgia and the South Sandwich Islands'>South
                                                        Georgia and the South Sandwich Islands</option>
                                                    <option value='South Sudan'>South Sudan</option>
                                                    <option value='Spain'>Spain</option>
                                                    <option value='Sri Lanka'>Sri Lanka</option>
                                                    <option value='Sudan'>Sudan</option>
                                                    <option value='Suriname'>Suriname</option>
                                                    <option value='Svalbard and Jan Mayen'>Svalbard and Jan Mayen</option>
                                                    <option value='Sweden'>Sweden</option>
                                                    <option value='Switzerland'>Switzerland</option>
                                                    <option value='Syria Arab Republic'>Syria Arab Republic</option>
                                                    <option value='Taiwan'>Taiwan</option>
                                                    <option value='Tajikistan'>Tajikistan</option>
                                                    <option value='Tanzania, the United Republic of'>Tanzania, the United
                                                        Republic of</option>
                                                    <option value='Thailand'>Thailand</option>
                                                    <option value='Timor-Leste'>Timor-Leste</option>
                                                    <option value='Togo'>Togo</option>
                                                    <option value='Tokelau'>Tokelau</option>
                                                    <option value='Tonga'>Tonga</option>
                                                    <option value='Trinidad and Tobago'>Trinidad and Tobago</option>
                                                    <option value='Tunisia'>Tunisia</option>
                                                    <option value='Turkmenistan'>Turkmenistan</option>
                                                    <option value='Turks and Caicos Islands'>Turks and Caicos Islands
                                                    </option>
                                                    <option value='Tuvalu'>Tuvalu</option>
                                                    <option value='Türkiye'>Türkiye</option>
                                                    <option value='US Minor Outlying Islands'>US Minor Outlying Islands
                                                    </option>
                                                    <option value='Uganda'>Uganda</option>
                                                    <option value='Ukraine'>Ukraine</option>
                                                    <option value='United Arab Emirates'>United Arab Emirates</option>
                                                    <option value='United Kingdom'>United Kingdom</option>
                                                    <option value='United States' selected='selected'>United States
                                                    </option>
                                                    <option value='Uruguay'>Uruguay</option>
                                                    <option value='Uzbekistan'>Uzbekistan</option>
                                                    <option value='Vanuatu'>Vanuatu</option>
                                                    <option value='Venezuela'>Venezuela</option>
                                                    <option value='Viet Nam'>Viet Nam</option>
                                                    <option value='Virgin Islands, British'>Virgin Islands, British
                                                    </option>
                                                    <option value='Virgin Islands, U.S.'>Virgin Islands, U.S.</option>
                                                    <option value='Wallis and Futuna'>Wallis and Futuna</option>
                                                    <option value='Western Sahara'>Western Sahara</option>
                                                    <option value='Yemen'>Yemen</option>
                                                    <option value='Zambia'>Zambia</option>
                                                    <option value='Zimbabwe'>Zimbabwe</option>
                                                    <option value='Åland Islands'>Åland Islands</option>
                                                </select>
                                                <label for='input_6_4_6' id='input_6_4_6_label'
                                                    class='gform-field-label gform-field-label--type-sub hidden_sub_label screen-reader-text'>Country</label>
                                            </span>
                                            <div class='gf_clear gf_clear_complex'></div>
                                        </div>
                                    </fieldset>
                                    <div id="field_6_21"
                                        class="gfield gfield--type-html gfield--input-type-html gfield--width-full form-title gfield_html gfield_html_formatted gfield_no_follows_desc field_sublabel_below gfield--no-description field_description_below field_validation_below gfield_visibility_visible"
                                        data-js-reload="field_6_21">ABOUT YOUR FAMILY*</div>
                                    <fieldset id="field_6_17"
                                        class="gfield gfield--type-list gfield--input-type-list gfield--width-full field_sublabel_below gfield--no-description field_description_below field_validation_below gfield_visibility_visible"
                                        data-js-reload="field_6_17">
                                        <legend class='gfield_label gform-field-label gfield_label_before_complex'>About
                                            Your Family</legend>
                                        <div
                                            class='ginput_container ginput_container_list ginput_list ginput_container_list--columns'>
                                            <div class='gfield_list gfield_list_container'>
                                                <div class="gfield_list_header gform-grid-row">
                                                    <div class="gform-field-label gfield_header_item gform-grid-col">
                                                        Child&#039;s Name</div>
                                                    <div class="gform-field-label gfield_header_item gform-grid-col">
                                                        Current Grade</div>
                                                    <div
                                                        class="gfield_header_item gfield_header_item--icons gform-grid-col">
                                                        &nbsp;</div>
                                                </div>
                                                <div class="gfield_list_groups">
                                                    <div class='gfield_list_row_odd gfield_list_group gform-grid-row'>
                                                        <div class='gfield_list_group_item gfield_list_cell gfield_list_17_cell1 gform-grid-col'
                                                            data-label='Child&#039;s Name'><input aria-invalid='false'
                                                                aria-label='Child&#039;s Name, Row 1'
                                                                data-aria-label-template='Child&#039;s Name, Row {0}'
                                                                type='text' name='input_17[]' value='' />
                                                        </div>
                                                        <div class='gfield_list_group_item gfield_list_cell gfield_list_17_cell2 gform-grid-col'
                                                            data-label='Current Grade'><input aria-invalid='false'
                                                                aria-label='Current Grade, Row 1'
                                                                data-aria-label-template='Current Grade, Row {0}'
                                                                type='text' name='input_17[]' value='' />
                                                        </div>
                                                        <div class='gfield_list_icons gform-grid-col'> <button
                                                                type="button" class='add_list_item '
                                                                aria-label='Add another row'
                                                                onclick='gformAddListItem(this, 0)'>Add</button> <button
                                                                type="button" class='delete_list_item'
                                                                aria-label='Remove row 1'
                                                                data-aria-label-template='Remove row {0}'
                                                                onclick='gformDeleteListItem(this, 0)'
                                                                style="visibility:hidden;">Remove</button></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div id="field_6_22"
                                        class="gfield gfield--type-html gfield--input-type-html gfield--width-full form-title gfield_html gfield_html_formatted gfield_no_follows_desc field_sublabel_below gfield--no-description field_description_below field_validation_below gfield_visibility_visible"
                                        data-js-reload="field_6_22">HOW DID YOU HEAR ABOUT OVERLAND?</div>
                                    <fieldset id="field_6_18"
                                        class="gfield gfield--type-radio gfield--type-choice gfield--input-type-radio gfield--width-full field_sublabel_below gfield--no-description field_description_below field_validation_below gfield_visibility_visible"
                                        data-js-reload="field_6_18">
                                        <legend class='gfield_label gform-field-label'>How did you hear about Overland?
                                        </legend>
                                        <div class='ginput_container ginput_container_radio'>
                                            <div class='gfield_radio' id='input_6_18'>
                                                <div class='gchoice gchoice_6_18_0'>
                                                    <input class='gfield-choice-input' name='input_18' type='radio'
                                                        value='We are Overland alumni' id='choice_6_18_0'
                                                        onchange='gformToggleRadioOther( this )' />
                                                    <label for='choice_6_18_0' id='label_6_18_0'
                                                        class='gform-field-label gform-field-label--type-inline'>We are
                                                        Overland alumni</label>
                                                </div>
                                                <div class='gchoice gchoice_6_18_1'>
                                                    <input class='gfield-choice-input' name='input_18' type='radio'
                                                        value='From a friend' id='choice_6_18_1'
                                                        onchange='gformToggleRadioOther( this )' />
                                                    <label for='choice_6_18_1' id='label_6_18_1'
                                                        class='gform-field-label gform-field-label--type-inline'>From a
                                                        friend</label>
                                                </div>
                                                <div class='gchoice gchoice_6_18_2'>
                                                    <input class='gfield-choice-input' name='input_18' type='radio'
                                                        value='Received a catalog' id='choice_6_18_2'
                                                        onchange='gformToggleRadioOther( this )' />
                                                    <label for='choice_6_18_2' id='label_6_18_2'
                                                        class='gform-field-label gform-field-label--type-inline'>Received
                                                        a catalog</label>
                                                </div>
                                                <div class='gchoice gchoice_6_18_3'>
                                                    <input class='gfield-choice-input' name='input_18' type='radio'
                                                        value='Found online' id='choice_6_18_3'
                                                        onchange='gformToggleRadioOther( this )' />
                                                    <label for='choice_6_18_3' id='label_6_18_3'
                                                        class='gform-field-label gform-field-label--type-inline'>Found
                                                        online</label>
                                                </div>
                                                <div class='gchoice gchoice_6_18_4'>
                                                    <input class='gfield-choice-input' name='input_18' type='radio'
                                                        value='School' id='choice_6_18_4'
                                                        onchange='gformToggleRadioOther( this )' />
                                                    <label for='choice_6_18_4' id='label_6_18_4'
                                                        class='gform-field-label gform-field-label--type-inline'>School</label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div id="field_6_24"
                                        class="gfield gfield--type-hidden gfield--input-type-hidden gform_hidden field_sublabel_below gfield--no-description field_description_below field_validation_below gfield_visibility_visible"
                                        data-js-reload="field_6_24">
                                        <div class='ginput_container ginput_container_text'><input name='input_24'
                                                id='input_6_24' type='hidden' class='gform_hidden'
                                                aria-invalid="false" value='3' /></div>
                                    </div>
                                    <div id="field_6_27"
                                        class="gfield gfield--type-captcha gfield--input-type-captcha gfield--width-full field_sublabel_below gfield--no-description field_description_below hidden_label field_validation_below gfield_visibility_visible"
                                        data-js-reload="field_6_27"><label class='gfield_label gform-field-label'
                                            for='input_6_27'>CAPTCHA</label>
                                        <div id='input_6_27' class='ginput_container ginput_recaptcha'
                                            data-sitekey='6LeoSy8pAAAAAAIfAyLsRH1jXMkA23BZTfVQQ6Pb' data-theme='light'
                                            data-tabindex='-1' data-size='invisible' data-badge='bottomright'></div>
                                    </div>
                                    <div id="field_6_28"
                                        class="gfield gfield--type-text gfield--input-type-text field_sublabel_below gfield--no-description field_description_below field_validation_below gfield_visibility_hidden"
                                        data-js-reload="field_6_28">
                                        <div class="admin-hidden-markup"><i class="gform-icon gform-icon--hidden"
                                                aria-hidden="true"
                                                title="This field is hidden when viewing the form"></i><span>This field is
                                                hidden when viewing the form</span></div><label
                                            class='gfield_label gform-field-label' for='input_6_28'>utm_term</label>
                                        <div class='ginput_container ginput_container_text'><input
                                                data-prefill='utm_term' name='input_28' id='input_6_28'
                                                type='text' value='' class='large' aria-invalid="false" />
                                        </div>
                                    </div>
                                    <div id="field_6_29"
                                        class="gfield gfield--type-text gfield--input-type-text field_sublabel_below gfield--no-description field_description_below field_validation_below gfield_visibility_hidden"
                                        data-js-reload="field_6_29">
                                        <div class="admin-hidden-markup"><i class="gform-icon gform-icon--hidden"
                                                aria-hidden="true"
                                                title="This field is hidden when viewing the form"></i><span>This field is
                                                hidden when viewing the form</span></div><label
                                            class='gfield_label gform-field-label' for='input_6_29'>utm_source</label>
                                        <div class='ginput_container ginput_container_text'><input
                                                data-prefill='utm_source' name='input_29' id='input_6_29'
                                                type='text' value='' class='large' aria-invalid="false" />
                                        </div>
                                    </div>
                                    <div id="field_6_30"
                                        class="gfield gfield--type-text gfield--input-type-text field_sublabel_below gfield--no-description field_description_below field_validation_below gfield_visibility_hidden"
                                        data-js-reload="field_6_30">
                                        <div class="admin-hidden-markup"><i class="gform-icon gform-icon--hidden"
                                                aria-hidden="true"
                                                title="This field is hidden when viewing the form"></i><span>This field is
                                                hidden when viewing the form</span></div><label
                                            class='gfield_label gform-field-label' for='input_6_30'>utm_medium</label>
                                        <div class='ginput_container ginput_container_text'><input
                                                data-prefill='utm_medium' name='input_30' id='input_6_30'
                                                type='text' value='' class='large' aria-invalid="false" />
                                        </div>
                                    </div>
                                    <div id="field_6_31"
                                        class="gfield gfield--type-text gfield--input-type-text field_sublabel_below gfield--no-description field_description_below field_validation_below gfield_visibility_hidden"
                                        data-js-reload="field_6_31">
                                        <div class="admin-hidden-markup"><i class="gform-icon gform-icon--hidden"
                                                aria-hidden="true"
                                                title="This field is hidden when viewing the form"></i><span>This field is
                                                hidden when viewing the form</span></div><label
                                            class='gfield_label gform-field-label' for='input_6_31'>utm_campaign</label>
                                        <div class='ginput_container ginput_container_text'><input
                                                data-prefill='utm_campaign' name='input_31' id='input_6_31'
                                                type='text' value='' class='large' aria-invalid="false" />
                                        </div>
                                    </div>
                                    <div id="field_6_32"
                                        class="gfield gfield--type-text gfield--input-type-text field_sublabel_below gfield--no-description field_description_below field_validation_below gfield_visibility_hidden"
                                        data-js-reload="field_6_32">
                                        <div class="admin-hidden-markup"><i class="gform-icon gform-icon--hidden"
                                                aria-hidden="true"
                                                title="This field is hidden when viewing the form"></i><span>This field is
                                                hidden when viewing the form</span></div><label
                                            class='gfield_label gform-field-label' for='input_6_32'>utm_journey</label>
                                        <div class='ginput_container ginput_container_text'><input
                                                data-prefill='utm_journey' name='input_32' id='input_6_32'
                                                type='text' value='' class='large' aria-invalid="false" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='gform-footer gform_footer top_label'> <input type='submit'
                                    id='gform_submit_button_6' class='gform_button button'
                                    onclick='gform.submission.handleButtonClick(this);' value='Submit' /> <input
                                    type='hidden' name='gform_ajax'
                                    value='form_id=6&amp;title=&amp;description=&amp;tabindex=0&amp;theme=orbital&amp;hash=d5e8612162040a9b1dc18d3e106e594d' />
                                <input type='hidden' class='gform_hidden' name='gform_submission_method'
                                    data-js='gform_submission_method_6' value='iframe' />
                                <input type='hidden' class='gform_hidden' name='gform_theme'
                                    data-js='gform_theme_6' id='gform_theme_6' value='orbital' />
                                <input type='hidden' class='gform_hidden' name='gform_style_settings'
                                    data-js='gform_style_settings_6' id='gform_style_settings_6' value='' />
                                <input type='hidden' class='gform_hidden' name='is_submit_6' value='1' />
                                <input type='hidden' class='gform_hidden' name='gform_submit' value='6' />

                                <input type='hidden' class='gform_hidden' name='gform_unique_id' value='' />
                                <input type='hidden' class='gform_hidden' name='state_6'
                                    value='WyJ7XCIxMFwiOltcIjQwYTQ1MzIwMDE4ODk2NzA2NDllODNmNDg5MmQ3NTUyXCIsXCJjNThlYTUyNTRiNDUwNjBkYWFkNzFlMGVlYjkyOGRiMlwiXSxcIjE4XCI6W1wiNWI4MjE0NzRjOTcyNGFmMDMxMzMxMjhlZWMxNTY1YWFcIixcIjI3ZGQxOTVkNTc0YzljNGM0YjUyMzFhYmMxYWRhYjkzXCIsXCJiMzEwOTJlN2IxOTQ3MDE3YTNmNjgyMjM3N2JhNzhlMlwiLFwiNzk3ZjY5ZjFjYjU1ZGUyNWM2MTA0MGVhNWNiZjVlODdcIixcIjk2MTZmNTQ0MWQwNGU3ODk0ZWNkMjM1NTRjZjU5YjNlXCJdfSIsIjM5NzNlOWI5NTcwYjU4ZjI5OGVlMGZmMzliYjEzOGJkIl0=' />
                                <input type='hidden' autocomplete='off' class='gform_hidden'
                                    name='gform_target_page_number_6' id='gform_target_page_number_6'
                                    value='0' />
                                <input type='hidden' autocomplete='off' class='gform_hidden'
                                    name='gform_source_page_number_6' id='gform_source_page_number_6'
                                    value='1' />
                                <input type='hidden' name='gform_field_values' value='' />

                            </div>
                        </form>
                    </div>
                    <iframe style='display:none;width:0px;height:0px;' src='about:blank' name='gform_ajax_frame_6'
                        id='gform_ajax_frame_6'
                        title='This iframe contains the logic required to handle Ajax powered Gravity Forms.'></iframe>
                    <script type="text/javascript">
                        /* <![CDATA[ */
                        gform.initializeOnLoaded(function() {
                            gformInitSpinner(6, 'https://overlandsummers.com/wp-content/plugins/gravityforms/images/spinner.svg',
                                false);
                            jQuery('#gform_ajax_frame_6').on('load', function() {
                                var contents = jQuery(this).contents().find('*').html();
                                var is_postback = contents.indexOf('GF_AJAX_POSTBACK') >= 0;
                                if (!is_postback) {
                                    return;
                                }
                                var form_content = jQuery(this).contents().find('#gform_wrapper_6');
                                var is_confirmation = jQuery(this).contents().find('#gform_confirmation_wrapper_6').length >
                                    0;
                                var is_redirect = contents.indexOf('gformRedirect(){') >= 0;
                                var is_form = form_content.length > 0 && !is_redirect && !is_confirmation;
                                var mt = parseInt(jQuery('html').css('margin-top'), 10) + parseInt(jQuery('body').css(
                                    'margin-top'), 10) + 100;
                                if (is_form) {
                                    form_content.find('form').css('opacity', 0);
                                    jQuery('#gform_wrapper_6').html(form_content.html());
                                    if (form_content.hasClass('gform_validation_error')) {
                                        jQuery('#gform_wrapper_6').addClass('gform_validation_error');
                                    } else {
                                        jQuery('#gform_wrapper_6').removeClass('gform_validation_error');
                                    }
                                    setTimeout(function() {
                                        /* delay the scroll by 50 milliseconds to fix a bug in chrome */
                                        jQuery(document).scrollTop(jQuery('#gform_wrapper_6').offset().top - mt);
                                    }, 50);
                                    if (window['gformInitDatepicker']) {
                                        gformInitDatepicker();
                                    }
                                    if (window['gformInitPriceFields']) {
                                        gformInitPriceFields();
                                    }
                                    var current_page = jQuery('#gform_source_page_number_6').val();
                                    gformInitSpinner(6,
                                        'https://overlandsummers.com/wp-content/plugins/gravityforms/images/spinner.svg',
                                        false);
                                    jQuery(document).trigger('gform_page_loaded', [6, current_page]);
                                    window['gf_submitting_6'] = false;
                                } else if (!is_redirect) {
                                    var confirmation_content = jQuery(this).contents().find('.GF_AJAX_POSTBACK').html();
                                    if (!confirmation_content) {
                                        confirmation_content = contents;
                                    }
                                    jQuery('#gform_wrapper_6').replaceWith(confirmation_content);
                                    jQuery(document).scrollTop(jQuery('#gf_6').offset().top - mt);
                                    jQuery(document).trigger('gform_confirmation_loaded', [6]);
                                    window['gf_submitting_6'] = false;
                                    wp.a11y.speak(jQuery('#gform_confirmation_message_6').text());
                                } else {
                                    jQuery('#gform_6').append(contents);
                                    if (window['gformRedirect']) {
                                        gformRedirect();
                                    }
                                }
                                jQuery(document).trigger("gform_pre_post_render", [{
                                    formId: "6",
                                    currentPage: "current_page",
                                    abort: function() {
                                        this.preventDefault();
                                    }
                                }]);
                                if (event && event.defaultPrevented) {
                                    return;
                                }
                                const gformWrapperDiv = document.getElementById("gform_wrapper_6");
                                if (gformWrapperDiv) {
                                    const visibilitySpan = document.createElement("span");
                                    visibilitySpan.id = "gform_visibility_test_6";
                                    gformWrapperDiv.insertAdjacentElement("afterend", visibilitySpan);
                                }
                                const visibilityTestDiv = document.getElementById("gform_visibility_test_6");
                                let postRenderFired = false;

                                function triggerPostRender() {
                                    if (postRenderFired) {
                                        return;
                                    }
                                    postRenderFired = true;
                                    jQuery(document).trigger('gform_post_render', [6, current_page]);
                                    gform.utils.trigger({
                                        event: 'gform/postRender',
                                        native: false,
                                        data: {
                                            formId: 6,
                                            currentPage: current_page
                                        }
                                    });
                                    gform.utils.trigger({
                                        event: 'gform/post_render',
                                        native: false,
                                        data: {
                                            formId: 6,
                                            currentPage: current_page
                                        }
                                    });
                                    if (visibilityTestDiv) {
                                        visibilityTestDiv.parentNode.removeChild(visibilityTestDiv);
                                    }
                                }

                                function debounce(func, wait, immediate) {
                                    var timeout;
                                    return function() {
                                        var context = this,
                                            args = arguments;
                                        var later = function() {
                                            timeout = null;
                                            if (!immediate) func.apply(context, args);
                                        };
                                        var callNow = immediate && !timeout;
                                        clearTimeout(timeout);
                                        timeout = setTimeout(later, wait);
                                        if (callNow) func.apply(context, args);
                                    };
                                }
                                const debouncedTriggerPostRender = debounce(function() {
                                    triggerPostRender();
                                }, 200);
                                if (visibilityTestDiv && visibilityTestDiv.offsetParent === null) {
                                    const observer = new MutationObserver((mutations) => {
                                        mutations.forEach((mutation) => {
                                            if (mutation.type === 'attributes' && visibilityTestDiv
                                                .offsetParent !== null) {
                                                debouncedTriggerPostRender();
                                                observer.disconnect();
                                            }
                                        });
                                    });
                                    observer.observe(document.body, {
                                        attributes: true,
                                        childList: false,
                                        subtree: true,
                                        attributeFilter: ['style', 'class'],
                                    });
                                } else {
                                    triggerPostRender();
                                }
                            });
                        });
                        /* ]]> */
                    </script>

                </div>


                <button type="button" class="pum-close popmake-close" aria-label="Close">
                    x </button>

            </div>

        </div>
        <script>
            /* <![CDATA[ */
            var tribe_l10n_datatables = {
                "aria": {
                    "sort_ascending": ": activate to sort column ascending",
                    "sort_descending": ": activate to sort column descending"
                },
                "length_menu": "Show _MENU_ entries",
                "empty_table": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "info_empty": "Showing 0 to 0 of 0 entries",
                "info_filtered": "(filtered from _MAX_ total entries)",
                "zero_records": "No matching records found",
                "search": "Search:",
                "all_selected_text": "All items on this page were selected. ",
                "select_all_link": "Select all pages",
                "clear_selection": "Clear Selection.",
                "pagination": {
                    "all": "All",
                    "next": "Next",
                    "previous": "Previous"
                },
                "select": {
                    "rows": {
                        "0": "",
                        "_": ": Selected %d rows",
                        "1": ": Selected 1 row"
                    }
                },
                "datepicker": {
                    "dayNames": ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                    "dayNamesShort": ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
                    "dayNamesMin": ["S", "M", "T", "W", "T", "F", "S"],
                    "monthNames": ["January", "February", "March", "April", "May", "June", "July", "August", "September",
                        "October", "November", "December"
                    ],
                    "monthNamesShort": ["January", "February", "March", "April", "May", "June", "July", "August",
                        "September", "October", "November", "December"
                    ],
                    "monthNamesMin": ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    "nextText": "Next",
                    "prevText": "Prev",
                    "currentText": "Today",
                    "closeText": "Done",
                    "today": "Today",
                    "clear": "Clear"
                },
                "registration_prompt": "There is unsaved attendee information. Are you sure you want to continue?"
            }; /* ]]> */
        </script><noscript><img height="1" width="1" style="display: none;"
                src="https://www.facebook.com/tr?id=895928418116899&ev=PageView&noscript=1&cd%5Bpage_title%5D=Homepage&cd%5Bpost_type%5D=page&cd%5Bpost_id%5D=227&cd%5Bplugin%5D=PixelYourSite&cd%5Buser_role%5D=guest&cd%5Bevent_url%5D=overlandsummers.com%2F"
                alt=""></noscript>
        <script type="text/javascript"
            src="https://overlandsummers.com/wp-content/plugins/duracelltomi-google-tag-manager/dist/js/gtm4wp-form-move-tracker.js?ver=1.20.3"
            id="gtm4wp-form-move-tracker-js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js?ver=1.1"
            id="slick-slider-js" defer="defer" data-wp-strategy="defer"></script>
        <script type="text/javascript"
            src="https://overlandsummers.com/wp-content/themes/overland-summer/plugins/wow/wow.min.js?ver=1.1" id="wow-js"
            defer="defer" data-wp-strategy="defer"></script>
        <script type="text/javascript" id="main-js-extra">
            /* <![CDATA[ */
            var GlobalThemeData = {
                "themeUrl": "https:\/\/overlandsummers.com\/wp-content\/themes\/overland-summer",
                "ajaxUrl": "https:\/\/overlandsummers.com\/wp-admin\/admin-ajax.php"
            };
            /* ]]> */
        </script>
        <script type="text/javascript"
            src="https://overlandsummers.com/wp-content/themes/overland-summer/dist/js/main-live.js?ver=1703259327" id="main-js"
            defer="defer" data-wp-strategy="defer"></script>
        <script type="text/javascript"
            src="https://overlandsummers.com/wp-content/themes/overland-summer/dist/js/utm-tracking.js?ver=1734126609"
            id="utm-js" defer="defer" data-wp-strategy="defer"></script>
        <script id="dearpdf-script-js" defer type="text/javascript"
            src="https://overlandsummers.com/wp-content/plugins/dearpdf-pro/assets/js/dearpdf-pro.min.js?ver=2.0.71"></script>
        <script type="text/javascript" id="gforms_recaptcha_recaptcha-js-extra">
            /* <![CDATA[ */
            var gforms_recaptcha_recaptcha_strings = {
                "site_key": "6LeoSy8pAAAAAAIfAyLsRH1jXMkA23BZTfVQQ6Pb",
                "ajaxurl": "https:\/\/overlandsummers.com\/wp-admin\/admin-ajax.php",
                "nonce": "57f33ee6bb"
            };
            /* ]]> */
        </script>
        <script type="text/javascript"
            src="https://www.google.com/recaptcha/api.js?render=6LeoSy8pAAAAAAIfAyLsRH1jXMkA23BZTfVQQ6Pb&amp;ver=1.6.0"
            id="gforms_recaptcha_recaptcha-js"></script>
        <script type="text/javascript" id="gforms_recaptcha_recaptcha-js-after">
            /* <![CDATA[ */
            (function($) {
                grecaptcha.ready(function() {
                    $('.grecaptcha-badge').css('visibility', 'hidden');
                });
            })(jQuery);
            /* ]]> */
        </script>
        <script type="text/javascript" src="https://overlandsummers.com/wp-includes/js/jquery/ui/core.min.js?ver=1.13.3"
            id="jquery-ui-core-js"></script>
        <script type="text/javascript" id="popup-maker-site-js-extra">
            /* <![CDATA[ */
            var pum_vars = {
                "version": "1.20.4",
                "pm_dir_url": "https:\/\/overlandsummers.com\/wp-content\/plugins\/popup-maker\/",
                "ajaxurl": "https:\/\/overlandsummers.com\/wp-admin\/admin-ajax.php",
                "restapi": "https:\/\/overlandsummers.com\/wp-json\/pum\/v1",
                "rest_nonce": null,
                "default_theme": "1102",
                "debug_mode": "",
                "disable_tracking": "",
                "home_url": "\/",
                "message_position": "top",
                "core_sub_forms_enabled": "1",
                "popups": [],
                "cookie_domain": "",
                "analytics_route": "analytics",
                "analytics_api": "https:\/\/overlandsummers.com\/wp-json\/pum\/v1"
            };
            var pum_sub_vars = {
                "ajaxurl": "https:\/\/overlandsummers.com\/wp-admin\/admin-ajax.php",
                "message_position": "top"
            };
            var pum_popups = {
                "pum-3719": {
                    "triggers": [{
                        "type": "auto_open",
                        "settings": {
                            "cookie_name": ["pum-3719"],
                            "delay": "500"
                        }
                    }],
                    "cookies": [{
                        "event": "on_popup_close",
                        "settings": {
                            "name": "pum-3719",
                            "key": "",
                            "session": null,
                            "path": true,
                            "time": "1 week"
                        }
                    }],
                    "disable_on_mobile": false,
                    "disable_on_tablet": false,
                    "atc_promotion": null,
                    "explain": null,
                    "type_section": null,
                    "theme_id": "1105",
                    "size": "tiny",
                    "responsive_min_width": "0%",
                    "responsive_max_width": "100%",
                    "custom_width": "640px",
                    "custom_height_auto": false,
                    "custom_height": "380px",
                    "scrollable_content": false,
                    "animation_type": "fade",
                    "animation_speed": "350",
                    "animation_origin": "center top",
                    "open_sound": "none",
                    "custom_sound": "",
                    "location": "center",
                    "position_top": "100",
                    "position_bottom": "0",
                    "position_left": "0",
                    "position_right": "0",
                    "position_from_trigger": false,
                    "position_fixed": false,
                    "overlay_disabled": false,
                    "stackable": false,
                    "disable_reposition": false,
                    "zindex": "1999999999",
                    "close_button_delay": "0",
                    "fi_promotion": null,
                    "close_on_form_submission": false,
                    "close_on_form_submission_delay": "0",
                    "close_on_overlay_click": false,
                    "close_on_esc_press": false,
                    "close_on_f4_press": false,
                    "disable_form_reopen": false,
                    "disable_accessibility": false,
                    "theme_slug": "hello-box",
                    "id": 3719,
                    "slug": "slideshow-sign-up"
                },
                "pum-1554": {
                    "triggers": [],
                    "cookies": [],
                    "disable_on_mobile": false,
                    "disable_on_tablet": false,
                    "atc_promotion": null,
                    "explain": null,
                    "type_section": null,
                    "theme_id": "1102",
                    "size": "medium",
                    "responsive_min_width": "0%",
                    "responsive_max_width": "100%",
                    "custom_width": "640px",
                    "custom_height_auto": false,
                    "custom_height": "380px",
                    "scrollable_content": false,
                    "animation_type": "fade",
                    "animation_speed": "350",
                    "animation_origin": "center top",
                    "open_sound": "none",
                    "custom_sound": "",
                    "location": "center top",
                    "position_top": "100",
                    "position_bottom": "0",
                    "position_left": "0",
                    "position_right": "0",
                    "position_from_trigger": false,
                    "position_fixed": false,
                    "overlay_disabled": false,
                    "stackable": false,
                    "disable_reposition": false,
                    "zindex": "1999999999",
                    "close_button_delay": "0",
                    "fi_promotion": null,
                    "close_on_form_submission": false,
                    "close_on_form_submission_delay": "0",
                    "close_on_overlay_click": false,
                    "close_on_esc_press": false,
                    "close_on_f4_press": false,
                    "disable_form_reopen": false,
                    "disable_accessibility": false,
                    "theme_slug": "default-theme",
                    "id": 1554,
                    "slug": "home-hero-video"
                },
                "pum-5417": {
                    "triggers": [{
                        "type": "exit_intent",
                        "settings": {
                            "methods": {
                                "mouseleave": "mouseleave",
                                "lostfocus": "lostfocus"
                            },
                            "cookie_name": ["pum-5417"],
                            "top_sensitivity": 27,
                            "delay_sensitivity": 350,
                            "linkclick_custom_targeting": "",
                            "link_hover_delay": 300,
                            "mobile_time_delay": 500,
                            "mobilescroll_up_percent": 10
                        }
                    }],
                    "cookies": [{
                        "event": "form_submission",
                        "settings": {
                            "name": "pum-5417",
                            "key": "",
                            "session": false,
                            "path": "1",
                            "time": "1 month",
                            "form": "any",
                            "only_in_popup": "1"
                        }
                    }, {
                        "event": "on_popup_close",
                        "settings": {
                            "name": "pum-5417",
                            "time": "1 month",
                            "session": false,
                            "path": "1",
                            "key": ""
                        }
                    }],
                    "disable_on_mobile": false,
                    "disable_on_tablet": false,
                    "atc_promotion": null,
                    "explain": null,
                    "type_section": null,
                    "theme_id": "1105",
                    "size": "small",
                    "responsive_min_width": "0%",
                    "responsive_max_width": "100%",
                    "custom_width": "640px",
                    "custom_height_auto": false,
                    "custom_height": "380px",
                    "scrollable_content": false,
                    "animation_type": "fade",
                    "animation_speed": "350",
                    "animation_origin": "center top",
                    "open_sound": "none",
                    "custom_sound": "",
                    "location": "center top",
                    "position_top": "100",
                    "position_bottom": "0",
                    "position_left": "0",
                    "position_right": "0",
                    "position_from_trigger": false,
                    "position_fixed": false,
                    "overlay_disabled": false,
                    "stackable": false,
                    "disable_reposition": false,
                    "zindex": "1999999999",
                    "close_button_delay": "0",
                    "fi_promotion": null,
                    "close_on_form_submission": true,
                    "close_on_form_submission_delay": "200",
                    "close_on_overlay_click": false,
                    "close_on_esc_press": false,
                    "close_on_f4_press": false,
                    "disable_form_reopen": false,
                    "disable_accessibility": false,
                    "theme_slug": "hello-box",
                    "id": 5417,
                    "slug": "home-exit-intent-catalog-request"
                }
            };
            /* ]]> */
        </script>
        <script type="text/javascript"
            src="//overlandsummers.com/wp-content/uploads/pum/pum-site-scripts.js?defer&amp;generated=1738215775&amp;ver=1.20.4"
            id="popup-maker-site-js"></script>
        <script type="text/javascript"
            src="https://overlandsummers.com/wp-includes/js/dist/dom-ready.min.js?ver=f77871ff7694fffea381"
            id="wp-dom-ready-js"></script>
        <script type="text/javascript"
            src="https://overlandsummers.com/wp-includes/js/dist/hooks.min.js?ver=4d63a3d491d11ffd8ac6" id="wp-hooks-js">
        </script>
        <script type="text/javascript"
            src="https://overlandsummers.com/wp-includes/js/dist/i18n.min.js?ver=5e580eb46a90c2b997e6" id="wp-i18n-js"></script>
        <script type="text/javascript" id="wp-i18n-js-after">
            /* <![CDATA[ */
            wp.i18n.setLocaleData({
                'text direction\u0004ltr': ['ltr']
            });
            /* ]]> */
        </script>
        <script type="text/javascript"
            src="https://overlandsummers.com/wp-includes/js/dist/a11y.min.js?ver=3156534cc54473497e14" id="wp-a11y-js"></script>
        <script type="text/javascript" defer='defer'
            src="https://overlandsummers.com/wp-content/plugins/gravityforms/js/placeholders.jquery.min.js?ver=2.9.2"
            id="gform_placeholder-js"></script>
        <script type="text/javascript" defer='defer'
            src="https://overlandsummers.com/wp-content/plugins/gravityforms/assets/js/dist/vendor-theme.min.js?ver=ddd2702ee024d421149a5e61416f1ff5"
            id="gform_gravityforms_theme_vendors-js"></script>
        <script type="text/javascript" id="gform_gravityforms_theme-js-extra">
            /* <![CDATA[ */
            var gform_theme_config = {
                "common": {
                    "form": {
                        "honeypot": {
                            "version_hash": "cc20fdddbc1543278a65ff1ad7e46ce2"
                        },
                        "ajax": {
                            "ajaxurl": "https:\/\/overlandsummers.com\/wp-admin\/admin-ajax.php",
                            "ajax_submission_nonce": "667e5c9d46",
                            "i18n": {
                                "step_announcement": "Step %1$s of %2$s, %3$s",
                                "unknown_error": "There was an unknown error processing your request. Please try again."
                            }
                        }
                    }
                },
                "hmr_dev": "",
                "public_path": "https:\/\/overlandsummers.com\/wp-content\/plugins\/gravityforms\/assets\/js\/dist\/",
                "config_nonce": "6808e80414"
            };
            /* ]]> */
        </script>
        <script type="text/javascript" defer='defer'
            src="https://overlandsummers.com/wp-content/plugins/gravityforms/assets/js/dist/scripts-theme.min.js?ver=b8fbd9cb240c8684c860c87e4b060364"
            id="gform_gravityforms_theme-js"></script>
        <script type="text/javascript"
            src="https://overlandsummers.com/wp-content/plugins/gravityformsrecaptcha/js/frontend.min.js?ver=1.6.0"
            id="gforms_recaptcha_frontend-js"></script>
        <script type="text/javascript">
            /* <![CDATA[ */
            gform.initializeOnLoaded(function() {
                jQuery(document).on('gform_post_render', function(event, formId, currentPage) {
                    if (formId == 6) {
                        gf_global["number_formats"][6] = {
                            "23": {
                                "price": false,
                                "value": false
                            },
                            "2": {
                                "price": false,
                                "value": false
                            },
                            "3": {
                                "price": false,
                                "value": false
                            },
                            "26": {
                                "price": false,
                                "value": false
                            },
                            "19": {
                                "price": false,
                                "value": false
                            },
                            "10": {
                                "price": false,
                                "value": false
                            },
                            "11": {
                                "price": false,
                                "value": false
                            },
                            "20": {
                                "price": false,
                                "value": false
                            },
                            "4": {
                                "price": false,
                                "value": false
                            },
                            "21": {
                                "price": false,
                                "value": false
                            },
                            "17": {
                                "price": false,
                                "value": false
                            },
                            "22": {
                                "price": false,
                                "value": false
                            },
                            "18": {
                                "price": false,
                                "value": false
                            },
                            "24": {
                                "price": false,
                                "value": false
                            },
                            "27": {
                                "price": false,
                                "value": false
                            },
                            "28": {
                                "price": false,
                                "value": false
                            },
                            "29": {
                                "price": false,
                                "value": false
                            },
                            "30": {
                                "price": false,
                                "value": false
                            },
                            "31": {
                                "price": false,
                                "value": false
                            },
                            "32": {
                                "price": false,
                                "value": false
                            }
                        };
                        if (window['jQuery']) {
                            if (!window['gf_form_conditional_logic']) window['gf_form_conditional_logic'] =
                                new Array();
                            window['gf_form_conditional_logic'][6] = {
                                logic: {
                                    11: {
                                        "field": {
                                            "enabled": true,
                                            "actionType": "show",
                                            "logicType": "all",
                                            "rules": [{
                                                "fieldId": "10",
                                                "operator": "is",
                                                "value": "A friend"
                                            }]
                                        },
                                        "nextButton": null,
                                        "section": null
                                    }
                                },
                                dependents: {
                                    11: [11]
                                },
                                animation: 0,
                                defaults: {
                                    "2": {
                                        "2.2": "",
                                        "2.3": "",
                                        "2.4": "",
                                        "2.6": "",
                                        "2.8": ""
                                    },
                                    "10": ["choice_6_10_0"],
                                    "4": {
                                        "4.1": "",
                                        "4.2": "",
                                        "4.3": "",
                                        "4.4": "",
                                        "4.5": "",
                                        "4.6": "United States"
                                    },
                                    "24": "3"
                                },
                                fields: {
                                    "23": [],
                                    "2": [],
                                    "3": [],
                                    "26": [],
                                    "19": [],
                                    "10": [11],
                                    "11": [],
                                    "20": [],
                                    "4": [],
                                    "21": [],
                                    "17": [],
                                    "22": [],
                                    "18": [],
                                    "24": [],
                                    "27": [],
                                    "28": [],
                                    "29": [],
                                    "30": [],
                                    "31": [],
                                    "32": []
                                }
                            };
                            if (!window['gf_number_format']) window['gf_number_format'] = 'decimal_dot';
                            jQuery(document).ready(function() {
                                gform.utils.trigger({
                                    event: 'gform/conditionalLogic/init/start',
                                    native: false,
                                    data: {
                                        formId: 6,
                                        fields: null,
                                        isInit: true
                                    }
                                });
                                window['gformInitPriceFields']();
                                gf_apply_rules(6, [11], true);
                                jQuery('#gform_wrapper_6').show();
                                jQuery('#gform_wrapper_6 form').css('opacity', '');
                                jQuery(document).trigger('gform_post_conditional_logic', [6, null,
                                    true
                                ]);
                                gform.utils.trigger({
                                    event: 'gform/conditionalLogic/init/end',
                                    native: false,
                                    data: {
                                        formId: 6,
                                        fields: null,
                                        isInit: true
                                    }
                                });
                            });
                        }
                        if (typeof Placeholders != 'undefined') {
                            Placeholders.enable();
                        }(function($) {
                            document.getElementById("gform_6").addEventListener('submit', (e) => {
                                formData = new FormData(e.target);
                                analytics.identify({
                                    firstName: formData.get('input_2.3'),
                                    lastName: formData.get('input_2.6'),
                                    email: formData.get('input_3')
                                });
                            })
                        })(jQuery);
                    }
                });
                jQuery(document).on('gform_post_conditional_logic', function(event, formId, fields, isInit) {})
            });
            /* ]]> */
        </script>
        <script type="text/javascript">
            /* <![CDATA[ */
            gform.initializeOnLoaded(function() {
                jQuery(document).trigger("gform_pre_post_render", [{
                    formId: "6",
                    currentPage: "1",
                    abort: function() {
                        this.preventDefault();
                    }
                }]);
                if (event && event.defaultPrevented) {
                    return;
                }
                const gformWrapperDiv = document.getElementById("gform_wrapper_6");
                if (gformWrapperDiv) {
                    const visibilitySpan = document.createElement("span");
                    visibilitySpan.id = "gform_visibility_test_6";
                    gformWrapperDiv.insertAdjacentElement("afterend", visibilitySpan);
                }
                const visibilityTestDiv = document.getElementById("gform_visibility_test_6");
                let postRenderFired = false;

                function triggerPostRender() {
                    if (postRenderFired) {
                        return;
                    }
                    postRenderFired = true;
                    jQuery(document).trigger('gform_post_render', [6, 1]);
                    gform.utils.trigger({
                        event: 'gform/postRender',
                        native: false,
                        data: {
                            formId: 6,
                            currentPage: 1
                        }
                    });
                    gform.utils.trigger({
                        event: 'gform/post_render',
                        native: false,
                        data: {
                            formId: 6,
                            currentPage: 1
                        }
                    });
                    if (visibilityTestDiv) {
                        visibilityTestDiv.parentNode.removeChild(visibilityTestDiv);
                    }
                }

                function debounce(func, wait, immediate) {
                    var timeout;
                    return function() {
                        var context = this,
                            args = arguments;
                        var later = function() {
                            timeout = null;
                            if (!immediate) func.apply(context, args);
                        };
                        var callNow = immediate && !timeout;
                        clearTimeout(timeout);
                        timeout = setTimeout(later, wait);
                        if (callNow) func.apply(context, args);
                    };
                }
                const debouncedTriggerPostRender = debounce(function() {
                    triggerPostRender();
                }, 200);
                if (visibilityTestDiv && visibilityTestDiv.offsetParent === null) {
                    const observer = new MutationObserver((mutations) => {
                        mutations.forEach((mutation) => {
                            if (mutation.type === 'attributes' && visibilityTestDiv.offsetParent !==
                                null) {
                                debouncedTriggerPostRender();
                                observer.disconnect();
                            }
                        });
                    });
                    observer.observe(document.body, {
                        attributes: true,
                        childList: false,
                        subtree: true,
                        attributeFilter: ['style', 'class'],
                    });
                } else {
                    triggerPostRender();
                }
            });
            /* ]]> */
        </script>
        <!-- Chatbot -->
        <!-- <script>
            var MessageBirdChatWidgetSettings = {
                widgetId: '66632939-aea0-4afc-80cb-51f76c86dfdd',
                initializeOnLoad: true,
            };
            ! function() {
                "use strict";
                if (Boolean(document.getElementById("live-chat-widget-script"))) console.error(
                    "MessageBirdChatWidget: Snippet loaded twice on page");
                else {
                    var e, t;
                    window.MessageBirdChatWidget = {}, window.MessageBirdChatWidget.queue = [];
                    for (var i = ["init", "setConfig", "toggleChat", "identify", "hide", "on", "shutdown"], n = function() {
                            var e = i[d];
                            window.MessageBirdChatWidget[e] = function() {
                                for (var t = arguments.length, i = new Array(t), n = 0; n < t; n++) i[n] = arguments[n];
                                window.MessageBirdChatWidget.queue.push([
                                    [e, i]
                                ])
                            }
                        }, d = 0; d < i.length; d++) n();
                    var a = (null === (e = window) || void 0 === e || null === (t = e.MessageBirdChatWidgetSettings) ||
                            void 0 === t ? void 0 : t.widgetId) || "",
                        o = function() {
                            var e, t = document.createElement("script");
                            t.type = "text/javascript", t.src = "https://livechat.messagebird.com/bootstrap.js?widgetId="
                                .concat(a), t.async = !0, t.id = "live-chat-widget-script";
                            var i = document.getElementsByTagName("script")[0];
                            null == i || null === (e = i.parentNode) || void 0 === e || e.insertBefore(t, i)
                        };
                    "complete" === document.readyState ? o() : window.attachEvent ? window.attachEvent("onload", o) : window
                        .addEventListener("load", o, !1)
                }
            }();
        </script> -->
        <!-- End Chatbot -->
    </body>

    </html>
@endsection
