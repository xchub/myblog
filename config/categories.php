<?php
return [

            [
                'label' => '文章管理',
                'icon' => 'fa fa-edit',
                'uri'  => 'post',
                'submenus' => [
                    [
                        'label' => '所有文章',
                        'uri' => 'post',
                    ],
                    [
                        'label' => '新增文章',
                        'uri' => 'post/create',

                    ],
                ],
            ],
            [
                'label' => '分类管理',
                'icon' => 'fa fa-paw',
                'uri'  => 'category',
                'submenus' => [
                    [
                        'label' => '所有分类',
                        'uri' => 'category',
                    ],
                    [
                        'label' => '新增分类',
                        'uri' => 'category/create',
                    ],
                ],
            ],
            [
                'label' => '标签管理',
                'icon' => 'fa fa-tags',
                'uri'  => 'tag',
                'submenus' => [
                    [
                        'label' => '所有标签',
                        'uri' => 'tag',
                    ],
                    [
                        'label' => '新增标签',
                        'uri' => 'tag/create',
                    ],
                ],
            ],
            [
                'label' => '友情链接',
                'icon' => 'fa  fa-link',
                'uri'  => 'links',
                'submenus' => [
                    [
                        'label' => '所有链接',
                        'uri' => 'links',
                    ],
                    [
                        'label' => '新增链接',
                        'uri' => 'links/create',
                    ],
                ],
            ],
            [
                'label' => '网站设置',
                'icon'  => 'fa fa-asterisk',
                'uri'   => 'settings',
                'submenus' => [
                    [
                        'label' => '网站设置',
                        'uri' => 'settings',
                    ],
                    [
                        'label' => '密码修改',
                        'uri' => 'users/password',
                    ],
                ],
            ],
            [
                'label' => '附件管理',
                'icon' => 'fa fa-folder',
                'uri' => 'upload',
            ],
        ];
