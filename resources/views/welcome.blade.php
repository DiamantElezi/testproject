<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
  <div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
      <h5 class="mb-0">Import Employees</h5>
    </div>
    <div class="card-body">
      <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="fileInput" class="form-label">Choose File</label>
          <input type="file" name="file" class="form-control" id="fileInput" required>
        </div>
        <button type="submit" class="btn btn-success w-100">Import</button>
      </form>
    </div>
  </div>

  <div class="text-center mt-4">
    <a href="{{ route('exportCsv') }}" class="btn btn-outline-primary">
      Export Employees via csv
    </a>
    <a href="{{ route('exportXls') }}" class="btn btn-outline-primary">
        Export Employees via excel
      </a>
  </div>
</div>
