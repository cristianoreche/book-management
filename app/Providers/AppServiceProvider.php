<?php

namespace App\Providers;

use App\View\Components\Alert;
use App\View\Components\Button;
use App\View\Components\Input;
use App\View\Components\Pagination;
use App\View\Components\Search;
use App\View\Components\Table;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot()
    {
        // Registrar componentes Blade
        Blade::component('alert', Alert::class);
        Blade::component('button', Button::class);
        Blade::component('input', Input::class);
        Blade::component('search', Search::class);
        Blade::component('pagination', Pagination::class);
        Blade::component('table', Table::class);

        // Registrar helpers globais
        Blade::directive('str', function ($expression) {
            return "<?php echo Str::of($expression); ?>";
        });
    }
}
