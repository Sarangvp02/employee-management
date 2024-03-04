@extends('admin.layout.master')

@section('content')

<div id="main-wrapper">

    @include('admin.includes.sidebar')

    <div class="page-wrapper">

        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Designation Management</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a
                                        href="{{route('designation')}}">Designation</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid">

            <div class="row">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <a class="btn btn-lg btn-success" href="{{route('designation.create')}}">Add
                                    designation</a>
                            </div>
                        </div>
                    </div>
                    <div class="col- p-0">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Designation List</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>S.N.</th>
                                                <th>Employe name</th>
                                                <th>Designation type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($designations as $designation)
                                            <tr>
                                                <td>{{$loop -> index+1 }}</td>
                                                <td>{{$designation ->userss->username }}</td>
                                                <td>{{$designation->designation_type}}</td>
                                                <td class="d-flex align-items-center">
                                                    <form id="delete-form-{{$designation->id}}"
                                                        action="{{route('designation.delete',$designation->id)}}"
                                                        method="put" >
                                                        @csrf
                                                        <a href="{{route('designation.edit',$designation->id)}}"
                                                            class="btn btn-sm btn-dark">Edit</a>
                                                    </form>
                                                    <form action="{{route('designation.delete',$designation->id)}}" method="post">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-danger ml-3">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                    {{ $designations->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

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


        </div>

    </div>

    @endsection