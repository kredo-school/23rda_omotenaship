<div class="containar components-icons">
    <div class="row p-5 d-flex justify-content-around">

        <div class="row text-center mb-3">
            <h5><span class="text-bold heading-kurenai">Categories</span></h5>
        </div>

        <div class="row mb-4 px-5">
            <div class="col d-flex justify-content-end">
                <img src="{{ asset('images/categories/1.png') }}" class="img-fluid">
            </div>
            <div class="col d-flex justify-content-start">
                <img src="{{ asset('images/categories/2.png') }}" class="img-fluid">
            </div>
        </div>

        <div class="row px-5">
            <div class="col d-flex justify-content-end">
                <img src="{{ asset('images/categories/3.png') }}" class="img-fluid">
            </div>
            {{-- culture of category --}}
            <div class="col d-flex justify-content-start">
                <a href="{{ route('posts.index',['category' => 'culture']) }}" name="culture"><img src="{{ asset('images/categories/4.png') }}" class="img-fluid"></a>
            </div>
        </div>
    </div>
</div>