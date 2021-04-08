# Laravel API - BackEnd

## [Documentação Official do Laravel](https://laravel.com/docs/8.x)

# Prérequisitos

- Ter o PHP 7 ou > Instalado
- Ter o Composer Instalado
- Ter o MYSQL Instalado
- Ter o Insomnia Instalado

# Vamos Começar

## Criando projeto

Execute

```
    composer create-project laravel/laravel products-backend
    cd products-backend
    php artisan serve
```

## Configurando o .env

Precisamos copiar o arquivo .env.example e criar com o nome .env, com o arquivo criado iremos definir os valores de conexão com o banco dados

```
    DB_DATABASE=Nome Do banco de Dados
    DB_USERNAME=usuário  do banco de dados
    DB_PASSWORD=senha deste usuário
```

## Veja seu projeto no navegador

Precisamos copiar o arquivo .env.example e criar com o nome .env, com o arquivo criado iremos definir os valores de conexão com o banco dados

```
    DB_DATABASE=Nome Do banco de Dados
    DB_USERNAME=usuário  do banco de dados
    DB_PASSWORD=senha deste usuário
```

## Conceitos que vamos trabalhar no Laravel

- [Rotas](https://laravel.com/docs/8.x/routing)
- [Controllers](https://laravel.com/docs/8.x/controllers)

- [Models](https://laravel.com/docs/8.x/eloquent#generating-model-classes)
- [Migrations](https://laravel.com/docs/8.x/migrations#introduction)

- [Request](https://laravel.com/docs/8.x/requests)
- [Response](https://laravel.com/docs/8.x/responses)
- [FormRequest](https://laravel.com/docs/8.x/validation#form-request-validation)
- [ResourceResponse](https://laravel.com/docs/8.x/eloquent-resources#introduction)

## Adicione as rotas

```
    Route::prefix('products')->group(function () {
        Route::get('', [ProductController::class, 'productIndex']);
        Route::get('{id}', [ProductController::class, 'show']);
        Route::post('', [ProductController::class, 'store']);
        Route::put('{id}', [ProductController::class, 'update']);
        Route::delete('{id}', [ProductController::class, 'destroy']);
    });
```

## Criando o Controller

```
    php artisan make:controller ProductController --api
```

## Migration e Model

Tabela no plural e Model no singular

```
    php artisan make:migration create_products_table
```

```
    php artisan make:model Product
```

## Os campos no banco serão:

    String name Nome
    integer stock Estoque
    float 8,2 price Preço
    float 8,2 weight Peso
    boolean is_available disponivel

## Declarando o fillable

```
    protected $fillable = [
        'name', 'price', 'weight', 'stock', 'is_available'
    ];
```

## Agora é implementar as regras de negocio no Controller

# Refatorando

## Adicione FormRequests

```
   php artisan make:request ProductStoreRequest
   php artisan make:request ProductUpdateRequest
```

## HEADERS para o Insomnia

```
    Accept application/json
    Content-Type application/json
```

## Adicione Resources

```
   php artisan make:resource ProductResource
```

## Monstando o Faker e Seeder

```
   php artisan make:factory ProductFactory
   php artisan make:seeder ProductSeeder
   php artisan migrate:fresh --seed
```
