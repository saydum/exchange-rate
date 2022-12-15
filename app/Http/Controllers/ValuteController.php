<?php

namespace App\Http\Controllers;

use App\Models\Valute;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ValuteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application| Factory| View| Response
     */
    public function index(): Application| Factory| View| Response | RedirectResponse
    {
        $valutes = Valute::all();

        if ($valutes->isEmpty()) {
            return redirect()->route('setXml');
        }

        return view('pages.index', [
            'valutes' => $valutes
        ]);
    }

}
