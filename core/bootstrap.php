<?php

//Путь до директории с конфигурационными файлами
const DIR_CONFIG = '/../config';

//Подключение автозагрузчика composer
require_once __DIR__ . '/../vendor/autoload.php';


//Функция возвращает массив всех настроек приложения
function getConfigs(string $path = DIR_CONFIG) : array {
    $settings = [];
    foreach (scandir(__DIR__ . $path) as $file) {
        $name = explode('.', $file) [0];
        if (!empty($name)) {
            $settings[$name] = include __DIR__ . "$path/$file";
        }
        return $settings;
    }

    return new Src\Application(new Src\Settings(getConfigs()));
}
