    @extends('layouts.sidebar')
    @section('content')
    <div class="container-sm">
        <h3 class="mt-3">Edit Workspace</h3>

        <div class="mb-3">
            <label class="form-label">Member Lists</label>
            <div style="height: 100px" class="card-footer overflow-y-scroll" id="scroll">
                <table class="table table-striped table-hover membertable">
                    {{-- {{ $workspace->id }} --}}
                    @foreach ( $usersName as $name )
                    <tr>
                        <td>{{ $name->name }}</td>
                        <td>{{ $name->email }}</td>
                        @if ($name->member->where('workspace_id','=',$workspace->id)->pluck('level')->first() == '1')
                        <td>Owner</td>
                        @else
                        <td>
                            <div>
                                <form action="{{ route('deleteUser') }}" method="POST">
                                    @csrf
                                    <input type="text" name="nameId" value="{{ $name->id }}" hidden>
                                    <input type="text" name="workspaceId" value="{{ $workspace->id }}" hidden>
                                    <button type="submit" class="btn btn-outline-dark btn-sm me-2 btn-delete">
                                        <i class="bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <form action="{{ route('workspaces.update',[$workspace->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="" class="form-control" id="user_id" name="user_id" value="{{ $sessionId }}" hidden>
            <div class="mb-3">
              <label for="workspaceName" class="form-label">Workspace's Name</label>
              <input type="text" class="form-control @error('workspaceName') is-invalid @enderror" id="workspaceName" name="workspaceName" value="{{ $workspace->namaWorkspace }}" >
              @error ('workspaceName') <div class="fs-3 text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
              <label for="newName" class="form-label">Add member</label>
              <select class="form-control" id="newName" name="newName">
                <option value="" selected></option>
                @foreach ($user as $users )
                    <option value="{{ $users->id }}">{{ $users->email }}</option>
                @endforeach
              </select>
              <a href="javascript:void(0)" class="btn btn-secondary fs-3 mt-2" id="clearButton">Clear Selection</a>
            </div>

            <div class="mb-3">
              <label for="workspaceDesc" class="form-label">Description</label>
              <textarea class="form-control" placeholder="" id="workspaceDesc" style="height: 100px" name="workspaceDesc">{{ $workspace->deskWorkspace }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route ('workspace') }}" type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</a>
          </form>
    </div>
    @endsection

    @push('scripts')
    <script type="module">
        // For Select2 4.1

        $("#newName").select2({
            theme: "bootstrap-5",
            placeholder: "New Member",
            // minimumInputLength: 1,
            // ajax: {
            //     url: "",
            //     dataType: 'json',
            //     delay: 250,
            //     data: function (params) {
            //         return {
            //             q: params.term // Gunakan 'q' sebagai parameter untuk input pencarian
            //         };
            //     },
            //     processResults: function (data) {
            //         return {
            //             results: data
            //         };
            //     },
            //     cache: true
            // }
        });

        $('#clearButton').click(function () {
            $('#newName').val(null).trigger('change');
        });
    </script>
    @endpush
