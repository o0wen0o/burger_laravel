<span class="fs-2 fw-bold me-auto">PROFILE</span>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Unit Price</th>
            <th scope="col">Total</th>
            <th scope="col">Operation</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($order->itemOrders as $itemOrder)
            <tr>
                <th scope="row">{{ $itemOrder->id }}</th>
                <td>{{ $itemOrder->item->name }}</td>
                <td>{{ $itemOrder->quantity }}</td>
                <td>RM {{ $itemOrder->item->unit_price }}</td>
                <td>RM {{ $itemOrder->quantity * $itemOrder->item->unit_price }}.00</td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#updateItemModal{{ $itemOrder->id }}">
                        Update
                    </button>

                    <a href="{{ route('order.delete', $itemOrder->id) }}" class="btn btn-danger">Delete</a>

                    <!-- Modal -->
                    <div class="modal fade" id="updateItemModal{{ $itemOrder->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="addItemModalLabel{{ $itemOrder->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addItemModalLabel{{ $itemOrder->id }}">
                                        Update to Order
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('order.update') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="item_order_id" value="{{ $itemOrder->id }}">
                                        <div class="form-group">
                                            <label for="quantity{{ $itemOrder->id }}">Quantity:</label>
                                            <input type="number" class="form-control"
                                                id="quantity{{ $itemOrder->id }}" name="quantity" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3">Update</button>
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
