
<li class="menu-header">MAIN MENU</li>
<li class="nav-item {{request()->is('karyawan/laundry_member')? 'active' : ''}}">
    <a href="{{url('karyawan/laundry_member')}}"><span>Laundry Member</span></a>
</li>
<li class="nav-item {{request()->is('karyawan/laundry_non_member')? 'active' : ''}}">
    <a href="{{url('karyawan/laundry_non_member')}}"><span>Laundry Non-Member</span></a>
</li>
