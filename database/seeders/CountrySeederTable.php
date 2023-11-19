<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            [
                'country_code' => 'SA',
                'country_name' => 'المملكة العربية السعودية',
                'country_name_latin' => 'Saudi Arabia',
                'created_by' => 1,
            ],
            [
                'country_code' => 'EG',
                'country_name' => 'مصر',
                'country_name_latin' => 'Egypt',
                'created_by' => 1,
            ],
            [
                'country_code' => 'AE',
                'country_name' => 'الإمارات العربية المتحدة',
                'country_name_latin' => 'United Arab Emirates',
                'created_by' => 1,
            ],
            [
                'country_code' => 'IQ',
                'country_name' => 'العراق',
                'country_name_latin' => 'Iraq',
                'created_by' => 1,
            ],
            [
                'country_code' => 'JO',
                'country_name' => 'الأردن',
                'country_name_latin' => 'Jordan',
                'created_by' => 1,
            ],
            [
                'country_code' => 'LB',
                'country_name' => 'لبنان',
                'country_name_latin' => 'Lebanon',
                'created_by' => 1,
            ],
            [
                'country_code' => 'LY',
                'country_name' => 'ليبيا',
                'country_name_latin' => 'Libya',
                'created_by' => 1,
            ],
            [
                'country_code' => 'MA',
                'country_name' => 'المغرب',
                'country_name_latin' => 'Morocco',
                'created_by' => 1,
            ],
            [
                'country_code' => 'TN',
                'country_name' => 'تونس',
                'country_name_latin' => 'Tunisia',
                'created_by' => 1,
            ],
            [
                'country_code' => 'YE',
                'country_name' => 'اليمن',
                'country_name_latin' => 'Yemen',
                'created_by' => 1,
            ],
            [
                'country_code' => 'SY',
                'country_name' => 'سوريا',
                'country_name_latin' => 'Syria',
                'created_by' => 1,
            ],
            [
                'country_code' => 'KW',
                'country_name' => 'الكويت',
                'country_name_latin' => 'Kuwait',
                'created_by' => 1,
            ],
            [
                'country_code' => 'DZ',
                'country_name' => 'الجزائر',
                'country_name_latin' => 'Algeria',
                'created_by' => 1,
            ],
            [
                'country_code' => 'OM',
                'country_name' => 'عمان',
                'country_name_latin' => 'Oman',
                'created_by' => 1,
            ],
            [
                'country_code' => 'QA',
                'country_name' => 'قطر',
                'country_name_latin' => 'Qatar',
                'created_by' => 1,
            ],
        ];
        foreach ($countries as $country) {
            Country::create($country + ['created_by' => 1000, 'active' => 1]);
        }
    }
}
