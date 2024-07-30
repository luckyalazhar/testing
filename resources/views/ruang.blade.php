@extends('layouts.master')
@section('content')
  <div class="card mt-3">
    <div class="card-header">
      <div class="d-flex align-items-center">
        <div>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            <span><i class="bx bx-plus-circle"></i>Tambah Ruangan</span>
          </button>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="example" class="table table-hover" style="width:100%">
          <thead>
            <tr>
              <th>No.</th>
              <th>Ruangan</th>
              <th>Deskripsi</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($ruang as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_ruang }}</td>
                <td class="text-center">
                  @if ($item->deskripsi)
                    {{ $item->deskripsi }}
                  @else
                    -
                  @endif
                </td>
                <td>
                  <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                    data-bs-target="#edit-{{ $item->id }}">
                    <span><i class="bx bx-edit me-0"></i></span>
                  </button>
                  <form action="{{ route('ruang.destroy', $item->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-danger confirm-delete" data-bs-toggle="tooltip"
                      data-bs-placement="bottom" title="Hapus"> <i class="bx bx-trash me-0"></i>
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  {{-- Create Modal  --}}
  <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createModalLabel">Form Tambah Ruangan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="jQueryValidationForm" action="{{ route('ruang.store') }}" method="POST">
          @csrf
          <div class="modal-body row g-3">
            <div class="col-md-12">
              <label for="nama_ruang" class="form-label">Nama Ruangan</label>
              <input type="text" class="form-control" name="nama_ruang" id="nama_ruang"
                placeholder="Masukkan Nama Ruangan">
            </div>
            <div class="col-md-12">
              <label for="deskripsi" class="form-label">Deskripsi</label>
              <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Masukkan Deskripsi">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  {{-- Create Modal (End)  --}}
  {{-- Edit Modal  --}}
  @foreach ($ruang as $item)
    <div class="modal fade" id="edit-{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Form Edit Ruangan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="jQueryValidationForm" action="{{ route('ruang.update', $item->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="modal-body row g-3">
              <div class="col-md-12">
                <label for="nama_ruang" class="form-label">Nama Ruangan</label>
                <input type="text" class="form-control" name="nama_ruang" id="nama_ruang"
                  value="{{ $item->nama_ruang }}">
              </div>
              <div class="col-md-12">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="{{ $item->deskripsi }}">
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  @endforeach
  {{-- Edit Modal (End)  --}}
@endsection
