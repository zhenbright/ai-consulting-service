<?php

namespace Database\Seeders\Themes\Main;

use Botble\Base\Supports\BaseSeeder;
use Botble\Ecommerce\Models\Brand;
use Botble\Slug\Facades\SlugHelper;

class BrandSeeder extends BaseSeeder
{
    public function run(): void
    {
        $this->uploadFiles('brands');

        $brands = [
            [
                'logo' => 'brands/1.png',
                'name' => 'FoodPound',
                'description' => 'New Snacks Release',
            ],
            [
                'logo' => 'brands/1.png',
                'name' => 'iTea JSC',
                'description' => 'Happy Tea 100% Organic. From $29.9',
            ],
            [
                'logo' => 'brands/1.png',
                'name' => 'Soda Brand',
                'description' => 'Soda is a brand that lets your inner-dive out through creative makeup and cool makeup tips! Whichever product you choose, you will see that it is a perfect ...',
            ],
            [
                'logo' => 'brands/1.png',
                'name' => 'Farmart',
                'description' => 'Fresh Meat Sausage. BUY 2 GET 1!',
            ],
        ];

        Brand::query()->truncate();

        foreach ($brands as $key => $item) {
            $item['order'] = $key;
            $item['is_featured'] = true;
            $brand = Brand::query()->create($item);

            SlugHelper::createSlug($brand);
        }
    }
}
