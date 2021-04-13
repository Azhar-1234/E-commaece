@extends('backend.master')
@section('mainContent')
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <strong>Manage Header Footer</strong> 
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
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="serial">#</th>
                                        <th>Mobile number</th>
                                        <th>Email</th>
                                        <th>Logo Name</th>
                                        <th>Footer About</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($headers as $key => $header)
                                    <tr>
                                        <td class="serial">{{++$key}}</td>
                                        <td> <span class="name">{{$header->mobile}}</span> </td>
                                        <td> <span class="email">{{$header->email}}</span> </td>
                                        <td width="10%"> <span class="logo_name">{{$header->logo_name}}</span> </td>
                                        <td> <span class="footer_about">{{$header->footer_about}}</span> </td>
                                        <td width="20%">
                                            <a href="{{route('edit-header',[$header->id])}}" class="btn btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> 
                    </div>    <!-- /.table-stats -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection