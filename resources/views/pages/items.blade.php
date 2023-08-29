@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                @foreach($items as $key=>$item)
                <div class="col-xs-12 col-sm-3">
                    <div class="card ">
                        <a class="img-card" href="{{$item->link }}">
                            <span class="license-type-badge">{{$item->license->name}}</span>
                            <span class="name-type-badge">{{$item->name}}</span>
                             @if(!$item->thumbnails->isEmpty())
                                <img src="data:image/png;base64,{{Cache::get($item->thumbnails[0]->images[0]->image)}}" style="height:100%"/>
                             @else
                                <img src="https://placehold.co/234x344" style="height:100%"/>
                             @endif
                        </a>
                        <div class="card-read-more">
                            <div class="accordion" >
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo{{$item->id}}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo{{$item->id}}" aria-expanded="false" aria-controls="collapseTwo">
                                            {{$item->name}} Details
                                        </button>
                                    </h2>
                                    <div id="collapseTwo{{$item->id}}" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body align-baseline ">

                                                <div>
                                                    @foreach($item->aliases as $alias)
                                                        <span class="badge bg-danger text-dark ">{{$alias->name}}</span>,
                                                    @endforeach
                                                </div>
                                                <hr>
                                                <div>
                                                        @if($item->attribute->hairColor && $item->attribute->hairColor!='')
                                                        <span class="badge bg-warning text-dark ">{{$item->attribute->hairColor}} Hair </span>,
                                                        @endif
                                                        @if($item->attribute->ethnicity && $item->attribute->ethnicity!='')
                                                            <span class="badge bg-warning text-dark ">{{$item->attribute->ethnicity}} Skin </span>,
                                                        @endif
                                                        @if($item->attribute->tattos && $item->attribute->tattos!=''&& $item->attribute->tattos==1)
                                                            <span class="badge bg-warning text-dark "> Tatoos </span>,
                                                        @endif
                                                        @if($item->attribute->piercings && $item->attribute->piercings!=''&& $item->attribute->piercings==1)
                                                            <span class="badge bg-warning text-dark "> Piercings </span>,
                                                        @endif
                                                        @if($item->attribute->breastSize && $item->attribute->breastSize!='')
                                                            <span class="badge bg-warning text-dark "> Breast Size {{$item->attribute->breastSize}}</span>,
                                                        @endif
                                                        @if($item->attribute->breastType && $item->attribute->breastType!='')
                                                            <span class="badge bg-warning text-dark "> Breast Type {{$item->attribute->breastType}}</span>,
                                                        @endif
                                                        @if($item->attribute->gender && $item->attribute->gender!='')
                                                            <span class="badge bg-warning text-dark ">{{$item->attribute->gender}} </span>,
                                                        @endif
                                                        @if($item->attribute->orientation && $item->attribute->orientation!='')
                                                            <span class="badge bg-warning text-dark ">{{$item->attribute->orientation}} </span>,
                                                        @endif
                                                        @if($item->attribute->age && $item->attribute->age!='')
                                                            <span class="badge bg-warning text-dark ">Age {{$item->attribute->age}} </span>,
                                                        @endif
                                                </div>
                                                <hr>
                                                <div>
                                                    <table class="bg-black text-center">
                                                        @foreach($stats_colomns as $stcol)
                                                        <tr class="">
                                                            <td class="text-danger">
                                                                {{$stcol}}
                                                            </td>
                                                            <td class="text-white">
                                                                {{$item->attribute->stats[$stcol]}}
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                    {{ $items->links() }}
            </div>
        </div>
    </div>

    <script>
        (function() {
            var elements = document.getElementsByClassName("json");
            for (const element of elements) {
                var obj = JSON.parse(element.innerText);
                element.innerHTML = JSON.stringify(obj, undefined, 2);
            }
        })();
    </script>
@stop
