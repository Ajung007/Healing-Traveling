@extends('layouts.admin')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Paket Travel</h1>
            <a href="{{ route('travel-package.create') }}" class="btn btn-sm btn-primary shadown-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i>Tambah Paket Travel
            </a>
        </div>

      
        <div class="row">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" widht="100%" cellspacing="0">
                        <thead>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Location</th>
                            <th>Type</th>
                            <th>Departure Date</th>
                            <th>Type</th>
                            <th>Action</th>
                            <th>ID</th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->



@endsection

