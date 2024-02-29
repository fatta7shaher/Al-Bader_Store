<!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal"
    data-target="#delete_{{ $type }}_{{ $data->id }}">
    {{ __('delete') }}
</button>

<!-- Modal -->
<div class="modal fade" id="delete_{{ $type }}_{{ $data->id }}" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route($routes, $data->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <div class="modal-body">
                    <h3>{{ __('Delete_Sure') }}</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('Delete') }}</button>
                </div>

            </form>


        </div>
    </div>
</div>
