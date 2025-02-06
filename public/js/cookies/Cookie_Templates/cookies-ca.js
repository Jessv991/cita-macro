window.addEventListener('load', function () {

    // obtain plugin
    var cc = initCookieConsent();

    // run plugin with your configuration
    cc.run({
        current_lang: 'ca',
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
            'ca': {
                consent_modal: {
                    title: 'Configuració de Cookies',
                    description: "Hola, aquest lloc web utilitza cookies essencials per a garantir el seu correcte funcionament i cookies de seguiment per a comprendre com interactues amb ell. Aquestes últimes es fixaran només després del teu consentiment. Pots acceptar totes les cookies prement el botó " + '"Acceptar Totes"' + " o configurar-les clicant " + '<button type="button" data-cc="c-settings" class="cc-link">' + "aquí." + '</button>',
                    primary_btn: {
                        text: 'Acceptar Totes',
                        role: 'accept_all' // 'accept_selected' or 'accept_all'
                    },

                },
                settings_modal: {
                    title: 'Preferències de la cookie',
                    save_settings_btn: 'Desa els paràmetres',
                    accept_all_btn: 'Acceptar Totes',
                    // reject_all_btn: 'Reject all',
                    close_btn_label: 'Tanca',
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
                        title: 'Utilització de cookies 📢',
                        description: 'Utilitzo cookies per garantir les funcionalitats bàsiques del lloc web i millorar la teva experiència en línia. Pot triar si desitges acceptar cada categoria de cookie o no. Per a obtenir més detalls sobre les cookies i altres dades confidencials, llegeixi la <a href="https://optica.naturalopticsgroup.com/cita-macro/politicas-de-privacidad/ca" target="_blank" class="cc-link">política de privacitat</a> i <a href="https://optica.naturalopticsgroup.com/cita-macro/politicas-de-cookies/ca" target="_blank" class="cc-link">Cookies </a>completa.'
                    }, {
                        title: 'Cookies tècniques',
                        description: "Aquestes cookies són essencials per al correcte funcionament d'aquest lloc web, carregar contingut multimèdia i protegir la teva seguretat. Sense aquestes cookies, el lloc web no funcionaria correctament.",
                        toggle: {
                            value: 'necessary',
                            enabled: true,
                            readonly: true // cookie categories with readonly=true are all treated as "necessary cookies"
                        }
                    }, {
                        title: "Cookies d'anàlisis",
                        description: 'Ens permet conèixer com interactues amb la web, el nombre de visites en les diferents seccions i establir estadístiques per a millorar les nostres pràctiques comercials.',
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
                        title: 'Cookies publicitàries i de seguiment',
                        description: 'Aquestes cookies recopilen informació sobre com usa el lloc web, quines pàgines va visitar i en quins enllaços va fer clic.',
                        toggle: {
                            value: 'targeting',
                            enabled: true,
                            readonly: false
                        }
                    }, {
                        title: 'Més informació',
                        description: 'Per a qualsevol consulta en relació amb la nostra política sobre cookies i les seves opcions, <a href="https://optica.naturalopticsgroup.com/cita-macro/politicas-de-privacidad/es" target="_blank" class="cc-link">contáctenos</a>.',
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