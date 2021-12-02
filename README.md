<p align="center"><a href="http://vanlongplastic.com.vn/" target="_blank"><img src="https://nhuavanlong.vn/wp-content/uploads/2021/05/logo-nhua-van-long.png" width="400"></a></p>

## Đồ Án Tốt Nghiệp - Công ty TNHH nhựa Vân Long

Là một website MPA dành cho [công ty nhựa Vân Long](http://vanlongplastic.com.vn/) - một công ty chuyên về nhựa ở Hải Phòng phục vụ về việc quản lý bán hàng và quảng bá cho công ty

## Công cụ cần thiết
### Windows: [Laragon](https://laragon.org/), [GIT](https://git-scm.com/) | [XAMPP](https://www.apachefriends.org/download.html), [Composer](https://getcomposer.org/), [GIT](https://git-scm.com/)
### Linux: LAMP, Nginx, [Composer](https://getcomposer.org/), [GIT](https://git-scm.com/)
## Download và sử dụng 
- Bước 1: Clone dự án về máy bằng công cụ git
- `git clone git@github.com:trdung1999/NHUA_VAN_LONG.git`
- Bước 2: Tạo file .env
- `cp .env.example .env`
- Bước 3: Cài đặt folder vendor bằng composer
- `composer intall` (Nếu quá trình install gặp lỗi - có thể dùng `composer update`)
- Bước 4: Tạo key mới cho project
- `php artisan key:generate`
- Bước 5: Tạo file csdl và chỉnh sửa ở file .env, DB_DATABASE=database_name (database_name do bạn set)
- Bước 6: Đẩy csdl lên MySQL 
- `php artisan migrate --seed`
- Bước 7: Chạy project
- `php artisan serve `
- Truy cập http://127.0.0.1:8000 và xem project 
- Nếu sử dụng valet thì chạy câu lệnh: `valet link` và truy cập http://NHUA_VAN_LONG.test

## Công nghệ sử dụng
- **Backend:** PHP, Laravel Framework
- **Frontend:** HTML, CSS, JS, JQUERY
- **Package:** [Laravel Media Library](https://github.com/spatie/laravel-medialibrary), [Laravel DebugBar](https://github.com/barryvdh/laravel-debugbar), [Laravel UI](https://laravel.com/docs/8.x/authentication), VietNam-Map