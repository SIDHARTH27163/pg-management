@props(['headers' => [], 'rows' => [], 'actions' => null])

<table class="min-w-full table-auto border-collapse border border-gray-300">
    <thead>
        <tr>
            @foreach ($headers as $header)
                <th class="px-4 py-2 border">{{ $header }}</th>
            @endforeach
            @if ($actions ?? true)
                <th class="px-4 py-2 border">Actions</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($rows as $row)
            <tr>
                @foreach ($row as $key => $cell)
                    <td class="px-4 py-2 border">{{ $cell }}</td>
                @endforeach
                @if ($actions ?? true)
                    <td class="px-4 py-2 border">
                        <!-- Call actions closure and pass the row -->
                        {{ $actions($row) }}
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
