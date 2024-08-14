<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Log;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Image;

class ImagesTableSeeder extends Seeder
{
    private $image;

    public function __construct(Image $image)
    {
        $this->image = $image;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seeds = [
            [
                'id' => 1,
                'post_id' => 1,
                'image_path' => 'images/seeders/images/01_Sushi.jpg',
                'caption' => 'image01'
            ],
            [
                'id' => 2,
                'post_id' => 2,
                'image_path' => 'images/seeders/images/02_Yuki.jpg',
                'caption' => 'image02'
            ],
            [
                'id' => 3,
                'post_id' => 3,
                'image_path' => 'images/seeders/images/03_Granping.jpg',
                'caption' => 'image03'
            ],
            [
                'id' => 4,
                'post_id' => 4,
                'image_path' => 'images/seeders/images/04_Sauna.jpg',
                'caption' => 'image04'
            ],
            [
                'id' => 5,
                'post_id' => 5,
                'image_path' => 'images/seeders/images/05_Awaodori.jpg',
                'caption' => 'image05'
            ],
            [
                'id' => 6,
                'post_id' => 6,
                'image_path' => 'images/seeders/images/06_Sumo.jpg',
                'caption' => 'image06'
            ],
            [
                'id' => 7,
                'post_id' => 7,
                'image_path' => 'images/seeders/images/07_Agricultural.jpg',
                'caption' => 'image07'
            ],
            [
                'id' => 8,
                'post_id' => 8,
                'image_path' => 'images/seeders/images/08_Ramen.jpeg',
                'caption' => 'image08'
            ],
            [
                'id' => 9,
                'post_id' => 9,
                'image_path' => 'images/seeders/images/09_Fuji.jpg',
                'caption' => 'image09'
            ],
            [
                'id' => 10,
                'post_id' => 10,
                'image_path' => 'images/seeders/images/10_Onimatsuri.jpg',
                'caption' => 'image10'
            ],
            [
                'id' => 11,
                'post_id' => 11,
                'image_path' => 'images/seeders/images/11_Anime.jpg',
                'caption' => 'image11'
            ],
            [
                'id' => 12,
                'post_id' => 12,
                'image_path' => 'images/seeders/images/12_Shakyo.jpg',
                'caption' => 'image12'
            ],
            [
                'id' => 13,
                'post_id' => 13,
                'image_path' => 'images/seeders/images/13_Danjiri.jpg',
                'caption' => 'image13'
            ],
            [
                'id' => 14,
                'post_id' => 14,
                'image_path' => 'images/seeders/images/14_Gion.jpg',
                'caption' => 'image14'
            ],
            [
                'id' => 15,
                'post_id' => 15,
                'image_path' => 'images/seeders/images/15_Kabuki.jpg',
                'caption' => 'image15'
            ],
            [
                'id' => 16,
                'post_id' => 16,
                'image_path' => 'images/seeders/images/16_Nebuta.jpg',
                'caption' => 'image16'
            ]
        ];

        foreach ($seeds as $seed) {
            $images = [];
            // Get image path
            $img_path = public_path($seed['image_path']);

            // Get image content from path
            $img_contents = file_get_contents($img_path);

            // convert image into uri
            $data_uri = $this->generateDataUri($img_contents, $img_path);

            $images[] =
                [
                    'id' => $seed['id'],
                    'post_id' => $seed['post_id'],
                    'image' => $data_uri,
                    'caption' => $seed['caption'],
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ];

            $this->image->insert($images);
        }
    }

    private function generateDataUri($img_contents, $img_path)
    {
        // Get file extension
        $img_extension = pathinfo($img_path, PATHINFO_EXTENSION);

        // convert image into base64 data
        $base64_img = base64_encode($img_contents);

        // compose data uri
        $data_uri = 'data:image/' . $img_extension . ';base64,' . $base64_img;

        return $data_uri;
    }
}
