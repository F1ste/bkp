@extends('layouts.authorisation')

@section('title', 'Редактировать услуги')

@section('content')

    <section class="collection section-base" id="collection" data-delete="{{ route('profile.services.delete') }}">
        <div class="container">
            <div class="section-header">
                <h1>Редактировать услуги</h1>
            </div>
            <div class="section-body">
                <div class="collection-group">
                    @foreach($collection as $el)
                        <div class="collection-item" data-id="{{ $el->id }}">
                            <div class="collection-item__image">
                                @php
                                    $images = json_decode($el->images)->images;
                                @endphp
                                @if(count($images) > 0)<img src="{{ $images[0] }}" alt="">@endif
                            </div>
                            <div class="collection-item__group">
                                    <div class="collection-item__tools">
                                        <a href="{{ route('profile.services.single', ['id' => $el->id]) }}" class="collection-item__edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.1807 8.96891L20.4914 6.65815C21.1934 5.95618 21.5444 5.60519 21.732 5.22657C22.089 4.50618 22.089 3.6604 21.732 2.94002C21.5444 2.56139 21.1934 2.21041 20.4914 1.50844C19.7895 0.806468 19.4385 0.455483 19.0599 0.267858C18.3395 -0.0891233 17.4937 -0.0891233 16.7733 0.267858C16.3947 0.455481 16.0437 0.806463 15.3417 1.50842L15.3417 1.50843L15.3417 1.50844L13.0009 3.84925C14.2422 5.97404 16.027 7.74468 18.1807 8.96891ZM11.1285 5.72169L2.28255 14.5676L2.28255 14.5676C1.73531 15.1149 1.4617 15.3885 1.2818 15.7246C1.1019 16.0608 1.02601 16.4402 0.874238 17.1991L0.0819604 21.1605C-0.00368192 21.5887 -0.0465031 21.8028 0.0752979 21.9246C0.197099 22.0464 0.411205 22.0036 0.839416 21.9179L4.80081 21.1256C5.55968 20.9739 5.93912 20.898 6.27527 20.7181C6.61141 20.5382 6.88503 20.2646 7.43226 19.7173L16.3033 10.8463C14.2153 9.53905 12.4491 7.78544 11.1285 5.72169Z" fill="#242527"/>
                                            </svg>
                                        </a>
                                        <a href="#" class="collection-item__delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="22" viewBox="0 0 23 22" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.371094 3.14286C0.371094 1.40711 1.7782 0 3.51395 0H19.8568C21.5926 0 22.9997 1.40711 22.9997 3.14286V18.8571C22.9997 20.5929 21.5926 22 19.8568 22H3.51395C1.7782 22 0.371094 20.5929 0.371094 18.8571V3.14286ZM5.74727 17.1012C5.38398 16.7379 5.38398 16.1488 5.74727 15.7856L10.6707 10.8621L5.74654 5.93788C5.38324 5.57458 5.38324 4.98556 5.74654 4.62227C6.10983 4.25898 6.69885 4.25898 7.06214 4.62227L11.9863 9.54648L16.9106 4.62227C17.2739 4.25898 17.8629 4.25898 18.2262 4.62227C18.5895 4.98556 18.5895 5.57458 18.2262 5.93788L13.302 10.8621L18.2254 15.7856C18.5887 16.1489 18.5887 16.7379 18.2254 17.1012C17.8621 17.4645 17.2731 17.4645 16.9098 17.1012L11.9863 12.1777L7.06288 17.1012C6.69958 17.4645 6.11056 17.4645 5.74727 17.1012Z" fill="#F20519" fill-opacity="0.6"/>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="collection-item__title">{{ $el->name }}</div>
                                    <div class="collection-item__excerpt">{{ Str::limit($el->excerpt, $limit = 60, $end = '...')  }}</div>
                            </div>
                        </div>
                    @endforeach
                    <div class="collection-item collection-item__new">
                        <a href="{{ route('profile.services.new') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 72 72" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M40.8828 5C40.8828 2.23858 38.6442 0 35.8828 0C33.1214 0 30.8828 2.23858 30.8828 5V29.8184H5C2.23857 29.8184 0 32.0569 0 34.8184C0 37.5798 2.23857 39.8184 5 39.8184H30.8828V66.5C30.8828 69.2614 33.1214 71.5 35.8828 71.5C38.6442 71.5 40.8828 69.2614 40.8828 66.5V39.8184H66.5C69.2614 39.8184 71.5 37.5798 71.5 34.8184C71.5 32.0569 69.2614 29.8184 66.5 29.8184H40.8828V5Z" fill="#242527" fill-opacity="0.5"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection




















