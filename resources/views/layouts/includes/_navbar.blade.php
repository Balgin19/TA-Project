<nav class="navbar navbar-default navbar-fixed-top">
    <div class="brand">
        <a href="index.html"><img src="{{('/admin/assets/img/logo-dark.png')}}" alt="Klorofil Logo" class="img-responsive logo"></a>
    </div>
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>
        <form class="navbar-form navbar-right" method="GET" action="{{ request()->is('program*') ? route('program') : route('rencaran') }}">
            <div class="input-group">
                <input name="cari" class="form-control" placeholder="Cari">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </span>
            </div>
        </form>
        
        
        <div class="navbar-btn navbar-btn-right">
            
        </div>
       
    </div>
</nav>