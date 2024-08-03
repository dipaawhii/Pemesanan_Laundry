
<li class="menu-header">MAIN MENU</li>
<li class="nav-item {{request()->is('administrator/pengguna')? 'active' : ''}}">
    <a href="{{url('administrator/pengguna')}}"><span>Users</span></a>
</li>
<li class="nav-item {{request()->is('administrator/pegawai')? 'active' : ''}}">
    <a href="{{url('administrator/pegawai')}}"><span>Pegawai</span></a>
</li>
<li class="nav-item {{request()->is('administrator/member')? 'active' : ''}}">
    <a href="{{url('administrator/member')}}"><span>Member</span></a>
</li>
<li class="nav-item {{request()->is('administrator/pembelian')? 'active' : ''}}">
    <a href="{{url('administrator/pembelian')}}"><span>Pembelian</span></a>
</li>
<li class="nav-item {{request()->is('administrator/laundry_member')? 'active' : ''}}">
    <a href="{{url('administrator/laundry_member')}}"><span>Laundry Member</span></a>
</li>
<li class="nav-item {{request()->is('administrator/laundry_non_member')? 'active' : ''}}">
    <a href="{{url('administrator/laundry_non_member')}}"><span>Laundry Non-Member</span></a>
</li>
<li class="nav-item {{request()->is('administrator/barang')? 'active' : ''}}">
    <a href="{{url('administrator/barang')}}"><span>Barang</span></a>
</li>
