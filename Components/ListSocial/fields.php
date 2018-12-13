<?php

Flynt\registerFields('ListSocial', [
    'layout' => [
        'name' => 'listSocial',
        'label' => 'List: Social',
        'sub_fields' => [
            [
                'label' => 'Content',
                'name' => 'contentHtml',
                'type' => 'wysiwyg',
                'tabs' => 'visual,text',
                'toolbar' => 'full',
                'media_upload' => 0,
                'delay' => 1
            ],
            [
                'label' => 'Social Platform',
                'type' => 'repeater',
                'name' => 'social',
                'layout' => 'table',
                'button_label' => 'Add Social Link',
                'sub_fields' => [
                    [
                        'label' => 'Platform',
                        'name' => 'platform',
                        'type' => 'select',
                        'allow_null' => 0,
                        'multiple' => 0,
                        'ui' => 1,
                        'ajax' => 0,
                        'choices' => [
                            'facebook' => 'Facebook',
                            'instagram' => 'Instagram',
                            'twitter' => 'Twitter',
                            'youtube' => 'Youtube',
                            'mail' => 'E-Mail',
                            'linkedin' => 'LinkedIn',
                            'xing' => 'Xing'
                        ]
                    ],
                    [
                        'label' => 'Link',
                        'name' => 'url',
                        'type' => 'url',
                        'required' => 1
                    ]
                ]
            ]
        ]
    ]
]);
