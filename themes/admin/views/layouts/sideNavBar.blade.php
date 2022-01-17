<div class="drawer_container">

    <div class="navigation">
        <ul>
            <li>
                <a href="{{route('admin.home')}}">
                    <span class="icon" title="Dashboard">
                        <i class="fas fa-home"></i>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li>
                <a class="" href="#" data-toggle="collapse" data-target="#target1">
                    <span class="icon" title="Manage">
                        <i class="fas fa-users-cog"></i>
                    </span>
                    <span class="title">Manage</span>
                    <div id="target1" class="collapse" style="margin-left: 46px;">
                        <a href="{{route('admin.manage_users')}}">
                            <i class="fas fa-users" style="margin-right: 8px; margin-top:3px;">
                            </i>
                            Clients
                        </a>
                        <a href="{{route('admin.manage_vehicle_type')}}" class="mt-3">
                            <i class="fas fa-cogs" style="margin-right: 8px; margin-top:3px;">
                            </i>
                            Vehicles Type
                        </a>
                        <a href="{{route('admin.manage_localities')}}" class="mt-3">
                            <i class="fas fa-map-marked-alt" style="margin-right: 8px; margin-top:3px;">
                            </i>
                            Localities
                        </a>
                        <a href="{{route('admin.manage_vehicles')}}" class="mt-3"><i class="fas fa-car" style="margin-right: 8px; margin-top:3px;">
                            </i>
                            Vehicles
                        </a>
                        <a href="{{route('admin.manageExternalAdmins')}}" class="mt-3">
                            <i class="fas fa-user-lock" style="margin-right: 8px; margin-top:3px;">
                            </i>
                            External Admins
                        </a>
                    </div>
            </li>
            <li>
                <a href="#">
                    <span class="icon" title="Consult Reservations">
                        <i class="fas fa-eye"></i>
                    </span>
                    <span class="title">Consult Reservations</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon" title="Logout">
                        <i class="fas fa-sign-out-alt"></i>
                    </span>

                    <span class="title">Logout</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon" title="Copyright">

                        <i class="fas fa-copyright"></i>
                    </span>

                    <span class="title">copyright</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="toggle" onclick="this.classList.toggle('active');
const navigation = document.querySelector('.navigation');
navigation.classList.toggle('active');
">
    </div>
</div>