<?php

return [
    'admin_menu' => [
        [
            'route' => 'admin.users.index',
            'label' => 'Danh sách người dùng',
            'icon' => 'ph-briefcase',
        ],
        [
            'route' => '#',
            'label' => 'Sản phẩm',
            'icon' => 'ph-shopping-cart',
            'children' => [
                ['route' => 'admin.products.index', 'label' => 'Danh sách sản phẩm'],
                ['route' => 'admin.products-categories.index', 'label' => 'Danh mục sản phẩm'],
            ]
        ],
        [
            'route' => '#',
            'label' => 'Quy trình',
            'icon' => 'ph-gear',
            'children' => [
                ['route' => 'admin.processes.index', 'label' => 'Danh sách quy trình'],
                ['route' => 'admin.process-categories.index', 'label' => 'Danh mục quy trình'],
            ]
        ],
        [
            'route' => 'admin.configs.index',
            'label' => 'Cấu hình',
            'icon' => 'ph-gear',
        ],
    ]
];
