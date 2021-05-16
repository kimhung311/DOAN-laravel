<div class="mb-5 mt-5 border p-3">
    <form action="{{ route('admin.customer.index') }}" method="GET">
        <div class="mb-3">
            <label class="form-label">Customer Name</label>
            <input type="text" class="form-control" name="name" placeholder=" name" value="{{ request()->get('name') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">created_at</label>
            <input type="date" class="form-control" name="created_at" placeholder="created_at" value="{{ request()->get('created_at') }}">

        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-outline-primary">Search</button>
        </div>
    </form>
</div>