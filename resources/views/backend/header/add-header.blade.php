@extends('backend.master')
@section('mainContent')

<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Add Header Footer</strong> 
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <span class="text-success">{{ $message }}</span>
                    </div>
                    
                    <div class="card-body card-block">
                        @elseif ($message = Session::get('danger'))
                            <span class="text-danger">{{ $message }}</span>
                    </div>
                        @endif
                    <form action="{{route('store-header')}}" method="post" class="">
                        @csrf
                         <div class="card-body">
                            <div class="form-group">
                                <label for="nf-mobile" class=" form-control-label">Mobile Number</label>
                                <input type="number" id="nf-number" name="mobile" placeholder="Enter number.." class="form-control">
                                @error('mobile')
                                     <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nf-email" class=" form-control-label">Email</label>
                                <input type="email" id="nf-email" name="email" placeholder="Enter email.." class="form-control">
                                @error('email')
                                     <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nf-logo" class=" form-control-label">Logo Name</label>
                                <input type="text" id="nf-logo_name" name="logo_name" placeholder="Enter logo name.." class="form-control">
                                @error('logo_name')
                                     <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nf-email" class=" form-control-label">Footer About</label>
                                <input type="text" id="footer_about" name="footer_about" placeholder="Enter footer about.." class="form-control">
                                @error('footer_about')
                                     <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                         </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection