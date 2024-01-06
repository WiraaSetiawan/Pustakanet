    <form action="{{ route('borrow.store', ['book' => $book->id]) }}" method="post">
                @csrf
                <label for="return_date">Tanggal Pengembalian:</label>
                <input type="date" name="return_date" required>
                <button type="submit">Pinjam</button>
    </form>