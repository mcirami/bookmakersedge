@if (session('success'))
    <div class="alert alert-success mt-5 text-center">
        <h3>{{ session('success') }}</h3>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger mt-5 text-center">
        {{ session('error') }}
    </div>
@endif
