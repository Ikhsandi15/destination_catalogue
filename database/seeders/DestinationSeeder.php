<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Destination::create([
            'name' => 'Gunung Bromo',
            'city' => 'Probolinggo',
            'province' => 'Jawa Timur',
            'photo' => 'JokoBondo.png',
            'description' => ' Gunung Bromo adalah salah satu gunung berapi paling terkenal di Indonesia. Terkenal dengan pemandangan matahari terbit yang spektakuler, lautan pasir, dan kawah yang aktif. Bromo menjadi daya tarik bagi wisatawan yang ingin menikmati petualangan di alam terbuka dengan latar belakang pegunungan yang indah.',
            'category' => 'nature',
            'budget' => 'Rp250.000 - Rp350.000',
            'facility' => json_encode([
                'Akses jeep untuk ke kawah Bromo.',
                'Penginapan dan homestay di sekitar area.',
                'Warung makan dan penjual suvenir.',
                'Pemandu wisata lokal.'
            ])
        ]);
        Destination::create([
            'name' => 'Keraton Yogyakarta',
            'city' => 'Yogyakarta',
            'province' => 'Daerah Istimewa Yogyakarta (DIY)',
            'photo' => 'JokoBondo.png',
            'description' => 'Keraton Yogyakarta adalah istana resmi Kesultanan Yogyakarta dan simbol budaya Jawa yang masih hidup hingga kini. Wisatawan dapat melihat arsitektur khas Jawa, koleksi seni, pertunjukan tari tradisional, dan upacara adat yang masih dilestarikan. Keraton juga menjadi pusat kebudayaan yang penting di Yogyakarta.',
            'category' => 'culture & history',
            'budget' => 'Rp15.000 - Rp30.000',
            'facility' => json_encode([
                'Pemandu wisata',
                'Museum',
                'Galeri seni',
                'Warung dan kafe',
                'Toko Souvenir'
            ])
        ]);
        Destination::create([
            'name' => 'Jalan Braga',
            'city' => 'Bandung ',
            'province' => 'Jawa Barat',
            'photo' => 'JokoBondo.png',
            'description' => 'Jalan Braga merupakan salah satu kawasan ikonik di Bandung yang terkenal dengan suasana vintage dan beragam kuliner yang memanjakan lidah. Dipenuhi dengan kafe klasik, restoran dengan sajian kuliner khas Sunda, dan toko roti legendaris, Jalan Braga menjadi destinasi favorit bagi pecinta kuliner yang ingin menikmati atmosfer tempo dulu.',
            'category' => 'culture & history',
            'budget' => 'Rp50.000 - Rp200.000',
            'facility' => json_encode([
                'Kafe dan restoran',
                'Hotel dan penginapan',
                'Galeri seni dan toko antik',
                'Area pedestrian yang nyaman',
                'Area parkir dan pusat informasi wisata'
            ])
        ]);
    }
}
