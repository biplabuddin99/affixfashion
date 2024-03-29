@extends('layout.app')

@section('pageTitle',trans('Category List'))
@section('pageSubTitle',trans('List'))

@section('content')


    <!-- Bordered table start -->
    <section class="section">
        <div class="row" id="table-bordered">
            <div class="col-12">
                <div class="card">
                        <!-- table bordered -->
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                            <a class="float-end" href="{{route('category.create')}}"style="font-size:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
                                <thead>
                                    <tr>
                                        <th scope="col">{{__('#SL')}}</th>
                                        <th scope="col">{{__('Name')}}</th>
                                        <th scope="col">{{__('Image')}}</th>
                                        <th class="white-space-nowrap">{{__('ACTION')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($categories as $cat)
                                    <tr>
                                    <th scope="row">{{ ++$loop->index }}</th>
                                        <td>{{$cat->category}} ({{$cat->products->count()}})</td>
                                        <td><img width="80px" height="40px" class="float-first" src="{{asset('images/category/'.company()['company_id'].'/'.$cat->image)}}" alt=""></td>
                                        <td class="white-space-nowrap">
                                            <a href="{{route('category.edit',encryptor('encrypt',$cat->id))}}">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="javascript:void()" onclick="showConfirmation({{$cat->id}})">
                                                <i class="bi bi-trash" style='color:red'></i>
                                            </a>
                                            <form id="form{{$cat->id}}" action="{{route('category.destroy',encryptor('encrypt',$cat->id))}}" method="post">
                                                @csrf
                                                @method('delete')
                                                
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <th colspan="4" class="text-center">No Category Found</th>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            
        </div>
    </section>
    <!-- Bordered table end -->
</div>
<script>
    function showConfirmation(catId) {
        if (confirm("Are you sure you want to delete Permanent Category?")) {
            $('#form' + catId).submit();
        }
    }
</script>

@endsection

