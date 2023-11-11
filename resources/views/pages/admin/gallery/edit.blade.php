@extends('layouts.admin')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Gallery {{ $item->title }}</h1>
        </div>
      

        @if($errors->any())        
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('travel-gallery.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Paket Travel</label>
                        <select name="travel_packages_id" id="" required class="form-control">
                            <option value="{{ $item->travel_packages_id }}" selected>Jangan di ubah</option>
                            @foreach ($data as $data)
                                <option value="{{ $data->id }}">{{ $data->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">image</label>
                        <input type="file" name="image" id="image" placeholder="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Update
                    </button>
                </form>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->



@endsection

