@extends('layouts.success')
@section('title','Success')
@section('content')

<main>
    <div class="section-success d-flex align-items-center">
        <div class="col text-center">
            <img src="{{ url('frontend/images/ic_mail.png') }}" alt="">
            <h1>Yay! Success</h1>
            <p>
                We’ve sent you email for trip instruction 
                <br>
                please read it as well
            </p>
            <a href="{{ route('home') }}" class="btn btn-home-page mt-3 px-5">
                Home Page
            </a>
        </div>
    </div>
</main>

@endsection
@push('addon-script')
<script>
    
    console.log('OK');
    // const endpoint = "https://booking.kai.id/api/stations2/3"
    const endpoint = "https://reqres.in/api/users"

    fetch(endpoint, {
        method : "POST",
        headers : {
            "Content-Type" : "application/json",
        },
        body: JSON.stringify({
            email : "udin@gmail.com",
            firstName : "heheheh",
        }),
    })
    .then((result) => result.json())
    .then((data) => console.log(data))

    // async function hitApi()
    // {
    //     const api = await fetch(endpoint)
    //     const data = await api.json()
    //     console.log(data);
    // }

    // hitApi();

</script>