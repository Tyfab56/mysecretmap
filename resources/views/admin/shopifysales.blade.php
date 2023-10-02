@extends('frontend.main_master')
@section('content') 
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h4>Add New Sale</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.shopifysales.store') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" name="price" id="price" class="form-control" placeholder="Price" required>
                        </div>

                        <div class="form-group">
                            <label for="currency">Currency</label>
                            <input type="text" name="currency" id="currency" class="form-control" placeholder="Currency" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" name="status" id="status" class="form-control" placeholder="Status" required>
                        </div>

                        <div class="form-group">
                            <label for="idproduit">Product ID</label>
                            <input type="text" name="idproduit" id="idproduit" class="form-control" placeholder="Product ID" required>
                        </div>

                        <!-- Add other fields if necessary -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection