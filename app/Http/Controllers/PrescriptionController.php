<?php

namespace App\Http\Controllers;

use App\Http\Resources\PrescriptionResource;
use App\Models\DaysSchedule;
use App\Models\HoursSchedule;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PrescriptionResource::collection(
            Auth::user()->prescriptions()->whereDate('end_date', '>=', now())->with(['medicine', 'scheduleable'])->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'medicine_id' => 'required|exists:medicines,id',
            'schedule_type' => 'required|in:DaysSchedule,HoursSchedule',
            'dosage' => 'required|string|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'schedule' => 'required|array',
            //HoursSchedule
            'schedule.start_time' => 'missing_unless:schedule_type,HoursSchedule|date_format:H:i',
            'schedule.hours_span' => 'missing_unless:schedule_type,HoursSchedule|integer|min:1',
            //DaysSchedule
            'schedule.days' => 'missing_unless:schedule_type,DaysSchedule|array',
            'schedule.days.*' => 'missing_unless:schedule_type,DaysSchedule|string|between:0,6',
            'schedule.hours' => 'missing_unless:schedule_type,DaysSchedule|array',
            'schedule.hours.*' => 'missing_unless:schedule_type,DaysSchedule|date_format:H:i',
        ]);

        $schedule = null;
        if ($request->get('schedule_type') == 'HoursSchedule') {
            $schedule = HoursSchedule::create($attributes['schedule']);
        } else if ($request->get('schedule_type') == 'DaysSchedule') {
            $schedule = DaysSchedule::create($attributes['schedule']);
        }
        $attributes['schedule'] = null;

        $type = $attributes['schedule_type'];
        $attributes['schedule_type'] = null;
        $attributes['scheduleable_type'] = $type;

        $prescription = Prescription::make($attributes);
        $prescription->scheduleable()->associate($schedule);
        $prescription->user()->associate($request->user());
        $prescription->save();

        return PrescriptionResource::make($prescription);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prescription $prescription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prescription $prescription)
    {
        $prescription->delete();

        return response()->noContent();
    }
}
