<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Valute;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function index()
    {
        return view('pages.settings');
    }

    /**
     * Метод вызывается при отправке формы с кодами валют из страницы Настройки.
     *
     * @param Request $request
     * @return Factory| View| Application
     * */
    public function getSettingResultValute(Request $request): Factory| View| Application
    {
        // Создает массив из получених кодов калют из формы
        $arrayCharCodeFromForm = explode(' ', $request->input('char_code'));

        // Получаем валюты по заданным кодам из массива
        $valutes = Valute::whereIn('char_code', $arrayCharCodeFromForm)->get();

        // Убираем дубликаты и сортируем по дате
        $valutes = $valutes->sortByDesc('created_at')->unique('char_code');

        return view('pages.index', ['valutes' => $valutes]);
    }

    /**
     * Метод получат данные из XML и добавляет в БД
     * Путь или URL XML указывается в .env
     *
     * @return RedirectResponse
     */
    public function create(): RedirectResponse
    {
        // Получаем данные из XML с помошью встроенной функции php
        $xml = simplexml_load_file(env('URL_XML'));

        // Получаем только данные валют и преобразовываем из в массив
        $valutes = array($xml->Valute);

        // Перебираем массив и сохранаяем в БД
        foreach($valutes as $valute){
            foreach($valute as $val) {
                Valute::create([
                    'name' => $val->Name,
                    'char_code' => $val->CharCode,
                    'valute' => $val->Value,
                    'nominal' => $val->Nominal,
                ]);
            }
        }

        return redirect()->route('index');
    }
}
