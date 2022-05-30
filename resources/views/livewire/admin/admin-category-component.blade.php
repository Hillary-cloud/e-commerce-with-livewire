<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
   <div class="container" style="padding: 30px 0;">
       <div class="row">
           <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">All Categories</div>
                        <div class="col-md-6">
                            <a href="{{route('admin.addCategory')}}" class="pull-right btn btn-primary">Add Category</a>
                        </div>
                    </div>
                </div>
                    <div class="panel-body">
                        @if (session('message'))
                            <div class="alert alert-success">
                            {{ session('message') }}
                            </div>
                        @endif
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->slug}}</td>
                                <td>
                                    <a href="{{route('admin.editCategory',$category->slug)}}"><i class="fa fa-edit fa-2x"></i></a>
                                    <a href="" wire:click.prevent="deleteCategory({{$category->id}})" onclick="return confirm('You are about to delete this category')" style="margin-left: 10px;"><i class="fa fa-trash fa-2x"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
       </div>
   </div>
</div>
