@extends('layouts.base-all')

@section('content')



<section id="annonce-main">
    <div class="annonce-bg py-5">
        <div class="container py-5">
            <div class="row">

                <div class="col-md-8 annonce-content">
                    <div class="container" style="display: flex;  margin-bottom:10px;">
                        <a href="/offres/{{$offre->id}}/edit" class="btn btn-secondary"
                            style=" margin-right:5px;">Editer</a>
                        <form method="POST" action="/offres/{{$offre->id}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>

                    <div class="annonce-post">
                        <h2>{{ $offre->nomOffre }}</h2>
                        <p class="annonce-post-time">{{ $offre->created_at->diffForHumans() }}</p>

                        <p class="annonce-post-desc">{!! nl2br(e($offre->descriptionOffre)) !!}</p>
                        <hr>
                        <div class="annonce-post-details">
                            <h3>Plus d'information</h3>
                            <ul>
                                <li><i class="fa fa-calendar-times-o"></i>{{$offre->dureeOffre}}</li>
                                <li><i
                                        class="fa fa-home"></i>{{ $offre->teleTravailOffre ? 'Télétravail possible' : '' }}
                                </li>
                                <li><i class="fa fa-star"></i>Compétences requises:<br>
                                    @foreach ($offre->competences as $competence)
                                    <a class="competences-check" href="/search/{{$competence->nom}}">
                                        <i class="fa fa-check-square-o"></i>{{$competence->nom}}
                                    </a>
                                    @endforeach.</li>
                            </ul>
                        </div>

                    </div>
                </div>

                <aside class="col-md-4 annonce-sidebar">
                    <div class="p-3 mb-3 bg-light rounded">
                        <h5>{{$offre->entreprise->nomEntreprise}}</h5>
                        <p>Statut :
                            {{$offre->entreprise->typeEntreprise }}<br>
                            Adresse : {{$offre->entreprise->rueEntreprise}}
                        </p>
                    </div>

                    <div class="p-3 mb-3 bg-light rounded">
                        <h4>Postuler</h4>
                        <ul>
                            <li><i class="fa fa-envelope"></i>E-mail :<a
                                    href="mailto:{{$offre->entreprise->mailEntreprise}}">
                                    {{$offre->entreprise->mailEntreprise}}</a></li>
                            <li><i class="fa fa-user"></i>Nom du contact : {{$offre->entreprise->nomTuteurEntreprise}}
                            </li>
                            <li><i class="fa fa-phone"></i>Téléphone : {{$offre->entreprise->telEntreprise}}</li>
                            <li><i class="fa fa-map-marker"></i>Adresse : {{$offre->entreprise->rueEntreprise}}</li>
                        </ul>
                    </div>
                </aside><!-- /.annonce-sidebar -->
            </div><!-- /.row -->
        </div>
    </div>
</section>
@endsection