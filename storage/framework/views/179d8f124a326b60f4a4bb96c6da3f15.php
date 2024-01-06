<form action="<?php echo e(route('borrow.store', ['book' => $book->id])); ?>" method="post">
            <?php echo csrf_field(); ?>
            <label for="return_date">Tanggal Pengembalian:</label>
            <input type="date" name="return_date" required>
            <button type="submit">Pinjam</button>
        </form><?php /**PATH D:\.Project\web laravel\book\resources\views//borrowBook.blade.php ENDPATH**/ ?>