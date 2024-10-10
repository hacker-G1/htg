<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('assets/favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>DashBoard</title>
</head>

<body>
    <!--[ Main Header ] start -->
    <header id="page-topbar">
        <nav class="navbar" style="background: #5f7af1">
            <div class="container-fluid">
                <a class="navbar-brand ms-3">
                    <h4 style="color: white">HELP TOGETHER GROUP</h4>
                </a>
            </div>
        </nav>
    </header>

    <div class="add m-3">
        <a href="/addnew" class="btn btn-success">Add New</a>
        {{-- <a href="/sendMail" class="btn btn-warning">Send Email</a>x --}}
    </div>
    <div class="container-fluid">

        <!-- [ breadcrumb ] start -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Details</h4>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card border">
                    <div class="card-body">
                        <form action="{{ route('search.filter') }}" method="GET">
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
                                {{-- <div class="form-group col-lg-3">
                                    <select name="inputState" class="form-select">
                                        <option>Expired/Pending</option>
                                        <option>Expired</option>
                                        <option>Pending</option>
                                    </select>
                                </div> --}}
                                <div class="form-group col-lg-3">
                                    <select name="inputState" class="form-select">
                                        <option value="">Expired/Pending</option>
                                        <option value="Expired"
                                            {{ request('inputState') == 'Expired' ? 'selected' : '' }}>Expired</option>
                                        <option value="Pending"
                                            {{ request('inputState') == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Search</button>
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
                                    <th>Balance Amount</th>
                                    <th>Balance Payment</th>
                                    <th>Images</th>
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
                                        <td>{{ $entry->totalamount }}</td>
                                        <td></td>
                                        <td>
                                            @if (!empty($entry->image) && is_array(json_decode($entry->image)))
                                                @foreach (json_decode($entry->image) as $imagePath)
                                                    <img src="{{ asset($imagePath) }}" alt="Image" height="80"
                                                        width="80">
                                                @endforeach
                                            @else
                                                <p>No images</p>
                                            @endif

                                        </td>
                                        <td>{{ $entry->bdmname }}</td>
                                        <td>{{ $entry->gst }}</td>
                                        <td class="text-center">
                                            <a href="{{ 'entry/' . $entry->id . '/edit' }}"
                                                class="btn btn-soft-info btn-sm waves-effect waves-light"><img
                                                    src="{{ asset('assets/icons/edit.svg') }}" alt=""></a>
                                            <a href="{{ 'entry/delete/' . $entry->id }}"
                                                class="btn btn-soft-danger btn-sm waves-effect waves-light sa-delete"
                                                title="Delete Brand"><img src="{{ asset('assets/icons/delete.svg') }}"
                                                    alt=""></a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->

        </div> <!-- end row -->

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
