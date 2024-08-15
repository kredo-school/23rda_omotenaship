<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfilesTableSeeder extends Seeder
{
    private $profile;

    public function __construct(Profile $profile){
        $this->profile = $profile;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seeds = [
            [
                'user_id' => '1',
                'first_name' => 'Alex',
                'last_name' => 'Johnson',
                'middle_name' => 'Nicole',
                'introduction' => 'I travel to major cities and regional tourist destinations to experience Japanese culture and history.
                I enjoy traveling while working remotely in between jobs. I speak very little Japanese, but prefer places where I can communicate in English.
                Occupation: Software Engineer
                Travel Style: Solo travel
                Interests: Technology, visiting cafes, historical buildings, local cuisine.
                I am interested in new technology and café culture, and look forward to checking out the latest tech trends in the various places I visit during my travels. He is also passionate about finding cafes that are unique to the area and trying the local coffee and sweets. When visiting historical buildings, I learn about the architectural styles and the historical context in which they were built, while documenting my travels by leaving photos and sketches. When it comes to local cuisine, they reflect on their trips by learning about popular local ingredients and cooking methods and trying to recreate them at home.I hope you all enjoy Japan as much as I did!',
                'image_path' => 'images/seeders/avatars/Avatar_user_id1.jpg',
                'birth_date' => '1994-02-02',
                'language' => 'en-US',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'user_id' => '2',
                'first_name' => 'Emily',
                'last_name' => 'Martin',
                'middle_name' => 'Blue',
                'introduction' => 'I am a fashion blogger by trade.
                I cover the latest fashions and trendy spots in Japan and share them on my blog and social networking sites. I am interested in fashion, shopping, art and music festivals and often travel with a group of friends.
                I am active in urban areas of Japan, especially Tokyo and Osaka! My Japanese is at a beginner level (lol).',
                'image_path' => 'images/seeders/avatars/Avatar_user_id2.jpg',
                'birth_date' => '1988-04-12',
                'language' => 'en-US',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'user_id' => '3',
                'first_name' => 'Pablo',
                'last_name' => 'Garcia',
                'middle_name' => 'Austin',
                'introduction' => 'I enjoy traveling with my wife and two children. I can speak a little Japanese!
                I would like to learn about Japanese food culture! I would like to get inspiration from Japanese cuisine to introduce new menu items in my own restaurant.',
                'image_path' => 'images/seeders/avatars/Avatar_user_id3.jpg',
                'birth_date' => '1997-06-22',
                'language' => 'en-US',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'user_id' => '4',
                'first_name' => 'Lee',
                'last_name' => 'Way',
                'middle_name' => '',
                'introduction' => 'I am a college student who is backpacking.
                I am interested in anime, manga, traditional Japanese culture, and visiting temples and shrines!
                I travel in search of pilgrimages to sacred sites of Japanese anime and a deeper understanding of Japanese culture.
                I would like to provide information on inexpensive accommodations and public transportation!
                Traveling to sacred places of Japanese anime and experiencing traditional culture is a wonderful experience!
                Please do not hesitate to contact me! ',
                'image_path' => 'images/seeders/avatars/Avatar_user_id4.jpg',
                'birth_date' => '1996-08-12',
                'language' => 'en-US',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'user_id' => '5',
                'first_name' => 'Oliver',
                'last_name' => 'Brown',
                'middle_name' => '',
                'introduction' => 'I am a retired businessman and now enjoy luxury travel.
                I would love to relax at a luxury resort.
                Please do not hesitate to contact me',
                'image_path' => 'images/seeders/avatars/Avatar_user_id5.jpg',
                'birth_date' => '1970-10-22',
                'language' => 'en-US',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
        ];

        foreach ($seeds as $seed) {
            $profiles = [];

            // Get image path
            $img_path = public_path($seed['image_path']);

            // Get image content from path
            $img_contents = file_get_contents($img_path);

            // convert image into uri
            $data_uri = $this->generateDataUri($img_contents, $img_path);

            $profiles[] =
                [
                    'user_id' => $seed['user_id'],
                    'first_name' => $seed['first_name'],
                    'last_name' => $seed['last_name'],
                    'middle_name' => $seed['middle_name'],
                    'introduction' => $seed['introduction'],
                    'avatar' => $data_uri,
                    'birth_date' => $seed['birth_date'],
                    'language' => $seed['language'],
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ];

                $this->profile->insert($profiles);
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
