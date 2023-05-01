<!-- Displaying the current category -->
<li>

    <div class="row">
        <div class="col-6">
            {{ $category->name }}
        </div>
        <div class="co-1">
            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning btn-sm mt-3">edit</a>

        </div>
        <div class="col-1">
            <form method="post" action="{{ route('category.destroy', $category->id) }}">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger btn-sm mt-3">delete</button>
            </form>
        </div>
    </div>
    <!-- If category has children -->
    @if (count($category->children) > 0)
        <!-- Create a nested unordered list -->
        <ul>
            <!-- Loop through this category's children -->
            @foreach ($category->children as $sub)
                <!-- Call this blade file again (recursive) and pass the current subcategory to it -->
                @include('subcategories', ['category' => $sub])
            @endforeach
        </ul>
    @endif
</li>
