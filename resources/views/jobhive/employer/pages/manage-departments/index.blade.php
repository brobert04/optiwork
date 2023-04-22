@extends('jobhive.employer.pages.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="border-radius-lg pt-4 pb-3" style="background-color:#071527">
                        <h6 class="text-white text-capitalize ps-3">Add new Department</h6>
                    </div>
                </div>
                <div class="card-body px-4 pb-2">
                    <p style="font-weight:bold">Add your Department Information</p>
                    <form action="{{route('departments.store')}}" method="post">
                        @csrf
                        <div class="input-group input-group-outline mb-3">
                            <input type="text" class="form-control form-control-border  @error('email') is-invalid @enderror" placeholder="Name" id="name" name="name" required>
                            @error('name') <span class="text-danger small">{{$message}}</span>@enderror
                        </div>
                        <button type="submit" class="btn btn-dark">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty($departments)
    @else
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="border-radius-lg pt-4 pb-3" style="background-color:#071527">
                            <h6 class="text-white text-capitalize ps-3">Departments</h6>
                        </div>
                    </div>
                    <div class="card-body px-3 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Department Name</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($departments as $dep)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$dep->name}}</h6>
                                                </div>
                                            </div>
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
    @endempty
@endsection
