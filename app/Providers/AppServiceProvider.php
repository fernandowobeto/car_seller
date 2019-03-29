<?php

namespace App\Providers;

use App\Repositories\Contracts\Modules\PerfilModeloInterface;
use App\Repositories\Eloquent\Modules\PerfilModeloRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
   /**
    * Register any application services.
    *
    * @return void
    */
   public function register()
   {
      $this->app->bind(PerfilModeloInterface::class, PerfilModeloRepository::class);
   }

   /**
    * Bootstrap any application services.
    *
    * @return void
    */
   public function boot()
   {
      //
   }
}
