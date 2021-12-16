@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Booking List
                </div>
                <div class="card-body">
                    @include('components.alert')
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>User</th>
                                <th>Camp</th>
                                <th>Price</th>
                                <th>Register Data</th>
                                <th>Paid Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no=1
                            @endphp
                            @forelse ($checkouts as $checkout)
                            <tr>
                                <td>{{ $no++ }}.</td>
                                <td>{{ $checkout->User->name }}</td>
                                <td>{{ $checkout->Camp->title }}</td>
                                <td>{{ 'Rp ' . number_format($checkout->Camp->price, 0, ',', '.') }}</td>
                                <td>{{ $checkout->created_at->format('d F Y') }}</td>
                                <td>
                                    @if ($checkout->payment_status == "paid")
                                    <strong class="text-success">{{ ucwords($checkout->payment_status) }}</strong>
                                    @elseif ($checkout->payment_status == "failed")
                                    <strong class="text-danger">{{ ucwords($checkout->payment_status) }}</strong>
                                    @else
                                    <strong class="text-warning">{{ ucwords($checkout->payment_status) }}</strong>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">No Camp Registered</td>
                            </tr>
                            @endforelse
                        <tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection