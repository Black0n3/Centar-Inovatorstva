<div class="well">
    <h3>Zadnji projekti</h3>
    @if (count($zadnji_projekti))
        <ul class='lista'>
            @foreach($zadnji_projekti as $zadnji_projekt)
                <li>
                    <a href="{{ url('projekti/'. $zadnji_projekt->id .'/'. str_slug($zadnji_projekt->naziv)) }}">
                        <i class='fa fa-ellipsis-v'></i> {{ $zadnji_projekt->naziv }}
                    </a>
                    
                </li>
            @endforeach
        </ul>
    @else
        
        <div class="alert alert1">
            Trenutno nema projekata
        </div>
    @endif
</div>

<div class="well">
    <h3>Galerija</h3>
    @if (count($zadnje_galerije))
    
        <ul  class='lista'>
            @foreach($zadnje_galerije as $zadnja_galerija)
                @if(count($zadnja_galerija->slike))
                    <li>
                        <a href="{{ url('galerija/'. $zadnja_galerija->id .'/'. str_slug($zadnja_galerija->naziv)) }}">
                           <i class='fa fa-ellipsis-v'></i> {{ $zadnja_galerija->naziv }}
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    @else
        
        <div class="alert alert1">
            Trenutno nema slika u galeriji
        </div>
    @endif
</div>

<div class="well">
    <h3>Facebook</h3>
    <div class="fb-page" data-href="https://www.facebook.com/SjediIUzivaj/?fref=ts" data-small-header="false" data-height="500" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/SjediIUzivaj/?fref=ts"><a href="https://www.facebook.com/SjediIUzivaj/?fref=ts">Sjedi i uživaj</a></blockquote></div></div>
</div>