@extends('jobhive.employer.pages.index')
@section('content')
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
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Start Date</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">End Date</th>
                                <th class="text-secondary opacity-7">Status</th>
                                <th class="text-secondary opacity-7"></th>
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
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs text-secondary mb-0 font-weight-bold">{{ Carbon\Carbon::parse($req->start_date)->format('d-m-Y') }}</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ Carbon\Carbon::parse($req->end_date)->format('d-m-Y') }}</span>
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
                                    @if($req->status == 0)
                                    <td>
                                        <a onclick="if(confirm('Do you accept this request??')){
                                            event.preventDefault();
                                            document.getElementById('accept-form-'+{{$req->id}}).submit();}" class="text-success font-weight-bold text-xs mr-5" data-toggle="tooltip" data-original-title="Edit user" style="cursor:pointer">
                                            <i class="fas fa-check"></i>
                                        </a>
                                        <form id="accept-form-{{$req->id}}" action="{{route('employer.furlough.accept', $req->id)}}" method="post" style="display:inline-block;">
                                            @csrf</form>
                                        <br>
                                        <a onclick="if(confirm('Do you deny this request??')){
                                            event.preventDefault();
                                            document.getElementById('deny-form-'+{{$req->id}}).submit();}"
                                           class="text-warning font-weight-bold text-xs mr-4" data-toggle="tooltip" data-original-title="Edit user" style="cursor:pointer">
                                            <i class="fas fa-times"></i>
                                        </a>
                                        <form id="deny-form-{{$req->id}}" action="{{route('employer.furlough.deny', $req->id)}}" method="post" style="display:inline-block;">
                                            @csrf</form>
                                    </td>
                                    @endif
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
