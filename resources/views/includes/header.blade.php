<form action="{{route('search')}}" method="POST">
    @csrf
    <div class="flex flex-row p-5">
        <div class="w-6/12">
            <input type="text" id="address" name="address" autocomplete="off" class="p-2 w-full bg-gray-200 rounded-md" placeholder="العنوان" />
            <div id="address-list">
                
            </div>
        </div>
        <div class="w-6/12">
            <select name="category" class="p-1 mr-5 bg-gray-200 w-full rounded-md">
                <option value="">حدد الصنف</option>
                @include('includes.category_list')
            </select>
        </div>
        <div class="mr-5">
            <button class="py-2 px-5 bg-gray-500 hover:bg-gray-400 text-white mr-5 rounded-md">بحث</button>
        </div>
    </div>
</form>
<section class="m-auto text-center">
    <div class="category mt-5">
        <ul>
        @foreach($categories as $category)
            <li>
                <a href="/{{$category->slug}}" class="bg-blue-900 hover:bg-gray-400">{{$category->title}}</a>
            </li>
        @endforeach
        </ul> 
    </div>
</section>