
<script src="https://cdn.tailwindcss.com"></script>
<div class="w-full border-b">
    <ul class="w-11/12 m-auto py-5 flex flex-row justify-start items-center" dir="rtl">
    
        <li class="border rounded-md transition-all duraiton-200 text-gray-700 hover:bg-gray-600 hover:text-white ml-5">
            <a href="{{ route('home') }}" class="inline-block px-5 py-2">خانه</a>
        </li>

        <li class="border rounded-md transition-all duraiton-200 text-gray-700 hover:bg-gray-600 hover:text-white ml-5">
            <a href="{{ route('uni.universities') }}" class="inline-block px-5 py-2">لیست دانشگاه ها</a>
        </li>

        <li class="border rounded-md4 transition-all duraiton-200 text-gray-700 hover:bg-gray-600 hover:text-white ml-5">
            <a href="{{ route('college.colleges') }}" class="inline-block px-5 py-2">لیست دانشکده ها</a>
        </li>
    
        <li class="border rounded-md transition-all duraiton-200 text-gray-700 hover:bg-gray-600 hover:text-white ml-5">
            <a href="{{ route('maj.majores') }}" class="inline-block px-5 py-2">لیست رشته ها</a>
        </li>

        <li class="border rounded-md transition-all duraiton-200 text-gray-700 hover:bg-gray-600 hover:text-white ml-5">
            <a href="{{ route('lesson.lessons') }}" class="inline-block px-5 py-2">لیست دروس</a>
        </li>

        <li class="border rounded-md transition-all duraiton-200 text-gray-700 hover:bg-gray-600 hover:text-white ml-5">
            <a href="{{ route('user.users') }}" class="inline-block px-5 py-2">کاربران</a>
        </li>
    
    </ul>
</div>