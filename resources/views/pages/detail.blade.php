@extends('layouts.app')
@section('title','Detail Travel')

@section('content')
<main>
    <section class="section-details-header">  </section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    Paket Travel
                                </li>
                                <li class="breadcrumb-item active">
                                    Details
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">
                            <h1>{{ $data->title }}</h1>
                            <p>
                                {{ $data->location }}
                            </p>
                            @if ( count($data->galleries))
                            <div class="gallery">
                                <div class="xzoom-container">                                    
                                    <img src="{{ Storage::url($data->galleries->first()->image) }}" class="xzoom" id="xzoom-default" xoriginal="{{ Storage::url($data->galleries->first()->image) }}">
                                </div>
                                <div class="xzoom-thumbs">
                                  @foreach ($data->galleries as $galleries)
                                    <a href="{{ Storage::url($galleries->image) }}">
                                        <img src="{{ Storage::url($galleries->image) }}" class="xzoom-gallery" width="128" xpreview="{{ Storage::url($galleries->image) }}">
                                    </a> 
                                  @endforeach                           
                                </div>
                            </div>
                            @endif
                            <h2>Tentang Wisata</h2>
                            <p>
                                {!! $data->about !!}
                            </p>
                            <div class="features row">
                                <div class="col-md-4">
                                    <div class="description">
                                        <img src="{{ url('/frontend/images/icon-event.png') }}" alt="" class="features-image">
                                        <div class="description">
                                            <h3>Featured Event</h3>
                                            <p>{{ $data->featured_event }}</p>
                                        </div>                                       
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <div class="description">
                                        <img src="{{ url('frontend/images/icon_language.png') }}" alt="" class="features-image">                                      
                                        <div class="description">
                                            <h3>Language</h3>
                                            <p>{{ $data->language }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <div class="description">
                                        <img src="{{ url('frontend/images/icon_foods.png') }}" alt="" class="features-image">
                                        <div class="description">
                                            <h3>Foods</h3>
                                            <p>{{ $data->foods }}</p>
                                        </div>                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Members are going</h2>
                            <div class="members my-2">
                                <img src="{{ url('frontend/images/member-1.png') }}" class="member-image mr-1">
                                <img src="{{ url('frontend/images/member-2.png') }}" class="member-image mr-1">
                                <img src="{{ url('frontend/images/member-3.png') }}" class="member-image mr-1">
                                <img src="{{ url('frontend/images/member-4.png') }}" class="member-image mr-1">
                                <!-- <img src="frontend/images/member-5.png" class="member-image mr-1"> -->
                            </div>
                            <hr>
                            <h2>Trip Informations</h2>
                            <table class="trip-informations">
                                <tr>
                                    <th width="50%">Date Of Departure</th>
                                    <td width="50%" class="text-right">
                                        {{ Carbon\Carbon::create($data->depature_date)->format('F n, Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Duration</th>
                                    <td width="50%" class="text-right">
                                        {{ $data->duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Type</th>
                                    <td width="50%" class="text-right">
                                        {{ $data->type }}
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Price</th>
                                    <td width="50%" class="text-right">
                                        Rp {{ number_format($data->price) }},00 / Person
                                    </td>
                                </tr>
                      
                            </table>
                        </div>
                        <div class="join-container">
                            @auth
                                <form action="{{ route('checkout.proses', ['id' => $data->id]) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-block btn-join-now mt-3 py-2" type="submit">
                                        Join Now
                                    </button>
                                </form>
                            @endauth
                            @guest
                            <a href="{{ route('login') }}" class="btn btn-block btn-join-now mt-3 py-2">
                                Login Or Register to Join
                            </a>
                            @endguest

                         
                        </div>
                    </div>
                </div>
            </div>
      
    </section>
   </main>   
@endsection


@push('prepend-style')
    <link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/xzoom.min.css') }}">
@endpush

@push('addon-script')
<script src="{{ url('frontend/libraries/xzoom/xzoom.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.xzoom, .xzoom-gallery').xzoom({
            zoomWidth: 500,
            title : false,
            tint : '#333',
            xoffset: 15,
        });
    });
</script>
@endpush