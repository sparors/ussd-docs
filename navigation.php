<?php

return [
    'Getting Started' => [
        'url' => 'docs/getting-started',
        'children' => [
            'Requirements' => "{{ $page->production ? '/ussd-docs': '' }}docs/requirements",
            'Installation' => "{{ $page->production ? '/ussd-docs': '' }}docs/installation",
            'Algolia DocSearch' => "{{ $page->production ? '/ussd-docs': '' }}docs/algolia-docsearch",
            'Custom 404 Page' => "{{ $page->production ? '/ussd-docs': '' }}docs/custom-404-page",
        ],
    ],
    'Jigsaw Docs' => 'https://jigsaw.tighten.co/docs/installation',
];
