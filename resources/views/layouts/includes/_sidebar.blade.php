<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="/" id="dashboard" class="{{ request()->is('/') ? 'active' : '' }}"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                <li><a href="/program" id="program" class="{{ request()->is('program') ? 'active' : '' }}"><i class="lnr lnr-pencil"></i> <span>Program</span></a></li>
                <li><a href="/rencaran" id="rencaran" class="{{ request()->is('rencaran') ? 'active' : '' }}"><i class="lnr lnr-pushpin"></i> <span>Rencana Anggaran</span></a></li>
                
                <li>
                    <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Surat</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPages" class="collapse ">
                        <ul class="nav">
                            <li><a href="page-profile.html" class="">Surat Permintaan Pembayaran</a></li>
                            <li><a href="page-login.html" class="">Surat Perintah Membayar</a></li>
                            <li><a href="page-lockscreen.html" class="">Laporan Penggunaan Dana</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="tables.html" class=""><i class="lnr lnr-dice"></i> <span>Tables</span></a></li>
                <li><a href="typography.html" class=""><i class="lnr lnr-text-format"></i> <span>Typography</span></a></li>
                <li><a href="icons.html" class=""><i class="lnr lnr-linearicons"></i> <span>Icons</span></a></li>
            </ul>
        </nav>
    </div>
</div>

<script>
   document.addEventListener("DOMContentLoaded", function() {
    var sidebarItems = document.querySelectorAll("#sidebar-nav .nav a");
    sidebarItems.forEach(function(item) {
        item.addEventListener("click", function() {
            // Hapus kelas 'active' dari semua elemen sidebarItems
            sidebarItems.forEach(function(item) {
                item.classList.remove("active");
            });

            // Tambahkan kelas 'active' hanya pada elemen yang diklik
            this.classList.add("active");
        });
    });
});

</script>
