<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main</title>

    <style>
    #scroll {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    #scroll::-webkit-scrollbar {
        display: none !important;
    }
    </style>

</head>
<body>

    @extends('layouts.sidebar')

    @section('content')
    <div class="container-fluid">
        {{-- {{ $idws }} --}}
        <!--  Row 1 -->
        @vite('resources/js/datatable.js')
        <div class="row flex-column-reverse flex-lg-row">
          <div class="col-lg-8 d-flex align-items-strech">
            <div class="card w-100">
              <div class="card-body">
                <div class="mb-9">
                  <div class="mb-3 mb-sm-0">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title fw-semibold">Personal Tasks</h5>
                        <a style="font-size: 24px;" href="{{ route ('persontask') }}"><i class="bi bi-arrow-right"></i></a>
                    </div>
                    <div style="max-height: 25vh;" class="table-responsive mb-3 overflow-y-scroll" id="scroll">
                        <table class="table table-hover table-striped bg-white" id="Tables">
                            <thead>
                                <tr>
                                    <th>Task</th>
                                    <th>Start-Date</th>
                                    <th>Due-Date</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($persontask as $persontasks )
                                <tr>
                                    <td>{{ $persontasks->namaTask }}</td>
                                    <td>{{ $persontasks->startDate }}</td>
                                    <td>{{ $persontasks->dueDate }}</td>
                                    @if ($persontasks->category_id == null)
                                        <td></td>
                                    @else
                                        <td>{{ $persontasks->category->categoryName }}</td>
                                    @endif
                                    <td>{{ $persontasks->status }}</td>
                                    <td><a href="{{ route('persontasks.edit',['persontask' => $persontasks->id]) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-pencil-square"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                  </div>
                </div>
                <div id="chart"></div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="row">
                <div class="col-lg-12">
                  <div class="card overflow-hidden">
                    <div class="card-body p-4">
                      <h5 class="card-title mb-9 fw-semibold">Personal Task Total</h5>
                        <div class="d-flex justify-content-between">
                          <h1 class="fw-semibold text-center">{{ count($persontask) }}</h1>
                          <i style="font-size: 30px;" class="bi bi-journal-check"></i>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                    <div class="card overflow-hidden">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-9 fw-semibold">Workspace Total</h5>
                        <div class="d-flex justify-content-between">
                            <h1 class="fw-semibold text-center">{{ count($workspace) }}</h1>
                            <i style="font-size: 30px;" class="bi bi-person-workspace"></i>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <div class="d-flex justify-content-between">
                  <h5 class="card-title fw-semibold">Workspace List</h5>
                  <a style="font-size: 24px;" href="{{ route ('workspace') }}"><i class="bi bi-arrow-right"></i></a>
                </div>
                <div style="max-height: 40vh;" class="table-responsive mb-3 overflow-y-scroll" id="scroll">
                    <table class="table table-hover table-striped bg-white ">
                        <thead>
                            <tr>
                                <th>Workspace</th>
                                <th>Description</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($workspace as $workspaces )
                            <tr>
                                <td>{{ $workspaces->workspace->namaWorkspace }}</td>
                                <td>{{ $workspaces->workspace->deskWorkspace }}</td>
                                <td><a href="{{ route('workspaces.show', ['workspace' => $workspaces->id]) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi bi-folder2-open"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title fw-semibold">Workspace Task List</h5>
                  </div>
                <div style="max-height: 40vh;" class="table-responsive mb-3 overflow-y-scroll" id="scroll">
                    <table class="table table-hover table-striped bg-white " id="Tables2">
                        <thead>
                            <tr>
                                <th>Workspace</th>
                                <th>Task</th>
                                <th>Start-Date</th>
                                <th>Due-Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($worktasks as $worktask )
                            <tr>
                                <td>{{ $worktask->workspace->namaWorkspace }}</td>
                                <td>{{ $worktask->namaTask }}</td>
                                <td>{{ $worktask->startDate }}</td>
                                <td>{{ $worktask->dueDate }}</td>
                                <td>{{ $worktask->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
              </div>
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
                $("#Tables").DataTable({
                    responsive: true,
                    searching: false,
                    paging: false,
                    info: false
                });
                $("#Tables2").DataTable({
                    responsive: true,
                    searching: false,
                    paging: false,
                    info: false
                });
            });
        </script>
    @endpush

</body>
</html>
