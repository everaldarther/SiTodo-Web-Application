@php
    $currentRouteName = Route::currentRouteName();
@endphp

    @if ($level->pluck('level')->first() == '1')
        <div class="d-flex">
            <a href="{{ route('workspaces.show', ['workspace' => $workspace->id]) }}" class="btn btn-outline-dark btn-sm me-2">
                <i class="bi bi-folder2-open"></i>
            </a>
            <a href="{{ route('workspaces.edit', ['workspace' => $workspace->id]) }}" class="btn btn-outline-dark btn-sm me-2">
                <i class="bi-pencil-square"></i>
            </a>
            <div>
                <form action="{{ route('workspaces.destroy', ['workspace' => $workspace->id]) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-outline-dark btn-sm me-2 btn-delete">
                        <i class="bi-trash"></i>
                    </button>
                </form>
            </div>
        </div>
    @else
        <a href="{{ route('workspaces.show', ['workspace' => $workspace->id]) }}" class="btn btn-outline-dark btn-sm me-2">
            <i class="bi bi-folder2-open"></i>
        </a>
    @endif

