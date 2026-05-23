<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'Ремонт компьютеров',
                'slug' => 'remont-kompyuterov',
                'description' => 'Диагностика и ремонт системных блоков любой сложности. Замена материнской платы, блока питания, оперативной памяти. Выезд мастера на дом.',
                'price' => 500,
                'icon' => 'fa-desktop',
                'image' => '/images/services/pc-repair.jpg',
                'sort_order' => 1
            ],
            [
                'name' => 'Ремонт ноутбуков',
                'slug' => 'remont-noutbukov',
                'description' => 'Замена матрицы, клавиатуры, чистка от пыли, замена термопасты. Ремонт любой сложности. Все виды ноутбуков: HP, Lenovo, Asus, Acer, Apple.',
                'price' => 1000,
                'icon' => 'fa-laptop',
                'image' => '/images/services/laptop-repair.jpg',
                'sort_order' => 2
            ],
            [
                'name' => 'Замена комплектующих',
                'slug' => 'zamena-komplektuyushchih',
                'description' => 'Установка и замена процессора, видеокарты, SSD, HDD, оперативной памяти, кулера. Только оригинальные комплектующие с гарантией.',
                'price' => 800,
                'icon' => 'fa-microchip',
                'image' => '/images/services/parts-repair.jpg',
                'sort_order' => 3
            ],
            [
                'name' => 'Установка ПО',
                'slug' => 'ustanovka-po',
                'description' => 'Установка и настройка операционных систем Windows, драйверов, антивирусов, офисных программ. Восстановление работоспособности после вирусов.',
                'price' => 400,
                'icon' => 'fa-window-restore',
                'image' => '/images/services/software-install.jpg',
                'sort_order' => 4
            ],
            [
                'name' => 'Восстановление данных',
                'slug' => 'vosstanovlenie-dannyh',
                'description' => 'Восстановление удаленных файлов и данных с жестких дисков, SSD, флешек, карт памяти. Экстренное восстановление важной информации.',
                'price' => 1000,
                'icon' => 'fa-database',
                'image' => '/images/services/data-recovery.jpg',
                'sort_order' => 5
            ],
            [
                'name' => 'Настройка безопасности',
                'slug' => 'nastroyka-bezopasnosti',
                'description' => 'Настройка брандмауэра, установка антивирусов, конфигурация безопасного доступа. Защита от хакерских атак и вредоносного ПО.',
                'price' => 600,
                'icon' => 'fa-shield-alt',
                'image' => '/images/services/security-setup.jpg',
                'sort_order' => 6
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['slug' => $service['slug']],
                $service
            );
        }
    }
}