<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لیست دروس</title>
</head>
<body>
    @include('header')

    <h1 class="text-center text-3xl font-bold text-gray-700 my-10">لیست دروس</h1>

    <div class="w-9/12 m-auto">
        <a href="{{ route('lesson.create') }}" class="inline-block px-5 py-2 transition-all duration-200 border rounded-md bg-amber-300 hover:bg-amber-500 text-gray-700 font-semibold hover:text-white">
            ایجاد درس جدید
        </a>
    </div>
    <div class="mt-10 w-2/3 m-auto">
        <div class="w-full p-5 grid grid-cols-5 gap-5 text-center border-b mb-3 text-lg text-gray-700 font-semibold">
            <span>
                آیدی
            </span>
            <span>
                نام درس
            </span>
            <span>
               تعداد واحد
            </span>
            <div class="col-span-2 border-r">
                دکمه ها
            </div>
        </div>
    </div>
    <div class="mt-10 w-2/3 m-auto">
        @foreach($lessons as $lesson)
        <div class="w-full p-5 grid grid-cols-5 gap-5 text-center border-b mb-3 text-lg font-normal text-gray-700">
            <span>
                {{ $lesson->id }}
            </span>
            <span>
                {{ $lesson->name }}
            </span>
            <span>
                {{ $lesson->unit }}
            </span>
            <div class="col-span-2 border-r">
                <a href="{{ route('lesson.single', ['lesson'=>$lesson->id] ) }}" class="font-semibold text-sm bg-lime-300 text-gray-700 transition-all duration-200 hover:bg-green-600 hover:text-white mx-1 border rounded-md px-3 py-1">نمایش</a>
                <a href="{{ route('lesson.edit', ['lesson'=>$lesson->id] ) }}" class="font-semibold text-sm bg-blue-300 mx-1 border rounded-md text-gray-700 transition-all duration-200 hover:bg-blue-600 hover:text-white px-3 py-1">ویرایش</a>
                <a href="{{ route('lesson.delete', ['lesson'=>$lesson->id] ) }}" class="font-semibold text-sm bg-red-300 mx-1 border rounded-md text-gray-700 transition-all duration-200 hover:bg-rose-600 hover:text-white px-3 py-1">حذف</a>
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>