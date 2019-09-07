##Usage

###Configuration

1.  set following on application's composer.json
```
"extra": {
    "laravel": {
        "dont-discover": [
            "pdusan/simple-blog"
        ]
    }
},

"autoload": {
    "psr-4": {
        "App\\": "app/",
        "Pdusan\\SimpleBlog\\": "vendor/pdusan/simple-blog/src/"
    },
},
```

2. config/app.php
```
'providers' => [
        ...
        Pdusan\SimpleBlog\SBlogServiceProvider::class,
 ],
 ```
 
###Publish

1. Publish configration
```
php artisan vendor:publish --tab="sblog-config"
```
2. Publish views
```
php artisan vendor:publish --tab="sblog-views"
```
3. Publish translations
```
php artisan vendor:publish --tab="sblog-translations"
```
4. Publish assets
```
php artisan vendor:publish --tab="sblog-assets"
```
4. Publish migrations
```
php artisan vendor:publish --tab="sblog-migrations"
```