@extends('layouts.app')

@section('content')
    <div class="py-3">
        <div class="row"></div>
        <h1>{{$associate->first_name . ' ' . $associate->last_name}}</h1>
        <hr>
    </div>
    <form action="/admin/associate/update/{{$associate->user_id}}" method="post">
        @method('PUT')
        @csrf
        <fieldset>
            <!-- Personal Details -->
            <div class="card m-2 shadow-lg">
                <div class="card-body">
                    <h5 class="card-title">Personal Details</h5>
                    <div class="row col-12 px-5">
                        <div class="col p-1 row">
                            <div class="col-3">
                                <label for="title" class="form-label py-1">Title</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name='title' class="form-control" id="title" value="{{$associate->title}}" placeholder="{{$associate->title}}">
                            </div>
                        </div>
                        <div class="col p-1 row">
                            <div class="col-3">
                                <label for="firstName" class="form-label py-1">First Name</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name='firstName' class="form-control" id="firstName" value="{{$associate->first_name}}" placeholder="{{$associate->first_name}}">
                            </div>
                        </div>
                        <div class="col p-1 row">
                            <div class="col-3">
                                <label for="lastName" class="form-label py-1">Last Name</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name='lastName' class="form-control" id="lastName" value="{{$associate->last_name}}" placeholder="{{$associate->last_name}}">
                            </div>
                        </div>
                    </div>
                    <div class="row col-12 px-5">
                        <div class="col p-1 row">
                            <div class="col-3">
                                <label for="company" class="form-label py-1">Company</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name='company' class="form-control" id="company" value="{{$associate->company}}" placeholder="{{$associate->company}}">
                            </div>
                        </div>
                        <div class="col p-1 row">
                            <div class="col-3">
                                <label for="jobRole" class="form-label py-1">Job Role</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name='jobRole' class="form-control" id="jobRole" value="{{$associate->job_role}}" placeholder="{{$associate->job_role}}">
                            </div>
                        </div>
                        <div class="col p-1 row">
                            <div class="col-3">
                                <label for="department" class="form-label py-1">Department</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name='department' class="form-control" id="department" value="{{$associate->department}}" placeholder="{{$associate->department}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Location -->
            <div class="card m-2 shadow-lg my-5">
                <div class="card-body">
                    <h5 class="card-title">Location</h5>
                    <div class="row col-12 px-5">
                        <div class="col p-1 row">
                            <div class="col-3">
                                <label for="address1" class="form-label py-1">Address 1</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name='address1' class="form-control" id="address1" value="{{$associate->address1}}" placeholder="{{$associate->address1}}">
                            </div>
                        </div>
                        <div class="col p-1 row">
                            <div class="col-3">
                                <label for="address2" class="form-label py-1">Address 2</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name='address2' class="form-control" id="address2" value="{{$associate->address2}}" placeholder="{{$associate->address2}}">
                            </div>
                        </div>
                        <div class="col p-1 row">
                            <div class="col-3">
                                <label for="address3" class="form-label py-1">Address 3</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name='address3' class="form-control" id="address3" value="{{$associate->address3}}" placeholder="{{$associate->address3}}">
                            </div>
                        </div>
                    </div>
                    <div class="row col-12 px-5">
                        <div class="col p-1 row">
                            <div class="col">
                                <label for="city" class="form-label py-1">City</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name='city' class="form-control" value="{{$associate->city}}" id="city" placeholder="{{$associate->city}}">
                            </div>
                        </div>
                        <div class="col p-1 row">
                            <div class="col-3">
                                <label for="county" class="form-label py-1">County</label>
                            </div>
                            <div class="col-9">
                                <input type="text"name='county' class="form-control" id="county" value="{{$associate->county}}" placeholder="{{$associate->county}}">
                            </div>
                        </div>
                        <div class="col p-1 row">
                            <div class="col-3">
                                <label for="postcode" class="form-label py-1">Postcode</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name='postcode' class="form-control" id="postcode" value="{{$associate->postcode}}" placeholder="{{$associate->postcode}}">
                            </div>
                        </div>
                        <div class="col p-1 row">
                            <div class="col-3">
                                <label for="country" class="form-label py-1">Country</label>
                            </div>
                            <div class="col-9">
                                <input required type="text" name='country' class="form-control" id="country" value="{{$associate->country}}" placeholder="Country">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact Information -->
            <div class="card m-2 my-5 shadow-lg">
                <div class="card-body">
                    <h5 class="card-title">Contact Information</h5>
                    <div class="row col-12 px-5 ">
                        <div class="col-3 p-1 row">
                            <div class="col-3">
                                <label for="phoneOffice" class="form-label py-1">Phone Office</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name='phoneOffice' class="form-control" id="phoneOffice" value="{{$associate->phone_office}}" placeholder="{{$associate->phone_office}}">
                            </div>
                        </div>
                        <div class="col p-1 row">
                            <div class="col-3">
                                <label for="phoneHome" class="form-label py-1">Phone Home</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name='phoneHome' class="form-control" id="phoneHome" value="{{$associate->phone_home}}" placeholder="{{$associate->phone_home}}">
                            </div>
                        </div>
                        <div class="col p-1 row">
                            <div class="col-3">
                                <label for="phoneMobile" class="form-label py-1">Phone Mobile</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name='phoneMobile' class="form-control" id="phoneMobile" value="{{$associate->phone_mobile}}" placeholder="{{$associate->phone_mobile}}">
                            </div>
                        </div>
                    </div>
                    <div class="row col-12 px-5 ">
                        <div class="col-3 p-1 row">
                            <div class="col-3">
                                <label for="email" class="form-label py-1">Email</label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control" id="email" placeholder="{{$associate->email}}">
                            </div>
                        </div>
                        <div class="col p-1 row">
                            <div class="col-3">
                                <label for="secondaryEmail" class="form-label py-1">Secondary Email</label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control" id="secondaryEmail" placeholder="{{$associate->secondary_email}}">
                            </div>
                        </div>
                        <div class="col p-1 row">
                            <div class="col-3">
                                <label for="linkedin" class="form-label py-1">Linkedin</label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control" id="linkedin" placeholder="{{$associate->linkedin}}">
                            </div>
                        </div>
                    </div>
                    <h5>Emergency Contact</h5>
                    <div class="row col-12 px-5 ">
                        <div class="col-3 p-1 row">
                            <div class="col-3">
                                <label for="emergencyContactName" class="form-label py-1">Name</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name='emergencyContactName' class="form-control" id="emergencyContactName" value="{{$associate->emergency_contact_name}}" placeholder="{{$associate->emergency_contact_name}}">
                            </div>
                        </div>
                        <div class="col p-1 row">
                            <div class="col-3">
                                <label for="emergencyContactPhone" class="form-label py-1">Phone</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name='emergencyContactPhone' class="form-control" id="emergencyContactPhone" value="{{$associate->emergency_contact_phone}}" placeholder="{{$associate->emergency_contact_phone}}">
                            </div>
                        </div>
                        <div class="col p-1 row">
                            <div class="col-3">
                                <label for="emergencyContactEmail" class="form-label py-1">Email</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name='emergencyContactEmail' class="form-control" id="emergencyContactEmail" value="{{$associate->emergency_contact_email}}" placeholder="{{$associate->emergency_contact_email}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SkillSets -->
            <div class="card m-2 my-5 shadow-lg">
                <div class="card-body">
                    <h5 class="card-title">Skill Sets</h5>
                    <div class="row col-12 px-5 ">
                        <div class="col-6 p-1 row">
                            <div class="col-3">
                                <label for="primarySkillset" class="form-label py-1">Primary Skill Set</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name='primarySkillset' class="form-control" id="primarySkillset" value="{{str_contains($associate->associateData->primary_skillset, '[') ? str_replace(['[', ']', '"'], "", $associate->associateData->primary_skillset) : $associate->associateData->primary_skillset}}" placeholder="{{$associate->associateData->primary_skillset ?? 'Primary Skill set (Skill 1, Skill 2)'}}">
                            </div>
                        </div>
                        <div class="col-6 p-1 row">
                            <div class="col-3">
                                <label for="secondarySkillset" class="form-label py-1">Secondary Skill Set</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name='secondarySkillset' class="form-control" id="secondarySkillset" value="{{str_contains($associate->associateData->secondary_skillset, '[') ? str_replace(['[', ']', '"'], "", $associate->associateData->secondary_skillset) : $associate->associateData->secondary_skillset}}" placeholder="{{$associate->associateData->secondary_skillset ?? 'Secondary Skill set (Skill 1, Skill 2)'}}">
                            </div>
                        </div>
                    </div>
                    <div class="row col-12 px-5 ">
                        <div class="col-6 p-1 row">
                            <div class="col-3">
                                <label for="primaryLanguage" class="form-label py-1">Primary Language</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name='primaryLanguage' class="form-control" id="primaryLanguage" value="{{$associate->associateData->primary_language}}" placeholder="{{$associate->associateData->primary_language ?? 'Primary Language'}}">
                            </div>
                        </div>
                        <div class="col-6 p-1 row">
                            <div class="col-3">
                                <label for="secondaryLanguage" class="form-label py-1">Secondary Languages</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name='secondaryLanguage' class="form-control" id="secondaryLanguage" value="{{str_contains($associate->associateData->working_languages, '[') ? str_replace(['[', ']', '"'], "", $associate->associateData->working_languages) : $associate->associateData->working_languages}}" placeholder="{{$associate->associateData->working_languages ?? 'Secondary Languages (Language 1, Language 2)'}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Qualifications -->
            <div class="card m-2 my-5 shadow-lg">
                <div class="card-body">
                    <h5 class="card-title">Qualifications</h5>
                    <div class="row col-12 px-5 ">
                        <div class="col-6 p-1 row">
                            <div class="col-3">
                                <label for="educationalQualifications" class="form-label py-1">Educational Qualifications</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name='educationalQualifications' class="form-control" id="educationalQualifications" value="{{$associate->associateData->educational_qualifications}}" placeholder="{{$associate->associateData->educational_qualifications ?? 'Educational Qualification'}}">
                            </div>
                        </div>
                        <div class="col-6 p-1 row">
                            <div class="col-3">
                                <label for="awards" class="form-label py-1">Awards</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name='awards' class="form-control" id="awards" value="{{$associate->associateData->awards}}" placeholder="{{$associate->associateData->awards ?? 'Awards (Award 1, Award 2)'}}">
                            </div>
                        </div>

                    </div>
                    <div class="row col-12 px-5 ">
                        <div class="col-6 p-1 row">
                            <div class="col-3">
                                <label for="primaryCoachingAccreditations" class="form-label py-1">Primary Coaching Accreditations</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name='primaryCoachingAccreditations' class="form-control" id="primaryCoachingAccreditations" value="{{$associate->associateData->primary_coaching_accreditations}}" placeholder="{{$associate->associateData->primary_coaching_accreditations ?? 'Primary Coaching Accreditations'}}">
                            </div>
                        </div>
                        <div class="col-6 p-1 row">
                            <div class="col-3">
                                <label for="secondaryCoachingAccreditations" class="form-label py-1">Secondary Coaching Accreditations</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name='secondaryCoachingAccreditations' class="form-control" id="secondaryCoachingAccreditations" value="{{$associate->associateData->secondary_coaching_accreditations}}" placeholder="{{$associate->associateData->secondary_coaching_accreditations ?? 'Secondary Coaching Accreditations'}}">
                            </div>
                        </div>
                    </div>
                    <div class="row col-12 px-5 ">
                        <div class="col-6 p-1 row">
                            <div class="col-3">
                                <label for="primaryFacilitatingAccreditations" class="form-label py-1">Primary Facilitating Accreditations</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name='primaryFacilitatingAccreditations' class="form-control" id="primaryFacilitatingAccreditations" value="{{$associate->associateData->primary_facilitating_accreditations}}" placeholder="{{$associate->associateData->primary_facilitating_accreditations ?? 'Primary Facilitating Accreditations'}}">
                            </div>
                        </div>
                        <div class="col-6 p-1 row">
                            <div class="col-3">
                                <label for="secondaryFacilitatingAccreditations" class="form-label py-1">Secondary Facilitating Accreditations</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name='secondaryFacilitatingAccreditations' class="form-control" id="secondaryFacilitatingAccreditations" value="{{$associate->associateData->secondary_facilitating_accreditations}}" placeholder="{{$associate->associateData->secondary_facilitating_accreditations ?? 'Secondary Facilitating Accreditations'}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Experience -->
            <div class="card m-2 my-5 shadow-lg">
                <div class="card-body">
                    <h5 class="card-title">Experience</h5>
                    <div class="row col-12 px-5 ">
                        <div class="col-6 p-1 row">
                            <div class="col-3">
                                <label for="geographicalExperience" class="form-label py-1">Geographical Experience</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name='geographicalExperience' class="form-control" id="geographicalExperience" value="{{$associate->associateData->geographical_experience}}" placeholder="{{$associate->associateData->geographical_experience ?? 'Geographical Experience (Location 1, Location 2)'}}">
                            </div>
                        </div>
                        <div class="col-6 p-1 row">
                            <div class="col-3">
                                <label for="geographicalExperience" class="form-label py-1">Awards</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name='geographicalExperience' class="form-control" id="geographicalExperience" value="{{$associate->associateData->industry_experience}}" placeholder="{{$associate->associateData->industry_experience ?? 'Industry Experience (Industry 1, Industry 2)'}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- workplace behaviors and preferences -->
            <!-- Coaching -->
            <!-- Other -->
            <div class="col-2 float-end px-5 py-1">
                <button type="submit" class="btn btn-success w-100">Save</button>
            </div>
        </fieldset>
    </form>
@endsection
