<!-- Edit Income Modal Begin -->
<div class="modal fade" id="incomeEdit{{$data->id}}" tabindex="-1" aria-labelledby="incomeEdit{{$data->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="incomeEdit{{$data->id}}Label">Edit Your Income</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="add-income-section">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('edit.income') }}" method="POST">
                                @csrf

                                <input type="hidden" name="id" value="{{ $data->id }}">

                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" value="{{ $data->title }}" required>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="purpose" class="form-label">Purpose</label>
                                    <select class="form-select" aria-label="purpose" name="purpose" required>
                                        <option selected>Select your income purpose</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @if($category->id == $data->category_id) selected @endif>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="amount" class="form-label">Amount</label>
                                    <input type="number" class="form-control" id="amount" name="amount"
                                        placeholder="0.00" required min="0" step="0.01"
                                        pattern="^\d+(?:\.\d{1,2})?$" value="{{ $data->amount }}"
                                        onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'#fd9f45'">
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Edit Income Modal End -->