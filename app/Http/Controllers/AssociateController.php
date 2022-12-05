<?php

namespace App\Http\Controllers;

use App\Models\AssociateData;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Associate;

class AssociateController extends Controller
{
    public function index() {
        $associates = Associate::with('associateData')
        ->select(
            'title',
            'user_id',
            'first_name',
            'last_name',
            'job_role',
            'country',
            'city',
        )
        ->paginate(15);

        return view('associate/index', [
                'associates' => $associates,
            ]);
    }
    public function create() {

    }
    public function edit($user_id) {
        $associate = Associate::with('associateData')
            ->where('user_id', $user_id)
            ->first();

        dump($associate);

        return view('associate/edit', [
            'associate' => $associate,
        ]);
    }
    public function update(Request $request, $user_id) {
        $associate = Associate::where('user_id', $user_id)->first();

        Associate::where('user_id', $user_id)
            ->update([
                'title' => $request->title ?? $associate->title,
                'first_name' => $request->firstName ?? $associate->first_name,
                'last_name' => $request->lastName ?? $associate->last_name,
                'job_role' => $request->jobRole ?? $associate->job_role,
                'department' => $request->department ?? $associate->department,
                'address1' => $request->address1 ?? $associate->address1,
                'address2' => $request->address2 ?? $associate->address2,
                'address3' => $request->address3 ?? $associate->address3,
                'city' => $request->city ?? $associate->city,
                'county' => $request->county ?? $associate->county,
                'postcode' => $request->postcode ?? $associate->postcode,
                'phone_office' => $request->phoneOffice ?? $associate->phone_office,
                'phone_home' => $request->phoneHome ?? $associate->phone_home,
                'phone_mobile' => $request->phoneMobile ?? $associate->phone_mobile,
                'emergency_contact_name' => $request->emergencyContactName ?? $associate->emrgency_contact_name,
                'emergency_contact_phone' => $request->emergencyContactPhone ?? $associate->emrgency_contact_phone,
                'emergency_contact_email' => $request->emergencyContactEmail ?? $associate->emrgency_contact_email,
                'updated_at' => Carbon::now(),
            ]);

        return redirect('/admin/associate/index');
    }

    public function store(Request $request, $user_id) {
        $associate = Associate::where('user_id', $user_id)->first();

        Associate::where('user_id', $user_id)
            ->insert([
                'title' => $request->title ?? null,
                'first_name' => $request->firstName ?? null,
                'last_name' => $request->lastName ?? null,
                'job_role' => $request->jobRole ?? null,
                'department' => $request->department ?? null,
                'address1' => $request->address1 ?? null,
                'address2' => $request->address2 ?? null,
                'address3' => $request->address3 ?? null,
                'city' => $request->city ?? null,
                'county' => $request->county ?? null,
                'postcode' => $request->postcode ?? null, 
                'phone_office' => $request->phoneOffice ?? null,
                'phone_home' => $request->phoneHome ?? null,
                'phone_mobile' => $request->phoneMobile ?? null,
                'emergency_contact_name' => $request->emergencyContactName ?? null,
                'emergency_contact_phone' => $request->emergencyContactPhone ?? null,
                'emergency_contact_email' => $request->emergencyContactEmail ?? null,
                'updated_at' => Carbon::now(),
            ]);

        return redirect('/admin/associate/index');
    }

    public function delete() {

    }
}
