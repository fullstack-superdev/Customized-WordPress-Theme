<?php

Flynt\registerFields('ListTestimorialsCards', [
    'layout' => [
        'name' => 'listTestimorialsCards',
        'label' => 'List: TestimorialsCards',
        'sub_fields' => [
            [
                'label' => 'Pre-Content',
                'name' => 'preContentHtml',
                'type' => 'wysiwyg',
                'instructions' => 'Want to add a headline? And a paragraph? Go ahead! Or just leave it empty and nothing will be shown.',
                'tabs' => 'visual,text',
                'toolbar' => 'full',
                'media_upload' => 0,
                'delay' => 1
            ],
            [
                'label' => 'Testimorials List',
                'type' => 'repeater',
                'name' => 'testimorialsList',
                'collapsed' => '',
                'min' => 0,
                'max' => 0,
                'layout' => 'table',
                'button_label' => 'Add Testimorial',
                'sub_fields' => [
                    [
                        'label' => 'Content',
                        'name' => 'contentHtml',
                        'type' => 'wysiwyg',
                        'tabs' => 'visual,text',
                        'toolbar' => 'full',
                        'media_upload' => 0,
                        'delay' => 1
                    ]
                ]
            ]
        ]
    ]
]);
