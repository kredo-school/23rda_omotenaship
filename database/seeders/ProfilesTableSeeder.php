<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;
use Exception;

class ProfilesTableSeeder extends Seeder
{
    private $profile;

    public function __construct(Profile $profile)
    {
        $this->profile = $profile;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seeds = [
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
                'language' => 'ja-JP',
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
                'language' => 'ko-KR',
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
                'language' => 'zh-Hans-CN',
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
                'language' => 'de-DE',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'user_id' => '6',
                'first_name' => 'User 5',
                'last_name' => null,
                'middle_name' => null,
                'introduction' => null,
                'image_path' => null,
                'birth_date' => null,
                'language' => 'ja-JP',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'user_id' => '7',
                'first_name' => 'User 6',
                'last_name' => null,
                'middle_name' => null,
                'introduction' => null,
                'image_path' => null,
                'birth_date' => null,
                'language' => 'ko-KR',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'user_id' => '8',
                'first_name' => 'Mia',
                'last_name' => 'Santos',
                'middle_name' => 'Marie',
                'introduction' => 'I am a travel photographer. I love capturing moments from different cultures and sharing them with the world.',
                // 'image_path' => 'images/seeders/avatars/Avatar_user_id8.jpg',
                'image_path' => null,
                'birth_date' => '1992-03-15',
                'language' => 'es-ES',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'user_id' => '9',
                'first_name' => 'Luca',
                'last_name' => 'Rossi',
                'middle_name' => '',
                'introduction' => 'A digital nomad exploring the world. Always on the lookout for new adventures and experiences.',
                // 'image_path' => 'images/seeders/avatars/Avatar_user_id9.jpg',
                'image_path' => null,
                'birth_date' => '1985-12-30',
                'language' => 'it-IT',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'user_id' => '10',
                'first_name' => 'Sophie',
                'last_name' => 'Anderson',
                'middle_name' => 'Claire',
                'introduction' => 'I am a lifestyle coach focusing on wellness and fitness. Let\'s stay healthy together!',
                // 'image_path' => 'images/seeders/avatars/Avatar_user_id10.jpg',
                'image_path' => null,
                'birth_date' => '1990-07-25',
                'language' => 'en-US',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'user_id' => '11',
                'first_name' => 'Carlos',
                'last_name' => 'Mendez',
                'middle_name' => '',
                'introduction' => 'I am a chef who loves to experiment with fusion cuisine. I enjoy combining traditional recipes with modern techniques.',
                // 'image_path' => 'images/seeders/avatars/Avatar_user_id11.jpg',
                'image_path' => null,
                'birth_date' => '1982-11-08',
                'language' => 'pt-BR',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'user_id' => '12',
                'first_name' => 'Lina',
                'last_name' => 'Kim',
                'middle_name' => 'Hee',
                'introduction' => 'I love fashion and beauty. My passion is sharing beauty tips and trends from Korea.',
                // 'image_path' => 'images/seeders/avatars/Avatar_user_id12.jpg',
                'image_path' => null,
                'birth_date' => '1994-05-18',
                'language' => 'ko-KR',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'user_id' => '13',
                'first_name' => 'David',
                'last_name' => 'Nguyen',
                'middle_name' => 'Quang',
                'introduction' => 'A tech enthusiast. I love tinkering with gadgets and creating new digital solutions.',
                // 'image_path' => 'images/seeders/avatars/Avatar_user_id13.jpg',
                'image_path' => null,
                'birth_date' => '1993-02-14',
                'language' => 'vi-VN',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'user_id' => '14',
                'first_name' => 'Aisha',
                'last_name' => 'Omar',
                'middle_name' => '',
                'introduction' => 'A humanitarian worker passionate about making a positive impact on people\'s lives.',
                // 'image_path' => 'images/seeders/avatars/Avatar_user_id14.jpg',
                'image_path' => null,
                'birth_date' => '1987-09-19',
                'language' => 'ar-SA',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'user_id' => '15',
                'first_name' => 'Elena',
                'last_name' => 'Ivanova',
                'middle_name' => 'Sergeevna',
                'introduction' => 'I am a history enthusiast, particularly interested in ancient civilizations and archaeological findings.',
                // 'image_path' => 'images/seeders/avatars/Avatar_user_id15.jpg',
                'image_path' => null,
                'birth_date' => '1991-10-10',
                'language' => 'ru-RU',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'user_id' => '16',
                'first_name' => 'Jin',
                'last_name' => 'Park',
                'middle_name' => '',
                'introduction' => 'I am a music lover. I enjoy playing the guitar and attending live concerts.',
                // 'image_path' => 'images/seeders/avatars/Avatar_user_id16.jpg',
                'image_path' => null,
                'birth_date' => '1995-12-07',
                'language' => 'zh-Hans-CN',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
        ];

        foreach ($seeds as $seed) {
            // Get image path
            $data_uri = null;

            if ($seed['image_path'] !== null) {
                // Get image path
                $img_path = public_path($seed['image_path']);

                // Get image content from path
                $img_contents = file_get_contents($img_path);

                // convert image into uri
                $data_uri = $this->generateDataUri($img_contents, $img_path);
            }

            $profiles =
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
