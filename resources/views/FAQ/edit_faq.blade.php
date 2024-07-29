<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style>
        .category-header, .faq-header {
            color: white;
        }

        .category-form, .faq-form {
            background-color: #343a40;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .category-form textarea, .faq-form input, .faq-form textarea {
            background-color: #495057;
            color: white;
            border: 1px solid #495057;
            border-radius: 3px;
            margin-bottom: 10px;
        }

        .category-form textarea:focus, .faq-form input:focus, .faq-form textarea:focus {
            background-color: #495057;
            color: white;
            border-color: #6c757d;
        }

        .btn {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    @include('admin.header')
    <!-- Sidebar Navigation-->
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <a class="btn btn-primary ml-3" href="{{ route('faq.faq') }}">
                    Go to FAQ
                </a>
                <div class="container mt-4">

                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <div class="row mb-4">
                        <div class="col">
                            <h2 class="category-header">Categories:</h2>
                        </div>
                        <div class="col text-right">
                            <form method="POST" action="{{ route('add_FAQ_category') }}" class="form-inline category-form">
                                @csrf
                                <div class="form-group mx-sm-3 mb-2">
                                    <input type="text" class="form-control" id="categoryInput" name="category_name" placeholder="Enter category name" required>
                                </div>
                                <button type="submit" class="btn btn-primary mb-2">Add Category</button>
                            </form>
                        </div>
                    </div>

                    @foreach($categories as $category)
                    <div class="row mb-3 category-form">
                        <div class="col">
                            <form method="POST" action="{{ route('update_faq_category', ['id' => $category->id]) }}" class="d-inline">
                                @csrf
                                @method('PUT')
                                <textarea class="form-control" name="name" rows="1" required>{{ $category->name }}</textarea>
                                <button type="submit" class="btn btn-primary btn-sm">Save</button>
                            </form>
                        </div>
                        <div class="col text-right">
                            <form method="POST" action="{{ route('delete_category', ['id' => $category->id]) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">
                                    {{ __('Delete Category') }} '{{ $category->name }}'
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach

                    <div class="container mt-5">
                        <h2 class="faq-header">Edit FAQ Items</h2>

                        @foreach($categories as $category)
                        <h3 class="faq-header">{{ $category->name }}</h3>
                        @foreach($category->faqItems as $faqItem)
                        <div class="mb-3 faq-form">
                            <form method="POST" action="{{ route('update_faq_item', ['id' => $faqItem->id]) }}" class="d-inline">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="question" class="faq-header">Q:</label>
                                    <input type="text" class="form-control" name="question" value="{{ $faqItem->question }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="answer" class="faq-header">A:</label>
                                    <textarea class="form-control" name="answer" rows="2" required>{{ $faqItem->answer }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Save</button>
                            </form>

                            <form method="POST" action="{{ route('delete_faq_item', ['id' => $faqItem->id]) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this FAQ item?')">Delete</button>
                            </form>
                        </div>
                        @endforeach
                        <div class="mb-3 faq-form">
                            <form method="POST" action="{{ route('add_faq_item', ['category_id' => $category->id]) }}">
                                @csrf
                                <div class="form-group">
                                    <label for="new_question" class="faq-header">Q:</label>
                                    <input type="text" class="form-control" name="new_question" required>
                                </div>
                                <div class="form-group">
                                    <label for="new_answer" class="faq-header">A:</label>
                                    <textarea class="form-control" name="new_answer" rows="2" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-success btn-sm">Add Item</button>
                            </form>
                        </div>
                        <hr>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
</body>

</html>
