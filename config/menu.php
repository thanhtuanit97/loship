<?php 
return [
    [
		'name' => 'Trang Quản Lý',
		'icon' => 'fa-dashboard',
		'route'=> 'admin.index'
    ],
    [
		'name' => 'Quản Lý Danh Mục',
		'icon' => 'fa-bookmark',
        'route'=> 'admin.index',
        'items'=>[
            [
				'name' => 'Danh Sách Danh Mục',
				'route'=> 'admin.cate.list'
			],
        ]
    ], 
    [

		'name' => 'Quản Lý Sản Phẩm',
		'icon' => 'fa-building',
        'route'=> 'admin.index',
        'items'=>[
            [
				'name' => 'Danh Sách Sản Phẩm',
				'route'=> 'admin.pro.list'
			],
        ]
    ],
    [
        'name' => 'Quản Lý File Ảnh',
        'icon' => 'fa-picture-o',
        'route'=> 'admin.index',
        'items'=>[
            [
                'name' => 'Trang tạo file',
                'route'=> 'admin.file.add'
            ],
        ]
    ],
      [
        'name' => 'Quản Lý Bài Viết',
        'icon' => 'fa-pencil-square-o',
        'route'=> 'admin.index',
        'items'=>[
            [
                'name' => 'Danh Sách Bài Viết',
                'route'=> 'admin.article.list'
            ],
        ]
    ],
     [
        'name' => 'Quản Lý Mã Giảm Giá',
        'icon' => 'fa-cubes',
        'route'=> 'admin.index',
        'items'=>[
            [
                'name' => 'Danh Sách Mã Giảm Giá',
                'route'=> 'admin.coupon.list'
            ],
        ]
    ],[
        'name' => 'Quản Lý Đơn Hàng',
        'icon' => 'fa-cogs',
        'route'=> 'admin.index',
        'items'=>[
            [
                'name' => 'Danh Sách Đơn Hàng',
                'route'=> 'admin.order.list'
            ],
             [
                'name' => 'Các Trạng Thái Đơn Hàng',
                'route'=> 'admin.order.status'
            ],
        ]
    ],[
        'name' => 'Quản Lý Đánh Giá Sản Phẩm',
        'icon' => 'fa-star',
        'route'=> 'admin.index',
        'items'=>[
            [
                'name' => 'Danh Sách Đánh Giá',
                'route'=> 'admin.rating.list'
            ]
        ]
    ],
    [
        'name' => 'Quản Lý Liên Hệ Khách Hàng',
        'icon' => 'fa-asterisk',
        'route'=> 'admin.index',
        'items'=>[
            [
                'name' => 'Danh Sách Liên Hệ',
                'route'=> 'admin.rating.list'
            ]
        ]
    ],[
        'name' => 'Quản Lý Thông Tin Khách Hàng',
        'icon' => 'fa-user',
        'route'=> 'admin.index',
        'items'=>[
            [
                'name' => 'Danh Sách Khách Hàng',
                'route'=> 'admin.rating.list'
            ], [
                'name' => 'Danh Sách Khách Hàng',
                'route'=> 'admin.rating.list'
            ], [
                'name' => 'Danh Sách Khách Hàng',
                'route'=> 'admin.rating.list'
            ]
        ]
    ],
    
];
?>
