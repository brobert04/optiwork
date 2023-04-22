@extends('jobhive.employee.index')
@section('custom-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-vvi1hB8tTmFjT9Tt/p28mHylm8xjgDmO/Ynf1/0ML4cc/C8/4nlDkXj/0mfSoS0aMwoJ00IQfn1cTrjG6DnU6Q==" crossorigin="anonymous" />
@endsection
@section('content')
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="border-radius-lg pt-4 pb-3" style="background-color:#071527">
                            <h6 class="text-white text-capitalize ps-3">Request Furlough</h6>
                        </div>
                    </div>
                    <div class="card-body px-4 pb-2">
                        <form action="{{route('employee.furlough.create')}}" method="post">
                            @csrf
                            <div class="input-group input-group-outline mb-3">
                                <input type="text" class="form-control form-control-border  @error('title') is-invalid @enderror" placeholder="Title" id="title" name="title" required>
                            </div>
                            @error('name') <span class="text-danger small">{{$message}}</span>@enderror
                            <div class="input-group input-group-outline mb-3">
                                <input type="text" class="form-control form-control-border  " placeholder="Employer Email" value="{{auth()->user()->employee->employer->user->email}}" disabled>
                                <input type="hidden" id="email" name="email" value="{{auth()->user()->employee->employer->user->email}}">
                            </div>
                            @error('email') <span class="text-danger small">{{$message}}</span>@enderror
                            <div class="input-group input-group-outline mb-3">
                                <input type="date" class="form-control form-control-border  @error('start_date') is-invalid @enderror" placeholder="Start Date" id="start_date" name="start_date" required>
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <input type="date" class="form-control form-control-border  @error('end_date') is-invalid @enderror" placeholder="Title" id="end_date" name="end_date" required>
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <textarea class="form-control form-control-border  @error('comments') is-invalid @enderror" placeholder="Comments" id="comments" name="comments" required></textarea>
                            </div>
                            @error('email') <span class="text-danger small">{{$message}}</span>@enderror
                            <button type="submit" class="btn btn-dark">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty($requests)
        @else
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="border-radius-lg pt-4 pb-3" style="background-color:#071527">
                            <h6 class="text-white text-capitalize ps-3">Furlough Requests</h6>
                        </div>
                    </div>
                    <div class="card-body px-3 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Comments</th>
                                    <th class="text-secondary opacity-7">Status</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($requests as $req)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$req->title}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{$req->comments}}</p>
                                        </td>
                                        <td class="align-middle">
                                            @if($req->status == 0)
                                                <span class="badge badge-sm bg-gradient-warning">Pending</span>
                                            @elseif($req->status == 1)
                                                <span class="badge badge-sm bg-gradient-success">Approved</span>
                                            @elseif($req->status == 2)
                                                <span class="badge badge-sm bg-gradient-danger">Rejected</span>
                                            @endif
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
@section('custom-js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-NX9h1vopj04GCE8b6MwZiAStZjvowOeIc8A6m/sYByjhDE2QKjWzbH8oUDlDgFzOo6PDrOG6fK25QgsN9MqJ0g==" crossorigin="anonymous"></script>
@endsection
