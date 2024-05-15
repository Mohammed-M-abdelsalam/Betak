    <!-- Navbar Start -->
     <div class="container-fluid nav-bar bg-transparent">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
            <a href="{{route("admin.index")}}" class="navbar-brand d-flex align-items-center text-center">
                <div class="icon p-2 me-2">
                    <img class="img-fluid" src="{{asset("storage/images/logo.png")}}" alt="Icon" style="width: 50px; height: 50px;">
                </div>
                <h1 class="m-0" style="color: #B89F75;">Betak</h1>
            </a>
            <button type="button" class="navbar-toggler ms-auto" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ __("message.add") }}</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a  class="dropdown-item" href="{{Route("admin.properties.create")}}" >{{ __("message.property") }}</a>
                            <a  class="dropdown-item" href="{{Route("admin.categories.create")}}">{{ __("message.category") }}</a>
                            <a  class="dropdown-item" href="{{Route("admin.locations.create")}}">{{ __("message.location") }}</a>
                            <a  class="dropdown-item" href="{{Route("admin.compounds.create")}}">{{ __("message.compound") }}</a>
                            <a  class="dropdown-item" href="{{Route("admin.agents.create")}}">{{ __("message.agent") }}</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ __("message.view") }}</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a  class="dropdown-item" href="{{Route("admin.properties.index")}}" >{{ __("message.property") }}</a>
                            <a  class="dropdown-item" href="{{Route("admin.categories.index")}}">{{ __("message.category") }}</a>
                            <a  class="dropdown-item" href="{{Route("admin.locations.index")}}">{{ __("message.location") }}</a>
                            <a  class="dropdown-item" href="{{Route("admin.compounds.index")}}">{{ __("message.compound") }}</a>
                            <a  class="dropdown-item" href="{{Route("admin.agents.index")}}">{{ __("message.agent") }}</a>
                            <a  class="dropdown-item" href="#">{{ __("message.users") }}</a>
                        </div>
                    </div>
                    <a href="{{route("admin.index")}}" class="nav-item nav-link">{{ __("message.home") }}</a>

                </div>

                <div class="navbar-nav ms-auto">
                    @if (session()->get("lang") == "en" or !session()->has("lang") )
                    <a href="{{Route("local", "ar")}}" class="nav-link">العربية</a>
                    @else
                    <a href="{{Route("local", "en")}}" class="nav-link">en</a>
                    @endif
                </div>

                <div class="navbar-nav ms-auto">
                    <div class="nav-item dropdown  text-dark">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">User</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a  class="dropdown-item" href="{{route("profile.show")}}">Profile</a>
                            <form action="{{route("logout")}}" method="post">
                                @csrf
                                <button class="dropdown-item">logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </nav>
    </div>
     <!-- Navbar End-->
