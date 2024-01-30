# Esercizio: Train Station

Migrazione del database: ```php artisan migrate```
``` php
Schema::create('trains', function (Blueprint $table) {
    $table->id();
    $table->string('company', 30);
    $table->string('departure_station', 50);
    $table->string('arrival_station', 50);
    $table->dateTime('departure_time');
    $table->dateTime('arrival_time');
    $table->string('train_code', 5);
    $table->tinyInteger('number_of_carriages')->unsigned->nullable();
    $table->tinyInteger('is_on_time')->unsigned()->default(1);
    $table->tinyInteger('is_cancelled')->unsigned()->default(0);
    $table->timestamps();
});
```