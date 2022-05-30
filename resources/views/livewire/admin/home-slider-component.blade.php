<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">All Slides</div>
                            <div class="col-md-6" >
                                <a href="{{route('admin.addHomeSlider')}}" class="btn btn-primary pull-right">Add Slide</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (session('message'))
                            <div class="alert alert-success">
                            {{ session('message') }}
                            </div>
                        @endif
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Subtitle</th>
                                    <th>Price</th>
                                    <th>Link</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $slider)
                                    
                                <tr>
                                    <td>{{$slider->id}}</td>
                                    <td><img src="{{asset('assets/images/sliders')}}/{{$slider->image}}" width="120px" alt=""></td>
                                    <td>{{$slider->title}}</td>
                                    <td>{{$slider->subtitle}}</td>
                                    <td>{{$slider->price}}</td>
                                    <td>{{$slider->link}}</td>
                                    <td>{{$slider->status == 1 ? 'Active' : 'Inactive'}}</td>
                                    <td>{{$slider->created_at}}</td>
                                    <td>
                                        <a href="{{route('admin.editHomeSlider',['slide_id'=>$slider->id])}}" class="fa fa-edit fa-2x" style="margin-right: 10px;"></a>
                                        <a href="" wire:click.prevent="deleteSlide({{$slider->id}})" onclick="return confirm('You are about to remove this slide')" class="fa fa-trash-o fa-2x"></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
