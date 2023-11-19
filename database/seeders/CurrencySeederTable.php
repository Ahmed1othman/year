<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currencies = [
            // Arabic Currencies
            ['currency_name' => 'ريال سعودي', 'currency_name_latin' => 'Saudi Riyal', 'currency_symbol' => 'ر.س'],
            ['currency_name' => 'جنيه مصري', 'currency_name_latin' => 'Egyptian Pound', 'currency_symbol' => 'ج.م'],
            ['currency_name' => 'درهم إماراتي', 'currency_name_latin' => 'UAE Dirham', 'currency_symbol' => 'د.إ'],
            ['currency_name' => 'دينار بحريني', 'currency_name_latin' => 'Bahraini Dinar', 'currency_symbol' => 'د.ب'],
            ['currency_name' => 'ريال قطري', 'currency_name_latin' => 'Qatari Riyal', 'currency_symbol' => 'ر.ق'],
            ['currency_name' => 'دينار أردني', 'currency_name_latin' => 'Jordanian Dinar', 'currency_symbol' => 'د.ا'],
            ['currency_name' => 'دينار لبناني', 'currency_name_latin' => 'Lebanese Pound', 'currency_symbol' => 'ل.ل'],
            ['currency_name' => 'ليرة تركية', 'currency_name_latin' => 'Turkish Lira', 'currency_symbol' => '₺'],
            ['currency_name' => 'ريال عماني', 'currency_name_latin' => 'Omani Rial', 'currency_symbol' => 'ر.ع'],
            ['currency_name' => 'دينار جزائري', 'currency_name_latin' => 'Algerian Dinar', 'currency_symbol' => 'دج'],
            ['currency_name' => 'درهم مغربي', 'currency_name_latin' => 'Moroccan Dirham', 'currency_symbol' => 'د.م.'],
            ['currency_name' => 'دينار تونسي', 'currency_name_latin' => 'Tunisian Dinar', 'currency_symbol' => 'د.ت'],
            ['currency_name' => 'ليرة سورية', 'currency_name_latin' => 'Syrian Pound', 'currency_symbol' => 'ل.س'],
            ['currency_name' => 'دولار أمريكي', 'currency_name_latin' => 'US Dollar', 'currency_symbol' => '$'],
            ['currency_name' => 'يورو', 'currency_name_latin' => 'Euro', 'currency_symbol' => '€'],
            ['currency_name' => 'جنيه إسترليني', 'currency_name_latin' => 'British Pound', 'currency_symbol' => '£'],
            ['currency_name' => 'فرنك فرنسي', 'currency_name_latin' => 'French Franc', 'currency_symbol' => '₣'],
            ['currency_name' => 'دينار كويتي', 'currency_name_latin' => 'Kuwaiti Dinar', 'currency_symbol' => 'د.ك'],

            // Additional Currencies
            ['currency_name' => 'ين ياباني', 'currency_name_latin' => 'Japanese Yen', 'currency_symbol' => '¥'],
            ['currency_name' => 'دولار كندي', 'currency_name_latin' => 'Canadian Dollar', 'currency_symbol' => 'C$'],
            ['currency_name' => 'دولار أسترالي', 'currency_name_latin' => 'Australian Dollar', 'currency_symbol' => 'A$'],
            ['currency_name' => 'يوان صيني', 'currency_name_latin' => 'Chinese Yuan', 'currency_symbol' => '¥'],
            ['currency_name' => 'روبل روسي', 'currency_name_latin' => 'Russian Ruble', 'currency_symbol' => '₽'],
//            ['currency_name' => 'جنيه مصري', 'currency_name_latin' => 'Egyptian Pound', 'currency_symbol' => '£E'],
            ['currency_name' => 'ريال برازيلي', 'currency_name_latin' => 'Brazilian Real', 'currency_symbol' => 'R$'],
            ['currency_name' => 'دولار نيوزيلندي', 'currency_name_latin' => 'New Zealand Dollar', 'currency_symbol' => 'NZ$'],
            ['currency_name' => 'روبية هندية', 'currency_name_latin' => 'Indian Rupee', 'currency_symbol' => '₹'],
            ['currency_name' => 'بيزو مكسيكي', 'currency_name_latin' => 'Mexican Peso', 'currency_symbol' => 'Mex$'],

            // Add more currencies as needed
        ];

        foreach ($currencies as $currency) {
            Currency::create($currency + ['created_by' => 1000, 'active' => 1]);
        }
    }
}
