@extends('header')
@section('main')
<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Transaction List</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Add this line to include CSRF token -->
</head>

<body class="body-clr">
    <div class="container mt-4">
        <h2>Transaction List</h2>
{{-- Search Bar Start --}}
        <form method="POST" action="{{ route('transactions.search') }}">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="search" placeholder="Search by User ID">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        <br>
{{-- Search Bar end --}}
{{-- Transaction Table Start --}}
        <table class="table">
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>User ID</th>
                    <th>Amount</th>
                    <th>Transaction Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                @php
                    $index = ($transactions->currentPage() - 1) * $transactions->perPage() + $loop->iteration;
                @endphp
                <tr>
                    <td>{{ $index }}</td>
                    <td>{{ $transaction->user_id }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->updated_at }}</td>
                    <td>
                        @if ($transaction->status === 'Success')
                            <span class="badge badge-success">{{ $transaction->status }}</span>
                        @elseif ($transaction->status === 'Pending')
                            <span class="badge badge-danger">{{ $transaction->status }}</span>
                        @else
                            <span class="badge bg-info">{{ $transaction->status }}</span>
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-sm btn-info m-2 pay-btn" data-transaction-id="{{ $transaction->id }}">Pay</button>
                        {{-- <button class="btn btn-sm btn-primary m-2 invoice-modal">Invoice</button> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- Table End --}}
    @include('footer');

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.pay-btn').click(function() {
            var transactionId = $(this).data('transaction-id');
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'POST',
                url: '/update-status', 
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {
                    transaction_id: transactionId,
                    status: 'Success'
                },
                success: function(response) {
                    if (response.status === 'success') {
                        alert('Status updated successfully!');
                        location.reload(); 
                    } else {
                        alert('Failed to update status.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX request failed:", error);
                }
            });
        });
    });
    </script>
</body>
</html>
@endsection
