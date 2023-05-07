<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
    'fullname'=>'前田イチ',
    'gender'=>0,
    'email'=>'a@yahoo.co.jp',
    'postcode'=>'123-456',
    'address'=>'兵庫県兵庫区',
    'building_name'=>'マンション1',
    'opinion'=>'テストテストテストテストテストテストテストテストテストテスト',
    ];
    Contact::create($param);
    $param = [
    'fullname'=>'前田ニ',
    'gender'=>1,
    'email'=>'b@yahoo.co.jp',
    'postcode'=>'123-789',
    'address'=>'兵庫県兵庫区',
    'building_name'=>'マンション2',
    'opinion'=>'テストテストテストテストテストテストテストテストテストテスト2',
    ];
    Contact::create($param);
    $param = [
    'fullname'=>'前田サン',
    'gender'=>2,
    'email'=>'c@yahoo.co.jp',
    'postcode'=>'123-564',
    'address'=>'兵庫県兵庫区',
    'building_name'=>'マンション3',
    'opinion'=>'テストテストテストテストテストテストテストテストテストテスト3',
    ];
    Contact::create($param);
    $param = [
    'fullname'=>'前田ヨン',
    'gender'=>03,
    'email'=>'d@yahoo.co.jp',
    'postcode'=>'123-654',
    'address'=>'兵庫県兵庫区',
    'building_name'=>'マンション4',
    'opinion'=>'テストテストテストテストテストテストテストテストテストテスト4',
    ];
    Contact::create($param);
    }
}
