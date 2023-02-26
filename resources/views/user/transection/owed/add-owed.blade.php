<!-- Add Loan Section Begin -->
<div class="add-income-section">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('add.new.owed') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" required>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="purpose" class="form-label">Purpose</label>
                    <select class="form-select" aria-label="purpose" name="purpose" required>
                        <option selected>Select your loan purpose</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="number" class="form-control" id="amount" name="amount" placeholder="0.00" required
                        name="price" min="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$"
                        onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'#fd9f45'">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<!-- Add Income Section End -->
