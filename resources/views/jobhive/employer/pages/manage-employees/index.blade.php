@extends('jobhive.employer.pages.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="border-radius-lg pt-4 pb-3" style="background-color:#071527">
                        <h6 class="text-white text-capitalize ps-3">Employees table</h6>
                        <div class="float-end">
                            <a href="{{route('employees.create')}}" class="btn" style="background-color:#ef6445; color:white;">Add Employee</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-3 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employee</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Department</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($employees as $employee)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="https://ui-avatars.com/api/?name={{$employee->user->name}}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{$employee->user->name}}</h6>
                                                <p class="text-xs text-secondary mb-0">{{$employee->user->email}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$employee->department}}</p>
                                        <p class="text-xs text-secondary mb-0">{{$employee->company}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs text-secondary mb-0">{{$employee->phone}}</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ Carbon\Carbon::parse($employee->created_at)->format('d-m-Y') }}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('employees.edit', $employee->id)}}" class="text-secondary font-weight-bold text-xs mr-4" data-toggle="tooltip" data-original-title="Edit user">
                                            Edit
                                        </a>
                                        <br>
                                        <a href="{{route('employees.destroy', $employee->id)}}" class="text-danger font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user" onclick="if(confirm('Confirmați ștergerea utilizatorului {{$employee->user->name}}?')){
                                            event.preventDefault();
                                            document.getElementById('delete-form-'+{{$employee->id}}).submit();}">
                                            Delete
                                        </a>
                                        <form id="delete-form-{{$employee->id}}" action="{{route('employees.destroy', $employee->user->id)}}" method="post" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
