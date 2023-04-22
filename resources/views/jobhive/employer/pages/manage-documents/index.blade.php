@extends('jobhive.employer.pages.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="border-radius-lg pt-4 pb-3" style="background-color:#071527">
                        <h6 class="text-white text-capitalize ps-3">Add Company Documents</h6>
                    </div>
                </div>
                <div class="card-body px-4 pb-2">
                    <p style="font-weight:bold">Add your company documents for easier management</p>
                    <form action="{{route('employer.documents.add')}}" method="post">
                        @csrf
                        <div class="input-group input-group-outline mb-3">
                            <input type="file" class="custom-file-input" id="customFile1" title="Upload your company documents" name='documents[]' multiple required>
                            @error('documents[]') <span class="text-danger small">{{$message}}</span>@enderror
                        </div>
                        <button type="submit" class="btn btn-dark">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
