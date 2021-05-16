<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

class CheckOrderStepByStep
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //get data from SESSION 
        $sessionAll = Session::all();
        $stepByStep = empty($sessionAll['step_by_step']) ? null : $sessionAll['step_by_step'];
        // check if current route is /cart then redirect to cart
        if ($stepByStep == 1 && !in_array(Route::currentRouteName(), ['cart.cart-info'])) {
            return redirect()->route('cart.cart-info');
        } else if ($stepByStep == 2 && !in_array(Route::currentRouteName(), ['cart.checkout'])) { // check if current route is /cart/checkout then redirect to cart/checkout
            return redirect()->route('cart.checkout');
        }

        return $next($request);
    }
}
