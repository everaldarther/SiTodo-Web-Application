    @extends('layouts.sidebar')
    @section('content')
    <div class="container-sm">
        <h3 class="mt-3">Create Workspace</h3>
        <form action="{{ route('workspaces.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="" class="form-control" id="user_id" name="user_id" value="{{ $user_id }}" hidden>
            <div class="mb-3">
              <label for="workspaceName" class="form-label">Workspace's Name</label>
              <input type="text" class="form-control @error('workspaceName') is-invalid @enderror" id="workspaceName" name="workspaceName" placeholder="New Workspace name">
              @error ('workspaceName') <div class="fs-3 text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
              <label for="workspaceDesc" class="form-label">Description</label>
              <textarea class="form-control" id="workspaceDesc" style="height: 100px" name="workspaceDesc" placeholder="Input Description here"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route ('workspace') }}" type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    @endsection
