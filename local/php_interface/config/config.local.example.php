<?/**
 * В файле config.local.php можно переопределить боевые значения для локального проекта.
 * Ниже приведен пример.
 * Обратите внимание, что файл config.local.php добавлен в .gitignore и не должен использоваться в production
 */

$prodConfig = require __DIR__ . '/config.php';

$prodConfig['example_option'] = 'OVERRIDE_VALUE';
$prodConfig['env'] = 'development';

return $prodConfig;
