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
            'company',
            'country',
            'city',
        )
        ->paginate(15);

        return view('associate/index', [
                'associates' => $associates,
            ]);
    }
    public function create() {
        $user_id = Associate::orderBy('user_id', 'desc')->pluck('user_id')->first();
        $user_id = $user_id+1;

        return view('associate/create', [
            'user_id' => $user_id,
        ]);

    }
    public function edit($user_id) {
        $associate = Associate::with('associateData')
            ->where('user_id', $user_id)
            ->first();

        return view('associate/edit', [
            'associate' => $associate,
        ]);
    }
    public function update(Request $request, $user_id) {
        $associate = Associate::with('associateData')->where('user_id', $user_id)->first();

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
                'country' => $request->country ?? $associate->country,
                'postcode' => $request->postcode ?? $associate->postcode,
                'phone_office' => $request->phoneOffice ?? $associate->phone_office,
                'phone_home' => $request->phoneHome ?? $associate->phone_home,
                'phone_mobile' => $request->phoneMobile ?? $associate->phone_mobile,
                'emergency_contact_name' => $request->emergencyContactName ?? $associate->emrgency_contact_name,
                'emergency_contact_phone' => $request->emergencyContactPhone ?? $associate->emrgency_contact_phone,
                'emergency_contact_email' => $request->emergencyContactEmail ?? $associate->emrgency_contact_email,
                'updated_at' => Carbon::now(),
            ]);

        AssociateData::where('user_id', $user_id)
            ->update([
                'areas_of_interest' => $request->areasOfInterest ?? $associate->associateData->areas_of_interest,
                'primary_skillset' => $request->primarySkillset ?? $associate->associateData->primary_skillset,
                'secondary_skillsets' => $request->secondarySkillset ?? $associate->associateData->secondary_skillsets,
                'primary_language' => $request->primaryLanguage ?? $associate->associateData->primary_language,
                'working_languages' => $request->workingLanguages ?? $associate->associateData->working_languages,
                'sectors_worked_in' => $request->sectors ?? $associate->associateData->sectors_worked_in,
                'geographical_experience' => $request->geographicalExperience ?? $associate->associateData->geographical_experience,
                'mobility' => $request->mobility ?? $associate->associateData->mobility,
                'mobility_details' => $request->mobiltyDetails ?? $associate->associateData->mobility_details,
                'educational_qualifications' => $request->educationalQualifications ?? $associate->associateData->educational_qualifications,
                'awards' => $request->awards ?? $associate->associateData->awards,
                'fees_per_day' => $request->feesPerDay ?? $associate->associateData->fees_per_day,
                'elevator_pitch' => $request->elevatorPitch ?? $associate->associateData->elevator_pitch,
                'interesting_facts' => $request->interestingFacts ?? $associate->associateData->interesting_facts,
                'areas_of_expertise' => $request->areasOfExpertise ?? $associate->associateData->areas_of_expertise,
                'primary_accreditations' => $request->primaryAccreditations ?? $associate->associateData->primary_accreditations,
                'secondary_accreditations' => $request->secondaryAccreditations ?? $associate->associateData->secondary_accreditations,
                'end_to_end_design' => $request->endToEndDesign ?? $associate->associateData->end_to_end_design,
                'work_with_preferences' => $request->workWithPreferences ?? $associate->associateData->work_with_preferences,
                'style_preference' => $request->stylePreference ?? $associate->associateData->style_preference,
                'content_type' => $request->contentType ?? $associate->associateData->content_type,
                'industry_experience' => $request->industryExperience ?? $associate->associateData->industry_experience,
                'room_energy' => $request->roomEnergy ?? $associate->associateData->room_energy,
                'technologies' => $request->technologies ?? $associate->associateData->technologies,
                'learning_delivery_methods' => $request->learningDeliveryMethods ?? $associate->associateData->learning_delivery_methods,
                'primary_coaching_accreditations' => $request->primaryCoachingMethods ?? $associate->associateData->primary_coaching_accreditations,
                'secondary_coaching_accreditations' => $request->secondaryCoachingMethods ?? $associate->associateData->secondary_coaching_accreditations,
                'updated_at' => Carbon::now(),
            ]);

        return redirect('/admin/associate/index');
    }

    public function store(Request $request) {

        $request->validate([
            'title' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'address1' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'county' => 'required',
            'country' => 'required',
            'email' => 'required',
            'emergencyContactName' => 'required',
            'emergencyContactPhone' => 'required',
            'emergencyContactEmail' => 'required',
        ]);

        Associate::create([
                'user_id' => $request->user_id,
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
                'country' => $request->country ?? null,
                'postcode' => $request->postcode ?? null,
                'email' => $request->email ?? null,
                'phone_office' => $request->phoneOffice ?? null,
                'phone_home' => $request->phoneHome ?? null,
                'phone_mobile' => $request->phoneMobile ?? null,
                'emergency_contact_name' => $request->emergencyContactName ?? null,
                'emergency_contact_phone' => $request->emergencyContactPhone ?? null,
                'emergency_contact_email' => $request->emergencyContactEmail ?? null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            AssociateData::create([
                'user_id' => $request->user_id,
                'areas_of_interest' => null,
                'primary_skillset' => null,
                'secondary_skillset' => null,
                'primary_language' => null,
                'working_languages' => null,
                'sectors_worked_in' => null,
                'geographical_experience' => null,
                'mobility' => null,
                'mobility_details' => null,
                'educational_qualifications' => null,
                'awards' => null,
                'areas_of_interest' => null,
                'fees_per_day' => null,
                'elevator_pitch' => null,
                'interesting_facts' => null,
                'areas_of_expertise' => null,
                'primary_accreditations' => null,
                'secondary_accreditations' => null,
                'end_to_end_design' => null,
                'work_with_preferences' => null,
                'style_preference' => null,
                'content_type' => null,
                'industry_experience' => null,
                'room_energy' => null,
                'technologies' => null,
                'learning_delivery_methods' => null,
                'primary_facilitating_accreditations' => null,
                'secondary_facilitating_accreditations' => null,
                'coaching_style' => null,
                'primary_coaching_accreditations' => null,
                'secondary_coaching_accreditations' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);


        return redirect('/admin/associate/edit/'.$request->user_id);
    }

    public function delete() {

    }
}
