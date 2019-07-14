<?php

namespace Flynt\Components\ListIcons;

use Flynt\Api;
use Flynt\FieldVariables;

function createFeatherIconSelectChoices($iconKeys = [])
{
    return array_reduce($iconKeys, function ($acc, $iconKey) {
        $acc[$iconKey] = "<i style='width: 16px; height: 16px; vertical-align: middle; position: relative; top: -2px;margin-right: 5px' data-feather='{$iconKey}'></i> {$iconKey}";
        return $acc;
    }, []);
}

$iconKeys = [
    'activity',
    'airplay',
    'alert-circle',
    'alert-octagon',
    'alert-triangle',
    'align-center',
    'align-justify',
    'align-left',
    'align-right',
    'anchor',
    'aperture',
    'archive',
    'arrow-down-circle',
    'arrow-down-left',
    'arrow-down-right',
    'arrow-down',
    'arrow-left-circle',
    'arrow-left',
    'arrow-right-circle',
    'arrow-right',
    'arrow-up-circle',
    'arrow-up-left',
    'arrow-up-right',
    'arrow-up',
    'at-sign',
    'award',
    'bar-chart-2',
    'bar-chart',
    'battery-charging',
    'battery',
    'bell-off',
    'bell',
    'bluetooth',
    'bold',
    'book-open',
    'book',
    'bookmark',
    'box',
    'briefcase',
    'calendar',
    'camera-off',
    'camera',
    'cast',
    'check-circle',
    'check-square',
    'check',
    'chevron-down',
    'chevron-left',
    'chevron-right',
    'chevron-up',
    'chevrons-down',
    'chevrons-left',
    'chevrons-right',
    'chevrons-up',
    'chrome',
    'circle',
    'clipboard',
    'clock',
    'cloud-drizzle',
    'cloud-lightning',
    'cloud-off',
    'cloud-rain',
    'cloud-snow',
    'cloud',
    'code',
    'codepen',
    'codesandbox',
    'coffee',
    'columns',
    'command',
    'compass',
    'copy',
    'corner-down-left',
    'corner-down-right',
    'corner-left-down',
    'corner-left-up',
    'corner-right-down',
    'corner-right-up',
    'corner-up-left',
    'corner-up-right',
    'cpu',
    'credit-card',
    'crop',
    'crosshair',
    'database',
    'delete',
    'disc',
    'dollar-sign',
    'download-cloud',
    'download',
    'droplet',
    'edit-2',
    'edit-3',
    'edit',
    'external-link',
    'eye-off',
    'eye',
    'facebook',
    'fast-forward',
    'feather',
    'figma',
    'file-minus',
    'file-plus',
    'file-text',
    'file',
    'film',
    'filter',
    'flag',
    'folder-minus',
    'folder-plus',
    'folder',
    'framer',
    'frown',
    'gift',
    'git-branch',
    'git-commit',
    'git-merge',
    'git-pull-request',
    'github',
    'gitlab',
    'globe',
    'grid',
    'hard-drive',
    'hash',
    'headphones',
    'heart',
    'help-circle',
    'hexagon',
    'home',
    'image',
    'inbox',
    'info',
    'instagram',
    'italic',
    'key',
    'layers',
    'layout',
    'life-buoy',
    'link-2',
    'link',
    'linkedin',
    'list',
    'loader',
    'lock',
    'log-in',
    'log-out',
    'mail',
    'map-pin',
    'map',
    'maximize-2',
    'maximize',
    'meh',
    'menu',
    'message-circle',
    'message-square',
    'mic-off',
    'mic',
    'minimize-2',
    'minimize',
    'minus-circle',
    'minus-square',
    'minus',
    'monitor',
    'moon',
    'more-horizontal',
    'more-vertical',
    'mouse-pointer',
    'move',
    'music',
    'navigation-2',
    'navigation',
    'octagon',
    'package',
    'paperclip',
    'pause-circle',
    'pause',
    'pen-tool',
    'percent',
    'phone-call',
    'phone-forwarded',
    'phone-incoming',
    'phone-missed',
    'phone-off',
    'phone-outgoing',
    'phone',
    'pie-chart',
    'play-circle',
    'play',
    'plus-circle',
    'plus-square',
    'plus',
    'pocket',
    'power',
    'printer',
    'radio',
    'refresh-ccw',
    'refresh-cw',
    'repeat',
    'rewind',
    'rotate-ccw',
    'rotate-cw',
    'rss',
    'save',
    'scissors',
    'search',
    'send',
    'server',
    'settings',
    'share-2',
    'share',
    'shield-off',
    'shield',
    'shopping-bag',
    'shopping-cart',
    'shuffle',
    'sidebar',
    'skip-back',
    'skip-forward',
    'slack',
    'slash',
    'sliders',
    'smartphone',
    'smile',
    'speaker',
    'square',
    'star',
    'stop-circle',
    'sun',
    'sunrise',
    'sunset',
    'tablet',
    'tag',
    'target',
    'terminal',
    'thermometer',
    'thumbs-down',
    'thumbs-up',
    'toggle-left',
    'toggle-right',
    'trash-2',
    'trash',
    'trello',
    'trending-down',
    'trending-up',
    'triangle',
    'truck',
    'tv',
    'twitter',
    'type',
    'umbrella',
    'underline',
    'unlock',
    'upload-cloud',
    'upload',
    'user-check',
    'user-minus',
    'user-plus',
    'user-x',
    'user',
    'users',
    'video-off',
    'video',
    'voicemail',
    'volume-1',
    'volume-2',
    'volume-x',
    'volume',
    'watch',
    'wifi-off',
    'wifi',
    'wind',
    'x-circle',
    'x-octagon',
    'x-square',
    'x',
    'youtube',
    'zap-off',
    'zap',
    'zoom-in',
    'zoom-out',
];

Api::registerFields('ListIcons', [
    'layout' => [
        'name' => 'ListIcons',
        'label' => 'List: Icons',
        'sub_fields' => [
            [
                'label' => 'Title',
                'name' => 'preContentHtml',
                'type' => 'wysiwyg',
                'tabs' => 'visual,text',
                'toolbar' => 'full',
                'media_upload' => 0,
                'delay' => 1
            ],
            [
                'label' => 'General',
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => 'Items',
                'name' => 'items',
                'type' => 'repeater',
                'min' => 1,
                'layout' => 'row',
                'button_label' => 'Add Item',
                'sub_fields' => [
                    [
                        'label' => 'Icon',
                        'name' => 'icon',
                        'type' => 'select',
                        'allow_null' => 1,
                        'multiple' => 0,
                        'ui' => 1,
                        'ajax' => 0,
                        'choices' => createFeatherIconSelectChoices($iconKeys),
                        'default_value' => ''
                    ],
                    [
                        'label' => 'Text content',
                        'name' => 'textContentHtml',
                        'type' => 'wysiwyg',
                        'tabs' => 'visual,text',
                        'toolbar' => 'full',
                        'media_upload' => 0,
                        'delay' => 1
                    ],
                    [
                        'label' => 'Link',
                        'name' => 'link',
                        'type' => 'link',
                    ],
                ]
            ],
            [
                'label' => 'Options',
                'name' => 'optionsTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => '',
                'name' => 'options',
                'type' => 'group',
                'layout' => 'row',
                'sub_fields' => [
                    FieldVariables::$theme
                ]
            ],
        ]
    ]
]);
