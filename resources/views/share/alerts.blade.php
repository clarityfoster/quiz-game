@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('info'))
    <div class="alert alert-info">
        {{ session('info') }}
    </div>
@endif
@if (session('warning'))
    <div class="alert alert-warning">
        {{ session('warning') }}
    </div>
@endif
@if (session('ban'))
    <div class="alert alert-warning">
        {{ session('ban') }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-warning">
        <ol>
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </ol>
    </div>
@endif