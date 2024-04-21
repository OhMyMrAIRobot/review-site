<?php
namespace App\Utils;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Stichoza\GoogleTranslate\GoogleTranslate;

class Translate
{
    private static $translator;

    public static function translateFields(&$data, $fields): void
    {
        self::init();
        if (is_object($data)){
            foreach ($data as $curr) {
                foreach ($fields as $field) {
                    !is_bool($curr) ?
                        $curr->{$field} = self::cacheTranslation($curr->{$field})
                        :
                        $data->{$field} = self::cacheTranslation($data->{$field})
                    ;
                }
            }
        }
//        else if(is_array($data)) {
//            foreach ($fields as $field) {
//                $data[$field] = self::cacheTranslation((string)$data[$field]);
//            }
//        }
        else{
             $data = self::cacheTranslation($data);
        }
    }

    private static function init(): void
    {
        if (!isset(self::$translator)) {
            self::$translator = new GoogleTranslate(App::getLocale());
            self::$translator->setOptions([
                'curl' => [
                    CURLOPT_SSL_VERIFYPEER => false,
                ],
            ]);
        }
    }

    private static function cacheTranslation($text)
    {
        $cacheKey = 'translation_' . $text . '_' . App::getLocale();
        return Cache::remember($cacheKey, now()->addHours(24), function () use ($text) {
            return self::$translator->translate($text);
        });
    }
}
