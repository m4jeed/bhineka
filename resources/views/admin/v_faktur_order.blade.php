<h1>Hasil Pencarian: "{{ $keyword }}"</h1>

    <ul>
        @forelse ($items as $item)
            <li>{{ $item->name }}</li>
        @empty
            <li>Tidak ada hasil ditemukan.</li>
        @endforelse
    </ul>

    {{ $items->links() }}