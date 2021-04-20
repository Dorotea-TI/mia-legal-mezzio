# mia-legal-mezzio

1. Incluir libreria:
```bash
composer require agencycoda/mia-legal-mezzio
```
2. Incluir rutas:
```php
$app->route('/mia-legal/fetch/{id}', [\Mia\Legal\Handler\FetchHandler::class], ['GET', 'OPTIONS', 'HEAD'], 'mia_legal.fetch');
$app->route('/mia-legal/fetch-slug/{slug}', [\Mia\Legal\Handler\FetchSlugHandler::class], ['GET', 'OPTIONS', 'HEAD'], 'mia_legal.fetch-slug');
$app->route('/mia-legal/list', [\Mia\Legal\Handler\ListHandler::class], ['POST', 'OPTIONS', 'HEAD'], 'mia_legal.list');
$app->route('/mia-legal/remove/{id}', [\Mia\Auth\Handler\AuthHandler::class, new \Mia\Auth\Middleware\MiaRoleAuthMiddleware([MIAUser::ROLE_ADMIN]), \Mia\Legal\Handler\RemoveHandler::class], ['GET', 'DELETE', 'OPTIONS', 'HEAD'], 'mia_legal.remove');
$app->route('/mia-legal/save', [\Mia\Auth\Handler\AuthHandler::class, new \Mia\Auth\Middleware\MiaRoleAuthMiddleware([MIAUser::ROLE_ADMIN]), \Mia\Legal\Handler\SaveHandler::class], ['POST', 'OPTIONS', 'HEAD'], 'mia_legal.save');
```