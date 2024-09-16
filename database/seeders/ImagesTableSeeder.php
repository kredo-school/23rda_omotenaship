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
            ],
            [
                'id' => 17,
                'post_id' => 17,
                'image_path' => 'images/seeders/images/17_Sapporo_Snow_Festival.jpg',
                'caption' => 'image17'
            ],
            [
                'id' => 18,
                'post_id' => 18,
                'image_path' => 'images/seeders/images/18_Nebuta_Festival.jpg',
                'caption' => 'image18'
            ],
            [
                'id' => 19,
                'post_id' => 19,
                'image_path' => 'images/seeders/images/19_Morioka_Sansa_Odori_Festival.jpg',
                'caption' => 'image19'
            ],
            [
                'id' => 20,
                'post_id' => 20,
                'image_path' => 'images/seeders/images/21_Sapporo_Autumn_Fest.jpg',
                'caption' => 'image20'
            ],
            [
                'id' => 21,
                'post_id' => 21,
                'image_path' => 'images/seeders/images/21_Sapporo_Autumn_Fest.jpg',
                'caption' => 'image21'
            ],
            [
                'id' => 22,
                'post_id' => 22,
                'image_path' => 'images/seeders/images/22_Nebuta_Festival.jpg',
                'caption' => 'image22'
            ],
            [
                'id' => 23,
                'post_id' => 23,
                'image_path' => 'images/seeders/images/23_Hanamaki_Festival.jpg',
                'caption' => 'image23'
            ],
            [
                'id' => 24,
                'post_id' => 24,
                'image_path' => 'images/seeders/images/24_National_Kokeshi_Doll_Festival.jpg',
                'caption' => 'image24'
            ],
            [
                'id' => 25,
                'post_id' => 25,
                'image_path' => 'images/seeders/images/25_Kanto_Festival.jpg',
                'caption' => 'image25'
            ],
            [
                'id' => 26,
                'post_id' => 26,
                'image_path' => 'images/seeders/images/26_Yamagata_Hanagasa_Festival.jpg',
                'caption' => 'image26'
            ],
            [
                'id' => 27,
                'post_id' => 27,
                'image_path' => 'images/seeders/images/27_Fukushima_Waraji_Festival.jpg',
                'caption' => 'image27'
            ],
            [
                'id' => 28,
                'post_id' => 28,
                'image_path' => 'images/seeders/images/28_Mito_Komon_Festival.jpg',
                'caption' => 'image28'
            ],
            [
                'id' => 29,
                'post_id' => 29,
                'image_path' => 'images/seeders/images/29_Nikko_Toshogu_Shrine_Spring_Festival.jpg',
                'caption' => 'image29'
            ],
            [
                'id' => 30,
                'post_id' => 30,
                'image_path' => 'images/seeders/images/30_Kusatsu_Onsen_Yubatake_Light-up.jpg',
                'caption' => 'image30'
            ],
            [
                'id' => 31,
                'post_id' => 31,
                'image_path' => 'images/seeders/images/31_Kawagoe_Festival.jpg',
                'caption' => 'image31'
            ],
            [
                'id' => 32,
                'post_id' => 32,
                'image_path' => 'images/seeders/images/32_Narita_Gion_Festival.jpg',
                'caption' => 'image32'
            ],
            [
                'id' => 33,
                'post_id' => 33,
                'image_path' => 'images/seeders/images/33_Sumida_River_Firework_Festival.jpg',
                'caption' => 'image33'
            ],
            [
                'id' => 34,
                'post_id' => 34,
                'image_path' => 'images/seeders/images/34_Yokohama_Port_Opening_Festival.jpg',
                'caption' => 'image34'
            ],
            [
                'id' => 35,
                'post_id' => 35,
                'image_path' => 'images/seeders/images/35_Fireworks_in_Omagari.jpg',
                'caption' => 'image35'
            ],
            [
                'id' => 36,
                'post_id' => 36,
                'image_path' => 'images/seeders/images/36_Yokote_Snow_Festival.jpg',
                'caption' => 'image36'
            ],
            [
                'id' => 37,
                'post_id' => 37,
                'image_path' => 'images/seeders/images/37_hanagasa_festival.jpg',
                'caption' => 'image37'
            ],
            [
                'id' => 38,
                'post_id' => 38,
                'image_path' => 'images/seeders/images/38_Nagaoka_Festival_Fireworks_Display.jpg',
                'caption' => 'image38'
            ],
            [
                'id' => 39,
                'post_id' => 39,
                'image_path' => 'images/seeders/images/39_Owara-Kaze-no-Bon_Festival.jpg',
                'caption' => 'image39'
            ],
            [
                'id' => 40,
                'post_id' => 40,
                'image_path' => 'images/seeders/images/40_Kanazawa_Festival.jpg',
                'caption' => 'image40'
            ],
            [
                'id' => 41,
                'post_id' => 41,
                'image_path' => 'images/seeders/images/41_Chichibu_Night_Festival.jpg',
                'caption' => 'image41'
            ],
            [
                'id' => 42,
                'post_id' => 42,
                'image_path' => 'images/seeders/images/42_Koenji_Awa_Odori_Festival.jpg',
                'caption' => 'image42'
            ],
            [
                'id' => 43,
                'post_id' => 43,
                'image_path' => 'images/seeders/images/43_Ueno_Cherry_Blossom_Festival.jpg',
                'caption' => 'image43'
            ],
            [
                'id' => 44,
                'post_id' => 44,
                'image_path' => 'images/seeders/images/44_Fukui_Phoenix_Festival.jpg',
                'caption' => 'image44'
            ],
            [
                'id' => 45,
                'post_id' => 45,
                'image_path' => 'images/seeders/images/45_Yoshida_Fire_Festival.jpg',
                'caption' => 'image45'
            ],
            [
                'id' => 46,
                'post_id' => 46,
                'image_path' => 'images/seeders/images/46_Festival_of_the_Pillar.jpg',
                'caption' => 'image46'
            ],
            [
                'id' => 47,
                'post_id' => 47,
                'image_path' => 'images/seeders/images/47_Cosmos.jpg',
                'caption' => 'image47'
            ],
            [
                'id' => 48,
                'post_id' => 48,
                'image_path' => 'images/seeders/images/48_Tokamachi_Snow_Festival.jpg',
                'caption' => 'image48'
            ],
            [
                'id' => 49,
                'post_id' => 49,
                'image_path' => 'images/seeders/images/49_Takayama_Festival.jpg',
                'caption' => 'image49'
            ],
            [
                'id' => 50,
                'post_id' => 50,
                'image_path' => 'images/seeders/images/50_Hamamatsu_Festival.jpg',
                'caption' => 'image50'
            ],
            [
                'id' => 51,
                'post_id' => 51,
                'image_path' => 'images/seeders/images/51_Tateyama_Kurobe_Snow_Valley_Festival.jpg',
                'caption' => 'image51'
            ],
            [
                'id' => 52,
                'post_id' => 52,
                'image_path' => 'images/seeders/images/52_Climbing_Mt..jpg',
                'caption' => 'image52'
            ],
            [
                'id' => 53,
                'post_id' => 53,
                'image_path' => 'images/seeders/images/53_Nagoya_Festival.jpg',
                'caption' => 'image53'
            ],
            [
                'id' => 54,
                'post_id' => 54,
                'image_path' => 'images/seeders/images/54_Ise_Jingu_Shikinen_Sengu.jpg',
                'caption' => 'image54'
            ],
            [
                'id' => 55,
                'post_id' => 55,
                'image_path' => 'images/seeders/images/55_Kyoto_Gozan_Okuribi_Festival.jpg',
                'caption' => 'image55'
            ],
            [
                'id' => 56,
                'post_id' => 56,
                'image_path' => 'images/seeders/images/56_Kishiwada_Danjiri_Festival.jpg',
                'caption' => 'image56'
            ],
            [
                'id' => 57,
                'post_id' => 57,
                'image_path' => 'images/seeders/images/57_Nagahama_Hikiyama_Festival.jpg',
                'caption' => 'image57'
            ],
            [
                'id' => 58,
                'post_id' => 58,
                'image_path' => 'images/seeders/images/58_Gion_Festival.jpg',
                'caption' => 'image58'
            ],
            [
                'id' => 59,
                'post_id' => 59,
                'image_path' => 'images/seeders/images/59_Tenjin_Festival.jpg',
                'caption' => 'image59'
            ],
            [
                'id' => 60,
                'post_id' => 60,
                'image_path' => 'images/seeders/images/60_Sanbongsan_Fog_and_Ice_Festival.jpg',
                'caption' => 'image60'
            ],
            [
                'id' => 61,
                'post_id' => 61,
                'image_path' => 'images/seeders/images/62_Kobe_Luminarie.jpg',
                'caption' => 'image61'
            ],
            [
                'id' => 62,
                'post_id' => 62,
                'image_path' => 'images/seeders/images/62_Kobe_Luminarie.jpg',
                'caption' => 'image62'
            ],
            [
                'id' => 63,
                'post_id' => 63,
                'image_path' => 'images/seeders/images/63_Nara_Tofukakukai.jpg',
                'caption' => 'image63'
            ],
            [
                'id' => 64,
                'post_id' => 64,
                'image_path' => 'images/seeders/images/64_Nachi_Fire_Festival.jpeg',
                'caption' => 'image64'
            ],
            [
                'id' => 65,
                'post_id' => 65,
                'image_path' => 'images/seeders/images/65_Tottori_Shanshan_Festival.jpg',
                'caption' => 'image65'
            ],
            [
                'id' => 66,
                'post_id' => 66,
                'image_path' => 'images/seeders/images/66_Autumn_Momotaro_Festival_in_Okayama.jpg',
                'caption' => 'image66'
            ],
            [
                'id' => 67,
                'post_id' => 67,
                'image_path' => 'images/seeders/images/67_Izumo_Taisha_Shrine_Shinzai_Festival.jpg',
                'caption' => 'image67'
            ],
            [
                'id' => 68,
                'post_id' => 68,
                'image_path' => 'images/seeders/images/68_Hiroshima_Flower_Festival.jpg',
                'caption' => 'image68'
            ],
            [
                'id' => 69,
                'post_id' => 69,
                'image_path' => 'images/seeders/images/69_West_Japan_Yakitori_Festival.jpg',
                'caption' => 'image69'
            ],
            [
                'id' => 70,
                'post_id' => 70,
                'image_path' => 'images/seeders/images/70_Awa_Odori_Festival.jpg',
                'caption' => 'image70'
            ],
            [
                'id' => 71,
                'post_id' => 71,
                'image_path' => 'images/seeders/images/71_Marugame_Castle_Night_Festa.jpg',
                'caption' => 'image71'
            ],
            [
                'id' => 72,
                'post_id' => 72,
                'image_path' => 'images/seeders/images/72_Ishizuchi_Shrine_Summer_Festival.jpg',
                'caption' => 'image72'
            ],
            [
                'id' => 73,
                'post_id' => 73,
                'image_path' => 'images/seeders/images/73_dance_originating.jpg',
                'caption' => 'image73'
            ],
            [
                'id' => 74,
                'post_id' => 74,
                'image_path' => 'images/seeders/images/74_Hakata_Dontaku_Port_Festival.jpg',
                'caption' => 'image74'
            ],
            [
                'id' => 75,
                'post_id' => 75,
                'image_path' => 'images/seeders/images/75_Karatsu-kunchi.jpg',
                'caption' => 'image75'
            ],
            [
                'id' => 76,
                'post_id' => 76,
                'image_path' => 'images/seeders/images/76_Nagasaki_kunichi.jpg',
                'caption' => 'image76'
            ],
            [
                'id' => 77,
                'post_id' => 77,
                'image_path' => 'images/seeders/images/77_Hinokuni_Festival.jpg',
                'caption' => 'image77'
            ],
            [
                'id' => 78,
                'post_id' => 78,
                'image_path' => 'images/seeders/images/78_Beppu_Onsen_Festival.jpg',
                'caption' => 'image78'
            ],
            [
                'id' => 79,
                'post_id' => 79,
                'image_path' => 'images/seeders/images/79_Miyazaki_Jingu_Grand_Festival.jpg',
                'caption' => 'image79'
            ],
            [
                'id' => 80,
                'post_id' => 80,
                'image_path' => 'images/seeders/images/80_Buddhist_festival.jpg',
                'caption' => 'image80'
            ],
            [
                'id' => 81,
                'post_id' => 81,
                'image_path' => 'images/seeders/images/81_Okinawa_All-Island_Eisa_Festival.jpg',
                'caption' => 'image81'
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
