<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $languages = [
            'EN' => [
                'title' => [
                    'en' => 'English',
                    'es' => 'Inglés',
                ]
            ],
            'ES' => [
                'title' => [
                    'en' => 'Spanish',
                    'es' => 'Español',
                ]
            ],
        ];

        foreach ($languages as $language_code => $language_labels) {
            Language::updateOrCreate(['code' => $language_code], $language_labels);
        }
    }
}
