@include('component.header')
    @if(session()->has('user'))
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #e3f2fd, #ffffff);
        margin: 0;
        padding: 0;
        color: #333;
    }
    .about-container {
        max-width: 1000px;
        margin: 20px auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    h1 {
        text-align: center;
        margin-bottom: 30px;
    }
    p {
        font-size: 1.1rem;
        line-height: 1.7;
    }
</style>
</head>
<body>

<div class="about-container">
    <h1>About Our System</h1>
    <p>
        For over 20 years, our hardware shop has been a cornerstone of the local community — providing reliable tools, materials, and expert advice to customers from all walks of life. As we step into the digital age, we’ve built this Hardware Stock and Billing Management System to honor our legacy while embracing innovation.
    </p>
    <p>
        This system is designed to streamline daily operations, reduce manual errors, and provide real-time insights into inventory and sales. Whether you're tracking bolts or billing for bulk orders, our platform ensures accuracy, speed, and simplicity.
    </p>
    <p>
        Key features include:
        <ul>
            <li> Real-time stock tracking</li>
            <li> GST-compliant billing</li>
            <li> Sales analytics and reporting</li>
            <li> Customer and vendor management</li>
            <li> Secure login and role-based access</li>
        </ul>
    </p>
    <p>
        We built this system not just for efficiency, but to preserve the values that made our shop successful: trust, quality, and service. Thank you for being part of our journey — here's to the next 20 years of growth and innovation.
    </p>
</div>
</body>
</html>
@else
  
<script>window.location.href = "{{ route('login') }}";</script>

@endif
  @include('component.Footer')