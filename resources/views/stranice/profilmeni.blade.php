<div class="well">
            <img src='{{ asset('') }}/{{ $user->slika }}' class='img-responsive img-circle' style='width:100%; margin-bottom:20px;'>
            <a href="{{ url('profil/lozinka') }}" class="btn btn-primary btn-block"><i class="fa fa-user"></i> Promjena lozinke</a>
            <a href="{{ url('profil/projekti') }}" class="btn btn-primary btn-block"><i class="fa fa-tasks"></i> Moji projekti</a>
            <a href="{{ url('profil/clanarina') }}" class="btn btn-primary btn-block"><i class="fa fa-money"></i> Članarina</a>
        </div>
        <div class="well well-social">
            <h3>Social network </h3>
            @if($user->facebook !=='')
                <a href="{{ url($user->facebook) }}">
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
            @endif
            @if($user->twitter !=='')
                <a href="{{ url($user->twitter) }}">
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
            @endif
            @if($user->linkedin !=='')
                <a href="{{ url($user->linkedin) }}">
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
            @endif
        </div>