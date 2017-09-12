<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//        // $this->call(UsersTableSeeder::class);
//        DB::table('persons')->insert
//        ([
//           'name'=> str_random(10),
//            'email'=> str_random(3).'@gmail.com',
//            'password'=>bcrypt('vantrung'),
//            'phone'=>'123467586',
//            'sex'=>'Nam',
//            'brithday'=>'19961222',
//            'avatar'=>"hinh1.jpg",
//            'address'=>"Bac Giang",
//            'role'=>0,
//        ]);
       // $this->call(personSeeder::class);
        $this->call(productSeeder::class);
      // $this->call(usersSeeder::class);
    }
}
class personSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i < 12; $i++)
        {
            DB::table('persons')->insert(
                [
                    'name' => str_random(10),
                    'email' => str_random(3) . '@gmail.com',
                    'password' => bcrypt('vantrung'),
                    'phone' => '123467586',
                    'sex' => 'Boy',
                    'birthday' => '19961222',
                    'avatar' => "hinh1.jpg",
                    'address' => "Bac Giang",
                    'role' => 0,
                ]
            );
        }
    }
}

class productSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i < 28; $i++)
        {
            DB::table('products')->insert
            ([
                'name' => 'Đồ uống '.$i,
                'avatar' =>'n'. $i.'.jpg',
                'price' => rand(0, 100) / 5,
                'discrible' => 'Nguồn gốc của loài thực vật này là chủ đề gây tranh cãi, trong đó một số học giả cho rằng nó có nguồn gốc ở khu vực đông nam châu Á trong khi những người khác cho rằng nó có nguồn gốc ở miền tây bắc Nam Mỹ. Các mẫu hóa thạch tìm thấy ở New Zealand chỉ ra rằng các loại thực vật nhỏ tương tự như cây dừa đã mọc ở khu vực này từ khoảng 15 triệu năm trước. Thậm chí những hóa thạch có niên đại sớm hơn cũng đã được phát hiện tại Rajasthan và Maharashtra, Ấn Độ. Không phụ thuộc vào nguồn gốc của nó, dừa đã phổ biến khắp vùng nhiệt đới, có lẽ nhờ có sự trợ giúp của những người đi biển trong nhiều trường hợp. Quả của nó nhẹ và nổi trên mặt nước và có lẽ đã được phát tán rộng khắp nhờ các dòng hải lưu: quả thậm chí được thu nhặt trên biển tới tận Na Uy cũng còn khả năng nảy mầm được (trong các điều kiện thích hợp). Tại khu vực quần đảo Hawaii, người ta cho rằng dừa được đưa vào từ Polynesia, lần đầu tiên do những người đi biển gốc Polynesia đem từ quê hương của họ ở khu vực miền nam Thái Bình Dương tới đây.',
                'type' => 0,
                'status' => rand(0, 1),
                'is_hot' => rand(0, 1),
                'new' => rand(0, 1),
                'rate_point' => 5,
                'rate_count' => 0,
                'comment_count' => 0,
            ]);
        }
    }
};
class usersSeeder extends Seeder
{
    public function run()
    {
        DB::table('persons')->insert
        ([
            'name' => 'Trung 1',
            'email' => 'nguyenvantrung2015@gmail.com',
            'password' => bcrypt('anhtrung'),
            'phone' => '1234675891',
            'sex' => 'Boy',
            'birthday' => '19961222',
            'avatar' => "hinh1.jpg",
            'address' => "Bac Giang",
            'role' => 1,
        ]);
    }
}
//};

