<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>درس</title>
</head>
<body>
    @include('header')

    <h1 class="text-center text-3xl font-bold text-gray-700 my-10">درس {{ $lesson->name }}</h1>

    <div class="w-9/12 m-auto">
        <a href="{{ route('lesson.lessons') }}" class="inline-block px-5 py-2 transition-all duration-200 border rounded-md bg-amber-300 hover:bg-amber-500 text-gray-700 font-semibold hover:text-white">
            بازگشت
        </a>
    </div>
    <div class="mt-10 w-3/4 m-auto">
        <div class="w-full p-5 grid grid-cols-8 gap-5 text-center border-b mb-3 text-lg text-gray-700 font-semibold">
            <span>
                آیدی
            </span>
            <span>
                نام درس
            </span>
            <span>
               تعداد واحد
            </span>
            <span>
                رشته ها
            </span>
            <span>
                دانشکده ها
            </span>
            <span>
                دانشگاه ها
            </span>
            <div class="col-span-2 border-r">
                دکمه ها
            </div>
        </div>
    </div>
    <div class="mt-10 w-3/4 m-auto">
        <div class="w-full p-5 grid grid-cols-8 gap-5 text-center border-b mb-3 text-lg font-normal text-gray-700">
            <span>
                {{ $lesson->id }}
            </span>
            <span>
                {{ $lesson->name }}
            </span>
            <span>
                {{ $lesson->unit }}
            </span>
            <div class="max-h-14 overflow-y-auto">
                @foreach($lesson->majors as $major)
                <span class="block text-start">
                    {{ $major->name }}
                </span>
                @endforeach
            </div>
            <div class="max-h-16 overflow-y-auto">
                @foreach($lesson->colleges as $college)
                <span class="block text-start">
                    {{ $college->name }}
                </span>
                @endforeach
            </div>
            <div class="max-h-14 overflow-y-auto">
                @foreach($lesson->unis as $uni)
                <span class="block text-start">
                    {{ $uni->name . " " . $uni->city }}
                </span>
                @endforeach
            </div>
            
            <div class="col-span-2 border-r">
                <a href="{{ route('lesson.edit', ['lesson'=>$lesson->id] ) }}" class="font-semibold text-sm bg-blue-300 mx-1 border rounded-md text-gray-700 transition-all duration-200 hover:bg-blue-600 hover:text-white px-3 py-1">ویرایش</a>
                <a href="{{ route('lessondelete', ['lesson'=>$lesson->id] ) }}" class="font-semibold text-sm bg-red-300 mx-1 border rounded-md text-gray-700 transition-all duration-200 hover:bg-rose-600 hover:text-white px-3 py-1">حذف</a>
            </div>
        </div>
    </div>
</body>
</html>