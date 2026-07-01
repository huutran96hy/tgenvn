<?php

return [
    'admin_menu' => [
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
            'route' => 'admin.password.edit',
            'label' => 'Đổi mật khẩu',
            'icon' => 'ph-lock-key',
        ],
    ]
];
