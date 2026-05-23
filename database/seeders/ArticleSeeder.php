<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        $articles = [
            [
                'title' => 'Как ускорить работу компьютера?',
                'slug' => 'kak-uskorit-rabotu-kompyutera',
                'short_description' => '10 простых способов ускорить работу ПК без замены комплектующих.',
                'content' => 'Полный текст статьи о том, как ускорить компьютер. Чистка диска, отключение автозагрузки, дефрагментация и другие лайфхаки...',
                'author' => 'IT-специалист',
                'published_at' => '2026-05-15'
            ],
            [
                'title' => 'Как правильно чистить ноутбук от пыли?',
                'slug' => 'kak-pravilno-chistit-noutbuk-ot-pyli',
                'short_description' => 'Почему перегрев убивает ноутбук и как правильно проводить профилактическую чистку.',
                'content' => 'Полный текст статьи о чистке ноутбука от пыли. Пошаговая инструкция...',
                'author' => 'Мастер по ремонту',
                'published_at' => '2026-05-10'
            ],
            [
                'title' => 'Как защитить компьютер от вирусов?',
                'slug' => 'kak-zashchitit-kompyuter-ot-virusov',
                'short_description' => 'Лучшие бесплатные антивирусы и правила безопасного поведения в интернете.',
                'content' => 'Полный текст статьи о защите от вирусов. Как выбрать антивирус, правила безопасности...',
                'author' => 'IT-специалист',
                'published_at' => '2026-05-05'
            ],
            [
                'title' => 'SSD или HDD: что выбрать?',
                'slug' => 'ssd-ili-hdd-chto-vybrat',
                'short_description' => 'Сравнение твердотельных и механических дисков. Какой накопитель лучше для игр, а какой для работы.',
                'content' => 'Полный текст статьи о выборе накопителя. Преимущества и недостатки SSD и HDD...',
                'author' => 'IT-специалист',
                'published_at' => '2026-04-28'
            ],
            [
                'title' => 'Как продлить жизнь аккумулятору ноутбука?',
                'slug' => 'kak-prodlit-zhizn-akkumulyatoru-noutbuka',
                'short_description' => 'Правила зарядки и эксплуатации аккумулятора, которые помогут сохранить его емкость.',
                'content' => 'Полный текст статьи об уходе за аккумулятором ноутбука...',
                'author' => 'Мастер по ремонту',
                'published_at' => '2026-04-20'
            ],
            [
                'title' => 'Почему тормозит интернет?',
                'slug' => 'pochemu-tormozit-internet',
                'short_description' => 'Причины медленного интернета и способы их устранения. Настройка роутера и оптимизация сети.',
                'content' => 'Полный текст статьи о медленном интернете. Диагностика и решение проблем...',
                'author' => 'IT-специалист',
                'published_at' => '2026-04-15'
            ],
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}