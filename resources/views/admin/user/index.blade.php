@extends('admin.layout.master')

@section('content')

<div id="main-wrapper">

    @include('admin.includes.sidebar')

    <div class="page-wrapper">

        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">User Management</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a
                                        href="{{route('user')}}">User</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form action="{{route('user.search')}}" method="GET" class="form-horizontal">
                            <div class="card-body">
                                <!-- <h4 class="card-title">Search</h4> -->
                                <div class="form-group row">
                                    <!-- <label class="col-sm-3 text-right control-label col-form-label">Search by employee name</label> -->
                                    <div class="col-sm-6">
                                        <input type="text" name="search" class="form-control" id="fname"
                                            placeholder="Search By Employee Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success">Search</button>
                                        <a href="{{route('user')}}" class="btn btn-md btn-danger">Clear</a>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-success">Search</button>
                                        <a href="{{route('user')}}" class="btn btn-md btn-danger">Clear</a>
                                    </div>
                                </div> -->
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <!-- <div class="card-body">
                            <h5 class="card-title m-b-0">Admin</h5>
                        </div> -->
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Username</th>
                                        <th>Image</th>
                                        <th>Role</th>
                                        <th>Email</th>
                                        <th>Leaves count</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <th>{{$loop->index+1}}</th>
                                        <td>{{$user->username}}</td>
                                        <td><img src="{{ asset('uploads/gallery/' . $user->image) }}" width="80px"
                                                height="80px" alt="Image"> </td>
                                        <td>{{$user->role}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            {{$user->approve_leave_count}}
                                        </td>
                                        <td class="d-flex">
                                            <button type="button" username="{{$user->username}}" role="{{$user->role}}"
                                                email="{{$user->email}}" salary="{{$user->salary}}"
                                                phone="{{$user->phone}}" address="{{$user->address}}"
                                                gender="{{$user->gender}}" dob="{{$user->dob}}"
                                                join_date="{{$user->join_date}}" job_type="{{$user->job_type}}"
                                                city="{{$user->city}}" age="{{$user->age}}"
                                                class="view-data btn btn-sm btn-success">View</button>&nbsp;&nbsp;
                                            <a href="{{route('user.edit',$user->id)}}"
                                                class="btn btn-sm btn-dark">Edit</a>&nbsp;&nbsp;
                                            <!-- <a href="{{route('managesalary.detail',$user->id)}}" class="btn btn-sm
                                            btn-warning">Payment</a> -->
                                            <!-- <a href="{{route('managesalary.detail',$user->id)}}"
                                                class="btn btn-sm btn-warning">Payment</a> -->
                                            <form id="delete-form-{{ $user->id }}"
                                                action="{{route('user.delete',$user->id)}}" method="put">
                                                @csrf
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>

            <script>
            $('.view-data').click(function() {
                var username = $(this).attr('username');
                var role = $(this).attr('role');
                var email = $(this).attr('email');
                var salary = $(this).attr('salary');
                var phone = $(this).attr('phone');
                var address = $(this).attr('address');
                var gender = $(this).attr('gender');
                var dob = $(this).attr('dob');
                var join_date = $(this).attr('join_date');
                var job_type = $(this).attr('job_type');
                var city = $(this).attr('city');
                var age = $(this).attr('age');
                $('#username').text(username);
                $('#role').text(role);
                $('#email').text(email);
                $('#salary').text(salary);
                $('#phone').text(phone);
                $('#address').text(address);
                $('#gender').text(gender);
                $('#dob').text(dob);
                $('#join_date').text(join_date);
                $('#job_type').text(job_type);
                $('#city').text(city);
                $('#age').text(age);
                $('#show-data').modal();
            })
            </script>

            {{--sweetalert box for deleting start--}}
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.8/dist/sweetalert2.all.min.js"></script>

            <script type="text/javascript">
            function deletePost(id)

            {
                const swalWithBootstrapButtons = swal.mixin({
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false,
                })

                swalWithBootstrapButtons({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        event.preventDefault();
                        document.getElementById('delete-form-' + id).submit();
                    } else if (
                        // Read more about handling dismissals
                        result.dismiss === swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons(
                            'Cancelled',
                            'Your file is safe :)',
                            'error'
                        )
                    }
                })
            }
            </script>
            {{--sweetalert box for deleting end--}}

            <div id="show-data" class="modal fade" id="view-data" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex">
                                User Name :&nbsp;&nbsp;<p id="username"></p>
                            </div>
                            <div class="d-flex">
                                User Role :&nbsp;&nbsp;<p id="role"></p>
                            </div>
                            <div class="d-flex">
                                User Email :&nbsp;&nbsp;<p id="email"></p>
                            </div>
                            <div class="d-flex">
                                User Phone :&nbsp;&nbsp;<p id="phone"></p>
                            </div>
                            <div class="d-flex">
                                User Address :&nbsp;&nbsp;<p id="address"></p>
                            </div>
                            <div class="d-flex">
                                Gender :&nbsp;&nbsp;<p id="gender"></p>
                            </div>
                            <div class="d-flex">
                                Date of Birth :&nbsp;&nbsp;<p id="dob"></p>
                            </div>
                            <div class="d-flex">
                                Join Date :&nbsp;&nbsp;<p id="join_date"></p>
                            </div>
                            <div class="d-flex">
                                Salary Amount :&nbsp;&nbsp;<p id="salary"></p>
                            </div>
                            <div class="d-flex">
                                Job Type :&nbsp;&nbsp;<p id="job_type"></p>
                            </div>
                            <div class="d-flex">
                                City :&nbsp;&nbsp;<p id="city"></p>
                            </div>
                            <div class="d-flex">
                                age :&nbsp;&nbsp;<p id="age"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--@section('js')--}}
            {{--@endsection--}}
        </div>
    </div>
</div>

@endsection