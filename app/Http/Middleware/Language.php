<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Language
{

  static $defaultLanguage = 'ru';
  static $languages = ['ru', 'en'];

  public static function getLocale()
  {
      $path = request()->path();
      $path_sections = explode('/', $path);
      //dd($path_sections);
      if (in_array($path_sections[0], self::$languages)) {
          if ($path_sections[0] != self::$defaultLanguage) {
              return $path_sections[0];
          }
      }else {
          return null;
      }
  }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = self::getLocale();
        if (isset($locale)) {
            App::setLocale($locale);
        }
        else App::setLocale(self::$defaultLanguage);

        return $next($request);
    }
}
