@extends('layout.app')
@section('pageTitle',trans('Shipping Charge List'))
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
                            <a class="float-end" href="{{route(currentUser().'.shippingcharge.create')}}"style="font-shippingcharge:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
                            <thead>
                                <tr>
                                    <th scope="col">{{__('#SL')}}</th>
                                    <th scope="col">{{__('Name')}}</th>
                                    <th scope="col">{{__('Charge')}}</th>
                                    <th class="white-space-nowrap">{{__('ACTION')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($shippingcharge as $b)
                                <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                    <td>{{$b->location}}</td>
                                    <td>{{$b->charge}}</td>
                                    <td class="white-space-nowrap">
                                        <a href="{{route(currentUser().'.shippingcharge.edit',encryptor('encrypt',$b->id))}}">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="javascript:void()" onclick="showConfirmation({{$b->id}})">
                                            <i class="bi bi-trash" style='color:red'></i>
                                        </a>
                                        <form id="form{{$b->id}}" action="{{route(currentUser().'.shippingcharge.destroy',encryptor('encrypt',$b->id))}}" method="post">
                                            @csrf
                                            @method('delete')
                                            
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <th colspan="4" class="text-center">No Shipping Data Found</th>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{-- {{ $shippingcharge->links() }} --}}
                    </div>
                </div>
            </div>
    </div>
</section>
<!-- Bordered table end -->

<script>
    function showConfirmation(catId) {
        if (confirm("Are you sure you want to delete Permanent shippingcharge?")) {
            $('#form' + catId).submit();
        }
    }
</script>


@endsection