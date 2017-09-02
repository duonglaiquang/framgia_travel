<?php

use Illuminate\Database\Seeder;

class ServiceGalleryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_gallerys')->delete();

        DB::table('service_gallerys')->insert(
            [
                [
                    'service_id' => '1',
                    'img_url'    => 'https://media-cdn.tripadvisor.com/media/photo-o/0d/40/c6/c5/paradise-boutique-hotel.jpg'
                ],

                [
                    'service_id' => '1',
                    'img_url'    => 'https://media-cdn.tripadvisor.com/media/photo-o/0f/70/16/3a/suite.jpg'
                ],

                [
                    'service_id' => '1',
                    'img_url'    => 'https://media-cdn.tripadvisor.com/media/photo-w/0f/1c/f8/94/queen-bed-with-wooden.jpg'
                ],

                [
                    'service_id' => '2',
                    'img_url'    => 'https://media-cdn.tripadvisor.com/media/photo-o/09/90/af/f7/recreational-facilities.jpg'
                ],

                [
                    'service_id' => '3',
                    'img_url'    => 'https://media-cdn.tripadvisor.com/media/photo-w/0f/a3/ca/f7/the-grand-suite.jpg'
                ],

                [
                    'service_id' => '4',
                    'img_url'    => 'https://media-cdn.tripadvisor.com/media/photo-o/01/c1/7d/ba/hanoi-tirant-hotel.jpg'
                ],

                [
                    'service_id' => '5',
                    'img_url'    => 'https://media-cdn.tripadvisor.com/media/photo-o/0e/c6/12/a5/executive-room.jpg'
                ],

                [
                    'service_id' => '6',
                    'img_url'    => 'https://media-cdn.tripadvisor.com/media/photo-w/07/0b/11/8c/tenderloin.jpg'
                ],

                [
                    'service_id' => '6',
                    'img_url'    => 'https://media-cdn.tripadvisor.com/media/photo-w/10/72/16/b2/photo3jpg.jpg'
                ],

                [
                    'service_id' => '6',
                    'img_url'    => 'https://media-cdn.tripadvisor.com/media/photo-w/10/72/16/b3/photo4jpg.jpg'
                ],

                [
                    'service_id' => '7',
                    'img_url'    => 'https://media-cdn.tripadvisor.com/media/photo-w/0f/d1/fe/f3/photo0jpg.jpg'
                ],

                [
                    'service_id' => '8',
                    'img_url'    => 'https://media-cdn.tripadvisor.com/media/photo-o/0f/85/66/2d/img-20170602-215959-largejpg.jpg'
                ],

                [
                    'service_id' => '9',
                    'img_url'    => 'https://media-cdn.tripadvisor.com/media/photo-w/05/a0/39/53/integrated-transport.jpg'
                ],

                [
                    'service_id' => '9',
                    'img_url'    => 'https://media-cdn.tripadvisor.com/media/photo-o/03/b2/6f/a4/old-quarter.jpg'
                ],

                [
                    'service_id' => '9',
                    'img_url'    => 'https://media-cdn.tripadvisor.com/media/photo-s/02/87/ae/5c/filename-img-4305-jpg.jpg'
                ],

                [
                    'service_id' => '10',
                    'img_url'    => 'https://media-cdn.tripadvisor.com/media/photo-w/02/5a/54/8b/casa-de-una-tribu-del.jpg'
                ],

                [
                    'service_id' => '11',
                    'img_url'    => 'https://media-cdn.tripadvisor.com/media/photo-w/10/7a/5f/1b/photo6jpg.jpg'
                ],

            ]
        );
    }
}
