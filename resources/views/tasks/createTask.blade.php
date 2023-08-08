
    @extends('layouts.sidebar')

    @section('content')
    <div class="container-sm">
        <h3 class="mt-3">Create Personal Task</h3>
        {{-- <h3 class="mt-3">{{ $category }}</h3> --}}
        <form action="{{ route('persontasks.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="namaTask" class="form-label">Task Name</label>
              <input type="" class="form-control @error('taskName') is-invalid @enderror" id="taskName" name="taskName" placeholder="New Task name">
              @error ('taskName') <div class="fs-3 text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
              <label for="startDate" class="form-label">Start Date</label>
              <input type="date" class="form-control" id="startDate" name="startDate">
            </div>
            <div class="mb-3">
              <label for="dueDate" class="form-label">Due Date</label>
              <input type="date" class="form-control" id="dueDate" name="dueDate">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select id="status" name="status" class="form-select">
                  <option value="pending">Pending</option>
                  <option value="onprogress">On-Progress</option>
                  <option value="done">Done</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select id="category" name="category" class="form-select">
                    <option value="" selected>Add category</option>
                    @foreach ($category as $categories )
                    <option value="{{ $categories->id }}">{{ $categories->categoryName }}</option>
                    @endforeach
                </select>
                @if (count($category) == 0)
                    <p class="text-danger">You haven't added any <a href="{{ route ('category') }}" class="text-info">category</a></p>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Create new Task</button>
            <a href="{{ route ('persontask') }}" type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</a>
          </form>
    </div>
    @endsection

