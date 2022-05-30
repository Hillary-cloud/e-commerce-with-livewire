<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">Edit Category</div>
                                <div class="col-md-6">
                                    <a href="{{route('admin.categories')}}" class="pull-right btn btn-primary">All Categories</a>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            @if (session('message'))
                                <div class="alert alert-success">
                                {{ session('message') }}
                                </div>
                            @endif
                            <form class="form-horizontal" wire:submit.prevent="updateCategory()">
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Category Name</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Category Name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug()"/>
                                        @error('name')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Category Slug</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Category slug" class="form-control input-md" wire:model="slug"/>
                                        @error('slug')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label"></label>
                                    <div class="col-md-4">
                                        <input type="submit" value="Update" class="form-control btn btn-primary" />
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
