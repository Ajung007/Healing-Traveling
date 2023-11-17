@extends('layouts.checkout')
@section('title','Checkout')
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
                                <li class="breadcrumb-item">
                                    Details
                                </li>
                                <li class="breadcrumb-item active">
                                    Checkout
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <h1>Who is Going ?</h1>
                            <p>
                                Trip to {{ $data->travel_packages->title }}, {{ $data->travel_packages->location }} 
                            </p>
                            <div class="attendee">
                                <table class="table table-responsive-sm text-center">
                                    <thead>
                                        <tr>
                                            <td>Picture</td>
                                            <td>Name</td>
                                            <td>Nationality</td>
                                            <td>Visa</td>
                                            <td>Passport</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @forelse ($data->details as $detail)
                                      <tr>
                                        <td>
                                            <img src="https://ui-avatars.com/api/?name={{ $detail->username}}" height="60" class="rounded-circle">
                                        </td>
                                        <td class="align-middle">
                                            {{ $detail->username }}
                                        </td>
                                        <td class="align-middle">
                                            {{ $detail->nationality }}
                                        </td>
                                        <td class="align-middle">
                                            {{ $detail->is_visa ? '30 Days' : 'N/A'  }}
                                        </td>
                                        <td class="align-middle">
                                            {{ Carbon\Carbon::createFromDate($detail->doe_passport) > Carbon\Carbon::now() ? 'Active' : 'Inactive' }}
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{ route('checkout.remove', ['detail_id' => $detail->id ]) }}">
                                                <img src="{{ url('frontend/images/remove.png') }}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                      @empty
                                          <tr>
                                            <td colspan="6" class="text-center">
                                                Tidak ada user
                                            </td>
                                          </tr>
                                      @endforelse
                                    
                                    </tbody>
                                </table>
                            </div>
                            <div class="member mt-3">
                                <h2>Add Member</h2>
                                <form action="" class="form-inline">
                                    <label for="inputUsername" class="sr-only">Name</label>
                                    <input type="text" name="inputUsername" class="form-control mb-2 mr-sm-2" id="inputUsername" placeholder="Username">
                                    <label for="inputVisa" class="sr-only">Visa</label>
                                    <select name="inputVisa" id="inputVisa" class="custom-select mb-2 mr-sm-2">
                                        <option value="Visa" selected>Visa</option>
                                        <option value="30 Days">30 Days</option>
                                        <option value="N/A">N/A</option>
                                    </select>
                                    <label for="doePassport" class="sr-only">DOE Passport</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <input type="text" class="form-control datepicker" id="deoPassport" placeholder="DEO Passport">
                                    </div>
                                    <button type="submit" class="btn btn-add-now mb-2 px-4">Add Now</button>
                                </form>
                                <h3 class="mt-2 b-0">Note</h3>
                                <p class="disclaimer mb-0">
                                    You are only able to invite member that has registered in Nomads.
                                </p>
                            </div>                            
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                      
                            <h2>Checkout Informations</h2>
                            <table class="trip-informations">
                                <tr>
                                    <th width="50%">Members</th>
                                    <td width="50%" class="text-right">
                                        2 Person
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Additional Visa</th>
                                    <td width="50%" class="text-right">
                                        $190,00
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Trip Price</th>
                                    <td width="50%" class="text-right">
                                        $80,00/Person
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Sub total</th>
                                    <td width="50%" class="text-right">
                                        $280
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Total (+Unique)</th>
                                    <td width="50%" class="text-right text-total">
                                        <span class="text-blue">
                                            $279,
                                        </span>
                                        <span class="text-orage">
                                            33
                                        </span>
                                    </td>
                                </tr>
                      
                            </table>
                            <hr>
                            <h2>Payment Instructions</h2>
                            <p class="paymnet-instruction">
                                Please complete your payment before to 
                                continue the wonderful trip
                            </p>
                            <div class="bank">
                                <div class="bank-item pb-3">
                                    <img src="{{ url('frontend/images/ic_bank.png') }}" alt="" class="bank-image">
                                    <div class="description">
                                        <h3>PT Hello World</h3>
                                        <p>
                                            00000-00000-00000
                                            <br>
                                            Bank Antar Kita
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="bank-item pb-3">
                                    <img src="{{ url('frontend/images/ic_bank.png') }}" alt="" class="bank-image">
                                    <div class="description">
                                        <h3>PT Hello World</h3>
                                        <p>
                                            00000-00000-00000
                                            <br>
                                            Bank Antara Kamu
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="join-container">
                            <a href="{{ route('success', $data->id) }}" class="btn btn-block btn-join-now mt-3 py-2">
                                I Have Made Payment
                            </a>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{ route('detail', $data->travel_packages->slug) }}" class="text-muted">
                                Cancel Booking
                            </a>
                        </div>
                    </div>
                </div>
            </div>
      
    </section>
   </main>   

@endsection

@push('prepend-style')
<link rel="stylesheet" href="frontend/libraries/combined/css/gijgo.min.css">
@endpush

@push('addon-script')
<script src="frontend/libraries/combined/js/gijgo.min.js"></script>
<script>
$(document).ready(function() {
        $('.datepicker').datepicker({
        uiLibrary: 'bootstrap4',
        icons:{
            rightIcon:'<img src="{{ url('frontend/images/ic-date.png') }}" />'
        }
    });
});
</script>
@endpush