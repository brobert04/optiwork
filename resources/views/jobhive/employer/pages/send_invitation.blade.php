@extends('jobhive.employer.pages.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="border-radius-lg pt-4 pb-3" style="background-color:#071527">
                        <h6 class="text-white text-capitalize ps-3">Send invitations to your employees</h6>
                    </div>
                </div>
                <div class="card-body px-4 pb-2">
                    <p style="font-weight:bold">In order to add your employees, you need to send them an invitation link</p>
                    <form>
                        <div class="input-group input-group-outline mb-3">
                            <input type="email" class="form-control form-control-border  @error('email') is-invalid @enderror" placeholder="Email" id="email" name="email" required>
                            @error('email') <span class="text-danger small">{{$message}}</span>@enderror
                        </div>
                        <button type="submit" class="btn btn-dark">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
