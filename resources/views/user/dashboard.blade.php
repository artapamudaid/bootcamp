@extends('layouts.app')

@section('content')



<section class="dashboard my-5">
    <div class="container">
        <div class="row text-left">
            <div class=" col-lg-12 col-12 header-wrap mt-4">
                <p class="story">
                    DASHBOARD
                </p>
                <h2 class="primary-header ">
                    My Bootcamps
                </h2>
            </div>
        </div>
        <div class="row my-5">
            @include('components.alert')
            <table class="table">
                <tbody>
                    @php
                    $no = 1
                    @endphp
                    @forelse ($checkouts as $checkout)
                    <tr class="align-middle">
                        <td>{{ $no++ }}.</td>
                        <td width="18%">
                            <img src="{{ asset('assets/images/item_bootcamp.png') }}" height="120" alt="">
                        </td>
                        <td>
                            <p class="mb-2">
                                <strong>{{ $checkout->Camp->title }}</strong>
                            </p>
                            <p>
                                {{ $checkout->created_at->format('d F Y') }}
                            </p>
                        </td>
                        <td>
                            <strong>Rp {{ number_format($checkout->Camp->price, 0, ',', '.') }}</strong>
                        </td>
                        <td>
                            @if ($checkout->payment_status == "paid")
                            <strong class="text-success">{{ ucwords($checkout->payment_status) }}</strong>
                            @elseif ($checkout->payment_status == "failed")
                            <strong class="text-danger">{{ ucwords($checkout->payment_status) }}</strong>
                            @else
                            <strong class="text-warning">{{ ucwords($checkout->payment_status) }}</strong>
                            @endif
                        </td>
                        <td>
                            @if ($checkout->payment_status == 'waiting')
                            <a href="{{ $checkout->midtrans_url }}" class="btn btn-primary" target="_blank">
                                Pay Here
                            </a>
                            @else
                            <strong>No Action</strong>
                            @endif
                        </td>
                        <td>
                            <a href="https://wa.me/6283851378225?text=Hi, saya ingin bertanya tentang kelas {{ $checkout->Camp->title }}"
                                class="btn btn-primary" target="_blank">
                                Ask Admin
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">
                            <h3>No Camp Registered</h3>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection