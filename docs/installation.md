## Установка

**0.** Предполагается, что на вашей рабочей машине уже развернут локальный сервер

**1.** Клонируем репозиторий в папку с проектами:

    git clone git@github.com:dolgiykk/bitrix-starter-pack.git bitrix-starter-pack
    cd bitrix-starter-pack

**2.** Устанавливаем composer зависимости

    composer install

**3.** В админке в разделе `Marketplace/Установленные решения` устанавливаем `модуль Миграции для разработчиков`. Подробнее о его использовании можно посмотреть [здесь](https://marketplace.1c-bitrix.ru/solutions/sprint.migration/).