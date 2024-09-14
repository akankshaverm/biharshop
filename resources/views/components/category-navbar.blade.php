<div class=" flex flex-1 gap-3 overflow-x-scroll w-full my-5">
    @foreach($categories as $cat)
    <a href="{{route('view.filter',$cat->cat_slug)}}" class=" bg-teal-300 border min-w-48 px-2 py-3
     text-center text-lg flex items-center justify-center rounded-full hover:bg-teal-600 hover:text-white">
        <h2 class=" font-semibold">{{$cat->cat_title}}</h2>
    </a>
    @endforeach
    
</div>