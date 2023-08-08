
    @extends('layouts.sidebar')
    @section('content')
    <style>
        #scroll {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        #scroll::-webkit-scrollbar {
            display: none !important;
        }
    </style>
    <div class="container-sm">
        @vite('resources/js/datatable.js')
        <h3 class="mt-3">Detail Workspace</h3>
        <div class="border p-3 rounded-2 mb-2">
            <p class="fw-bolder">Workspace: <br>
                <span>{{ $workspace->namaWorkspace }}</span>
            </p>
            <p class="fw-bolder">Description: <br>
                <span>{{ $workspace->deskWorkspace }}</span>
            </p>
            <div class="card-footer">
                <p>Member Lists</p>
                {{-- {{ $usersName }} --}}
                <div style="height: 100px" class="card-footer overflow-y-scroll" id="scroll">
                    <table class="table table-striped table-hover">
                        @foreach ( $usersName as $name )
                        <tr>
                            <td>{{ $name->name }}</td>
                            <td>{{ $name->email }}</td>
                            @if ($name->member->where('workspace_id','=',$workspace->id)->pluck('level')->first() == '1')
                            <td>Owner</td>
                            @else
                            <td>Member</td>
                            @endif
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <div class="border p-3 rounded-2 mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="mt-3">Tasks</h6>
            </div>
            <div class="table-responsive border p-3 rounded-3 mb-3">
                <a href="{{ route ('tasks.show',['task' => $workspace->id])}}" class="btn btn-outline-primary">Create new Task</a>
                {{-- {{ $member }} --}}
                <div style="max-height: 40vh;" class="table-responsive mb-3 overflow-y-scroll" id="scroll">
                    <table class="table table-hover table-striped bg-white tasktable" id="taskTable">
                        <thead>
                            <tr>
                                <th>Task</th>
                                <th>Start-Date</th>
                                <th>Due-Date</th>
                                <th>Status</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($task as $tasks )
                            <tr>
                                <td>{{ $tasks->namaTask }}</td>
                                <td>{{ $tasks->startDate }}</td>
                                <td>{{ $tasks->dueDate }}</td>
                                <td>{{ $tasks->status }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('tasks.edit', [$tasks->id]) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-pencil-square"></i></a>
                                        <div>
                                            <form action="{{ route('tasks.destroy', [$tasks->id]) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-dark btn-sm me-2 btn-delete">
                                                    <i class="bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @push('scripts')
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.3.2/js/dataTables.fixedHeader.min.js"></script>
        <script type="module">
            $(document).ready(function() {
                $("#taskTable").DataTable({
                    responsive: true,
                    searching: false,
                    paging: false,
                    info: false
                });

                $(".tasktable").on("click", ".btn-delete", function (e) {
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
