@extends('layouts.navv')

@section('container')

<br>
<br>
<br>
<br>
<br>
<br>
<br>



<style>
    .form-floating label {
        width: 100%;
        padding: 1rem;
        font-size: 1rem;
        border: none;
        border-radius: 5px;
        color: black; /* Menambahkan warna hitam pada teks input */
    }
</style>

<div class="container col-xl-10 col-xxl-8">
    <div class="row align-items-center py-5">
        <h2 class="text-center mb-4">Register</h2>

        @if (session()->has('registrationError'))
            <div class="alert alert-danger col-lg-10 mx-auto col-lg-5" role="alert">
                {{ session('registrationError') }}
            </div>
        @endif

        @if (session()->has('registrationSuccess'))
            <div class="alert alert-success col-lg-10 mx-auto col-lg-5" role="alert">
                {{ session('registrationSuccess') }}
            </div>
        @endif

        <div class="col-lg-10 mx-auto col-lg-5">
            <form action="/register" method="POST" class="p-4 p-md-5 bg-black" autocomplete="off">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" autofocus required>
                    <label for="name">Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                    <label for="username">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                    <label for="password_confirmation">Confirm Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-danger" type="submit">Register</button>
            </form>
        </div>
    </div>
</div>

<script>
    // Fungsi untuk kembali ke halaman sebelumnya
    function goBack() {
        window.history.back();
    }
</script>
@endsection
