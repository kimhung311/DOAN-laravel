<h4>Thong tin ca nhan</h4>
<div class="border p-2">
    <div class="p-2">
        <label for="">Fullname</label>
        <p>{{ Auth::user()->name }}</p>
    </div>
    <div class="p-2">
        <label for="">Email</label>
        <p>{{ Auth::user()->email }}</p>
    </div>
    <div class="p-2">
        <label for="">Phone</label>
        <p>{{ Auth::user()->phone }}</p>
    </div>
    <div class="p-2">
        <label for="">Address</label>
        <p>{{ Auth::user()->address }}</p>
    </div>
</div>