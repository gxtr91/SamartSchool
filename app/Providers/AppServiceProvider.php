<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\CandidatosModel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;




class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $view->with('currentUser', auth()->user());
            $view->with('total_candidatos', $this->validarIndividuos());
        });
    }

    private function validarIndividuos() {
        if (Route::currentRouteName() !== 'login') {

            return $candidatos=CandidatosModel::where('status','0')->count();


        }
    }
}