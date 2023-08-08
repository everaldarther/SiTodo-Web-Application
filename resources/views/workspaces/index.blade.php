
    @extends('layouts.sidebar')

    @section('content')
    @vite('resources/js/datatable.js')
    <div class="container-sm">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="mt-3">List Workspace</h3>
            <div class="">
                <a href="{{ route ('workspaces.create') }}" class="btn btn-outline-primary px-5">Create</a>
            </div>
        </div>
        <div class="table-responsive border p-3 rounded-3 mb-3">
            {{-- {{ $available }} --}}
            @if (count($available) == 0)
                <a href="{{ route ('workspaces.create') }}" class="btn btn-outline-primary">Create new Workspace</a>
            @else
                <table class="table table-hover table-striped bg-white datatable" id="workspaceTable">
                    <thead>
                        <tr>
                            <th>Workspace</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            @endif
        </div>
    </div>
    @endsection
    @push('scripts')
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.3.2/js/dataTables.fixedHeader.min.js"></script>
        <script type="module">
            $(document).ready(function() {
                $("#workspaceTable").DataTable({
                    serverSide: true,
                    processing: true,
                    responsive: true,
                    ajax: "/getWorkspaces",
                    columns: [
                        { data: "namaWorkspace", name: "namaWorkspace" },
                        { data: "deskWorkspace", name: "deskWorkspace" },
                        { data: "actions", name: "actions", orderable: false, searchable: false }
                    ],
                    order: [[0, "desc"]],
                    lengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "All"],
                    ],
                });

                $(".datatable").on("click", ".btn-delete", function (e) {
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
