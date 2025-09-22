@include('component.header')

@if(session()->has('user'))
<head>
  <style>
    body {
      background-color: #f0f2f5;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
    }

    .table-container {
      background: #ffffff;
      padding: 25px 20px;
      border-radius: 18px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.08);
      max-width: 1100px;
      margin: 40px auto;
      overflow-x: auto;
    }

    table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0;
      border-radius: 12px;
      overflow: hidden;
      font-size: 0.95rem;
      min-width: 750px;
    }

    thead {
      background: linear-gradient(135deg, #667eea, #764ba2);
      color: #fff;
      font-weight: 600;
      text-transform: uppercase;
    }

    th, td {
      padding: 14px 12px;
      text-align: center;
      vertical-align: middle;
    }

    tbody tr {
      transition: all 0.3s ease;
      cursor: default;
    }

    tbody tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    tbody tr:hover {
      background-color: #e0f7fa;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    a.edit-link {
      display: inline-block;
      text-decoration: none;
      color: #fff;
      font-weight: 600;
      padding: 6px 14px;
      border-radius: 8px;
      background: linear-gradient(90deg, #42e695, #3bb2b8);
      transition: all 0.3s;
    }

    a.edit-link:hover {
      background: linear-gradient(90deg, #36c48c, #2a9fbf);
      transform: scale(1.05);
      text-decoration: none;
    }

    p.text-center {
      font-size: 1rem;
      color: #6c757d;
      margin-top: 20px;
    }

    /* ===== Mobile Accordion ===== */
    @media (max-width: 768px) {
      table, thead, tbody, th, td, tr {
        display: block;
      }

      thead {
        display: none; /* hide header on mobile */
      }

      tbody tr {
        margin-bottom: 15px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        padding: 12px;
        background: #fff;
      }

      tbody td {
        text-align: right;
        padding: 10px;
        position: relative;
        border: none;
        display: flex;
        justify-content: space-between;
      }

      tbody td::before {
        content: attr(data-label);
        font-weight: 600;
        text-transform: uppercase;
        flex-basis: 50%;
        text-align: left;
        color: #333;
      }

      a.edit-link {
        width: 100%;
        text-align: center;
        padding: 8px 0;
        margin-top: 8px;
      }
    }
  </style>
</head>

<body>
<div class="table-container mt-4">
    @if(isset($custmerdetails) && count($custmerdetails) > 0)
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Customer Name</th>
            <th>Mobile No</th>
            <th>Address</th>
            <th>Total</th>
            <th>Paid Amount</th>
            <th>Balance Amount</th>
            <th>Detail</th>
          </tr>
        </thead>
        <tbody>
          @foreach($custmerdetails as $custmerdetail)
          <tr>
            <td data-label="Customer Name">{{ $custmerdetail->customer_name }}</td>
            <td data-label="Mobile No">{{ $custmerdetail->mobile_number }}</td>
            <td data-label="Address">{{ $custmerdetail->address }}</td>
            <td data-label="Total">₹{{ number_format($custmerdetail->grand_total,2) }}</td>
            <td data-label="Paid Amount">₹{{ number_format($custmerdetail->paid_amount,2) }}</td>
            <td data-label="Balance Amount">₹{{ number_format($custmerdetail->balance,2) }}</td>
            <td data-label="Detail"><a href="/updateCustomer/{{$custmerdetail->id}}" class="edit-link">See Details</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p class="text-center">No customers found.</p>
    @endif
</div>
</body>

@else
  <script>window.location.href = "{{ route('login') }}";</script>
@endif

@include('component.Footer')
