<!DOCTYPE html>
<html>
<head>
    <title>Submit Form</title>
</head>
<body>
    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif

    @php
        $name = isset($item) ? $item['name'] : '';
        $status = isset($item) ? $item['status'] : '';
        $id = isset($item) ? $item['id'] : '';
    @endphp

    <form action="{{ route('form.submit') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $name }}" required><br><br>
        <input type="hidden" id="id" name="id" value="{{ $id }}">
 
        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="available" {{ $status == 'available' ? 'selected' : '' }}>Available</option>
            <option value="pending" {{ $status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="sold" {{ $status == 'sold' ? 'selected' : '' }}>Sold</option>
        </select><br><br>

        <button type="submit">Save</button>
    </form>
</body>
</html>
