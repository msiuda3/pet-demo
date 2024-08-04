<!DOCTYPE html>
<html>
<head>
    <title>Pet-Demo</title>
</head>
<body>
    <h1>Pet-Demo</h1>
    <h2>Page: {{$page}}</h2>
    <a href="{{ url('/data/available/1')}}">Available</a>
    <a href="{{ url('/data/pending/1')}}">Pending</a>
    <a href="{{ url('/data/sold/1')}}">Sold</a>

    @if (!empty($data))
        <ul>
            @foreach ($data as $item)
                <li>
                    ID: {{ $item['id'] }}, Name: {{ $item['name'] }}
                    <a href="{{ url('/pet/edit/'.$item['id'])}}">Edit</a>
                    <form action="{{ route('pet.delete', ['id' => $item['id']]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this pet?');">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>

        <div>
            @if ($page > 1)
                <a href="{{ url('/data/'.$status.'/'. ($page - 1)  ) }}">Previous</a>
            @endif
            <a href="{{ url('/data/'.$status.'/'. ($page + 1)  ) }}">Next</a>


            <br>
            <br>
            <br>
            <a href="{{ url('/pet/new')}}">New pet</a>
        </div>
    @else
        <p>No data available</p>
    @endif
</body>
</html>
