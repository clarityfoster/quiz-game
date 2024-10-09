@extends('layouts.app')
@section('content')
    <div class="custom-container">
        @include('share.alerts')
        <form action="{{ route('create') }}" method="POST" class="w-50 m-auto my-5">
            @csrf
            <h3 class="mb-4">Add Questions</h3>
            <div class="form-group mb-3">
                <label for="question">Question</label>
                <input type="text" name="question" class="form-control py-2" required>
            </div>
            <div class="form-group mb-3">
                <label for="option1">Option 1:</label>
                <input type="text" id="option1" class="form-control py-2" name="options[]" required>
            </div>
            <div class="form-group mb-3">
                <label for="option2">Option 2:</label>
                <input type="text" id="option2" class="form-control py-2" name="options[]" required>
            </div>
            <div class="form-group mb-3">
                <label for="option3">Option 3:</label>
                <input type="text" id="option3" class="form-control py-2" name="options[]" required>
            </div>
            <div class="form-group mb-4">
                <label for="option4">Option 4:</label>
                <input type="text" id="option4" class="form-control py-2" name="options[]" required>
            </div>
            <div class="form-group mb-3">
                <label for="correct_answer">Correct Answer (0-3):</label>
                <input type="number" id="correct_answer" class="form-control py-2" name="correct_answer" min="0" max="3"
                    required>
            </div>
            <div class="form-group mb-4">
                <label for="category">Category</label>
                <select name="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}">
                            {{ $category['name'] }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-info text-light">Add Question</button>
        </form>
    </div>
@endsection

