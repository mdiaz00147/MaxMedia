<!-- /navbar -->
<div class="subnavbar">
    <div class="subnavbar-inner">
        <div class="container">
            <ul class="mainnav">
                <li class="active"><a href="{{ url('admin/home') }}"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                <li><a href="{{ url('admin/report') }}"><i class="icon-list-alt"></i><span>Reports</span> </a> </li>
                <li><a href="{{ route('admin.payment.index') }}"><i class="icon-money"></i><span>Payments</span> </a></li>
                <li><a href="{{ url('admin/placement') }}"><i class="icon-bar-chart"></i><span>Placements</span> </a> </li>
                <li ><a href="{{ route('admin.referrer.index') }}"><i class="icon-user-md"></i><span>Referrers</span> </a> </li>
                <li class=""> </li>
            </ul>
        </div>

    </div>

</div>