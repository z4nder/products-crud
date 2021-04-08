# Configurando o Projeto

## A importancia de um .env e como ele funciona

    No database.php tem um exemplo do uso para conexão com o banco
    Usar o tinker para escrever o env('AWS_KEY')

```
    php artisan tinker
    env("AWS_KEY")
```

# Começando com o Laravel

## Sistema de Roteamento

```php
    Route::get('/teste', function () {
        return "Hello World! 👨🏻‍💻";
    });
```

```php
   Route::get('/random_number/{limit}', function ($limit) {
        return rand(0, $limit);
   });
```

## Usando Controllers

```php
  Route::get('', [ProductController::class, 'index']);
```

## Controller

# Interação com o Banco

## Migration

## Model

## Eloquent o ORM do Laravel
