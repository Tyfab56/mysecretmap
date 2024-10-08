@extends('frontend.main_master')

@section('content')

<div class="container">
    <h2>Shopifysales List</h2>
    <a href="{{ route('admin.shopifysales') }}" class="btn btn-primary mb-3">Add New Sale</a>
    @if($shopifysales->isEmpty())
        <p>No sales recorded yet!</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Price</th>
                    <th>Currency</th>
                    <th>Status</th>
                    <th>Product ID</th>
                    <th>Created At</th>
                    <th>Install</th>
                    <th>Actions</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($shopifysales as $sale)
                    <tr>
                        <td>{{ $sale->id }}</td>
                        <td>{{ $sale->email }}</td>
                        <td>{{ $sale->price }}</td>
                        <td>{{ $sale->currency }}</td>
                        <td>{{ $sale->status }}</td>
                        <td>{{ $sale->idproduit }}</td>
                        <td>{{ $sale->created_at }}</td>
                        <td>{{ $sale->installation }}</td>
                        <td>
                            <form action="{{ route('shopifysales.reset', $sale->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm">Reset Installations</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $shopifysales->links() }}
    @endif
</div>

@endsection
