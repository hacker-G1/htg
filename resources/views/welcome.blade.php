<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('assets/favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Add New</title>
</head>

<body>
    <div class="add m-3">
        <a href="/index" class="btn btn-primary">Back</a>
    </div>
    <div class="row g-1">
        <div class="card col-lg-5 mt-2">
            <div class="form-section mx-3 my-2">
                <form action="{{ route('addnew.store') }}" method="POST" enctype="multipart/form-data"
                    class="needs-validation row g-3" novalidate>
                    @csrf
                    <div class="card col-lg-6 ms-2 mt-2 p-3">
                        <div class="row">
                            <div class="col-3">
                                <h5>Product</h5>
                            </div>
                            <div class="col-3">
                                <h5>Validity</h5>
                            </div>
                            <div class="col-3">
                                <h5>Total Amount</h5>
                            </div>
                            <div class="col-3">
                                <h5>Balance Amount</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label>
                                    <input type="checkbox" id="checkbox1" name="products[0][name]"
                                        value="Local Keyword SEO" class="toggle-fields"> Local Keyword SEO
                                </label>
                            </div>
                            <div id="fields1" class="fields col-9" style="display: none;">
                                <select name="products[0][validity]">
                                    <option value="">Select Validity</option>
                                    <option value="1 Month">1 Month</option>
                                    <option value="3 Months">3 Months</option>
                                    <option value="4 Months">4 Months</option>
                                    <option value="6 Months">6 Months</option>
                                    <option value="12 Months">12 Months</option>
                                </select>
                                <input type="text" name="products[0][total_amount]" placeholder="total_amount">
                                <input type="text" name="products[0][paid_amount]" placeholder="paid_amount">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-3">
                                <label>
                                    <input type="checkbox" id="checkbox2" name="products[1][name]" value="Virtual Tour"
                                        class="toggle-fields"> Virtual Tour
                                </label>
                            </div>
                            <div id="fields2" class="fields col-9" style="display: none;">
                                <select name="products[1][validity]">
                                    <option value="">Select Validity</option>
                                    <option value="1 Month">1 Month</option>
                                    <option value="3 Months">3 Months</option>
                                    <option value="4 Months">4 Months</option>
                                    <option value="6 Months">6 Months</option>
                                    <option value="12 Months">12 Months</option>
                                </select>
                                <input type="text" name="products[1][total_amount]" placeholder="total_amount">
                                <input type="text" name="products[1][paid_amount]" placeholder="paid_amount">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-3">
                                <label>
                                    <input type="checkbox" id="checkbox3" name="products[2][name]"
                                        value="Google Business Profile Management" class="toggle-fields"> Google
                                    Business Profile
                                    Management
                                </label>
                            </div>
                            <div id="fields3" class="fields col-9" style="display: none;">
                                <select name="products[2][validity]">
                                    <option value="">Select Validity</option>
                                    <option value="1 Month">1 Month</option>
                                    <option value="3 Months">3 Months</option>
                                    <option value="4 Months">4 Months</option>
                                    <option value="6 Months">6 Months</option>
                                    <option value="12 Months">12 Months</option>
                                </select>
                                <input type="text" name="products[2][total_amount]" placeholder="total_amount">
                                <input type="text" name="products[2][paid_amount]" placeholder="paid_amount">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-3">
                                <label>
                                    <input type="checkbox" id="checkbox4" name="products[3][name]"
                                        value="Zonal Keyword SEO" class="toggle-fields"> Zonal Keyword SEO
                                </label>
                            </div>
                            <div id="fields4" class="fields col-9" style="display: none;">
                                <select name="products[3][validity]">
                                    <option value="">Select Validity</option>
                                    <option value="1 Month">1 Month</option>
                                    <option value="3 Months">3 Months</option>
                                    <option value="4 Months">4 Months</option>
                                    <option value="6 Months">6 Months</option>
                                    <option value="12 Months">12 Months</option>
                                </select>
                                <input type="text" name="products[3][total_amount]" placeholder="total_amount">
                                <input type="text" name="products[3][paid_amount]" placeholder="paid_amount">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card action-btn text-center">
                            <div class="card-body p-2">
                                <button type="reset" class="btn btn-warning waves-effect waves-light">Clear
                                    Form</button>
                                <button type="submit" class="btn btn-success m-0">Submit Form</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
            </script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <script>
                $(document).ready(function() {
                    $('.toggle-fields').change(function() {
                        var checkboxId = this.id.replace('checkbox', '');
                        $('#fields' + checkboxId).toggle(this.checked);
                    });
                });
            </script>
            <script>
                document.querySelectorAll('.checkbox-value').forEach(checkbox => {
                    checkbox.addEventListener('change',
                        updateSum);
                });

                function updateSum() {
                    let total = 0;
                    document.querySelectorAll('.checkbox-value:checked').forEach(checkedBox => {
                        total += parseInt(checkedBox.value);
                    });
                    document.getElementById('total-sum').value = total;
                }
            </script>


</body>

</html>
