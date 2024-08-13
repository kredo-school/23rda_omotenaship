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
        // Get image path
        $img_path01 = public_path('images/seeders/images/01_Sushi.jpg');
        $img_path02 = public_path('images/seeders/images/02_Yuki.jpg');
        $img_path03 = public_path('images/seeders/images/03_Granping.jpg');
        $img_path04 = public_path('images/seeders/images/04_Sauna.jpg');
        $img_path05 = public_path('images/seeders/images/05_Awaodori.jpg');
        $img_path06 = public_path('images/seeders/images/06_Sumo.jpg');
        $img_path07 = public_path('images/seeders/images/07_Agricultural.jpg');
        $img_path08 = public_path('images/seeders/images/08_Ramen.jpeg');
        $img_path09 = public_path('images/seeders/images/09_Fuji.jpg');
        $img_path10 = public_path('images/seeders/images/10_Onimatsuri.jpg');
        $img_path11 = public_path('images/seeders/images/11_Anime.jpg');
        $img_path12 = public_path('images/seeders/images/12_Shakyo.jpg');
        $img_path13 = public_path('images/seeders/images/13_Danjiri.jpg');
        $img_path14 = public_path('images/seeders/images/14_Gion.jpg');
        $img_path15 = public_path('images/seeders/images/15_Kabuki.jpg');
        $img_path16 = public_path('images/seeders/images/16_Nebuta.jpg');

        // Log::debug(1);
        // dd(1);

        // Get image content from path
        $img_contents01 = file_get_contents($img_path01);
        $img_contents02 = file_get_contents($img_path02);
        $img_contents03 = file_get_contents($img_path03);
        $img_contents04 = file_get_contents($img_path04);
        $img_contents05 = file_get_contents($img_path05);
        $img_contents06 = file_get_contents($img_path06);
        $img_contents07 = file_get_contents($img_path07);
        $img_contents08 = file_get_contents($img_path08);
        $img_contents09 = file_get_contents($img_path09);
        $img_contents10 = file_get_contents($img_path10);
        $img_contents11 = file_get_contents($img_path11);
        $img_contents12 = file_get_contents($img_path12);
        $img_contents13 = file_get_contents($img_path13);
        $img_contents14 = file_get_contents($img_path14);
        $img_contents15 = file_get_contents($img_path15);
        $img_contents16 = file_get_contents($img_path16);

        // dd(2);

        // convert image into uri
        $data_uri01 = $this->generateDataUri($img_contents01, $img_path01);
        $data_uri02 = $this->generateDataUri($img_contents02, $img_path02);
        $data_uri03 = $this->generateDataUri($img_contents03, $img_path03);
        $data_uri04 = $this->generateDataUri($img_contents04, $img_path04);
        $data_uri05 = $this->generateDataUri($img_contents05, $img_path05);
        $data_uri06 = $this->generateDataUri($img_contents06, $img_path06);
        $data_uri07 = $this->generateDataUri($img_contents07, $img_path07);
        $data_uri08 = $this->generateDataUri($img_contents08, $img_path08);
        $data_uri09 = $this->generateDataUri($img_contents09, $img_path09);
        $data_uri10 = $this->generateDataUri($img_contents10, $img_path10);
        $data_uri11 = $this->generateDataUri($img_contents11, $img_path11);
        $data_uri12 = $this->generateDataUri($img_contents12, $img_path12);
        $data_uri13 = $this->generateDataUri($img_contents13, $img_path13);
        $data_uri14 = $this->generateDataUri($img_contents14, $img_path14);
        $data_uri15 = $this->generateDataUri($img_contents15, $img_path15);
        $data_uri16 = $this->generateDataUri($img_contents16, $img_path16);

        // dd(3);

        $images = [
            [
                'id' => 1,
                'post_id' => 1,
                'image' => $data_uri01,
                'caption' => 'image01',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 2,
                'post_id' => 2,
                'image' => $data_uri02,
                'caption' => 'image02',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 3,
                'post_id' => 3,
                'image' => $data_uri03,
                'caption' => 'image03',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 4,
                'post_id' => 4,
                'image' => $data_uri04,
                'caption' => 'image04',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 5,
                'post_id' => 5,
                'image' => $data_uri05,
                'caption' => 'image05',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 6,
                'post_id' => 6,
                'image' => $data_uri06,
                'caption' => 'image06',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 7,
                'post_id' => 7,
                'image' => $data_uri07,
                'caption' => 'image07',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 8,
                'post_id' => 8,
                'image' => $data_uri08,
                'caption' => 'image08',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 9,
                'post_id' => 9,
                'image' => $data_uri09,
                'caption' => 'image09',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 10,
                'post_id' => 10,
                'image' => $data_uri10,
                'caption' => 'image10',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 11,
                'post_id' => 11,
                'image' => $data_uri11,
                'caption' => 'image11',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 12,
                'post_id' => 12,
                'image' => $data_uri12,
                'caption' => 'image12',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 13,
                'post_id' => 13,
                'image' => $data_uri13,
                'caption' => 'image13',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 14,
                'post_id' => 14,
                'image' => $data_uri14,
                'caption' => 'image14',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 15,
                'post_id' => 15,
                'image' => $data_uri15,
                'caption' => 'image15',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 16,
                'post_id' => 16,
                'image' => $data_uri16,
                'caption' => 'image16',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]
        ];

        // dd(4);

        $this->image->insert($images);
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
