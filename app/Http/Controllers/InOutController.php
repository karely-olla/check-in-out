<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Delay;
use App\Models\InOut;
use App\Models\Employe;
use App\Models\HourExtra;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
// use Yajra\DataTables\DataTables;

class InOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inouts = InOut::with('employe')->get();
        return view('admin.inouts.index',compact('inouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employe = Employe::where('key','=',$request->key)->with('schedule')->first();
        // Verificamos si el usuario ya tiene un registro el dia de hoy
        if(InOut::where('created_at','=', Carbon::parse(now())->format('Y-m-d'))
                ->where('employe_id','=',$employe->id)
                ->whereNull('hour_out')->exists()){
            $hour_out = Carbon::parse(now())->format('H:i');
            // return Carbon::parse($hour_out)->diffInHours(Carbon::parse($employe->schedule->hour_out)->format('H:i'));
            $hours_extras=Carbon::parse($hour_out)->diffInHours(Carbon::parse($employe->schedule->hour_out)->format('H:i'));
            if ( $hours_extras>=1) {
                HourExtra::create([
                    'employe_id' => $employe->id,
                    'hours' => $hours_extras
                ]);
            }
            // Si existe registramos su hora de salida
            InOut::where('created_at','=', Carbon::parse(now())->format('Y-m-d'))
                ->where('employe_id','=',$employe->id)
                ->whereNull('hour_out')
                ->update([
                    'hour_out' => $hour_out,
                ]);
            return redirect(route('checador'))->with('message',"Hasta luego {$employe->name}");
        } else {
            if (InOut::where('created_at','=', Carbon::parse(now())->format('Y-m-d'))
            ->where('employe_id','=',$employe->id)
            ->whereNotNull('hour_out')->exists()) {
                return redirect(route('checador'))->with('message',"Hola {$employe->name}, me parace que ya has checado tu entrada y salida este día que te parece si nos vemos mañana");
            }
            $hour_in = Carbon::parse(now())->format('H:i');
            // Verificamos si la hora de entrada es igual o mayor que la establecida en el horario
            if (Carbon::parse($hour_in)->equalTo(Carbon::parse($employe->schedule->hour_in)->format('H:i')) || Carbon::parse($hour_in)->greaterThan(Carbon::parse($employe->schedule->hour_in)->format('H:i'))) {
                if (Carbon::parse($hour_in)->floatDiffInMinutes($employe->schedule->hour_in) > 10) {
                    // Obtenemos los minutos de retardo
                    $hour_in_max = Carbon::parse($employe->schedule->hour_in)->addMinutes(10);
                    $delay_minutes = Carbon::parse($hour_in)->floatDiffInMinutes($hour_in_max);
                    // registramos el retado del empleado en la tabla de retardos (delays)
                    Delay::create([
                        'employe_id' => $employe->id,
                        'minutes' => $delay_minutes
                    ]);
                }
            }
            // Registramos la hora de entrada el empleado
            InOut::create([
                'employe_id' => $employe->id,
                'hour_in' => $hour_in,
                'hour_out' => null
            ]);
            return redirect(route('checador'))->with('message',"Hola {$employe->name}, que tengas excelente día");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InOut  $inOut
     * @return \Illuminate\Http\Response
     */
    public function show(InOut $inOut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InOut  $inOut
     * @return \Illuminate\Http\Response
     */
    public function edit(InOut $inOut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InOut  $inOut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InOut $inOut)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InOut  $inOut
     * @return \Illuminate\Http\Response
     */
    public function destroy(InOut $inOut)
    {
        //
    }

    public function table()
    {
        $inouts=InOut::all();
        return DataTables::of($inouts)
            ->addColumn('employe', function($inouts){
                return $inouts->employe->name;
            })
            ->make(true);
    }
}
