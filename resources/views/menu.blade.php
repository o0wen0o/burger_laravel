<span class="fs-2 fw-bold me-auto">MENU</span>
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
                        data-bs-target="#addItemModal{{ $item->id }}">
                        Add to Order
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="addItemModal{{ $item->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="addItemModalLabel{{ $item->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addItemModalLabel{{ $item->id }}">Add Item to
                                        Order
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('order.addItem') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                                        <div class="form-group">
                                            <label for="quantity{{ $item->id }}">Quantity:</label>
                                            <input type="number" class="form-control" id="quantity{{ $item->id }}"
                                                name="quantity" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3">Add</button>
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
