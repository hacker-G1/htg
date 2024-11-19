@extends('layouts.backend.app')

@section('meta')
    <title>Dashboard | Admin</title>
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- [ breadcrumb ] start -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card border">
                        <div class="card-body">
                            <form action="{{ route('dashboard') }}" method="GET">
                                <div class="row mb-2">
                                    <div class="form-group col-lg-3">
                                        <input type="text" name="company" id="company" placeholder="Company Name"
                                            class="form-control" value="{{ request('company') }}">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <select name="year" class="form-select">
                                            <option value="" selected>Select Year</option>
                                            @for ($i = now()->year; $i >= 2000; $i--)
                                                <option value="{{ $i }}"
                                                    {{ request('year') == $i ? 'selected' : '' }}>{{ $i }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <select name="month" class="form-select">
                                            <option value="" selected>Select Month</option>
                                            @for ($m = 1; $m <= 12; $m++)
                                                <option value="{{ str_pad($m, 2, '0', STR_PAD_LEFT) }}"
                                                    {{ request('month') == str_pad($m, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                                                    {{ DateTime::createFromFormat('!m', $m)->format('F') }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <select name="inputState" class="form-select">
                                            <option value="">Expired/Pending</option>
                                            <option value="Expired"
                                                {{ request('inputState') == 'Expired' ? 'selected' : '' }}>
                                                Expired</option>
                                            <option value="Pending"
                                                {{ request('inputState') == 'Pending' ? 'selected' : '' }}>
                                                Pending</option>
                                        </select>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Search</button>
                                {{-- <button type="reset" class="btn btn-danger" onclick="window.location.href='{{ route('dashboard') }}'">Reset</button> --}}
                                <a href="{{ route('dashboard') }}" class="btn btn-danger">Reset</a>

                                <a href="{{ route('export.contracts', ['inputState' => request('inputState')]) }}"
                                    class="btn btn-success ">Export {{ request('inputState') ?? 'All' }} Contracts</a>&emsp;&emsp;

                                 Total Amount: <strong>{{ number_format($totalAmount, 2) }}</strong>
                                    &emsp;
                                 Total Balance Payment:
                                    <strong>{{ number_format($totalBalance, 2) }}</strong>

                            </form>
                            <table class="table table-bordered dt-responsive nowrap w-100 mt-3">
                                <thead>
                                    <tr>
                                        <th class="col-1">Sr.No.</th>
                                        <th>Company Name</th>
                                        <th>Type</th>
                                        <th>Date</th>
                                        <th>Contact Person</th>
                                        <th>Contact Number</th>
                                        <th>Total Amount</th>
                                        <th>Balance Payment</th>
                                        <th>Images</th>
                                        <th>Download</th>
                                        <th>BDM Name</th>
                                        <th>GST No</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($entries as $key => $entry)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $entry->company }}</td>
                                            <td>{{ $entry->type }}</td>
                                            <td>{{ $entry->date }}</td>
                                            <td>{{ $entry->contact }}</td>
                                            <td>{{ $entry->contactno }}</td>
                                            <td>{{ $entry->totalAmount }}</td>
                                            <td>{{ $entry->balancePayment }}</td>
                                            <td>
                                                @if (!empty($entry->image) && is_array(json_decode($entry->image)))
                                                    @foreach (json_decode($entry->image) as $imagePath)
                                                        <img src="{{ url($imagePath) }}" alt="Image" height="80"
                                                            width="80">
                                                    @endforeach
                                                @else
                                                    <p>No images</p>
                                                @endif

                                            </td>
                                            <td><a href="{{ route('download', $entry->id) }}"
                                                    class="btn btn-primary">Download</a></td>
                                            <td>{{ $entry->bdmname }}</td>
                                            <td>{{ $entry->gst }}</td>
                                            <td class="text-center">
                                                <a href="{{ 'entry/' . $entry->id . '/edit' }}"
                                                    class="btn btn-soft-info btn-sm waves-effect waves-light"><img
                                                        src="{{ asset('assets/icons/edit.svg') }}" alt=""></a>
                                                <a href="{{ 'entry/delete/' . $entry->id }}"
                                                    class="btn btn-soft-danger btn-sm waves-effect waves-light"
                                                    title="Delete Brand"><img src="{{ asset('assets/icons/delete.svg') }}"
                                                        alt=""></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Custom Pagination -->
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-end">
                                    @if ($entries->onFirstPage())
                                        <li class="page-item disabled">
                                            <a class="page-link" tabindex="-1">Previous</a>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $entries->previousPageUrl() }}">Previous</a>
                                        </li>
                                    @endif

                                    @foreach ($entries->links()->elements[0] as $page => $url)
                                        <li class="page-item {{ $entries->currentPage() === $page ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endforeach

                                    @if ($entries->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $entries->nextPageUrl() }}">Next</a>
                                        </li>
                                    @else
                                        <li class="page-item disabled">
                                            <a class="page-link">Next</a>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div> <!-- end col -->

            </div> <!-- end row -->

        </div>
    </div>
    </div>
@endsection
