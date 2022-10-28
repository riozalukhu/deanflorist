@foreach ($galleries as $item)
    <div class="col-md-6 col-xxl-4">
        <!--begin::Item-->
        <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
            <div class="overlay bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px p-5 text-white rounded-3 text-center"
                style="background-image: url('{{ asset('images/gallery/' . $item->image) }}');">
                <h3 class="text-white">{{ $item->title }}</h3>
                <div class="overlay-wrapper rounded-3">
                    <div class="overlay-layer">
                        <a href="{{ route('admin.gallery.edit', $item->id) }}" class="btn btn-sm btn-warning me-3">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="javascript:;"
                            onclick="handle_confirm('Apakah Anda Yakin?','Yakin','Tidak','DELETE','{{ route('admin.gallery.destroy', $item->id) }}');"
                            class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
@if ($galleries->hasMorePages())
    {{ $galleries->links('components.pagination') }}
@endif
