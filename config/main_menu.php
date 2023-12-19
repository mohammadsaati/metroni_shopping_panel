<?php
// Aside menu
return [

    'items' => [
        // Dashboard
        [
            'title' => 'داشبورد',
            'root' => true,
            'icon' => 'home',
            'page' => '/admin/dashboard',
            'new-tab' => false,
        ],
        [
            'title' => "محصولات",
            'root' => true,
            'icon' => 'abstract-26',
            'new-tab' => false,
            'submenu' => [
                [
                    'title' => 'محصول جدید',
                    'new-tab' => false,
                    'page'  =>  'admin/product/create'
                ] ,
                [
                    'title' => 'همه محصولات',
                    'new-tab' => false,
                    'page'  =>  'admin/product/index'
                ]
            ]
        ],
        [
            'title' => "اسلایدر",
            'root' => true,
            'icon' => 'slider',
            'new-tab' => false,
            'submenu' => [
                [
                    'title' => 'اسلاید جدید',
                    'new-tab' => false,
                    'page'  =>  'admin/slider/create'
                ] ,
                [
                    'title' => 'اسلایدر ها',
                    'new-tab' => false,
                    'page'  =>  'admin/slider/index'
                ]
            ]
        ],
        [
            'title' => "بنر ها",
            'root' => true,
            'icon' => 'row-horizontal',
            'new-tab' => false,
            'submenu' => [
                [
                    'title' => 'بنر جدید',
                    'new-tab' => false,
                    'page'  =>  'admin/banner/create'
                ] ,
                [
                    'title' => 'بنر ها',
                    'new-tab' => false,
                    'page'  =>  'admin/banner/index'
                ]
            ]
        ],
        [
            'title' => "سکشن",
            'root' => true,
            'icon' => 'gift',
            'new-tab' => false,
            'submenu' => [
                [
                    'title' => 'سکشن جدید',
                    'new-tab' => false,
                    'page'  =>  'admin/section/create'
                ] ,
                [
                    'title' => 'سکشن ها',
                    'new-tab' => false,
                    'page'  =>  'admin/section/index'
                ]
            ]
        ],
        [
            'title' => "دسته بندی",
            'root' => true,
            'icon' => 'folder',
            'new-tab' => false,
            'submenu' => [
                [
                    'title' => 'ساخت دسته بندی',
                    'new-tab' => false,
                    'page'  =>  'admin/category/create'
                ] ,
                [
                    'title' => 'دسته بندی ها',
                    'new-tab' => false,
                    'page'  =>  'admin/category/index'
                ]
            ]
        ] ,
        [
            'title' => "ویژگی ها",
            'root' => true,
            'icon' => 'star', // or can be 'flaticon-home' or any flaticon-*
            'new-tab' => false,
            'submenu' => [
                [
                    'title' => 'ویژگی جدید',
                    'new-tab' => false,
                    'page'  =>  'admin/feature/create'
                ] ,
                [
                    'title' => 'همه ویژگی ها',
                    'new-tab' => false,
                    'page'  =>  'admin/feature/index'
                ]

            ]
        ] ,
        [
            'title' => "برند ها",
            'root' => true,
            'icon' => 'bookmark-2', // or can be 'flaticon-home' or any flaticon-*
            'new-tab' => false,
            'submenu' => [
                [
                    'title' => 'برند جدید',
                    'new-tab' => false,
                    'page'  =>  'admin/brand/create'
                ],
                [
                    'title' => 'برند ها',
                    'new-tab' => false,
                    'page'  =>  'admin/brand/index'
                ]

            ]
        ] ,
        [
            'title' => "سایز ها",
            'root' => true,
            'icon' => 'size', // or can be 'flaticon-home' or any flaticon-*
            'new-tab' => false,
            'submenu' => [
                [
                    'title' => 'سایز جدید',
                    'new-tab' => false,
                    'page'  =>  'admin/size/create'
                ],
                [
                    'title' => 'سایز ها',
                    'new-tab' => false,
                    'page'  =>  'admin/size/index'
                ]

            ]
        ] ,
        [
            'title' => "شهر ها",
            'root' => true,
            'icon' => 'route',
            'new-tab' => false,
            'submenu' => [
                [
                    'title' => 'همه شهر ها',
                    'new-tab' => false,
                    'page'  =>  'admin/city/index'
                ],
                [
                    'title' => 'شهر جدید',
                    'new-tab' => false,
                    'page'  =>  'admin/city/create'
                ]

            ]
        ] ,
        [
            'title' => "گالری",
            'root' => true,
            'icon' => 'picture', // or can be 'flaticon-home' or any flaticon-*
            'new-tab' => false,
            'submenu' => [
                [
                    'title' => 'همه عکس ها',
                    'new-tab' => false,
                    'page'  =>  'admin/image/index'
                ],
                [
                    'title' => 'عکس جدید',
                    'new-tab' => false,
                    'page'  =>  'admin/image/create'
                ]

            ]
        ] ,



        [
            'title' => 'تنطیمات سایت',
            'root' => true,
            'icon' => "setting", // or can be 'flaticon-home' or any flaticon-*
            'new-tab' => false,
            'page'  =>  '/admin/options'
        ] ,



    ]

];
