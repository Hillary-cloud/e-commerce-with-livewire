<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">Edit Slide</div>
                            <div class="col-md-6">
                                <a href="{{route('admin.homeSlider')}}" class="pull-right btn btn-primary">All Slides</a>
                            </div>
                        </div>
                        </div>
                        <div class="panel-body">
                            @if (session('message'))
                                <div class="alert alert-success">
                                {{ session('message') }}
                                </div>
                            @endif
                            <form class="form-horizontal" wire:submit.prevent="updateSlide()" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Title</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Title" class="form-control input-md" wire:model="title" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Subtitle</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Subtitle" class="form-control input-md" wire:model="subtitle" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Price</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="price" class="form-control input-md" wire:model="price" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Link</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Link" class="form-control input-md" wire:model="link" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Image</label>
                                    <div class="col-md-4">
                                        <input type="file" class="form-control input-file" wire:model="new_image" />
                                        @if ($new_image)
                                            <img src="{{$new_image->temporaryUrl()}}" width="120px"/>
                                        @else
                                            <img src="{{asset('assets/images/sliders')}}/{{$image}}" width="120px"/>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Status</label>
                                    <div class="col-md-4">
                                        <select name="" class="form-control" id="" wire:model="status">
                                            <option value="0">Inactive</option>
                                            <option value="1">Active</option>
                                        </select>
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
