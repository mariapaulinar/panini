@foreach(array_chunk($sheets->getCollection()->all(), 2) as $row)
    <div class="row">
       @foreach($row as $sheet)
            <article class="col-md-4">
                <img src="{{ $sheet->image }}" alt="{{ $sheet->content }}" style="width: 50%; height: 50%;">

                <div class="body">
                    {{ $sheet->content }}
                </div>
                <a class="btn btn-default btn-xs" href="{{ URL::to('/sheets/edit', $sheet->id) }}"><span class="glyphicon glyphicon-pencil"></span></a><a class="btn btn-default btn-xs" href="{{ URL::to('/sheets/remove', $sheet->id) }}"><span class="glyphicon glyphicon-trash"></span></a>
            </article>
       @endforeach
    </div>
@endforeach

{{ $sheets->appends(Request::except('page'))->links() }}
