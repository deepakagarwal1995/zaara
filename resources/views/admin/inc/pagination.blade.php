<div class="mt-4 text-right">
    @if ($items->hasPages())
        <nav aria-label="Page navigation example">
            {{ $items->links('pagination::bootstrap-5') }}

        </nav>
    @endif
</div>
