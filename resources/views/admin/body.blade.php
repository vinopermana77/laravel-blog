<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard</h2>
        </div>
    </div>
    <section class="no-padding-bottom">
        <div class="container-fluid">
            <div class="row">
                @foreach ($users as $user)
                <div class="col-lg-4">
                    <div class="user-block block text-center">
                        <div class="avatar"><img src="adminpanel/img/avatar-1.jpg" alt="..." class="img-fluid">
                            <div class="order dashbg-2">1st</div>
                        </div>
                        <a href="#" class="user-title">
                            <h3 class="h5">{{ $user->name }}</h3><span>{{ $user->email }}</span>
                        </a>
                        <div class="contributions">{{ $posts->count() }} Postingan</div>
                        <div class="details d-flex">
                            <div class="item"><i class="icon-info"></i><strong>150</strong></div>
                            <div class="item"><i class="fa fa-gg"></i><strong>340</strong></div>
                            <div class="item"><i class="icon-flow-branch"></i><strong>460</strong></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>