<?php

use ACFComposer\ACFComposer;
use Flynt\Api;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'postComponents',
        'title' => 'Post Components',
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'postComponents',
                'label' => 'Post Components',
                'type' => 'flexible_content',
                'button_label' => 'Add Component',
                'layouts' => [
                    Api::loadFields('BlockCollapse', 'layout'),
                    Api::loadFields('BlockImage', 'layout'),
                    Api::loadFields('BlockImageText', 'layout'),
                    Api::loadFields('BlockVideoOembed', 'layout'),
                    Api::loadFields('BlockWysiwyg', 'layout'),
                    Api::loadFields('SliderImages', 'layout'),
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ],
            ],
        ],
    ]);
});
