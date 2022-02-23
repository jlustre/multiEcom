
<div class="card">
    <div class="card-header d-flex justify-content-between bg-secondary">
        <h5>{{ __('MENUS TREE') }}</h5>
    </div>
    <div class="card-body">
        @forelse($tree as $treeitem)
            {{-- level1 --}}
            <ul>
                <li>{{ $treeitem['category_name'] }}
                    @if(isset($treeitem['children']))
                        {{-- level2 --}}
                        <ul>
                            @foreach($treeitem['children'] as $child)
                                <li>{{ $child['category_name'] }}
                                    @if(isset($child['children']))
                                        {{-- level3 --}}
                                        <ul>
                                            @foreach($child['children'] as $gchild)
                                                <li>{{ $gchild['category_name'] }}
                                                    @if(isset($gchild['children']))
                                                        {{-- level4 --}}
                                                        <ul>
                                                            @foreach($gchild['children'] as $ggchild)
                                                                <li>{{ $ggchild['category_name'] }}
                                                                    @if(isset($ggchild['children']))
                                                                        {{-- level5 --}}
                                                                        <ul>
                                                                            @foreach($ggchild['children'] as $gggchild)
                                                                                <li>{{ $gggchild['category_name'] }}
                                                                                    @if(isset($gggchild['children']))
                                                                                        {{-- level6 --}}
                                                                                        <ul>
                                                                                            @foreach($gggchild['children'] as $ggggchild)
                                                                                                <li>{{ $ggggchild['category_name'] }}
                                                                                                    @if(isset($ggggchild['children']))
                                                                                                        {{-- level7 --}}
                                                                                                        <ul>
                                                                                                            @foreach($ggggchild['children'] as $gggggchild)
                                                                                                                <li>{{ $gggggchild['category_name'] }}
                                                                                                                
                                                                                                                </li>
                                                                                                            @endforeach
                                                                                                        </ul>
                                                                                                        {{-- level7 --}}
                                                                                                    @endif
                                                                                                </li>
                                                                                            @endforeach
                                                                                        </ul>
                                                                                        {{-- level6 --}}
                                                                                    @endif
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                        {{-- level5 --}}
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                        {{-- level4 --}}
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                        {{-- level3 --}}
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                        {{-- level2 --}}
                    @endif
                </li>
            </ul>
            {{-- level1 --}}
        @empty
            <p>No Category Available</p>
        @endforelse
       
    </div> <!--  card-body -->
</div> <!--  card -->