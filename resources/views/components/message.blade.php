@if (session()->has('success'))
    <div class="px-5 py-4 bg-green-300 border-green-900 text-white rounded-lg my-4">
        {{ session('success') }}
    </div>
@elseif(session()->has('error'))
    <div class="px-5 py-4 bg-red-300 border-red-900 text-white rounded-lg my-4">
        {{ session('error') }}
    </div>
@endif
