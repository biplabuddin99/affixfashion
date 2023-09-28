<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
use App\Models\Customers\Customer;

class isfontCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$request->session()->has('fontuserId') || $request->session()->has('fontuserId') === null ){
            return redirect()->route('frontlogOut');
        }else{
            $customer=Customer::findOrFail(session()->get('fontuserId'));
            app()->setLocale($customer->language); // language
            if(!$customer){
                return redirect()->route('frontlogOut');
            }else{
                return $next($request);
            }
        }
        return redirect()->route('frontlogOut');
    }
}
