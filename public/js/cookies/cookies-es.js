window.addEventListener('load', function () {

    // obtain plugin
    var cc = initCookieConsent();

    // run plugin with your configuration
    cc.run({
        current_lang: 'es',
        autoclear_cookies: true, // default: false
        page_scripts: true, // default: false

        mode: 'opt-in', // default: 'opt-in'; value: 'opt-in' or 'opt-out'
        delay: 0, // default: 0
        auto_language: '', // default: null; could also be 'browser' or 'document'
        autorun: true, // default: true
        force_consent: true, // default: false
        hide_from_bots: true, // default: false
        remove_cookie_tables: false, // default: false
        cookie_name: 'cc_cookie', // default: 'cc_cookie'
        cookie_expiration: 182, // default: 182 (days)
        cookie_necessary_only_expiration: 182, // default: disabled
        cookie_domain: location.hostname, // default: current domain
        cookie_path: '/', // default: root
        cookie_same_site: 'Lax', // default: 'Lax'
        use_rfc_cookie: false, // default: false
        revision: 0, // default: 0

        onFirstAction: function (user_preferences, cookie) {
            // callback triggered only once on the first accept/reject action
        },

        onAccept: function (cookie) {
            // callback triggered on the first accept/reject action, and after each page load
            // console.log(cookie);
        },

        onChange: function (cookie, changed_categories) {
            // callback triggered when user changes preferences after consent has already been given
        },

        languages: {
            'es': {
                consent_modal: {
                    title: 'Configuración de Cookies ',
                    description: 'Hola, este sitio web utiliza cookies esenciales para garantizar su correcto funcionamiento y cookies de seguimiento para comprender cómo interactúas con él. Este último se fijará solo después de tu consentimiento.  Puedes aceptar todas las cookies pulsando el botón "Aceptar Todas" o configurarlas clicando <button type="button" data-cc="c-settings" class="cc-link">aquí.</button>',
                    primary_btn: {
                        text: 'Aceptar todo',
                        role: 'accept_all' // 'accept_selected' or 'accept_all'
                    },

                },
                settings_modal: {
                    title: 'Preferencias de cookies',
                    save_settings_btn: 'Guardar configuración',
                    accept_all_btn: 'Aceptar todo',
                    // reject_all_btn: 'Reject all',
                    close_btn_label: 'Cerrar',
                    cookie_table_headers: [{
                        col1: 'Name'
                    },
                    {
                        col2: 'Domain'
                    },
                    {
                        col3: 'Expiration'
                    },
                    {
                        col4: 'Description'
                    }
                    ],
                    blocks: [{
                        title: 'Utilización de cookies 📢',
                        description: 'Utilizo cookies para garantizar las funcionalidades básicas del sitio web y mejorar tu experiencia en línea. Puede elegir si desea aceptar cada categoría de cookie o no. Para obtener más detalles sobre las cookies y otros datos confidenciales, lea la <a href="#" class="cc-link">política de privacidad </a>completa.'
                    }, {
                        title: 'Cookies técnicas ',
                        description: 'Estas cookies son esenciales para el correcto funcionamiento de este sitio web, cargar contenido multimedia y proteger tu seguridad. Sin estas cookies, el sitio web no funcionaría correctamente.',
                        toggle: {
                            value: 'necessary',
                            enabled: true,
                            readonly: true // cookie categories with readonly=true are all treated as "necessary cookies"
                        }
                    }, {
                        title: 'Cookies de análisis ',
                        description: 'Nos permite conocer cómo interactúas con la web, el número de visitas en las diferentes secciones y establecer estadísticas para mejorar nuestras prácticas comerciales.',
                        toggle: {
                            value: 'analytics', // your cookie category
                            enabled: true,
                            readonly: false
                        },
                        // cookie_table: [ // list of all expected cookies
                        //     {
                        //         col1: '^_ga', // match all cookies starting with "_ga"
                        //         col2: 'google.com',
                        //         col3: '2 years',
                        //         col4: 'description ...',
                        //         is_regex: true
                        //     },
                        //     {
                        //         col1: '_gid',
                        //         col2: 'google.com',
                        //         col3: '1 day',
                        //         col4: 'description ...',
                        //     }
                        // ]
                    }
                        , {
                            title: 'Cookies publicitarias y de seguimiento',
                            description: 'Estas cookies recopilan información sobre cómo usa el sitio web, qué páginas visitó y en qué enlaces hizo clic.',
                            toggle: {
                                value: 'targeting',
                                enabled: true,
                                readonly: false
                            }
                        }, {
                            title: 'Más información',
                            description: 'Para cualquier consulta en relación con nuestra política sobre cookies y sus opciones, <a class="cc-link" href="https://www.naturaloptics.com/cita-macro/policy/legal">contáctenos</a>.',
                        }
                    ]
                }
            }
        },
        gui_options: {
            consent_modal: {
                layout: 'cloud', // box/cloud/bar
                position: 'bottom center', // bottom/middle/top + left/right/center
                transition: 'slide', // zoom/slide
                swap_buttons: false // enable to invert buttons
            },
            settings_modal: {
                layout: 'box', // box/bar
                transition: 'zoom' // zoom/slide
            }
        }
    });
});