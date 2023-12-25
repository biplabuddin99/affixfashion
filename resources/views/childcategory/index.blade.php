@extends('layout.app')
@section('pageTitle',trans('Childcategory List'))
@section('pageSubTitle',trans('List'))

@section('content')

<!-- Bordered table start -->
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                    <!-- table bordered -->
                    <div class="table-responsive">
                        <?php 
                        
                        //print_r($childcategories);
                        ?>
                        <table class="table table-bordered mb-0">
                            <a class="float-end" href="{{route('childcategory.create')}}"style="font-size:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
                            <thead>
                                <tr>
                                    <th scope="col">{{__('#SL')}}</th>
                                    <th scope="col">{{__('Sub Category')}}</th>
                                    <th scope="col">{{__('Child Category')}}</th>
                                    <th class="white-space-nowrap">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($childcategories as $child)
                                <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                    <td>{{$child->sub_category?->name}}</td>
                                    <td>{{$child->name}}</td>
                                    <td class="white-space-nowrap">
                                        <a href="{{route('childcategory.edit',encryptor('encrypt',$child->id))}}">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="javascript:void()" onclick="showConfirmation({{$child->id}})">
                                            <i class="bi bi-trash" style='color:red'></i>
                                        </a>
                                        <form id="form{{$child->id}}" action="{{route('childcategory.destroy',encryptor('encrypt',$child->id))}}" method="post">
                                            @csrf
                                            @method('delete')
                                            
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <th colspan="3" class="text-center">No Pruduct Found</th>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $childcategories->links() }}
                    </div>
                </div>
            </div>
    </div>
</section>
<!-- Bordered table end -->
<script>
    function showConfirmation(subcatId) {
        if (confirm("Are you sure you want to delete Permanent Child-Category?")) {
            $('#form' + subcatId).submit();
        }
    }
</script>


@endsection