<!-- Button trigger modal -->

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$category->id}}">
    <i class="far fa-trash-alt">削除</i>
</button> 
                            
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('category.destroy', [ 'category' => $category->id ]) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">カテゴリー変更</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    本当に削除しますか？
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                    <button type="submit" class="btn btn-primary">削除</button>
                </div>
            </div>
        </form>
    </div>
</div>



<form action="{{route('category.destroy', $category->id )}}" method="POST" class="float-right">
     @csrf
     @method('DELETE')
     <input type="button" value="削除" class="btn btn-outline-primary" onclick='return confirm("削除しますか？");'>
 </form>


 {{ Form::open(['method' => 'delete', 'route' => ['shop.destory', $shop->id]]) }}
            {{ Form::submit('削除')}}
        {{ Form::close() }}