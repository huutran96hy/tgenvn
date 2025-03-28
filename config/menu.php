<?php

return [
    'admin_menu' => [
        [
            'route' => 'admin.users.index',
            'label' => 'Danh sách User',
            'icon' => 'ph-briefcase',
        ],
        [
            'route' => '#',
            'label' => 'Quản lý Công việc',
            'icon' => 'ph-briefcase',
            'children' => [
                ['route' => 'admin.jobs.index', 'label' => 'Danh sách Job'],
                ['route' => 'admin.job-categories.index', 'label' => 'Danh mục Job'],
            ]
        ],
        [
            'route' => '#',
            'label' => 'Tin tức',
            'icon' => 'ph-newspaper',
            'children' => [
                ['route' => 'admin.news.index', 'label' => 'Danh sách Tin tức'],
                ['route' => 'admin.news-categories.index', 'label' => 'Danh mục Tin tức'],
            ]
        ],
        [
            'route' => 'admin.employers.index',
            'label' => 'Danh sách Employers',
            'icon' => 'ph-briefcase',
        ],
        [
            'route' => 'admin.candidates.index',
            'label' => 'Danh sách Candidates',
            'icon' => 'ph-briefcase',
        ],
        [
            'route' => 'admin.applications.index',
            'label' => 'Danh sách Applications',
            'icon' => 'ph-briefcase',
        ],
        [
            'route' => 'admin.skills.index',
            'label' => 'Danh sách Skills',
            'icon' => 'ph-briefcase',
        ],
        [
            'route' => 'admin.contacts.index',
            'label' => 'Danh sách Contacts',
            'icon' => 'ph-briefcase',
        ],
        [
            'route' => 'admin.configs.index',
            'label' => 'Cấu hình',
            'icon' => 'ph-gear',
        ],
    ]
];
