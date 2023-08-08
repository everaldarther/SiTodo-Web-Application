@extends('layouts.sidebar')

@section('content')
<div class="container-sm">
    <h3 class="mt-3">Category</h3>

    <div class="table-responsive border p-3 rounded-3 mb-3 mt-3">
        <div class="text-end">
            {{-- {{ $category }} --}}
            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category" value="" placeholder="Add new Category">
                @error ('category') <div class="fs-3 text-danger">{{ $message }}</div> @enderror
                <button type="submit" class="btn btn-primary my-2">Add New Category</button>
            </form>
        </div>
        <table class="table table-hover table-striped bg-white categtable" id="categtable">
            <thead class="text-center">
                <tr>
                    <th>Category</th>
                    <th>#</th>
                </tr>
            </thead>
            @foreach ( $category as $categories)
            <tbody class="text-center">
                <tr>
                    <td>{{ $categories->categoryName }}</td>
                    <td>
                        <form action="{{ route('categories.destroy', ['category' => $categories->id]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-dark btn-sm me-2 btn-delete">
                                <i class="bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection

@push('scripts')
    <script type="module">
        $(document).ready(function() {
            $(".categtable").on("click", ".btn-delete", function (e) {
                e.preventDefault();

                var form = $(this).closest("form");

                Swal.fire({
                    title: "Are you sure want to delete ?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "bg-primary",
                    confirmButtonText: "Yes, delete it!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush
