@extends('layouts.app')

@section('content')
    <div class="search">

    </div>
    <div class="results py-2 ">
        <div class="w-100 d-flex justify-content-center align-items-middle">
            <div>
                {{ $associates->onEachSide(5)->links() }}
            </div>
        </div>
        <table class="table-striped table text-center">
            <thead>
                <tr>
                    <th class="col-2">Name</th>
                    <th class="col-1">Status</th>
                    <th class="col-1">Country</th>
                    <th class="col-1">City</th>
                    <th class="col-1">Primary Language</th>
                    <th class="col-2">Job Role</th>
                    <th class="col-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($associates as $associate)
                    <tr>
                        <td>{{$associate->first_name . ' ' . $associate->last_name}}</td>
                        <!-- todo add db field for status -->
                        <td>Active</td>
                        <td>{{$associate->country}}</td>
                        <td>{{$associate->city}}</td>
                        <td>{{$associate->associateData ? $associate->associateData->Professional_working_languages : ''}}</td>
                        <td>{{$associate->job_role}}</td>
                        <td>
                            <div class="row">
                                <div class="col-3">
                                    <a href="/admin/associate/edit/{{$associate->user_id}}">
                                        <button class="btn btn-warning w-100">
                                            edit
                                        </button>
                                    </a>
                                </div>
                                <div class="col">
                                    <button class="btn btn-primary w-100">
                                        profile
                                    </button>
                                </div>
                                <div class="col">
                                    <button class="btn btn-success w-100">
                                        view
                                    </button>
                                </div>
                                <div class="col">
                                    <button class="btn btn-danger w-100">
                                        deactivate
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="w-100 d-flex justify-content-center align-items-middle">
            <div>
                {{ $associates->onEachSide(5)->links() }}
            </div>
        </div>
    </div>
@endsection
