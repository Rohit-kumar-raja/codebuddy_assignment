<x-layouts>
    @slot('body')

        <div class="container">
            <div class="card p-4">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('category.update', $data->id) }}">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="parent_id">Parent Category</label>
                                <select id="parent_id" class="form-control" name="parent_id" id="">
                                    <option disabled> - Select - </option>
                                    @foreach ($all_category as $category)
                                        @if (isset($category->parent->id))
                                            <option {{ $category->parent->id == $data->parent->id ? 'selected' : '' }}
                                                value="{{ $category->parent->id }}">
                                                {{ $category->parent->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="">Child Category Name</label>
                            <input value="{{ $data->name }}" name="name" type="text" class="form-control"
                                placeholder="Enter Child Category Name">
                        </div>

                    </div>
                    <hr>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </div>
                </form>
            </div>
        </div>


    @endslot
</x-layouts>
