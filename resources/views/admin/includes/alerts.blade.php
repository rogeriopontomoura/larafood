<p></p>
@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error )
            <p> {{ $error }}</p>     
        @endforeach
    </div>
@endif

@if (session('message'))
    <div class="alert alert-info">        
        <p> {{ session('message') }}</p>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">        
        <p> {{ session('error') }}</p>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-info">        
        <p> {{ session('success') }}</p>
    </div>
@endif