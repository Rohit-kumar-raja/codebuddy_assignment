<!-- Displaying the current category -->
<li>{{ $category->name }}

   @if ($category->parent_id!='')
   <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning btn-sm mt-3">edit</a>
   @endif
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
