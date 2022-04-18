
@extends('layouts.app')

@section('content')
<div class="container-fluid my-2">
  <div class="row m-2">
    <div class="col">
      <h3 class="font-weight-bold">ダッシュボード</h3>
    </div>
    <div class="col text-right">
      <a type="button" href="{{ url('/product/create/') }}" class="btn btn-primary text-right" role="button"><i class="fas fa-plus"></i> 新規追加</a>
    </div>
  </div>

  @if(session('message'))
    <div class="alert alert-success" role="alert">{{ session('message')}}</div>
  @endif

  <table class="table table-bordered">
    <thead class="table-dark">
      <tr>
        <th scope="col">
          id
        </th>
        <th scope="col">
          画像
        </th>
        <th scope="col">
          商品名
        </th>
        <th scope="col">
          詳細
        </th>
        <th scope="col">
          値段
        </th>
        <th scope="col">
          カテゴリー
        </th>
        <th scope="col">
          編集
        </th>
        <th scope="col">
          削除
        </th>
      </tr>
    </thead>
    <tbody>
      @if(count($products) > 0)
      @foreach($products as $key=>$product)
      <tr>
        <th scope="row">
          1
        </th>
        <td style="max-width: 200px;">
          <img src="{{asset('images')}}/{{$product->image}}" class="img-fluid" />
        </td>
        <td>
          {{$product->name}}
        </td>
        <td style="max-width: 300px;">
          {{$product->description}}
        </td>
        <td>
          {{$product->price}} 円
        </td>
        <td>
          {{$product->category->name}}
        </td>
        <td>
          <a href="{{route('product.edit',[$product->id])}}">
            <button type="button" class="btn btn-outline-danger"><i class="far fa-edit"></i> 編集</button>
          </a>
        </td>
        <td>
          <form method="post" action="{{route('product.destroy', $product)}}" class="float-right">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-outline-primary" onClick="return confirm('削除しますか？');"><i class="far fa-edit"></i>削除</button>
          </form> 
        </td>
      </tr>
      @endforeach
      @else
      <tr>
        <td colspan="8">追加された商品情報はありません。</td>
      </tr>
      @endif
    </tbody>
  </table>

  <div class="d-flex">
    <div class="mx-auto">
      {{$products->links("pagination::bootstrap-4")}}
    </div>
  </div>

</div>
@endsection