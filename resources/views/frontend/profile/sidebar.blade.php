<div class='sidenav col-3' id='navBar'>
    <div class='list-group'>
        <a href="{{route('frontend.dashboard')}}" class='list-group-item active list-group-item-action'>
            Dashboard</a>
        <a href="{{route('order.list')}}" class='list-group-item list-group-item-action'>
             Test Report</a>
        <a href="{{route('user.appointment.report')}}" class='list-group-item list-group-item-action'>
           Appointment List</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class='list-group-item list-group-item-action'>Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>
