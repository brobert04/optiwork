@extends('jobhive.employer.pages.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="border-radius-lg pt-4 pb-3" style="background-color:#071527">
                        <h6 class="text-white text-capitalize ps-3">Edit {{$employee->user->name}}</h6>
                    </div>
                </div>
                <div class="card-body px-4 pb-2">
                    <p style="font-weight:bold">Edit Employer Information</p>
                    <form action="{{route('employees.update', $employee->user->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="input-group input-group-outline mb-3">
                            <input type="text" class="form-control form-control-border  @error('email') is-invalid @enderror" placeholder="Name" id="name" name="name" required value='{{$employee->user->name}}'>
                        </div>
                        @error('name') <span class="text-danger small">{{$message}}</span>@enderror
                        <div class="input-group input-group-outline mb-3">
                            <input type="email" class="form-control form-control-border  @error('email') is-invalid @enderror" placeholder="Email" value="{{$employee->user->email}}"  id="email" name="email" required >
                        </div>
                        @error('email') <span class="text-danger small">{{$message}}</span>@enderror
                        <div class="input-group input-group-outline mb-3">
                            <input type="text" class="form-control form-control-border  @error('email') is-invalid @enderror" placeholder="Phone Number" id="phone" name="phone" required value="{{$employee->phone}}">
                        </div>
                        @error('phone') <span class="text-danger small">{{$message}}</span>@enderror
                        <div class="input-group input-group-outline mb-3">
                            <select class="form-control form-control-border @error('gender') is-invalid @enderror" id="gender" name="gender">
                                <option disabled>Gender</option>
                                <option value="male" {{ $employee->gender =='male' ? 'selected' : ''}}>Male</option>
                                <option value="female" {{ $employee->gender =='female' ? 'selected' : ''}}>Female</option>
                            </select>
                        </div>
                        @error('gender') <span class="text-danger small">{{$message}}</span>@enderror
                        <div class="input-group input-group-outline mb-3">
                            <select class="form-control form-control-border  @error('company') is-invalid @enderror" id="company" name="company" >
                                <option disabled>{{auth()->user()->employer->company->name}}</option>
                                <option selected hidden value="{{auth()->user()->employer->company->name}}">{{auth()->user()->employer->company->name}}</option>
                            </select>
                        </div>
                        @error('company') <span class="text-danger small">{{$message}}</span>@enderror
                        <div class="input-group input-group-outline mb-3">
                            <select class="form-control form-control-border  @error('department') is-invalid @enderror" id="department" name="department">
                                <option selected disabled>Department</option>
                                @foreach($departments as $d)
                                    <option value="{{ $d->name }}" {{ $employee->department == $d->name ? 'selected' : '' }}>{{ $d->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('department') <span class="text-danger small">{{$message}}</span>@enderror
                        <button type="submit" class="btn btn-dark">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
