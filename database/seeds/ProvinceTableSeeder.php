<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('province')->insert([
            ['id' => '1','name' => 'Hà Nội','type' => 'Thành Phố'],
            ['id' => '2','name' => 'Hà Giang','type' => 'Tỉnh'],
            ['id' => '4','name' => 'Cao Bằng','type' => 'Tỉnh'],
            ['id' => '6','name' => 'Bắc Kạn','type' => 'Tỉnh'],
            ['id' => '8','name' => 'Tuyên Quang','type' => 'Tỉnh'],
            ['id' => '10','name' => 'Lào Cai','type' => 'Tỉnh'],
            ['id' => '11','name' => 'Điện Biên','type' => 'Tỉnh'],
            ['id' => '12','name' => 'Lai Châu','type' => 'Tỉnh'],
            ['id' => '14','name' => 'Sơn La','type' => 'Tỉnh'],
            ['id' => '15','name' => 'Yên Bái','type' => 'Tỉnh'],
            ['id' => '17','name' => 'Hòa Bình','type' => 'Tỉnh'],
            ['id' => '19','name' => 'Thái Nguyên','type' => 'Tỉnh'],
            ['id' => '20','name' => 'Lạng Sơn','type' => 'Tỉnh'],
            ['id' => '22','name' => 'Quảng Ninh','type' => 'Tỉnh'],
            ['id' => '24','name' => 'Bắc Giang','type' => 'Tỉnh'],
            ['id' => '25','name' => 'Phú Thọ','type' => 'Tỉnh'],
            ['id' => '26','name' => 'Vĩnh Phúc','type' => 'Tỉnh'],
            ['id' => '27','name' => 'Bắc Ninh','type' => 'Tỉnh'],
            ['id' => '30','name' => 'Hải Dương','type' => 'Tỉnh'],
            ['id' => '31','name' => 'Hải Phòng','type' => 'Thành Phố'],
            ['id' => '33','name' => 'Hưng Yên','type' => 'Tỉnh'],
            ['id' => '34','name' => 'Thái Bình','type' => 'Tỉnh'],
            ['id' => '35','name' => 'Hà Nam','type' => 'Tỉnh'],
            ['id' => '36','name' => 'Nam Định','type' => 'Tỉnh'],
            ['id' => '37','name' => 'Ninh Bình','type' => 'Tỉnh'],
            ['id' => '38','name' => 'Thanh Hóa','type' => 'Tỉnh'],
            ['id' => '40','name' => 'Nghệ An','type' => 'Tỉnh'],
            ['id' => '42','name' => 'Hà Tĩnh','type' => 'Tỉnh'],
            ['id' => '44','name' => 'Quảng Bình','type' => 'Tỉnh'],
            ['id' => '45','name' => 'Quảng Trị','type' => 'Tỉnh'],
            ['id' => '46','name' => 'Thừa Thiên Huế','type' => 'Tỉnh'],
            ['id' => '48','name' => 'Đà Nẵng','type' => 'Thành Phố'],
            ['id' => '49','name' => 'Quảng Nam','type' => 'Tỉnh'],
            ['id' => '51','name' => 'Quảng Ngãi','type' => 'Tỉnh'],
            ['id' => '52','name' => 'Bình Định','type' => 'Tỉnh'],
            ['id' => '54','name' => 'Phú Yên','type' => 'Tỉnh'],
            ['id' => '56','name' => 'Khánh Hòa','type' => 'Tỉnh'],
            ['id' => '58','name' => 'Ninh Thuận','type' => 'Tỉnh'],
            ['id' => '60','name' => 'Bình Thuận','type' => 'Tỉnh'],
            ['id' => '62','name' => 'Kon Tum','type' => 'Tỉnh'],
            ['id' => '64','name' => 'Gia Lai','type' => 'Tỉnh'],
            ['id' => '66','name' => 'Đắk Lắk','type' => 'Tỉnh'],
            ['id' => '67','name' => 'Đắk Nông','type' => 'Tỉnh'],
            ['id' => '68','name' => 'Lâm Đồng','type' => 'Tỉnh'],
            ['id' => '70','name' => 'Bình Phước','type' => 'Tỉnh'],
            ['id' => '72','name' => 'Tây Ninh','type' => 'Tỉnh'],
            ['id' => '74','name' => 'Bình Dương','type' => 'Tỉnh'],
            ['id' => '75','name' => 'Đồng Nai','type' => 'Tỉnh'],
            ['id' => '77','name' => 'Bà Rịa - Vũng Tàu','type' => 'Tỉnh'],
            ['id' => '79','name' => 'Hồ Chí Minh','type' => 'Thành Phố'],
            ['id' => '80','name' => 'Long An','type' => 'Tỉnh'],
            ['id' => '82','name' => 'Tiền Giang','type' => 'Tỉnh'],
            ['id' => '83','name' => 'Bến Tre','type' => 'Tỉnh'],
            ['id' => '84','name' => 'Trà Vinh','type' => 'Tỉnh'],
            ['id' => '86','name' => 'Vĩnh Long','type' => 'Tỉnh'],
            ['id' => '87','name' => 'Đồng Tháp','type' => 'Tỉnh'],
            ['id' => '89','name' => 'An Giang','type' => 'Tỉnh'],
            ['id' => '91','name' => 'Kiên Giang','type' => 'Tỉnh'],
            ['id' => '92','name' => 'Cần Thơ','type' => 'Thành Phố'],
            ['id' => '93','name' => 'Hậu Giang','type' => 'Tỉnh'],
            ['id' => '94','name' => 'Sóc Trăng','type' => 'Tỉnh'],
            ['id' => '95','name' => 'Bạc Liêu','type' => 'Tỉnh'],
            ['id' => '96','name' => 'Cà Mau','type' => 'Tỉnh']
        ]);
    }
}
