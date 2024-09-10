<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostsTableSeeder extends Seeder
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'id' => 1,
                'user_id' => 3,
                'title' => 'SUSHI Making Experience JOY ASAKUSA',
                'article' => "The sushi was delicious! We took a lot of pictures and were able to record many fun memories.\n\nSushi Nigiri Experience Facility, where you can enjoy sushi culture with fresh sushi items and an immersive production space full of entertainment.",
                'prefecture_id' => 13,
                'area_id' => 3,
                'visit_date' => '2024-01-11',
                'start_date' => null,
                'end_date' => null,
                'event_address' => null,
                'event_longitude' => null,
                'event_latitude' => null,
                'language' => 'en-US',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 2,
                'user_id' => 4,
                'title' => 'Sapporo Snow Festival',
                'article' => "A festival of snow and ice with beautiful snow sculptures and lights. (Sapporo)",
                'prefecture_id' => 1,
                'area_id' => 1,
                'visit_date' => null,
                'start_date' => '2024-09-03',
                'end_date' => '2024-09-15',
                'event_address' => '北海道札幌市東区栄町８８５−１',
                'event_longitude' => 141.374972,
                'event_latitude' => 43.117694,
                'language' => 'en-US',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 3,
                'user_id' => 3,
                'title' => 'Okayama Glamping Setorini Bizen',
                'article' => "Enjoy the nature of Okayama in a glamping resort with a private pool. (Bizen City)\n\nIntroduce foreign cuisine: - Work at an event or restaurant that introduces your country's cuisine to Japanese people.\n\nCommunicate slowly and in simple English: - Japanese people are often not good at English, but if you speak simple English, you can get through.",
                'prefecture_id' => 33,
                'area_id' => 6,
                'visit_date' => '2024-02-22',
                'start_date' => NULL,
                'end_date' => NULL,
                'event_address' => null,
                'event_longitude' => null,
                'event_latitude' => null,
                'language' => 'en-US',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 4,
                'user_id' => 2,
                'title' => 'Sauna',
                'article' => "Resort glamping facility with sauna and jacuzzi, where you can enjoy seasonal foods from Awaji. (THE GOAT AWAJI, Awaji City)\n\nTipping is not required: - There is no need to tip restaurant waiters or cab drivers. Service charges are included.",
                'prefecture_id' => 28,
                'area_id' => 5,
                'visit_date' => '2024-03-03',
                'start_date' => NULL,
                'end_date' => NULL,
                'event_address' => null,
                'event_longitude' => null,
                'event_latitude' => null,
                'language' => 'en-US',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 5,
                'user_id' => 5,
                'title' => 'Awa Odori Dance',
                'article' => "Great experience!!\nIt is a festival of dance and colorful costumes and dancing.",
                'prefecture_id' => 36,
                'area_id' => 7,
                'visit_date' => '2024-10-12',
                'start_date' => '2024-10-12',
                'end_date' => '2024-10-15',
                'event_address' => '徳島県徳島市南内町１丁目４',
                'event_longitude' => 134.551529,
                'event_latitude' => 34.068751,
                'language' => 'en-US',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 6,
                'user_id' => 2,
                'title' => 'Sumo',
                'article' => "Sumo is a traditional Japanese Shinto ritual and martial art sport in which wrestlers fight on the ring. You can enjoy the powerful efforts and techniques when you watch a match! (Kokugikan)\n\nTourist Guide: - You can work as a tourist guide to show you around tourist attractions and cultural sites.\n\nLeft side of the road: - In Japan, cars and bicycles also drive on the left side of the road. It's okay once you get used to it, but if you're new to it, be careful.\n",
                'prefecture_id' => 40,
                'area_id' => 8,
                'visit_date' => '2024-09-18',
                'start_date' => '2024-09-18',
                'end_date' => '2024-09-22',
                'event_address' => '東京都墨田区横網１丁目３−２８',
                'event_longitude' => 139.793228746763,
                'event_latitude' => 35.697165153296,
                'language' => 'en-US',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 7,
                'user_id' => 5,
                'title' => 'Agricultural Experience',
                'article' => "Some trips made me feel grateful to the locals who helped me in my time of need.\n\nWWOOF Japan is a program that provides volunteer experience at a farmhouse. You can learn through farm work such as weeding, harvesting, and caring for animals.\n\n Homestay Hosts: - Allow foreigners to homestay in your home and share Japanese life and culture.",
                'prefecture_id' => 15,
                'area_id' => 4,
                'visit_date' => '2024-04-04',
                'start_date' => NULL,
                'end_date' => NULL,
                'event_address' => null,
                'event_longitude' => null,
                'event_latitude' => null,
                'language' => 'en-US',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 8,
                'user_id' => 4,
                'title' => 'Tokyo Ramen Festa ',
                'article' => "10 ramen restaurants from all over Japan will open their stores. The event will be held at Komazawa Olympic Park.\n\nEating noodles noisily: - It is Japanese etiquette to eat noodles such as ramen and soba noodles noisily.",
                'prefecture_id' => 13,
                'area_id' => 3,
                'visit_date' => '2024-09-24',
                'start_date' => '2024-09-24',
                'end_date' => '2024-10-03',
                'event_address' => '東京都世田谷区駒沢公園１',
                'event_longitude' => 139.661946495187,
                'event_latitude' => 35.6254286733299,
                'language' => 'en-US',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 9,
                'user_id' => 5,
                'title' => 'Onsen Kawaguchiko in the Sky',
                'article' => "The trip around with my family is a wonderful memory filled with fun and pleasant fatigue. We were impressed by Mt.\n\nOnsen villa for a special time with views of Mt. Fuji and Lake Kawaguchi. （Fuji, Fuji Five Lakes, and Fujiyoshida.)\n\nShoe-removal customs:- Shoes are removed when entering a house or traditional building. Be aware that you may also have to take off your shoes in restaurants.",
                'prefecture_id' => 19,
                'area_id' => 4,
                'visit_date' => '2024-05-05',
                'start_date' => NULL,
                'end_date' => NULL,
                'event_address' => null,
                'event_longitude' => null,
                'event_latitude' => null,
                'language' => 'en-US',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 10,
                'user_id' => 4,
                'title' => 'Onimatsuri',
                'article' => "It was a shocking experience.\nThe \"Onimatsuri\" is a \"strange festival under heaven\" held at Takiyama Temple. Huge torches are brought in and demons dance wildly. A fire battle ensues, and the crazy spectacle is the talk of the town.",
                'prefecture_id' => 23,
                'area_id' => 4,
                'visit_date' => '2024-09-10',
                'start_date' => '2024-09-10',
                'end_date' => '2024-09-11',
                'event_address' => '愛知県岡崎市滝町山籠１０７',
                'event_longitude' => 137.205782661388,
                'event_latitude' => 34.9897793514653,
                'language' => 'en-US',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 11,
                'user_id' => 5,
                'title' => 'AnimeJapan',
                'article' => "AnimeJapan is one of the world's largest anime events held annually at Tokyo Big Sight. It will be a fun-filled two days for anime fans! 🌟Anime production companies, voice actors, and fans gather in one place. There will be plenty of exhibition booths and stage events.\n\nEnglish Teaching: - Help Japanese students and business people improve their English skills by teaching English as a native language.",
                'prefecture_id' => 13,
                'area_id' => 3,
                'visit_date' => '2024-09-23',
                'start_date' => '2024-09-23',
                'end_date' => '2024-09-24',
                'event_address' => '東京都江東区有明３丁目１１−１',
                'event_longitude' => 139.797528170056,
                'event_latitude' => 35.6323067547106,
                'language' => 'en-US',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 12,
                'user_id' => 3,
                'title' => 'Shakyo',
                'article' => "Shakyo is one of the traditional Japanese cultural traditions of transcribing sutras.It is performed for the purposes of faith, mental stability, and the repose of the souls of the deceased. Specifically, it refers to the act of copying sutras such as the Heart Sutra with a brush. Practicing sutra copying has many benefits, such as improving concentration, perseverance, and writing. Even beginners can try it easily, so if you are interested, please give it a try!\nHomestay Host: - You can share Japanese life and culture by homestaying a foreigner in your home.\n\nShoes off custom: - Take off your shoes when entering a house or traditional building. Be careful.",
                'prefecture_id' => 43,
                'area_id' => 4,
                'visit_date' => '2024-08-10',
                'start_date' => NULL,
                'end_date' => NULL,
                'event_address' => null,
                'event_longitude' => null,
                'event_latitude' => null,
                'language' => 'en-US',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 13,
                'user_id' => 5,
                'title' => 'Kishiwada Danjiri Festival',
                'article' => "A stunning experience.\nIt is a very powerful festival with floats parading around. (Kishiwada City)\n\nTranslation and Interpretation: - We can help facilitate communication by providing translation and interpretation from English to Japanese or Japanese to English.\n",
                'prefecture_id' => 27,
                'area_id' => 5,
                'visit_date' => '2024-10-15',
                'start_date' => '2024-10-15',
                'end_date' => '2024-10-20',
                'event_address' => '大阪府岸和田市本町１１−２３',
                'event_longitude' => 135.368312252178,
                'event_latitude' => 34.460263462657,
                'language' => 'en-US',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 14,
                'user_id' => 2,
                'title' => 'Gion Festival',
                'article' => "This historic festival has been going on for over 100 years, and the Yamahoko Junko is the highlight. (Kyoto, Japan)\n\nTourist Guide: - You can work as a tourist guide to show you around tourist attractions and cultural sites.\n\nCarry cash: - Although more and more places in Japan accept credit cards and electronic money, it is convenient to carry cash.",
                'prefecture_id' => 26,
                'area_id' => 5,
                'visit_date' => '2024-09-01',
                'start_date' => '2024-09-01',
                'end_date' => '2024-09-30',
                'event_address' => '京都府京都市東山区祇園町北側６２５',
                'event_longitude' => 135.778462124667,
                'event_latitude' => 35.0040075012403,
                'language' => 'en-US',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 15,
                'user_id' => 3,
                'title' => 'Kabuki',
                'article' => "Watching kabuki is a wonderful experience! You will love Japanese culture!\n\nEnglish Teaching: - Help Japanese students and business people improve their English skills by teaching English as a native language.\n\nForeign language support is limited: - Foreign language support can be scarce outside of urban and tourist areas. Make use of translation apps.",
                'prefecture_id' => 13,
                'area_id' => 3,
                'visit_date' => '2024-06-06',
                'start_date' => NULL,
                'end_date' => NULL,
                'event_address' => null,
                'event_longitude' => null,
                'event_latitude' => null,
                'language' => 'en-US',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'id' => 16,
                'user_id' => 2,
                'title' => 'Aomori Nebuta Festival',
                'article' => "I was very impressed with the view!\nAomori Nebuta Festival is a powerful festival held in August, where huge Nebuta floats are paraded through the streets.\n\n Translation and Interpretation: - We can help facilitate communication by providing translation and interpretation from English to Japanese or Japanese to English.\n\nFew trash cans: - In Japan, there are few trash cans outside, so it is common to take your trash home with you.",
                'prefecture_id' => 2,
                'area_id' => 2,
                'visit_date' => '2024-09-02',
                'start_date' => '2024-09-02',
                'end_date' => '2024-09-07',
                'event_address' => '青森県青森市中央１丁目',
                'event_longitude' => 140.746433612561,
                'event_latitude' => 40.8232599772706,
                'language' => 'en-US',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]
        ];

        $this->post->insert($posts);
    }
}
