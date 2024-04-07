<div class="d-flex">
    <span class="fs-2 fw-bold me-auto">ADMIN MENU</span>

    <!-- Button trigger modal for adding a new item -->
    <button type="button" class="btn btn-success ml-auto" data-bs-toggle="modal" data-bs-target="#addItemModal">
        Add Item
    </button>
</div>

<!-- Add Item Modal -->
<div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addItemModalLabel">Add New Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('item.create') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="unit_price">Unit Price:</label>
                        <input type="number" step="0.01" class="form-control" id="unit_price" name="unit_price"
                            required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Unit Price</th>
            <th scope="col">Operation</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->name }}</td>
                <td>{{ $item->unit_price }}</td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#updateItemModal{{ $item->id }}">
                        Update
                    </button>

                    <a href="{{ route('item.delete', $item->id) }}" class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>

                    <!-- Modal -->
                    <div class="modal fade" id="updateItemModal{{ $item->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="addItemModalLabel{{ $item->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addItemModalLabel{{ $item->id }}">
                                        Update Item
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('item.update') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                                        <div class="form-group">
                                            <label for="name">Name:</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ $item->name }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="unit_price">Unit Price:</label>
                                            <input type="number" step="0.01" class="form-control" id="unit_price"
                                                value="{{ $item->unit_price }}" name="unit_price" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update Item</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
