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

Precisamos copiar o arquivo  .env.example e criar com o nome .env, com o arquivo criado iremos definir os valores de conexão com o banco dados

```
    DB_DATABASE=Nome Do banco de Dados
    DB_USERNAME=usuário  do banco de dados
    DB_PASSWORD=senha deste usuário    
```


## Veja seu projeto no navegador

Precisamos copiar o arquivo  .env.example e criar com o nome .env, com o arquivo criado iremos definir os valores de conexão com o banco dados

```
    DB_DATABASE=Nome Do banco de Dados
    DB_USERNAME=usuário  do banco de dados
    DB_PASSWORD=senha deste usuário    
```

## Conceitos que vamos trabalhar no Laravel

- [Models](https://laravel.com/docs/8.x/eloquent#generating-model-classes)
- [Migrations](https://laravel.com/docs/8.x/migrations#introduction)

- [Rotas](https://laravel.com/docs/8.x/routing)
- [Request](https://laravel.com/docs/8.x/requests#accessing-the-request)
- [FormRequest](https://laravel.com/docs/8.x/requests#accessing-the-request)
- [Controllers](https://laravel.com/docs/8.x/controllers)
- [Response](https://laravel.com/docs/8.x/requests#accessing-the-request)
- [ResourceResponse](https://laravel.com/docs/8.x/eloquent-resources#introduction)

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
    float 8,2 price Preço
    float 8,2 weight Peso
    number stock_quantity Quantidade em Estoque
    boolean is_available disponivel


## Declarando o fillable
```
    protected $fillable = [
        'name', 'price', 'weight', 'stock_quantity', 'is_available'
    ];
```

## Criando o Controller
```
    php artisan make:controller ProductController --api
```

## Adicione as rotas
``` 
    Route::prefix('products')->group(function () {
        Route::get('', [ProductController::class, 'index']);
        Route::get('{id}', [ProductController::class, 'show']);
        Route::post('', [ProductController::class, 'store']);
        Route::put('{id}', [ProductController::class, 'update']);
        Route::delete('{id}', [ProductController::class, 'destroy']);
    });
```


## Agora é só implementar as regras de negocio no Controller

# Extra
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

## Adicione Resources FormRequests
```
   php artisan make:resource ProductResource
```