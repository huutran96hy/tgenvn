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
            'label' => 'Quản lý công việc',
            'icon' => 'ph-briefcase',
            'children' => [
                ['route' => 'admin.jobs.index', 'label' => 'Danh sách công việc'],
                ['route' => 'admin.job-categories.index', 'label' => 'Danh mục công việc'],
            ]
        ],
        [
            'route' => '#',
            'label' => 'Tin tức',
            'icon' => 'ph-newspaper',
            'children' => [
                ['route' => 'admin.news.index', 'label' => 'Danh sách tin tức'],
                ['route' => 'admin.news-categories.index', 'label' => 'Danh mục tin tức'],
            ]
        ],
        [
            'route' => 'admin.employers.index',
            'label' => 'Danh sách nhà tuyển dụng',
            'icon' => 'ph-briefcase',
        ],
        [
            'route' => 'admin.candidates.index',
            'label' => 'Danh sách ứng viên',
            'icon' => 'ph-briefcase',
        ],
        [
            'route' => 'admin.applications.index',
            'label' => 'Danh sách ứng tuyển',
            'icon' => 'ph-briefcase',
        ],
        [
            'route' => 'admin.skills.index',
            'label' => 'Danh sách kỹ năng',
            'icon' => 'ph-briefcase',
        ],
        // [
        //     'route' => 'admin.contacts.index',
        //     'label' => 'Danh sách liên hệ',
        //     'icon' => 'ph-briefcase',
        // ],
        [
            'route' => 'admin.configs.index',
            'label' => 'Cấu hình',
            'icon' => 'ph-gear',
        ],
    ]
];
